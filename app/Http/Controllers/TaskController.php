<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function list()
    {
    	return view('task.list');
    }
}
