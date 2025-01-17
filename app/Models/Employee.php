<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'shift_id',
        'position_id',
        'user_id',
        'others'
    ];
    function getTotalEmployee()
    {
        return Employee::count();
    }
}
