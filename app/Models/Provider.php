<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    public $table = 'providers';

    public $fillable = [
        'user_id',
        'name',
    ];

    protected $cast = [
        'name' => 'string',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function babyAnimals(){
        return $this->hasMany(BabyAnimals::class);
    }
}
