<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPlan;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FrontendController extends Controller
{
    public function index()
    {

        $customerPlains = CustomerPlan::all()->map(function ($plain) {
            $plain->features = json_decode($plain->features);
            return $plain;
        });
        // dd($customerPlains);
        return view('frontend.index', compact('customerPlains'));
    }

    public function contact()
    {

        return view('frontend.contact');
    }

    public function inspection($plain_id)
    {
        $plain = CustomerPlan::find($plain_id);
        return view('frontend.inspection', compact('plain'));
    }

    public function about(){
        return view('frontend.about');
    }


    public function create_order(Request $request)
    {
        // dd($request->all());
        $data = [
            "plan_id" => "required",
            "year" => "required",
            "vin_number" => "required",
            "make" => "required",
            "model" => "required",
            "dealership_name" => "required",
            "stock_number" => "required",
            "seller_contact" => "required",
            "address_permanent" => "required",
            "date" => "required",
            "note" => "required",
            "first_name" => "required",
            "user_type" => "required",
            "last_name" => "required",
            "email" => "required",
            "phone" => "required",
            "card_number" => "required",
            "mm" => "required",
            "cvv" => "required",
            "postal_code" => "required",
        ];
        $validated = $request->validate($data);

        // dd($validated);
        $user = null;
        try {
            $user = User::updateOrCreate([ 'email' => $validated['email']] ,[
                'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'password' => 'admin123',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }
        try {

            Order::create([
                "plan_id" => $validated['plan_id'],
                "user_id" => $user->id,
                "vin_number" => $validated['vin_number'],
                "year" => $validated['year'],
                "make" =>  $validated['make'],
                "model" =>  $validated['model'],
                "dealership_name" =>  $validated['dealership_name'],
                "stock_number" =>  $validated['stock_number'],
                "seller_contact" =>  $validated['seller_contact'],
                "address_permanent" =>  $validated['address_permanent'],
                "date" =>  $validated['date'],
                "note" =>  $validated['note'],
                // "history_report" => "History was clear",
                // "assessment_report" => "Very Bad",
                "order_status" => "pending"
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }
    
        try {
             Customer::create([
                "user_type" =>  $validated['user_type'],
                "user_id" =>  $user->id,
                "first_name" =>  $validated['first_name'],
                "last_name" =>  $validated['last_name'],
                "email" =>  $validated['email'],
                "phone" => $validated['phone'],
                "address" => 'paris France',
                "city" =>  "paris",
                "state" =>  "france",
                "zip" =>  "38000",
                "password" =>  "admin123",
                // "work_with_other_inspection_companies" =>  "yes",
                // "interested_in_doing_mobile_mechanic_work" =>  "yes",
                // "ase" =>  "1122",
                // "education" =>  "BSIT",
                // "work_experience" =>  "Maxenius Solutions"
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }

        try {
            Payment::create([
                "user_id" => $user->id,
                "card_number" => $validated['card_number'],
                "mm" => $validated['mm'],
                "cvv" => $validated['cvv'],
                "postal_code" => $validated['postal_code']
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }
        
        return redirect()->back()->with('message', 'Order palced successfully.');
    }

    public function car_info(Request $request)
    {
        $vin_number = $request->vin_number;
        try {


            // 1GTG6CEN0L1139305',
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://carapi.app/api/vin/' . $vin_number,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjYXJhcGkuYXBwIiwic3ViIjoiNmFiNDhlZGMtNTY2Zi00MWFhLThhYzYtMDY0N2E0YzA4NzJjIiwiYXVkIjoiNmFiNDhlZGMtNTY2Zi00MWFhLThhYzYtMDY0N2E0YzA4NzJjIiwiZXhwIjoxNzIwMTE3MTYwLCJpYXQiOjE3MTk1MTIzNjAsImp0aSI6IjJmMzFjN2ZlLTRmNjktNDgwYy1hYzc1LWI3YWU5Zjk2MGY1MCIsInVzZXIiOnsic3Vic2NyaWJlZCI6ZmFsc2UsInN1YnNjcmlwdGlvbiI6bnVsbCwicmF0ZV9saW1pdF90eXBlIjoiaGFyZCIsImFkZG9ucyI6eyJhbnRpcXVlX3ZlaGljbGVzIjpmYWxzZSwiZGF0YV9mZWVkIjpmYWxzZX19fQ.SMlBHgpwa5z8DHwS1rq5Ze5BEjSwhMJwrpE3K_o_Jvo'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            return response()->json(['status' => true, 'response' => $response]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }
    }
}
