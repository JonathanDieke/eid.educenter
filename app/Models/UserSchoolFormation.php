<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchoolFormation extends Model
{
    use HasFactory;

    public function userSchool(){
        return $this->belongsTo(UserSchool::class);
    }
}
