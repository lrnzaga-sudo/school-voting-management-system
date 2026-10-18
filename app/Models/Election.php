<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'start_at',
        'end_at',
        'status',
        'result_published_at',
    ];

    protected function casts(): array {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
            'result_published_at' => 'datetime',
        ];
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function positions(): HasMany {
        return $this->hasMany(Position::class);
    }

    public function electionVoters(): HasMany {
        return $this->hasMany(ElectionVoter::class);
    }

    public function ballots(): HasMany {
        return $this->hasMany(Ballot::class);
    }

    public function auditLogs(): HasMany {
        return $this->hasMany(AuditLog::class);
    }
}
