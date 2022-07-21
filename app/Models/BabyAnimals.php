<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

class BabyAnimals extends Model
{
    use HasFactory;
    public $table = 'baby_animals';

    public $fillable = [
        'user_id',
        'provider_id',
        'date',
        'weight',
        'cost',
        'name',
        'description',
    ];

    protected $cast = [
        'date' => 'date',
        'weight' => 'string',
        'cost' => 'string',
        'name' => 'string',
        'description' => 'text',
    ];
    
    public function sensors(){
        return $this->hasMany(Sensors::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
