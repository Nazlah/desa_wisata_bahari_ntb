<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_kind extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_content_kind',
        'detail'
    ];
}
