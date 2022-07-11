<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        return view("admin.category.index");
    }

    public function store()
    {
        $category_submited=true;
        return view("admin.category.index",compact("category_submited"));
    }
}
