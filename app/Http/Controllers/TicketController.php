<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Ticket::query();

    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('requester_name', 'like', '%' . $request->search . '%')
              ->orWhere('title', 'like', '%' . $request->search . '%');

        });
    }

    if ($request->status) {

        $query->where('status', $request->status);

    }

    $tickets = $query->latest()->get();

    return view('tickets.index', compact('tickets'));
}

    public function antrean()
{
    $tickets = Ticket::orderByRaw("
        CASE
            WHEN status = 'In Progress' THEN 1
            WHEN status = 'Queue' THEN 2
            WHEN status = 'Completed' THEN 3
            ELSE 4
        END
    ")->get();

    $totalTickets = Ticket::count();

    $queueTickets = Ticket::where('status', 'Queue')->count();

    $inProgressTickets = Ticket::where('status', 'In Progress')->count();

    $completedTickets = Ticket::where('status', 'Completed')->count();

    return view('tickets.antrean', compact(
        'tickets',
        'totalTickets',
        'queueTickets',
        'inProgressTickets',
        'completedTickets'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'requester_name' => 'required',
        'title' => 'required',
        'priority' => 'required',
    ]);

$year = date('Y');

$nextNumber = Ticket::max('id') + 1;

$ticketNumber = 'IT-' . $year . '-' .
    str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    Ticket::create([
        'ticket_number' => $ticketNumber,

        'requester_name' => $request->requester_name,

        'title' => $request->title,

        'description' => $request->description,

        'priority' => $request->priority,

        'status' => 'Queue',

        'progress' => 0,
    ]);

    return redirect('/admin/tickets')
    ->with('success', 'Tiket berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
{
    $request->validate([
        'status' => 'required',
        'progress' => 'required|integer|min:0|max:100',
    ]);

    $ticket->update([
        'status' => $request->status,
        'progress' => $request->progress,
    ]);

    return redirect('/admin/tickets')
    ->with('success', 'Tiket berhasil diperbarui.');
}

    public function complete(Ticket $ticket)
    {
        $ticket->update([
            'status' => 'Completed',
            'progress' => 100,
        ]);

        return redirect('/admin/tickets')
        ->with('success', 'Tiket berhasil diselesaikan.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect('/admin/tickets')
            ->with('success', 'Tiket berhasil dihapus.');
    }

    public function track($ticketNumber)
    {
        $ticket = Ticket::where('ticket_number', $ticketNumber)
            ->firstOrFail();

        return view('tickets.track', compact('ticket'));
    }

    

}
