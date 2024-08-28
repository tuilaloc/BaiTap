<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Nếu bạn không muốn Eloquent tự động quản lý các timestamp
    public $timestamps = true;

    // Khai báo các thuộc tính không thể gán hàng loạt
    protected $guarded = [];
}
