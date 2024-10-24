<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;

class TaskController extends Controller
{
    public function list()
    {
        //1page辺りの表示アイテム数を設定
        $per_page = 2;
        
        //一覧の取得
        $list = TaskModel::where('user_id', Auth::id())
                         ->orderBy('priority', 'DESC',)
                         ->orderBy('period')
                         ->orderBy('created_at')
                         ->paginate($per_page);
                        // ->get();
        /*                 
        $sql = TaskModel::where('user_id', Auth::id())
                        ->orderBy('priority', 'DESC')
                        ->orderBy('period')
                        ->orderBy('created_at')
                        ->tosql();
        //var_dump($sql);
        //echo "<pre>\n"; var_dump($sql, $list); exit;
        */
        
    	return view('task.list', ['list' => $list]);
    }

    //タスクの新規登録
    public function register(TaskRegisterPostRequest $request)
    {
        //validate済みのデータの取得
        $datum = $request->validated();

        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;

        //user_idの追加
        $datum['user_id'] = Auth::id();

        //テーブルへのINSERT
        try{
           $r = TaskModel::create($datum);
        } catch(\Throwable $e) {
            echo $e->getMessage();
            exit;
        }

        //タスク登録成功
        $request->session()->flash('front.task_register_success', true);

        //リダイレクト
        return redirect('/task/list');
    }
}
