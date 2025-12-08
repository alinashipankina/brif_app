<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionareField extends Model
{
    protected $table = "questionare_fields";

    protected $fillable = [
        'questionare_id',
        'field_name',
        'field_value'
    ];

    public function questionare(): BelongsTo
    {
        return $this->belongsTo(Questionare::class);
    }

    public function getFieldValueAttribute($value)
    {
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }
        return $value;
    }

    public function getDisplayValueAttribute()
    {
        return $this->field_value;
    }

    public function getKeyValueAttribute(): array
    {
        return [
            'key' => $this->field_name,
            'value' => $this->field_value
        ];
    }
}
