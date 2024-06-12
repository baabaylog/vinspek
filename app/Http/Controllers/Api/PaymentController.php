<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;


class PaymentController extends Controller
{
    public function create_payment(Request $request){

        $get_res = $request->all();

        $data = [
            'user_id'     => 'required',
            'card_number' => 'required',
            'mm'          => 'required',
            'cvv'         => 'required',
            'postal_code' => 'required',
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
        $user = User::find($get_res['user_id']);
        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'User not found'
            ], 404);
        }

        $payment = Payment::create([
            'user_id'             => $user->id,
            'card_number'         => $get_res['card_number'],
            'mm'                  => $get_res['mm'],
            'cvv'                 => $get_res['cvv'],
            'postal_code'         => $get_res['postal_code']
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Payment added successfully'
        ], 200);
    }

    public function get_payment(Request $request){

        try {

            $get_res = $request->all();

            $data = [
                'user_id'     => 'required',
            ];
        
            $validateUser = Validator::make($get_res, $data);

            if ($validateUser->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validateUser->errors()],
                     400);
            }

            $payments = Payment::where('user_id', $get_res['user_id'])->get();

            // Check if orders list is empty
            if ($payments->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No payment found'
                ], 404);
            }

            // Return the customers as a JSON response
            return response()->json([
                'status' => true,
                'payments' => $payments
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function update_payment(Request $request){

        $get_res = $request->all();

        // Validate incoming request data
        $data = [
            'payment_id'  => 'required',
            'user_id'     => 'required',
            'card_number' => 'required',
            'mm'          => 'required',
            'cvv'         => 'required',
            'postal_code' => 'required',
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
        $payment = Payment::find($request->payment_id);
        if (!$payment) {
            return response()->json([
                'status'  => false,
                'message' => 'Payment not found'
            ], 404);
        }

        // Update plan fields
        $payment->user_id     = $request->user_id;
        $payment->card_number = $request->card_number;
        $payment->mm          = $request->mm;
        $payment->cvv         = $request->cvv;
        $payment->postal_code = $request->postal_code;
        $payment->save();

        return response()->json([
            'status' => true,
            'message' => 'Pyament updated successfully'
        ], 200);
    }


    public function delete_payment(Request $request){
       
        // Validate incoming request data
        $request->validate([
            'payment_id' => 'required'
        ]);

        // Find the plan by ID
        $payment = Payment::find($request->payment_id);
        
        // Check if the payment exists
        if (!$payment) {
            return response()->json([
                'status' => false,
                'message' => 'payment not found'
            ], 404);
        }

        // Delete the payment
        $payment->delete();

        return response()->json([
            'status' => true,
            'message' => 'Payment deleted successfully'
        ], 200);

    }

    
}
