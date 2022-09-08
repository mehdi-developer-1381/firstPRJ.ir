<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    // Constructor Method
    public function __construct(){
        $this->middleware("auth");
    }



    public function index(Request $request)
    {
        $trashed_categories="";


        if(Category::onlyTrashed()->get()){
            $trashed_categories=Category::onlyTrashed()->paginate(5,"*","trashed",);
        }
        $categories=Category::paginate(5,"*","categories");

        return view("admin.category.index",compact("categories","trashed_categories"));
    }

    public function store(Request $request,$user_create_category)
    {

        $category_validate=Validator::make($request->all(),[
            "category_name" => ["required","max:20","min:4","unique:categories"],
        ],[
            "category_name.min" => "کاراکتر کمتر از حد مجاز",
            "category_name.max" => "کاراکتر بیشتر از حد مجاز",
            "category_name.required" => "لطفا مقداری وارد کنید",
            "category_name.unique" => "این دسته قبلا ثبت شده است",
        ]);


        if($category_validate->fails()){
           return \redirect()->back()
               ->withErrors($category_validate,"create_category_error")
               ->withInput();
        }else{
            $category_store=Category::create([
                "user_id" => $user_create_category,
                "category_name" => $request->input("category_name")
            ]);

            return \redirect()->back()->with("category_message","active")->with("message_active","created_category");
        }


    }


    public function total_remove(Request $request)
    {
        if(isset($request->all()["categories"])) {
            foreach ($request->all()["categories"] as $category) {
                Category::find($category)->delete();
            }
            return \redirect()->back()->with("category_message","active")->with("message_active","removed_total_category");
        }else{
            return \redirect()->back();
        }
    }

    public function update(Request $request)
    {
        if($request->except("_token")) {
            $category_validate=Validator::make($request->all(),
            [
                "category_name"=>["required","min:4","max:20","unique:categories"]
            ],[
                "category_name.min" => "کاراکتر کمتر از حد مجاز",
                "category_name.max" => "کاراکتر بیشتر از حد مجاز",
                "category_name.required" => "لطفا مقداری وارد کنید",
                "category_name.unique" => "این دسته قبلا ثبت شده است",
            ]);



            if($category_validate->fails()) {
                // this var stay here for use after turned
                session()->put("category_id",$request->input("category_id"));

                return \redirect()->back()
                    ->withErrors($category_validate,"update_category_error")
                    ->withInput();
            }else{
                $category_name_ready_for_update = $request->input("category_name");
                if(!session("category_id")){
                    session()->put("category_id",$request->input("category_id"));
                }
                $category_id_ready_for_update = session("category_id");
                Category::find($category_id_ready_for_update)->update([
                    "category_name" => $category_name_ready_for_update
                ]);
                session()->remove("category_id");
                return \redirect()->back();
            }

        }
    }

    public function total_force_delete(Request $request)
    {
        $request_all=$request->all();
        if($request_all["target"] === "force_delete"){
            if(isset($request_all["categories"])){
                $force_delete_category="";

                foreach($request_all["categories"] as $category){
                    $force_delete_category=Category::onlyTrashed()->find($category)->forceDelete();
                }
                if($force_delete_category){
                    return \redirect()->back();
                }
            }else{
                return \redirect()->back();
            }
        }elseif($request_all["target"] === "restore"){
            $restore_category="";
            if(isset($request_all["categories"])){
                foreach($request_all["categories"] as $category){
                    $restore_category=Category::onlyTrashed()->find($category)->restore();
                }
                if($restore_category){
                    return \redirect()->back();
                }
            }else{
                return \redirect()->back();
            }
        }else{
            return \redirect()->back();
        }
    }

}
