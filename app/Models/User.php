<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\MemberType;
use App\Enums\MemberEnums\HillsJourney;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;
use App\Enums\EventsEnums\Event;
use App\Enums\MemberEnums\UserRole;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'email',
        'member_role',
        'is_admin',
        'profile_photo',
        'password',
        'member_type',
        'hills_journey',
        'ministry',
        'ministry_role',
        'ministry_assignment',
        'is_married',
        'address',
        'contact',
        'facebook_account',
        'invited_by',
        'date_invited',
        'service_invited',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
        'date_invited' => 'date',
        'member_role' => UserRole::class,
        'gender' => Gender::class,
        'member_type' => MemberType::class,
        'hills_journey' => HillsJourney::class,
        'ministry' => Ministry::class,
        'ministry_role' => MinistryRole::class,
        'service_invited' => Event::class,
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'is_married' => 'boolean',
    ];

    protected $appends = ['age', 'full_name', 'profile_photo_url'];

    public function initials()
    {
        $firstInitial = substr($this->first_name, 0, 1);
        $lastInitial = substr($this->last_name, 0, 1);
        return strtoupper($firstInitial . $lastInitial);
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo
            ? asset('storage/' . $this->profile_photo)
            : null;
    }

    /**
     * Calculate age based on birth date
     * This will automatically update as time passes
     */
    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function ledLifeGroups(): HasMany
    {
        return $this->hasMany(LifeGroup::class, 'network_leader_id');
    }

    public function memberProfile(): HasOne
    {
        return $this->hasOne(Member::class, 'user_id');
    }

    public function getIsNetworkLeaderAttribute(): bool
    {
        return $this->ledLifeGroups()->exists();
    }

    // Check if user is admin
    public function isAdmin(): bool
    {
        return $this->is_admin === true;
    }

    // Scopes
    public function scopeNetworkLeaders($query)
    {
        return $query->whereHas('ledLifeGroups');
    }

    // Scope for admin users
    public function scopeAdmins($query)
    {
        return $query->where('is_admin', true);
    }

    // Scope for active users
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
