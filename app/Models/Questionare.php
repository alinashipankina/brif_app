<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Questionare extends Model
{

    protected $table = 'questionares';

    protected $fillable = [
        'company_name',
        'role',
        'phone',
        'email',
        'usluga',
        'user_id',
        'status'
    ];

    protected $attributes = [
        'status' => 'NewLead',
    ];

    protected $casts = [
        'user_id' => 'integer',
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
            'company_name' => 'string',
            'role' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'usluga' => 'string',
            'user_id' => 'integer',
            'status' => 'string',
            'comment' => 'string'
        ];
    }
}
