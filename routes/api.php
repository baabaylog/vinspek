<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CustomerPlanController;
use App\Http\Controllers\Api\InspectorPlanController;
use App\Http\Controllers\Api\InspectorController;
use App\Http\Controllers\Api\StubController;
use App\Http\Controllers\Api\PaymentController;







Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ['auth:sanctum']
], function () {

    // 1. web routes
        // 1.1 register (this is outside the controoller).
        Route::post("order/create", [ApiController::class, "create_order"]);
        Route::post("payment/create", [PaymentController::class, "create_payment"]);
        // 1.4 get customer plan (this is in admin routes).


    // 2. Admin routes.
        // 2.1 login (this is outside the controller).
        Route::post("logout", [ApiController::class, "logout"]);

        // Customer Plan Routes.
        Route::post("customer-plan/create", [CustomerPlanController::class, "create_plan"]);
        Route::get("customer-plan/get", [CustomerPlanController::class, "get_plan"]);
        Route::post("customer-plan/delete", [CustomerPlanController::class, "delete_plan"]);
        Route::post("customer-plan/update", [CustomerPlanController::class, "update_plan"]);

        // Inspector Plan Routes.
        Route::post("inspector-plan/create", [InspectorPlanController::class, "create_plan"]);
        Route::get("inspector-plan/get", [InspectorPlanController::class, "get_plan"]);
        Route::post("inspector-plan/delete", [InspectorPlanController::class, "delete_plan"]);
        Route::post("inspector-plan/update", [InspectorPlanController::class, "update_plan"]);

        // Stub Routes.
        Route::post("stub/create", [StubController::class, "create_stub"]);
        Route::get("stub/get", [StubController::class, "get_stub"]);
        Route::post("stub/delete", [StubController::class, "delete_stub"]);
        Route::post("stub/update", [StubController::class, "update_stub"]);

       
        Route::get("customer/get", [ApiController::class, "get_customer_profile"]);
        Route::get("inspector/profile", [ApiController::class, "inspector_profile"]);
        Route::get("order/get", [ApiController::class, "get_order"]);
        Route::post("order/assign", [ApiController::class, "assign_order"]);


        // 3. inspector routes.
            // 3.1 : Auth
                // 3.1.1 register (this is outside the controoller). 
                // 3.2.2 login (this is outside the controller).
                // 3.3.3 logout (this is admin routes).

            // 3.2 : Orders
                // All order (define in admin routes).
                // plan type
                Route::get("inspector/order_type", [InspectorController::class, "return_order_type"]);





        // 4. customer routes.
            // 4.1 : Auth
                // 4.1.1 login (this is outside the controller).
                // 4.1.2 logout ( this is available in admin routes).

            // 4.2 payment routes
                // 4.2.1 : create payment (this routes is in web routes).
                Route::get("payment/get", [PaymentController::class, "get_payment"]);
                Route::post("payment/update", [PaymentController::class, "update_payment"]);
                Route::post("payment/delete", [PaymentController::class, "delete_payment"]);

            // 4.3 payment routes
                    Route::get("customer-profile/get", [ApiController::class, "get_single_customer_profile"]);
                    Route::post("customer-profile/update", [ApiController::class, "update_single_customer_profile"]);

            // 4.4 settings routes
                    Route::get("customer-settings/get", [ApiController::class, "get_single_customer_settings"]);
                    Route::post("customer-settings/update", [ApiController::class, "update_single_customer_settings"]);        





});