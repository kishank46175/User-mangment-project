<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="students";
    protected $fillable =[
        'name',
        'email',
        'address'
    ];

    public function projects()
    {
        return $this->hasMany(Projects::class);
    }
}   
