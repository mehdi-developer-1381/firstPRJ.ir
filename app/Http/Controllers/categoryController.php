<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        $categories=Category::paginate(5);

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

            $request->ajax();

            return \redirect()->route("categories")->with("category_message","active")->with("message_active","created_category");
        }


    }

    public function remove(Request $request,$param)
    {
        $category_removed=Category::find($param)->forceDelete();
        return \redirect()->route("categories")->with("category_message","active")->with("message_active","removed_category");

    }

    public function total_remove(Request $request)
    {
        if(isset($request->all()["categoris"])) {
            foreach ($request->all()["categoris"] as $category) {
                Category::find($category)->forceDelete();
            }
            return \redirect()->route("categories")->with("category_message","active")->with("message_active","removed_total_category");
        }else{
            return \redirect()->back();
        }
    }

    public function total_update(Request $request)
    {
        $category_keys_from_index_view=array_keys($request->except("_token"));
        $category_values_from_index_view=array_values($request->except("_token"));



        for($i=0; $i<count($category_keys_from_index_view); $i++){
                    $exploded_category_keys_from_index_view=explode("_",$category_keys_from_index_view[$i])[1];
                    $category_values_from_index_view_foreach=$category_values_from_index_view[$i];

                    Category::find($exploded_category_keys_from_index_view)->update([
                        "category_name"=>$category_values_from_index_view_foreach
                    ]);
        }
        return \redirect()->route("categories");
    }
}
