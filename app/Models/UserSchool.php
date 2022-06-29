<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSchool extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function formations(){
        return $this->hasMany(UserSchoolFormation::class, "user_school_id", "id");
    }
}
