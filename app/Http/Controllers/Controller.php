<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Imagine\Filter\Advanced\BlackWhite;
use Imagine\Imagick\Effects;
use Intervention\Image\Facades\Image;
use MongoDB\Driver\Session;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\Contracts\DataTable;
use App\Models\Post;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test()
    {
      return view("demo/demo");

    }

    public function demo2(Request $request)
    {
    }

}
