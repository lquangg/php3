<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id,$title){
        dd("Đây là trang $title có  $id");
    }
}
