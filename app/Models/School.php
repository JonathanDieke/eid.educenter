<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function admissionRequests(){
        return $this->hasMany(AdmissionRequest::class, "school_id", 'id');
    }

    public function programs(){
        return $this->belongsToMany(Program::class, 'program_school');
    }
}
