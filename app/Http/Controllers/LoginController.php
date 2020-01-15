<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录页面
	public function index(){
		if(Auth::check()){
			return redirect('/');
		}
		return view('login.index');
	}

	//登录行为
	public function login(){
		//验证
		$this->validate(request(),[
				'email'			=> 'required|email',
				'password'		=> 'required|min:5|max:10',
				'is_remember' 	=> 'integer',
		]);
		//逻辑
		$user = request(['email','password']);
		$is_remember = boolval(request('is_remember'));
		if (Auth::attempt($user,$is_remember)) {
				return back();
		}
		//渲染
		return \Redirect::back()->withError("邮箱密码不匹配");
	}
	//用公司域账号登录
	public function jiraLogin(){
		
	}
	

	//登出行为
	public function logout(){
		Auth::logout();
		return redirect('/login');
	}



}
