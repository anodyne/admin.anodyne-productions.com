<?php

namespace App\Models\Legacy;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $connection = 'legacy_users';
}
