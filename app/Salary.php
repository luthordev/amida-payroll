<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = "salary";
    protected $guarded = [];

    public function employee(){
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    public function user(){
        return $this->hasOne(Users::class, 'id', 'user_id');
    }
}