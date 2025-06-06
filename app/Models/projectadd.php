<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectadd extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'date',
        'description'
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
