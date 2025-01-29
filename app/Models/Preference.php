<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'currency',
        'report_frequency',
        'date_format',
        'theme_color',

        'target_id',
        'target_type',
    ];

    protected static function booted()
    {
        foreach (['saved', 'deleted'] as $event) {
            self::{$event}(function ($Self) {
                User::delCache(
                    ["auths/$Self->target_id"],
                );
            });
        }
    }

    public function Target(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'target_type', 'target_id');
    }
}
