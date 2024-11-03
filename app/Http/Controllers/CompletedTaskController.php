<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompletedTask as CompletedTaskModel;

class CompletedTaskController extends Controller
{

    //完了タスクの一覧ページを表示する
    public function list()
    {
        //アイテム数を設定
        $per_page = 2;

        //一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);

    	return view('task.completed_list', ['list' => $list]);
    }

    //単一タスクのModelの取得
    protected function getTaskModel($task_id)
    {
        //task_idのレコードを取得する
        $task = CompletedTaskModel::find($task_id);
        if ($task === null) {
            return null;
        }
        //本人以外のタスクならNGとする
        if ($task->user_id !== Auth::id()) {
            return null;
        }
        return $task;
    }

    //単一タスクの表示
    protected function singleTaskRender($task_id, $template_name)
    {
        //task_idのレコードを取得する
        $task = $this->getTaskModel($task_id);
        if ($task === null) {
            return redirect('/task/list');
        }
        //テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['task' => $task]);
    }

    //一覧のIlluminate\Database\Eloquent\Builder インスタンス取得
    protected function getListBuilder()
    {
        return CompletedTaskModel::where('user_id', Auth::id())
                     ->orderBy('priority', 'DESC')
                     ->orderBy('period')
                     ->orderBy('created_at');
    }
}