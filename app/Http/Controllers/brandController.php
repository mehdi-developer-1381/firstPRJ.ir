<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
        $brands = Brand::paginate(5,"*","brands");
        return view("admin.brand.index",compact("brands"));
    }

    // total delete brands method
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function total_delete(Request $request)
    {
        //brands id
        $brandId_from_brand_table = $request->input("brands");

        // Check is empty
        if($brandId_from_brand_table){

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

    // update brands method
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function update(Request $request)
    {

        //checked is not null request
        if($request->except("_token")){

            //validate brand name
            $brand_name_validate=Validator::make($request->all(),[
                "brand_name"=>["required","min:4","max:20","unique:brands"]
            ],[
                "brand_name.required" => "لطفا مقداری وارد کنید",
                "brand_name.min" => "کاراکتر کمتر از حد مجاز",
                "brand_name.max" => "کاراکتر بیشتر از حد مجاز",
                "brand_name.unique" => "این برند قبلا ثبت شده است",
            ]);

            //checked validate result
            if($brand_name_validate->fails()){

                //keep brand_id with session
                session()->put("brand_id",$request->input("brand_id"));

                //redirect back with errors
                return redirect()->back()
                    ->withErrors($brand_name_validate,"brand_update_error")
                    ->withInput();
            }else {

                //if don't fails
                $brand_update=Brand::find($request->input("brand_id"))->update(["brand_name"=>$request->input("brand_name")]);

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
}
