<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BallotSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'ballot_id',
        'election_candidate_id',
    ];

    public function ballot(): BelongsTo {
        return $this->belongsTo(Ballot::class);
    }

    public function electionCandidate(): BelongsTo {
        return $this->belongsTo(ElectionCandidate::class);
    }
}
