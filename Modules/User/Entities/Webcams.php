<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class webcams extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'type',
        'provider',
        'status'
    ];
    
    protected static function newFactory()
    {
        //return \Modules\User\Database\factories\WebcamsFactory::new();
    }
}
