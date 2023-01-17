<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $events = Event::query()
            ->select('name', 'created_at')
            ->get();
        return Inertia::render('Home', [
            'events' => $events,
        ]);
    }
}
