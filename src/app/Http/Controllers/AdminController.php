<?php

namespace App\Http\Controllers;

use App\Prefecture;
use Illuminate\Http\Request;

use APP\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->prefecture = new Prefecture();
    }

    //一覧画面
    public function index() {
        $prefectures = $this->prefecture->findAllPrefectures();
        return view('admin.admin', compact('prefectures'));
    }

    //登録画面
    public function create(Request $request) {
        
        return view('admin.create');
    }

    //登録処理
    public function store(Request $request)
    {
        $registerTitle = $this->prefecture->InsertTitle($request);
        return redirect()->route('admin.index');
    }

    public function edit() {
        return view('Admin.edit');
    }
    public function add() {
        return view('Admin.add');
    }
    public function delete() {
        return view('Admin.delete');
    }
}