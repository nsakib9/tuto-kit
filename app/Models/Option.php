<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'title',
        'logoimg',
        'width',
        'height',
        'content',
        'status',
        'url',
        'navmenu',
        'header',
        'footer'
    ];
}
