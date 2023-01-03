<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url', 'genre', 'version', 'php_version', 'db_driver', 'db_version', 'server_software',
    ];
}
