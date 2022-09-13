<?php
namespace App\Http\Controllers;





use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Solution\Coupon\Coupon;
use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Problem\CouponValidator;

use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Solution\Coupon\CheckActiveCoupon;
use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Solution\Coupon\CheckAvailableCoupon;
use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Solution\Coupon\CheckExistsCoupon;
use App\DesignPatterns\Behavioural\ChinOfResposibilidy\EX01\Solution\UsedCoupon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Coupon $coupon)
    {
        $validator=[
            new CheckExistsCoupon($coupon),
        ];
        $useCoupon= new UsedCoupon(...$validator);
        $useCoupon->validateCoupon("7Learn");
    }
}





