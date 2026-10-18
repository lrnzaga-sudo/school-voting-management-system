<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElectionCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'candidate_id',
        'party_name',
    ];

    public function position(): BelongsTo {
        return $this->belongsTo(Position::class);
    }

    public function candidate(): BelongsTo {
        return $this->belongsTo(Candidate::class);
    }

    public function ballotSections(): HasMany {
        return $this->hasMany(BallotSelection::class);
    }
}
