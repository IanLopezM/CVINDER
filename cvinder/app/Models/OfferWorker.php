<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferWorker extends Model
{
    use HasFactory;

    public function worker(){
        return $this->belongsTo(Worker::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }
}
