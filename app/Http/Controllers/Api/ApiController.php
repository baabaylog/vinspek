<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\CustomerPlan;
use App\Models\Payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ApiController extends Controller
{   
    public function login(Request $request){

        $get_res = $request->all();

        $data = [
            'email'    => 'required|email',
            'password' => 'required',
        ];

        $validateUser = Validator::make($get_res, $data);

        if ($validateUser->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validateUser->errors()],
                 400);
        }

        if (Auth::attempt($get_res)) {
            $user     = Auth::user();
            $userType = Customer::where('email', $get_res['email'])->first();
            $token    = $user->createToken('API TOKEN', ['*'], now()->addHours(6))->plainTextToken;
            return response()->json([
                'status'     => true,
                'message'    => 'User logged in successfully',
                'token'      => $token,
                'profile'    => $userType,
            ], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 401);
        }

    }

    public function register(Request $request){

        $get_res = $request->all();

        if ($get_res['user_type'] == 'customer') {
            $data = [
                'first_name'                               => 'required',
                'last_name'                                => 'required',
                'email'                                    => 'required|email|unique:users,email',
                'phone'                                    => 'required',
                'address'                                  => 'required',
                'city'                                     => 'required',
                'state'                                    => 'required',
                'zip'                                      => 'required',
                'password'                                 => 'required',
                'confirm_password'                         => 'required|same:password',
                'work_with_other_inspection_companies'     => 'required',
                'interested_in_doing_mobile_mechanic_work' => 'required',
                'ase'                                      => 'required',
                'education'                                => 'required',
                'work_experience'                          => 'required',
            ];
        } elseif ($get_res['user_type'] == 'inspector') {
            $data = [
                'first_name'                               => 'required',
                'last_name'                                => 'required',
                'email'                                    => 'required|email|unique:users,email',
                'phone'                                    => 'required',
                'address'                                  => 'required',
                'city'                                     => 'required',
                'state'                                    => 'required',
                'zip'                                      => 'required',
                'password'                                 => 'required',
                'confirm_password'                         => 'required|same:password',
                'work_with_other_inspection_companies'     => 'required',
                'interested_in_doing_mobile_mechanic_work' => 'required',
                'ase'                                      => 'required',
                'education'                                => 'required',
                'work_experience'                          => 'required',
            ];
        }

        $validateUser = Validator::make($get_res, $data);

        if ($validateUser->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validateUser->errors()],
                 400);
        }

        $user = User::create([
            'name'     => $get_res['first_name'],
            'email'    => $get_res['email'],
            'password' => $get_res['password']
        ]);

        if ($get_res['user_type'] == 'customer') {

            $customer = Customer::create([
                'user_id'                                  => $user->id,
                'user_type'                                => $get_res['user_type'],
                'first_name'                               => $get_res['first_name'],
                'last_name'                                => $get_res['last_name'],
                'email'                                    => $get_res['email'],
                'phone'                                    => $get_res['phone'],
                'address'                                  => $get_res['address'],
                'city'                                     => $get_res['city'],
                'state'                                    => $get_res['state'],
                'zip'                                      => $get_res['zip'],
                'password'                                 => $get_res['password'],
                'work_with_other_inspection_companies'     => $get_res['work_with_other_inspection_companies'],
                'interested_in_doing_mobile_mechanic_work' => $get_res['interested_in_doing_mobile_mechanic_work'],
            ]);

        }elseif($get_res['user_type'] == 'inspector'){

            $customer = Customer::create([
                'user_id'                                  => $user->id,
                'user_type'                                => $get_res['user_type'],
                'first_name'                               => $get_res['first_name'],
                'last_name'                                => $get_res['last_name'],
                'email'                                    => $get_res['email'],
                'phone'                                    => $get_res['phone'],
                'address'                                  => $get_res['address'],
                'city'                                     => $get_res['city'],
                'state'                                    => $get_res['state'],
                'zip'                                      => $get_res['zip'],
                'password'                                 => $get_res['password'],
                'work_with_other_inspection_companies'     => $get_res['work_with_other_inspection_companies'],
                'interested_in_doing_mobile_mechanic_work' => $get_res['interested_in_doing_mobile_mechanic_work'],
            ]);

        }

        return response()->json([
            'status' => true,
            'message' => 'user registered successfully',
            'token' => $user->createToken('API TOKEN', ['*'], now()->addHours(6))->plainTextToken,
            'profile' => $customer
        ], 200);
        
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully'
        ], 200);
    }


    public function create_order(Request $request){
        
        $get_res = $request->all();

        $data = [
            'id'                => 'required',
            'plan_id'           => 'required',
            'vin_number'        => 'required',
            'year'              => 'required',
            'make'              => 'required',
            'model'             => 'required',
            'dealership_name'   => 'required',
            'stock_number'      => 'required',
            'seller_contact'    => 'required',
            'address_permanent' => 'required',
            'date'              => 'required',
            'note'              => 'required',
            'history_report'    => 'required',
            'assessment_report' => 'required',
            'order_status'      => 'required',
        ];
        
        $validateUser = Validator::make($get_res, $data);

        if ($validateUser->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'validation error',
                'errors'  => $validateUser->errors()],
                 400);
        }

        // Check if the user exists
        $user = User::find($get_res['id']);
        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'User not found'
            ], 404);
        }

        $plan = CustomerPlan::find($get_res['plan_id']);
        if (!$plan) {
            return response()->json([
                'status'  => false,
                'message' => 'Plan not found'
            ], 404);
        }

        $order = Order::create([
            'user_id'             => $user->id,
            'plan_id'             => $get_res['plan_id'],
            'vin_number'          => $get_res['vin_number'],
            'year'                => $get_res['year'],
            'make'                => $get_res['make'],
            'model'               => $get_res['model'],
            'dealership_name'     => $get_res['dealership_name'],
            'stock_number'        => $get_res['stock_number'],
            'seller_contact'      => $get_res['seller_contact'],
            'address_permanent'   => $get_res['address_permanent'],
            'date'                => $get_res['date'],
            'note'                => $get_res['note'],
            'history_report'      => $get_res['history_report'],
            'assessment_report'   => $get_res['assessment_report'],
            'order_status'        => $get_res['order_status'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'order created successfully',
        ], 200);
    }

    public function get_customer_profile(){
        try {
            $customers = Customer::where('user_type', 'customer')->get();

            // Check if orders list is empty
            if ($customers->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No customer found'
                ], 404);
            }

            // Return the customers as a JSON response
            return response()->json([
                'status' => true,
                'customers' => $customers
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function inspector_profile(){
        try {
            $customers = Customer::where('user_type', 'inspector')->get();

            // Check if orders list is empty
            if ($customers->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No inspector found'
                ], 404);
            }

            // Return the customers as a JSON response
            return response()->json([
                'status' => true,
                'customers' => $customers
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function get_order() {
        try {
            // Fetch all orders
            $orders = Order::all();

            // Check if orders list is empty
            if ($orders->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No orders found'
                ], 404);
            }

            // Return the orders if they exist
            return response()->json([
                'status' => true,
                'orders' => $orders
            ], 200);

        } catch (\Throwable $th) {
            // Handle any exceptions
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function assign_order(Request $request) {
        try {

            // verify plan.
            $verify_customer = User::find($request->inspector_id);
            if (!$verify_customer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid inspector id'
                ], 404);
            }

            // Verify user type inspector or not.
            $customer = Customer::where('user_id', $request->inspector_id)->first();
            if($customer && $customer->user_type != 'inspector' ){
                return response()->json([
                    'status' => false,
                    'message' => 'Provided user is not inspector!'
                ], 400);
            }
            // verify inspector id.
            $order = Order::find($request->order_id);
            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid order id'
                ], 404);
            }

            $order->inspector_id  = $request->inspector_id;
            $order->save();

            return response()->json([
                'status' => true,
                'message' => 'Order assign successfully'
            ], 200);

        } catch (\Throwable $th) {
            // Handle any exceptions
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function get_single_customer_profile(Request $request){
        try {

            $user = User::find($request->customer_id);
            if (!$user) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

            $customer = Customer::find($request->customer_id);

            if (!$customer) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

            

            // Return the orders if they exist
            return response()->json([
                'status' => true,
                'Customer' => $customer
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update_single_customer_profile(Request $request){
        try {

            $get_res = $request->all();

            $data = [
                'customer_id'                              => 'required',
                'first_name'                               => 'required',
                'last_name'                                => 'required',
                'email'                                    => 'required|email|unique:users,email',
                'phone'                                    => 'required',
                'address'                                  => 'required',
                'city'                                     => 'required',
                'state'                                    => 'required',
                'zip'                                      => 'required',
                'password'                                 => 'required',
                'confirm_password'                         => 'required|same:password',
                'work_with_other_inspection_companies'     => 'required',
                'interested_in_doing_mobile_mechanic_work' => 'required',
                'ase'                                      => 'required',
                'education'                                => 'required',
                'work_experience'                          => 'required',
            ];
            

            $validateUser = Validator::make($get_res, $data);

            if ($validateUser->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validateUser->errors()],
                     400);
            }

            $customer = Customer::find($request->customer_id);
            if (!$customer) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

            $customer->user_type = $request->user_type;
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->password = $request->password;
            $customer->work_with_other_inspection_companies = $request->work_with_other_inspection_companies;
            $customer->interested_in_doing_mobile_mechanic_work = $request->interested_in_doing_mobile_mechanic_work;
       
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => 'Customer updated successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function update_single_customer_settings(Request $request){
        try {

            $get_res = $request->all();

            $data = [
                'customer_id'  => 'required',
                'settings'     => 'required',
            ];
            

            $validateUser = Validator::make($get_res, $data);

            if ($validateUser->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validateUser->errors()],
                     400);
            }

            $customer = Customer::find($request->customer_id);
            if (!$customer) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

            $customer->settings = $request->settings;
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => 'Settings updated successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


     public function get_single_customer_settings(Request $request){
        try {

            $user = User::find($request->customer_id);

            if (!$user) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

        
            $customer = Customer::find($request->customer_id, ['settings']);


            if (!$customer) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Customer not found'
                ], 404);
            }

            
            $settings = json_decode($customer->settings, true);
            // Return the orders if they exist
            return response()->json([
                'status' => true,
                'Settings' => $settings
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    


    

    
    
}
