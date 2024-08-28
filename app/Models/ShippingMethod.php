<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    // Nếu tên bảng không phải là số nhiều của tên model
    protected $table = 'shippingmethods';

    // Nếu bảng không có các trường timestamps
    public $timestamps = true;

    // Các thuộc tính mà bạn cho phép gán hàng loạt
    protected $fillable = [
        'methodName',
        'description',
        'cost',
    ];

    protected $guarded = [];
}
