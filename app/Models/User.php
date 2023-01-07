<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Traits\InteractsWithMedia;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements FilamentUser, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use LogsActivity;
    use CausesActivity;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_exchange_author',
        'is_galaxy_author',
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'role' => UserRole::class,
        'email_verified_at' => 'datetime',
        'is_exchange_author' => 'boolean',
    ];

    public function sponsor(): HasOne
    {
        return $this->hasOne(Sponsor::class);
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::admin
        );
    }

    public function isStaff(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::staff
        );
    }

    public function isUser(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::user
        );
    }

    public function getRoleColorAttribute(): string
    {
        return [
            'admin' => 'amber',
            'staff' => 'purple',
        ][$this->role] ?? 'gray';
    }

    public function addons(): HasMany
    {
        return $this->hasMany(Addon::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=f99c26&background=fef3c7';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png'])
            ->singleFile()
            ->useFallbackUrl($this->defaultProfilePhotoUrl());
    }

    public static function getMediaPath(): string
    {
        return 'users/{model_id}/';
    }
}
