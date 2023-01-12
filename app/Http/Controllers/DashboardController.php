<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Event;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $event_count = Event::count();
        $documentation_count = Documentation::count();
        $mitra_count = Mitra::count();
        $user_count = User::count();
        return view('dashboard', [
            'event_count' => $event_count,
            'documentation_count' => $documentation_count,
            'mitra_count' => $mitra_count,
            'user_count' => $user_count,
        ]);
    }
}
