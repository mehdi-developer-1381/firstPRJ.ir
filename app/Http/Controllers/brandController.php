<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\My_Classes\viewClass;
use App\Models\Image;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class brandController extends Controller
{
    // show brands in table method
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function index(Request $request)
    {


        $brands = Brand::paginate(5,"*","brand_page");
        return view("admin.brand.index",compact("brands"));
    }




    // method brand store
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function store(Request $request)
    {
        //checked for is not empty $request
        if($request->except("_token")){

            //brand name for create a new brand
            $brand_name=$request->input("brand_name");

            $create_brand_validate = Validator::make($request->except("_token"),[
                "brand_name"            => ["required","min:4","max:20","unique:brands"],
                "brand_logo"            => ["required","image","max:1024","mimes:jpeg,png,jpg,gif,webp"]
            ],[
                "brand_name.required"   => "لطفا مقداری وارد کنید",
                "brand_name.min"        => "کاراکتر کمتر از حد مجاز",
                "brand_name.max"        => "کاراکتر بیشتر از حد مجاز",
                "brand_name.unique"     => "این برند قبلا ثبت شده است",
                "brand_logo.required"   => "انتخاب تصویر ضروری است",
                "brand_logo.image"      => "لطفا فایل تصویری انتخاب کنید",
                "brand_logo.max"        => "حجم عکس بالاتر از 1 مگابایت است",
                "brand_logo.mimes"      => "فرمت تصویر نامعتبر است",

            ]);


            //if brand name validate is failed
            if($create_brand_validate->fails()){
                return redirect()
                    ->back()
                    ->withErrors($create_brand_validate,"create_brand_errors")
                    ->withInput();

            }
            else{//now we can create a new brand

                //create new brand in Brand Model
                $create_new_brand = Brand::create([
                    "brand_name" => $brand_name
                ]);

//                     ** Image Handling **

                if($request->file("brand_logo")){

                    //make it image new name
                    $image_original_name = $brand_name;
                    $image_original_name_extension = $request->file("brand_logo")->getClientOriginalExtension();
                    $image_new_name = $image_original_name.".".$image_original_name_extension;

                    //move image to public path
                    $request->file("brand_logo")->move(public_path("images/admin/brand/"),"$image_new_name");

                    //extract brandId from this was made brand
                    $brand_id = Brand::all()->where("brand_name","===","$brand_name")->all();
                    $brand_id = $brand_id[array_key_first($brand_id)]->brand_id;


                    Brand::find($brand_id)->image()->create([
                        "image_name"        => $image_original_name.".".$image_original_name_extension,
                        "image_path"        => asset("images/admin/brand/".$image_new_name),
                        "image_foreign_id"  => $brand_id,
                    ]);

                    // brand job done details for show unsuccessful message
                    $brand_condition               = "successful";
                    $brand_job_done                = "store_brand";
                    $brand_job_done_alert_svg      = "M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm7 7.457l-9.005 9.565-4.995-5.865.761-.649 4.271 5.016 8.24-8.752.728.685z";
                    $brand_job_done_alert_message  = "برند با موفقیت ثبت شد";
                    $brand_job_done_alert_class    = "success";


                    return redirect()->back()->with([
                        "brand_session_is_on"=>[
                            "brand_condition"              => $brand_condition,
                            "brand_job_done"               => $brand_job_done,
                            "brand_job_done_alert_svg"     => $brand_job_done_alert_svg,
                            "brand_job_done_alert_message" => $brand_job_done_alert_message,
                            "brand_job_done_alert_class"   => $brand_job_done_alert_class
                        ]
                    ]);
                }

            }


        }else{
            return back();
        }
    }




    // update brands method
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function update(Request $request)
    {

        //checked is not null request
        if($request->except("_token")){

            $current_brand_name=Brand::find($request->input("brand_id"))->brand_name;

            if($current_brand_name === $request->input("brand_name")){
                $rules = ["required","min:4","max:20"];
            }else{
                $rules = ["required","min:4","max:20","unique:brands"];
            }

            //validate brand name
            $brand_name_validate=Validator::make($request->except(["_token","brand_id"]),[
                "brand_name"            => $rules,
                "brand_logo"            => ["image","max:1024","mimes:jpeg,png,jpg,gif,webp"]
            ],[
                "brand_name.required"   => "لطفا مقداری وارد کنید",
                "brand_name.min"        => "کاراکتر کمتر از حد مجاز",
                "brand_name.max"        => "کاراکتر بیشتر از حد مجاز",
                "brand_name.unique"     => "این برند قبلا ثبت شده است",
                "brand_logo.image"      => "لطفا فایل تصویری انتخاب کنید",
                "brand_logo.max"        => "حجم عکس بالاتر از 1 مگابایت است",
                "brand_logo.mimes"      => "فرمت تصویر نامعتبر است",
                "brand_logo.required"   => "لطفا عکسی انتخاب کنید",
            ]);

            //checked validate result
            if($brand_name_validate->fails()){

                //keep brand_id with session
                session()->put("keep_brand_id",$request->input("brand_id"));

                //redirect back with errors
                return redirect()->back()
                    ->withErrors($brand_name_validate,"brand_update_errors")
                    ->withInput();
            }else {

                //brand name updated
                Brand::find($request->input("brand_id"))->update(
                    ["brand_name"=>$request->input("brand_name")]
                );


                //brand_name && brand_id
                $brand_id   = $request->input("brand_id");
                $brand_name = $request->input("brand_name");


                //============================================ update current brand ========================================

                function update_current_brand($brand_id,$brand_name){

                    //extract current image_name
                    $images=Image::all()->where("imagable_id","==",$brand_id);
                    foreach($images as $image);

                    //image current image_path
                    $brand_current_imagePath_publicFormat =
                        public_path("images/admin/brand/".$image->image_name);

                    //image new image_path
                    $file_path_info = pathinfo(public_path("images/admin/brand/".$image->image_name));
                    $brand_new_imagePath_publicFormat     =
                        public_path("images/admin/brand/".$brand_name.".".$file_path_info["extension"]);


                    //now set image new name
                    $image_extension= pathinfo(public_path("images/admin/brand/".$image->image_name));
                    $image_new_name = $brand_name.".".$image_extension["extension"];
                    $image_new_path = asset("images/admin/brand/".$image_new_name);

                    //now imagable table is ready to change
                    Image::find($image->image_id)->update([
                        "image_name"  => $image_new_name,
                        "image_path"  => $image_new_path,
                        "imagable_id" => $brand_id
                    ]);



                    //ready to rename file
                    rename($brand_current_imagePath_publicFormat,$brand_new_imagePath_publicFormat);


                }

                //============================================ set new brand ========================================

                function set_new_brand($request,$current_brandId,$brand_name){

                    //make it image new name
                    $image_original_name = $brand_name;
                    $image_original_name_extension = $request->file("brand_logo")->getClientOriginalExtension();
                    $image_new_name = $image_original_name.".".$image_original_name_extension;

                    //(( remove previous image ))
                    //extract current image_name
                    $images=Image::all()->where("imagable_id","==",$current_brandId);
                    foreach($images as $image);

                    //previous image name
                    $image_previous_path=public_path("images/admin/brand/".$image->image_name);

                    //check if exists
                    if(file_exists($image_previous_path)) {
                        unlink($image_previous_path);
                    }

                    //move image to public path
                    $request->file("brand_logo")->move(public_path("images/admin/brand/"),"$image_new_name");

                    //extract brandId from this was made brand



                    //now set new image in imagable table
                    Brand::find($current_brandId)->image()->update([
                        "image_name"        => $image_original_name.".".$image_original_name_extension,
                        "image_path"        => asset("images/admin/brand/".$image_new_name),
                        "image_foreign_id"  => $current_brandId,
                    ]);




                }

                if($request->has("brand_logo")){
                    set_new_brand($request,$brand_id,$brand_name);
                }else{
                    update_current_brand($brand_id,$brand_name);
                }


                // brand update message
                $brand_condition = "successful";
                $brand_job_done = "updated_brand";
                $brand_job_done_alert_svg = "M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm7 7.457l-9.005 9.565-4.995-5.865.761-.649 4.271 5.016 8.24-8.752.728.685z";
                $brand_job_done_alert_message = "برند موردنظر با موفقیت ویرایش شد";
                $brand_job_done_alert_class = "success";

            }
        }else{
            // brand nothing to update message
            $brand_condition = null;
            $brand_job_done = null;
            $brand_job_done_alert_svg = null;
            $brand_job_done_alert_message = null;
            $brand_job_done_alert_class = null;
        }
        return redirect()->back()->with([
            "brand_session_is_on" => [
                "brand_condition" => $brand_condition,
                "brand_job_done" => $brand_job_done,
                "brand_job_done_alert_svg" => $brand_job_done_alert_svg,
                "brand_job_done_alert_message" => $brand_job_done_alert_message,
                "brand_job_done_alert_class" => $brand_job_done_alert_class
            ]
        ]);
    }




    // total delete brands method
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function total_delete(Request $request)
    {
        //brands id
        $brandId_from_brand_table = $request->input("brands");

        // Check is empty
        if($brandId_from_brand_table){

            //remove brand image
            foreach($brandId_from_brand_table as $brand_id){

                //stet:1 ==> select brand with id
                $brand_selected = Brand::find($brand_id);

                //step:2 ==> extract image_path by brand
                $brand_selected = $brand_selected->image()->get();

                //if sometimes is not found image, he must return to back
                if(!empty($brand_selected) && !isset($brand_selected[0])){

                    //fاگر زمانی بر حسب اتفاق، تصویر رو پیدا نکرد، باید هم از فایل سیستم اون عکس رو حذف کنیم، و هم خود این برند رو

                    //brand delete from brandsTable
                    Brand::destroy($brand_id);

                    //brand_name, sometime if needed
                    $brands_name=$request->input("brands_name");

                    //brand image delete from filesystem
                    foreach($brands_name as $brand_name) {

                        //possible extension, because isn't here
                        $possible_extension=["jpeg","png","jpg","gif","webp"];
                        foreach($possible_extension as $extension){


                            if(file_exists(public_path("images/admin/brand/".$brand_name.".".$extension))){
                                unlink(public_path("images/admin/brand/".$brand_name.".".$extension));
                            }
                        }

                    }

                    // brand job done details for show successful message
                    $brand_condition               = null;
                    $brand_job_done                = null;
                    $brand_job_done_alert_svg      = "m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                    $brand_job_done_alert_message  = "برندهای موردنظر با موفقیت حذف شدند";
                    $brand_job_done_alert_class    = "danger";

                    return redirect()->back()->with([
                        "brand_session_is_on"=>[
                            "brand_condition"              => $brand_condition,
                            "brand_job_done"               => $brand_job_done,
                            "brand_job_done_alert_svg"     => $brand_job_done_alert_svg,
                            "brand_job_done_alert_message" => $brand_job_done_alert_message,
                            "brand_job_done_alert_class"   => $brand_job_done_alert_class
                        ]
                    ]);

                }else {

                    //step:3 ==> extract baseName from the image_path
                    $brand_selected_baseName = basename($brand_selected[0]->image_path);

                    //now here we ready for remove image form filesystem
                    $path = public_path("images/admin/brand/" . $brand_selected_baseName);
                    if(file_exists($path)) {
                        unlink($path);
                    }
                }
            }



            // var for removed brands
            $removed_brands = Brand::destroy($brandId_from_brand_table);


            // check brands removed
            if($removed_brands){

                // brand job done details for show successful message
                $brand_condition               = "successful";
                $brand_job_done                = "soft_deleted";
                $brand_job_done_alert_svg      = "m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                $brand_job_done_alert_message  = "برندهای موردنظر با موفقیت حذف شدند";
                $brand_job_done_alert_class    = "danger";

            }else{

                // brand job done details for show unsuccessful message
                $brand_condition               = "unsuccessful";
                $brand_job_done                = "soft_deleted";
                $brand_job_done_alert_svg      = "m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                $brand_job_done_alert_message  = "عملیات نا موفق";
                $brand_job_done_alert_class    = "warning";
            }
        }else{
            // brand is not found message
            $brand_condition               = null;
            $brand_job_done                = null;
            $brand_job_done_alert_svg      = "m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
            $brand_job_done_alert_message  = "لطفا یک برند انتخاب کنید";
            $brand_job_done_alert_class    = "warning";
        }

        return redirect()->back()->with([
            "brand_session_is_on"=>[
                "brand_condition"              => $brand_condition,
                "brand_job_done"               => $brand_job_done,
                "brand_job_done_alert_svg"     => $brand_job_done_alert_svg,
                "brand_job_done_alert_message" => $brand_job_done_alert_message,
                "brand_job_done_alert_class"   => $brand_job_done_alert_class
            ]
        ]);
    }











}
