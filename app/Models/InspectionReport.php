<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'inspector_id',
        'upload_images',
        'upload_videos',
        'inspected_vehicle_info',
        'summary',
        'inspected_exterior',
        'inspected_interior',
        'inspected_mechanical',
        'inspected_road_test',
        'inspected_tire',
        'edit_images',
        'inspected_grade',
        'inspected_review',
    ];
}
