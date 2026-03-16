<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionareStatusHistory extends Model
{
    protected $table = 'questionare_status_histories';

    protected $fillable = [
        'questionare_id',
        'status',
        'comment'
    ];

    public function questionare(): BelongsTo
    {
        return $this->belongsTo(Questionare::class);
    }

    public function files(): HasMany
    {
        return $this->hasMany(QuestionareFile::class, 'status_history_id');
    }
}
