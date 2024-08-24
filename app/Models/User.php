<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'designation_id',
        'phone_number',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class,'designation_id', 'id');
    }
}
