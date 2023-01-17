<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Event extends Model
{
    use HasFactory,
        Prunable;

    public function prunable() : Builder
    {
        return static::where('created_at', '<=', now()->subHour(4));
    }
}
