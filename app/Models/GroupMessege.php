<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMessege extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name',
        'admin',
        'member',
    ];
}
