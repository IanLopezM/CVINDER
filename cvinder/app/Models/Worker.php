<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    public function experiences(){
        return $this->hasMany(Experience::class);
    }

    public function academics(){
        return $this->hasMany(Academic::class);
    }

    public function province(){
       return $this->belongsTo(Province::class);
    }

    public function matches(){
        return $this->hasMany(OfferWorker::class);
    }

    public function skillWorkers() {
        return $this->hasMany(SkillWorker::class);
    }
}
