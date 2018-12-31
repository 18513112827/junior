<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // 成功后的操作
             session()->flash('success', '欢迎回来，继续学习吧');
             return redirect()->route('users.show', [Auth::user()]);
        } else {
            // 失败后的操作
            session()->flash('danger', '您输入的邮箱与密码不匹配');
            return redirect()->back()->withInput();
        }
    }
}
