<?php

namespace App\Models\Legacy;

use Illuminate\Database\Eloquent\Model;

class Xtra extends Model
{
    protected $connection = 'legacy_xtras';

    protected $table = 'xtras_items';
}
