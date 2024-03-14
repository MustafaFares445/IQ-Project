<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'typeId',
        'title',
        'category',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'typeId' => 'integer',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class , 'typeId');
    }

    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class , 'questionId');
    }
}