<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }
}
