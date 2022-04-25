<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function OfferSkills(){
        return $this->hasMany(OfferSkill::class);
    }

    public function skillWorkers(){
        return $this->hasMany(SkillWorker::class);
    }
}
