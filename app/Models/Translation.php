<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function status() :Attribute
    // {
    //     return Attribute::make(
    //         get: function ($value) { ;
    //             return $value == "pending" ? 'En cours' : ($value == "success" ? "Terminé" : "Annulé");
    //         }
    //     );
    // }

    public function createdAt() :Attribute
    {
        return Attribute::make(
            get: function ($value) { ;
                return explode(" ", $value)[0];
            }
        );
    }

    /**
     * Get the user that owns the Translation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
