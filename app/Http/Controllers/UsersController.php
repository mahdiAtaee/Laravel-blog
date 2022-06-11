<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = Users::all();
        $pageTitle = "کاربران";
        return view('users', compact('pageTitle', 'Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ID = Auth::user()->id;
        $contents = DB::table('users')->where('id', '=', $ID)->get();
        $pageTitle = "ایجاد کاربر جدید";
        return view('createUser', compact('pageTitle', 'contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'نام باید مقدار دهی شود',
            'name.max' => 'تعداد حروف محاز 25 کاراکتر می باشد!',
            'email.unique' => 'نام تکراری است',
            'email.required' => 'ایمیل باید مقدار دهی شود',
            'password.required' => 'رمز عبور باید مقدار دهی شود',
            'user_description.required' => 'توضیحات باید مقدار دهی شود',
        ];

        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|unique:Users',
            'password' => 'required',
            'user_description' => 'required'
        ], $messages);

        $users = new Users([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'user_description' => $request->get('user_description'),
            'rule' => $request->get('rule'),
        ]);
        try {
            $users->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case '23000':
                    $msg = 'عنوان تکراری است';
                    break;
            }
            return redirect(route('users'))->with('warning', $msg);
        }
        $msg = "ایجاد کاربر جدید موفقیت آمیز بود";
        return redirect(route('users'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users, $id)
    {
        $ID = Auth::user()->id;
        $contents = DB::table('users')->where('id', '=', $ID)->get();
        $userData =  Users::where('id', '=', $id)->firstOrFail();
        $pageTitle = "ویرایش کاربر";
        return view('editUser', compact('pageTitle', 'contents', 'userData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users, $id)
    {
        $messages = [
            'name.required' => 'نام باید مقدار دهی شود',
            'name.max' => 'تعداد حروف محاز 25 کاراکتر می باشد!',
            'email.required' => 'ایمیل باید مقدار دهی شود',
            'password.required' => 'رمز عبور باید مقدار دهی شود',
            'user_description.required' => 'توضیحات باید مقدار دهی شود',
        ];

        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required',
            'password' => 'required',
            'user_description' => 'required'
        ], $messages);

        $Hashpass = Hash::make($request->password);

        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $Hashpass;
        $users->user_description = $request->user_description;
        $users->rule = $request->rule;
        
        try {
            $users->update();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case '23000':
                    $msg = 'عنوان تکراری است';
                    break;
            }
            return redirect(route('users'))->with('warning', $msg);
        }
        $msg = "ویرایش موفقیت آمیز بود";
        return redirect(route('users'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users, $id)
    {
        $users = Users::find($id);
        $users->delete();
        $msg = "حذف کاربر موفقیت آمیز بود";
        return redirect(route('users'))->with('success', $msg);
    }
}
