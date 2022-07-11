<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        $categories=Category::all();
        return view("admin.category.index",compact("categories"));
    }

    public function store(Request $request,$user_create_category)
    {
        $category_validate=$request->validate([
            "category_name" => "required|max:20|min:4|unique:categories",
        ],[
            "category_name.min" => "کاراکتر کمتر از حد مجاز",
            "category_name.max" => "کاراکتر بیشتر از حد مجاز",
            "category_name.required" => "لطفا مقداری وارد کنید",
            "category_name.unique" => "این دسته قبلا ثبت شده است",
        ]);

        $category_created=null;
        if($category_validate){
           $category_store=Category::create([
               "user_id" => $user_create_category,
               "category_name" => $request->input("category_name")
           ]);

           $category_created="successful";

            return \redirect()->route("categories")->with("category_created",$category_created);
        }


    }

    public function remove(Request $request,$param)
    {
        $category_removed=Category::find($param)->delete();
        return \redirect()->route("categories");

    }
}
