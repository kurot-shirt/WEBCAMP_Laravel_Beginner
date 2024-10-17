<?php

declare(strict_type=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TestPostRequest;

class TestController extends Controller
{
    //トップページを表示する
    public function index()
    {
    	return view('test.index');
    }

    //入力を受け取る
    public function input(TestPostRequest $request)
    {
        //validate済

        //データの取得
        $validatedDate = $request->validated();

        return view('test.input', ['datum' => $validatedDate]);

    	//var_dump($validatedDate); exit;
    }
}
