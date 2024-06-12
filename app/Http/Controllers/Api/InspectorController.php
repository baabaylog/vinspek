<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CustomerPlan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;


class InspectorController extends Controller
{
    public function return_order_type(Request $request) {
        try {

            $get_res = $request->all();

            $data = [
                'plan_name'    => 'required',
            ];

            $validateUser = Validator::make($get_res, $data);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()],
                     400);
            }

            // Fetch all orders
         
            $plan = CustomerPlan::where('name', $get_res['plan_name'])->first();

            // Check if the plan exists
            if (!$plan) {
                return response()->json([
                    'status' => false,
                    'message' => 'Plan not found'
                ], 404);
            }

            // Fetch all orders related to the plan
            $orders = Order::where('plan_id', $plan->id)->get();

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
}
