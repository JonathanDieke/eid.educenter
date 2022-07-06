<?php

namespace App\Models;

use App\Models\Supporting;
use App\Models\UserSchool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function period() : String
    {
        return explode("-", $this->start_date)[0] . " - " .explode("-", $this->end_date)[0] ;
        // Attribute::make(
        //     get: function ($value) { ;
        //         return explode("-", $value)[0];
        //     }
        // );
    }

    // protected function endDate() : Attribute
    // {
    //     return Attribute::make(
    //         get: function ($value) { ;
    //             return explode("-", $value)[0];
    //         }
    //     );
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the supportings for the UserSchoolFormation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supportings(): HasMany
    {
        return $this->hasMany(Supporting::class, "user_school_formation_id", "id");
    }
}
