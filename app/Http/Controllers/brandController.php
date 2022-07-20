<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function index(Request $request)
    {
        $brands=Brand::paginate(5,"*","brands");
        dd($brands->links());
    }
}
