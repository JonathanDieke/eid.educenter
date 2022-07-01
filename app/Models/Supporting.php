<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supporting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function filename() : Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return explode("/", $value)[1];
            }
        );
    }

    /**
     * Get the formation that owns the Supporting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formation(): BelongsTo
    {
        return $this->belongsTo(UserSchoolFormation::class, 'user_school_formation_id', 'id');
    }
}
