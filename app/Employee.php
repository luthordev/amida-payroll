<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // protected $fillable = [
    //     'nik',
    //     'name',
    //     'bank',
    //     'no_bank_account',
    //     'position_id',
    //     'division_id'
    // ];

    protected $guarded = [];

    public function position(){
        return $this->hasOne(Position::class, 'id', 'position_id');
    }

    public function division(){
        return $this->hasOne(Division::class, 'id', 'division_id');
    }
}
