<?php

namespace App\Http\Controllers\application\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\userPackageSubscription;
use App\Models\packageSubscription;
use App\Models\userMemberPoint;
use App\Models\memberLevel;
use Auth;
use Stripe;

class CarWashPackageSubscriptionController extends Controller
{
    public function CarWashPackageSubscription()
    {
        //userPackages = userPackageSubscription::where('userId', '=', Auth::id())->get();

        $userPackages = DB::table('user_package_subscriptions')
            ->leftjoin('package_subscriptions', 'package_subscriptions.id', '=', 'user_package_subscriptions.packageId')
            ->select('package_subscriptions.name as packageName', 'user_package_subscriptions.*')
            ->where('userId', '=', Auth::id())
            ->get();

        $packages = packageSubscription::all();

        $response = ['userPackages' => $userPackages, 'packages' => $packages];
        return response()->json($response, 200);
    }
    public function addNewPackage($id)
    {
        //find the target package
        $packages = packageSubscription::find($id);

        $r = request();

        $addPackage = userPackageSubscription::create([
            'userId' => Auth::id(),
            'packageId' => $packages->id,
            'times' => $packages->washTimes,
            'price' => $packages->price,
            'paymentStatus' => 0,
        ]);

        $orderPackageId = $addPackage->id;
        //get packageInformation data to the payement package
        /*packageInformation = DB::table('package_subscriptions')
            ->leftjoin('package_subscriptions', 'package_subscriptions.id', '=', 'user_package_subscriptions.packageId')
            ->select('package_subscriptions.name as packageName', 'user_package_subscriptions.*')
            ->where([['user_package_subscriptions.packageId', '=', $packages->id], ['userId', '=', Auth::id()],['id','=',$orderid]])
            ->first();*/

        $packageInformation = packageSubscription::where('id', '=', $id)->get();

        $userMemberPoint = userMemberPoint::where('userId', '=', Auth::id())->first();
        $memberLevel = $userMemberPoint->memberLevel;

        $memberLevelDiscount = memberLevel::where('memberLevel', '=', $memberLevel)->first();

        //calculate the discount price
        foreach ($packageInformation as $packageInformations) {
            $packageInformation_price = $packageInformations->price;
        }
        $discount = $memberLevelDiscount->discount / 100;
        $discount_amount = $packageInformation_price * $discount;
        $total_package_price = $packageInformation_price - $discount_amount;

        $response = ['packageInformation' => $packageInformation, 'memberLevelDiscount' => $memberLevelDiscount, 'orderPackageId', $orderPackageId,'discount_amount',$discount_amount,'total_package_price',$total_package_price];
        return response()->json($response, 200);
    }
    //payment the package
    public function paymentPackage(Request $request)
    {
        $orderPackageId = $request->id;

        $OrderPackage = userPackageSubscription::where('id', '=', $orderPackageId)->first();

        $checkPaymentStatus = $OrderPackage->paymentStatus;

        if ($checkPaymentStatus == 0) {
            if ($request->totalAmount <= 0) {
                Session::flash('Danger', 'Please Retry The Payment!!');

                return redirect()->route('CarWashPackageSubscription');
            } else {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create([
                    'amount' => $request->totalAmount * 100, //RM10=10CEN 10*100=1000CEN
                    'currency' => 'MYR',
                    'source' => $request->stripeToken,
                    'description' => 'This payment is reservation purpose of car wash system',
                ]);
                $totalAmount = $request->totalAmount;
                $id = $request->id;
                DB::update('update user_package_subscriptions set paymentStatus = ?,price = ? where id = ?', [1, $totalAmount, $id]);

                $response = ['message' => 'Payment Succssful'];

                return response()->json($response, 200);
            }
        } else {
            $response = ['message' => 'You already payment!!'];

            return response()->json($response, 400);
        }
    }

    //repayment the package
    public function repaymentPackage($id)
    {
        $findPackageId = userPackageSubscription::where('id', $id)->first();

        $packageInformation = packageSubscription::where('id', '=', $findPackageId->packageId)->get();

        $userMemberPoint = userMemberPoint::where('userId', '=', Auth::id())->first();
        $memberLevel = $userMemberPoint->memberLevel;

        $memberLevelDiscount = memberLevel::where('memberLevel', '=', $memberLevel)->first();

        $orderPackageId = $id;

         //calculate the discount price
         foreach ($packageInformation as $packageInformations) {
            $packageInformation_price = $packageInformations->price;
        }
        $discount = $memberLevelDiscount->discount / 100;
        $discount_amount = $packageInformation_price * $discount;
        $total_package_price = $packageInformation_price - $discount_amount;

        $response = ['packageInformation' => $packageInformation, 'memberLevelDiscount' => $memberLevelDiscount, 'orderPackageId', $orderPackageId,'discount_amount',$discount_amount,'total_package_price',$total_package_price];

        return response()->json($response, 200);
    }
}
