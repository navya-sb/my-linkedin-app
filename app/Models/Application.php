<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['job_post_id', 'candidate_id', 'cv_id'];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function cv()
    {
        return $this->belongsTo(CV_Candidate::class);
    }
}
