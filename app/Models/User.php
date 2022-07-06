<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lname',
        'gender',
        'birthdate',
        'country',
        'state',
        'city',
        'native_language',
        'use_language',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(){
        return $this->hasOne(Address::class, "user_id", 'id');
    }

    public function theParents(){
        return $this->hasMany(TheParent::class, 'user_id', 'id');
    }

    public function cursus(){
        return $this->hasOne(Cursus::class, "user_id", 'id');
    }

    // public function attend(){
    //     return $this->hasMany(UserSchool::class, "user_id", 'id');
    // }

    public function formations(){
        return $this->hasMany(UserSchoolFormation::class, "user_id", 'id');
    }

    public function admissionRequest(){
        return $this->hasMany(AdmissionRequest::class, "user_id", 'id');
    }

    /**
     * Get all of the translations for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(Translation::class, 'user_id', 'id');
    }

    /**
     * Get the country that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countryR(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    /**
     * Get the state that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stateR(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }

    /**
     * Get the city that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cityR(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

}
