<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function cvs()
    {
        return $this->hasMany(CV_Candidate::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}

