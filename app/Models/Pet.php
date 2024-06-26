<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = ['PetName'];
    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'shelters_id');
    }
    public function category()
    {
        return $this->belongsTo(Task::class);
    }
}
