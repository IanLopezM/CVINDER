<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSkill extends Model
{
    use HasFactory;

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
}
