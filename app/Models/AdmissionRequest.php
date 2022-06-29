<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function session() : Attribute
    {
        return Attribute::make(
            get: function ($value) { ;
                return $value == "autumn" ? "Automne" : ($value == "winter" ? "Hiver" : "summer");
            }
        );
    }

    protected function cycle() : Attribute
    {
        return Attribute::make(
            get: function ($value) { ;
                return $value == "first" ? "Premier cycle" : ($value == "second" ? "Second cycle" : "Troisième cycle");
            }
        );
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id", 'id');
    }

    public function school(){
        return $this->belongsTo(School::class, "school_id", 'id');
    }

    public function program(){
        return $this->belongsTo(Program::class, "program_id", 'id');
    }
}
