<?php

namespace App\Models;

use App\Models\UserSchool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSchoolFormation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function status() : Attribute
    {
        // return $this->status == "abandoned" ? "Abandonnée" : ($this->status == "in_progress" ? "En cours" : "Terminée");

        return Attribute::make(
            get: function ($value) { ;
                return $value == "abandoned" ? "Abandonnée" : ($value == "in_progress" ? "En cours" : "Terminée");
            }
            // set: fn ($value) => strtolower($value),
        );
    }

    public function userSchool(){
        return $this->belongsTo(UserSchool::class);
    }
}
