<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'horse_name',
        'breed',
        'gender',
        'age',
        'is_sick',
        'observations'
    ];

    public function bookings(){
        return $this -> hasMany(Booking::class);
    }

}
