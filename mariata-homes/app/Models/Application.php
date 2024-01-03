<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'dob',
        'age',
        'email',
        'telephone',
        'next_of_kin',
        'passport_photo',
        'illness',
        'last_residence_address',
        'recommended_source_address',
    ];

    /**
     * Get the applciationRecommendedSource that owns the Application.
     */
    public function applicationsRecommendedSource()
    {
        return $this->hasOne(ApplicationsRecommendedSource::class);
    }

    /**
     * Get the applicant that owns the Application.
     */
    public function applicant()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the applicationUser that owns the Application.
     */
    public function applicationUser()
    {
        return $this->belongsTo(UserApplication::class);
    }                                       
}
                    