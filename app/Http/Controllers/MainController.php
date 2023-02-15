<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index_admin(){
        return view('admin.home',[
            'title' => 'Trang Quản trị'
        ]);
    }
    public function index_user(){
        echo 123445654;
    }
}
