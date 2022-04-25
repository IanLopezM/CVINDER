<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }

    public function sector(){
        return $this->belongsTo(Sector::class);
    }
    
    public function matches(){
        return $this->hasMany(OfferWorker::class);
    }

    public function offerSkills(){
        return $this->hasMany(OfferSkill::class);
    }
}
