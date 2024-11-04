<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class UserController extends Controller
{
	//登録画面表示用
    public function index()
    {
    	return view('user.register');
    }

    //データベース登録処理用
    public function register(UserRegisterPost $request)
    {
    	//validate済み

    	//データの取得
    	$datum = $request->validated();

    	$datum['password'] = Hash::make($datum['password']);

    	//テーブルへのINSERT
    	try {
    	    $r = UserModel::create($datum);
    	} catch(\Throeabele $e) {
    	    echo $e->getMessage();
    	    exit;
    	}
        return redirect('/')->with('message', 'ユーザを登録しました!!');
    }
}
