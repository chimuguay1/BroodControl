<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    use HasFactory;
    public $table = 'sensors';

    public $fillable = [
        'user_id',
        'babyAnimals_id',
        'heartRate',
        'bloodPressure',
        'breathingFrequency',
        'temperature'
    ];

    protected $cast = [
        'heartRate' => 'string',
        'bloodPressure' => 'string',
        'breathingFrequency' => 'string',
        'temperature' => 'string',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function babyAnimal(){
        return $this->belongsTo(BabyAnimals::class, 'babyAnimals_id');
    }
}


