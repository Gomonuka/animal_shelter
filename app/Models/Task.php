<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['TaskName'];
    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'shelters_id');
    }
    public function task()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
