<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\InspectionReport;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InspectorReportController extends Controller
{
    public function upload_images(Request $request)
    {

        $validated =  Validator::make($request->all(), [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'image_urls' => 'required|array',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        $urls = json_encode($request->image_urls);

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!'
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!'
            ]);
        }

        try {

            InspectionReport::updateOrCreate(
                ['order_id' => $order_id, 'inspector_id' => $inspector_id],
                [
                    'upload_images' => $urls,
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Images uploaded successfully!',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function upload_videos(Request $request)
    {

        $validated =  Validator::make($request->all(), [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'video_urls' => 'required|array',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }
        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        $urls = json_encode($request->video_urls);

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!'
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!'
            ]);
        }


        try {

            InspectionReport::updateOrCreate(
                ['order_id' => $order_id, 'inspector_id' => $inspector_id],
                [
                    'upload_videos' => $urls,
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Videos uploaded successfully!',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 400);
        }
    }

    public function vehicle_information(Request $request)
    {

        $params = [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'year' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'vi' => 'required|string',
            'stock_no' => 'string',
            'messa' => 'required|string',
            'full' => 'required|string',
            'transmission' => 'required|string',
            'drive' => 'required|string',
            'eng' => 'required|string',
            'exit_color' => 'required|string',
            'interior' => 'required|string',
            'exterior' => 'required|string',
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        foreach ($params as $key => $val) $params[$key] = $request->input($key);

        $order_id = $params['order_id'];
        $inspector_id = $params['inspector_id'];
        unset($params['order_id']);
        unset($params['inspector_id']);

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!'
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!'
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_vehicle_info' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Vehicle information saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    }
    public function summary(Request $request)
    {

        $params = [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'summary' => 'required|string'
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $summary = $request->summary;
        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'summary' => $summary
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Summary saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    }

    public function exterior(Request $request)
    {
        $params = [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'wiper_blades' => 'required',
            'body_alignment' => 'required',
            'paint_condition' => 'required',
            'bumpers' => 'required',
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_exterior' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Exterior saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    }

    public function interior(Request $request)
    {
        $params = [
            'inspector_id' => 'required',
            'order_id' => 'required',
            'cruise_control' => 'required',
            'clock' => 'required',
            'led' => 'required',
            'carpet' => 'required',
            'belts' => 'required',
            'dashboard' => 'required',
            'dashguages' => 'required',
            'floor_mats' => 'required',
            'heater' => 'required',
            'dash' => 'required',
            'headlights' => 'required',
            'bumpers' => 'required',
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_interior' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Interior saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    }
 
    public function mechanical(Request $request){

        $params = [
            'inspector_id' => 'required',
            'order_id' => 'required',
            "radiator" => "required",
            "engine_coolant" => "required",
            "coolant_leaks" => "required",
            "belts" => "required",
            "power_steraing" => "required",
            "stearing_fluids" => "required",
            "engine_oil" => "required",
            "floor_mats" => "required",
            "heater" => "required",
            "dash" => "required",
            "headlights" => "required",
            "bumpers" => "required",
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_mechanical' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Mechanical saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 
    public function road_test(Request $request){

        $params = [
            'inspector_id' => 'required', 
            'order_id' => 'required',
            "road_test_performed" => "required", 
            "engine_starting" => "required", 
            "engine_performance" => "required", 
            "performance_clutch" => "required", 
            "tyre_pressure" => "required", 
         
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_road_test' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Road test saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 
  
    public function tires(Request $request){

        $params = [
            'inspector_id' => 'required', 
            'order_id' => 'required',
            'spare_tire' => 'required', 
            'driver_front_tire' => 'required', 
            'passengers_front_tire' => 'required',   
            'drivers_rear_tire' => 'required',   
            'passengers_rear_tire' => 'required',   
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_tire' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Tire Inspection saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 
    
    public function edit_images(Request $request){

        $params = [
            'inspector_id' => 'required', 
            'order_id' => 'required',
            'images' => 'required',  
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'edit_images' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Images saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 
    public function grades(Request $request){

        $params = [
            'inspector_id' => 'required', 
            'order_id' => 'required',
            'complete_project_car' => 'required',  
            'paint_body_grade' => 'required',  
            'frame_grade' => 'required',  
            'tire_grade' => 'required',  
            'mechanical_grade' => 'required',  
            'interior_grade' => 'required',  
        ];
        $validated =  Validator::make($request->all(), $params);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_grade' => json_encode($params)
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'Grades saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 

    public function reviews(Request $request){

        $params = [
            'inspector_id' => 'required', 
            'order_id' => 'required',
            'vehicle_information' => 'required',    
            'exterior' => 'required',    
            'interior' => 'required',    
            'mechanical' => 'required',    
            'order_status' => 'required',    
        ];
        $validated =  Validator::make($request->all(), $params);

        

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validated->errors()
            ], 400);
        }

        $order_id = $request->order_id;
        $inspector_id = $request->inspector_id;
        $order_status = $request->order_status;
        unset($params['order_status']);
        unset($params['order_id']);
        unset($params['inspector_id']);
        foreach ($params as $key => $val) $params[$key] = $request->input($key); 

        if (!$this->is_order_exists($order_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Order not found!',
                'order_id' => $order_id
            ]);
        }
        if (!$this->is_inspector_exists($inspector_id)) {
            return response()->json([
                'status' => false,
                'message' => 'Inspector not found!',
                'inspector_id' => $inspector_id
            ]);
        }


        try {
            InspectionReport::updateOrCreate(
                ['inspector_id'=> $inspector_id, 'order_id'=> $order_id],
                [
                    'inspected_review' => json_encode($params)
                ]
            );
            $this->update_order_status($order_id, $order_status);

            return response()->json([
                'status' => true,
                'message' => 'Reviews saved successfully.'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error: ' . $th->getMessage()
            ]);
        }
    } 



    protected function update_order_status($order_id, $order_status){
        $order = Order::find($order_id);
        $order->order_status = $order_status;
        $order->save();
    }
    protected function is_order_exists($order_id)
    {
        $order = Order::find($order_id);
        return $order;
    }
    protected function is_inspector_exists($inspector_id)
    {
        $inspector = Customer::where('user_id', $inspector_id)->first();
        if ($inspector && $inspector->user_type == 'inspector') {
            return true;
        }
        return false;
    }
}
