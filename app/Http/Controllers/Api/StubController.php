<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Stub;
use App\Models\Order;
use App\Models\User;
use App\Models\CustomerPlan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StubController extends Controller
{
    public function create_stub(Request $request){

        $get_res = $request->all();

        $data = [
            'plan_id'       => 'required',
            'inspector_id'  => 'required',
            'order_id'      => 'required',
            'name'          => 'required',
            'amount'        => 'required',
            'received'      => 'required',
            'paid'          => 'required',
            'status'        => 'required'
        ];

        $validateStub = Validator::make($get_res, $data);

        if ($validateStub->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateStub->errors()],
                 400);
        }
        
        // verify plan.
        $customer_plan = CustomerPlan::find($request->plan_id);
        if (!$customer_plan) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid plan id'
            ], 404);
        }

        // verify inspector id.
        $verify_inspector_id = User::find($request->inspector_id);
        if (!$verify_inspector_id) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid inspector id'
            ], 404);
        }

        // verify order id.
        $verify_order_id = Order::find($request->order_id);
        if (!$verify_order_id) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid order id'
            ], 404);
        }

        Stub::create([
            'plan_id'      => $get_res['plan_id'],
            'inspector_id' => $get_res['inspector_id'],
            'order_id'     => $get_res['order_id'],
            'name'         => $get_res['name'],
            'amount'       => $get_res['amount'],
            'received'     => $get_res['received'],
            'paid'         => $get_res['paid'],
            'status'       => $get_res['status'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Stub added successfully'
        ], 200);
    }

    public function get_stub(Request $request){
        // Fetch all plans from the database
        $get_stubs = Stub::all();

        // Check if any get_stubs were found
        if ($get_stubs->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No stubs found'
            ], 404);
        }

        // If plans are found, return them with decoded features
        return response()->json([
            'status' => true,
            'message' => 'Stubs retrieved successfully',
            'data' => $get_stubs
        ], 200);
    }

    public function delete_stub(Request $request){
       
        // Validate incoming request data
        $request->validate([
            'id' => 'required|integer'
        ]);

        // Find the plan by ID
        $stub = Stub::find($request->id);
        
        // Check if the stub exists
        if (!$stub) {
            return response()->json([
                'status' => false,
                'message' => 'Stub not found'
            ], 404);
        }

        // Delete the plan
        $stub->delete();

        return response()->json([
            'status' => true,
            'message' => 'Stub deleted successfully'
        ], 200);

    }

    public function update_stub(Request $request){
        $get_res = $request->all();

        $data = [
            'stub_id'       => 'required',
            'plan_id'       => 'required',
            'inspector_id'  => 'required',
            'order_id'      => 'required',
            'name'          => 'required',
            'amount'        => 'required',
            'received'      => 'required',
            'paid'          => 'required',
            'status'        => 'required'
        ];

        $validateStub = Validator::make($get_res, $data);

        if ($validateStub->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateStub->errors()],
                 400);
        }

        // verify stub id.
        $stub = Stub::find($request->stub_id);
        if (!$stub) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid stub id'
            ], 404);
        }

        // verify plan.
        $customer_plan = CustomerPlan::find($request->plan_id);
        if (!$customer_plan) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid plan id'
            ], 404);
        }

        // verify inspector id.
        $verify_inspector_id = User::find($request->inspector_id);
        if (!$verify_inspector_id) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid inspector id'
            ], 404);
        }

        // verify order id.
        $verify_order_id = Order::find($request->order_id);
        if (!$verify_order_id) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid order id'
            ], 404);
        }


        // Update plan fields
        $stub->plan_id      = $request->plan_id;
        $stub->inspector_id = $request->inspector_id;
        $stub->order_id     = $request->order_id;
        $stub->name         = $request->name;
        $stub->amount       = $request->amount;
        $stub->received     = $request->received;
        $stub->paid         = $request->paid;
        $stub->status       = $request->status;
        $stub->save();

        return response()->json([
            'status' => true,
            'message' => 'Stub updated successfully'
        ], 200);
    }
}
