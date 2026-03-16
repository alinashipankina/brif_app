<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionareFile extends Model
{
    protected $table = 'questionare_files';

    protected $fillable = [
        'questionare_id',
        'status_history_id',
        'user_id',
        'status',
        'original_name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function questionare(): BelongsTo
    {
        return $this->belongsTo(Questionare::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;

        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
