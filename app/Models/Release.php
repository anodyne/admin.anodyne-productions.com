<?php

namespace App\Models;

use App\Enums\ReleaseSeverity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'version', 'date', 'notes', 'severity', 'link', 'upgrade_guide_link',
    ];

    protected $hidden = ['created_at', 'updated_at', 'id'];

    protected $casts = [
        'date' => 'datetime',
        'severity' => ReleaseSeverity::class,
    ];

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function scopeVersion($query, $value)
    {
        return $query->where('version', $value);
    }
}
