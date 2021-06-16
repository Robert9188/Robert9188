<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['denomination', 'horaire'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
