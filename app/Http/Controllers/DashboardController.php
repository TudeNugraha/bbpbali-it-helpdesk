<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTickets = Ticket::count();

        $queueTickets = Ticket::where('status', 'Queue')->count();

        $inProgressTickets = Ticket::where('status', 'In Progress')->count();

        $completedTickets = Ticket::where('status', 'Completed')->count();

        $latestTickets = Ticket::latest()
            ->take(5)
            ->get();
        return view('dashboard', compact(
            'totalTickets',
            'queueTickets',
            'inProgressTickets',
            'completedTickets',
            'latestTickets'
        ));
    }
}