<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    use HasFactory;
    protected $fillable = ['ShelterName'];
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
