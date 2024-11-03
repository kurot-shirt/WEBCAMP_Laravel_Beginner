<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;

class UserController extends Controller
{
	//登録画面表示用
    public function index()
    {
    	return view('index');
    }

    //データベース登録処理用
    public function register(UserRegisterPost $request)
    {
    	//validate済み

    	//データの取得
    	$validatedDate = $request->validated();
    	//$datum = $request->validated();

    	//$datum['password'] = Hash::make($datum['password']);

        return view('user.register', ['datum' => $validateDate]);
    }
}
