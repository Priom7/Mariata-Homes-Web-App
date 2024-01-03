<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendedSource extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    /**
     * Get the Application for the RecommendedSource.
     */
    public function application()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the applicationRecommendedSource that owns the RecommendedSource.
     */
    public function applicationsRecommendedSource()
    {
        return $this->belongsTo(ApplicationsRecommendedSource::class);
    }
    
}
