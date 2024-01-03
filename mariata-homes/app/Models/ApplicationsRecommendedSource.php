<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsRecommendedSource extends Model
{
    use HasFactory;


    protected $fillable = ['application_id', 'recommended_source_id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function recommendedSource()
    {
        return $this->belongsTo(RecommendedSource::class);
    }
}
