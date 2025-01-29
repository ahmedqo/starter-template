<?php

namespace App\Models;

use App\Traits\HasCache;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasSearch, HasCache;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'email',
        'phone',
        'address',
        'password',

        'company'
    ];

    protected $searchable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'email',
        'phone',
        'address',
    ];

    protected $hidden = [
        'password',
    ];

    protected static function booted()
    {
        self::created(function ($Self) {
            $Self->Preference()->create([
                'language' => 'fr',
                'currency' => 'MAD',
                'report_frequency' => 'week',
                'date_format' => 'YYYY-MM-DD',
                'theme_color' => 'ocean tide',
            ]);
        });

        foreach (['saved', 'deleted'] as $event) {
            self::{$event}(function ($Self) {
                self::delCache(
                    ["users/$Self->id", "auths/$Self->id"],
                    ['users']
                );
            });
        }
    }

    public function Preference(): MorphOne
    {
        return $this->morphOne(Preference::class, 'target');
    }
}
