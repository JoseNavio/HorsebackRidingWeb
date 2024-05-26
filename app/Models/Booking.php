<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'horse_id',
        'date',
        'hour',
        'comment',
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function horse(){
        return $this -> belongsTo(Horse::class);
    }
}