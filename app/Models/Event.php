<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Event extends Model
{
    use HasFactory,
    // MassPrunable,
        Prunable;

    /*
        Prunable method will provide the condition of which models to delete
    */
    public function prunable() : Builder
    {
        return static::where('created_at', '<=', now()->subHour(4));
    }

    /*
        Pruning method will run on each instance of the method being pruned.
        Use for foreign ID constraints to remove them, alternatively implement onDelete('cascade') at DB level
    */
    public function pruning()
    {
        $this->deploymentLogs->delete();
    }

    public function eventLogs()
    {
        return $this->hasMany(EventLog::class);
    }
}
