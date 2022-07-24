<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class brandController extends Controller
{
    // show brands in table
    public function index(Request $request)
    {
        $brands=Brand::paginate(5,"*","brands");
        return view("admin.brand.index",compact("brands"));
    }

    // controller for  total delete brands
    public function total_delete(Request $request)
    {
        //brands id
        $brandId_from_brand_table=$request->input("brands");

        // Check is empty
        if($brandId_from_brand_table){

            // var for removed brands
            $removed_brands=Brand::destroy($brandId_from_brand_table);

            // check brands removed
            if($removed_brands){

                // brand job done details for show message
                $brand_condition="successful";
                $brand_job_done="soft_deleted";
                $brand_job_done_alert_svg="m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                $brand_job_done_alert_message="برند با موفقیت به لیست حذف موقت اضافه شد";
                return redirect()->route("demo")->with([
                    "brand_session_is_on"=>[
                        $brand_condition,$brand_job_done,$brand_job_done_alert_svg,$brand_job_done_alert_message
                    ]
                ]);

            }else{
                $brand_condition="unsuccessful";
            }
        }else{

        }
    }
}
