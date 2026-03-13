<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Questionare extends Model
{

    protected $table = 'questionares';

    protected $fillable = [
        'name', 'role', 'phone', 'email',
        'service_type', 'user_id', 'status', 'comment',
        'prediction_probability', 'prediction_will_buy',
        'prediction_confidence', 'prediction_raw', 'predicted_at'
    ];

    protected $attributes = [
        'status' => 'NewLead',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'prediction_probability' => 'float',
        'prediction_will_buy' => 'boolean',
        'predicted_at' => 'datetime',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function fields(): HasMany {
        return $this->hasMany(QuestionareField::class);
    }

    public function statusHistory(): HasMany {
        return $this->hasMany(QuestionareStatusHistory::class);
    }


    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d',
            'updated_at' => 'datetime:Y-m-d',
            'name' => 'string',
            'role' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'service_type' => 'string',
            'user_id' => 'integer',
            'status' => 'string',
            'comment' => 'string',
            'prediction_probability' => 'float',
            'prediction_will_buy' => 'boolean',
            'prediction_confidence' => 'string',
            'predicted_at' => 'datetime',
        ];
    }
}
