<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class PruneEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prune:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::query()
            ->where('created_at', '<=', now()->subHour(4))
            ->delete();

        return Command::SUCCESS;
    }
}
