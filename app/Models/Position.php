<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'name',
        'description',
        'max_selections',
    ];

    protected function casts(): array {
        return [
            'max_selections' => 'integer',
        ];
    }

    public function election(): BelongsTo {
        return $this->belongsTo(Election::class);
    }

    public function electionCandidates(): HasMany {
        return $this->hasMany(ElectionCandidate::class);
    }
}
