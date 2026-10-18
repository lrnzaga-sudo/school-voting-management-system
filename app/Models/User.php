<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function createdElections(): HasMany {
        return $this->hasMany(Election::class, 'created_by');
    }

    public function candidate(): HasOne {
        return $this->hasOne(Candidate::class);
    }

    public function electionVoters(): HasMany {
        return $this->hasMany(ElectionVoter::class);
    }

    public function auditLogs(): HasMany {
        return $this->hasMany(AuditLog::class);
    }

    public function customNotifications(): HasMany {
        return $this->hasMany(Notification::class);
    }

    public function sessions(): HasMany {
        return $this->hasMany(Session::class);
    }
}
