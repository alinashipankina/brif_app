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

    /**
     * ACCESSOR: Получить поле в формате ключ-значение
     */
    public function getKeyValueAttribute(): array
    {
        return [
            'key' => $this->field_name,
            'value' => $this->field_value
        ];
    }
}
