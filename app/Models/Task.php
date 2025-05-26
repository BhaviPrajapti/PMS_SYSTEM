<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['project_id', 'name', 'due_date', 'description'];
    public function project()
    {
        return $this->belongsTo(ProjectAdd::class, 'project_add_id');
    }
}
