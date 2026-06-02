<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-3xl font-bold text-indigo-700">
                IT Helpdesk Tracker [Tude Nugraha]
            </h2>

            <p class="text-sm text-gray-500">
                Balai Bahasa Provinsi Bali
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-bold mb-2">
                        Selamat Datang
                    </h3>

                    <p>
                        Sistem Manajemen Antrean Pekerjaan IT Balai Bahasa Provinsi Bali (Tude Nugraha).
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white border-l-4 border-indigo-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 rounded-lg p-6">
                    <h4 class="text-gray-500">Total Tiket</h4>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalTickets }}</p>
                </div>

                <div class="bg-white border-l-4 border-yellow-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 rounded-lg p-6">
                    <h4 class="text-gray-500">Dalam Antrean</h4>
                    <p class="text-3xl font-bold text-yellow-600">
                        {{ $queueTickets }}
                    </p>
                </div>

                <div class="bg-white border-l-4 border-blue-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 rounded-lg p-6">
                    <h4 class="text-gray-500">Sedang Dikerjakan</h4>
                    <p class="text-3xl font-bold text-blue-600">
                        {{ $inProgressTickets }}
                    </p>
                </div>

                <div class="bg-white border-l-4 border-green-500 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 rounded-lg p-6">
                    <h4 class="text-gray-500">Selesai</h4>
                    <p class="text-3xl font-bold text-green-600">
                        {{ $completedTickets }}
                    </p>
                </div>

            </div>

            <div class="mt-6">
                <a href="/admin/tickets"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                   Kelola Tiket
                </a>
                <a href="/admin/tickets/create"
                    class="bg-green-600 text-white px-4 py-2 rounded mr-2">

                    + Tambah Tiket

                </a> 
                   
            </div>

        </div>
    </div>

<div class="bg-white shadow-md rounded-lg p-6 mt-8">

    <div class="flex justify-between items-center mb-4">

        <h3 class="text-xl font-semibold">
            📋 Tiket Terbaru
        </h3>

        <a href="/admin/tickets"
        class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-4 py-2 rounded">

            Lihat Semua

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-3 text-left">Tiket</th>
                    <th class="p-3 text-left">Pemohon</th>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Tanggal</th>
                </tr>

            </thead>

            <tbody>

            @foreach($latestTickets as $ticket)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">
                        <a href="/track/{{ $ticket->ticket_number }}"
                           class="text-indigo-600 hover:underline">

                            {{ $ticket->ticket_number }}

                        </a>
                    </td>

                    <td class="p-3">
                        {{ $ticket->requester_name }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->title }}
                    </td>

                    <td class="p-3">

                        @if($ticket->status == 'Queue')

                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">
                                Queue
                            </span>

                        @elseif($ticket->status == 'In Progress')

                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                In Progress
                            </span>

                        @elseif($ticket->status == 'Completed')

                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded">
                                Completed
                            </span>

                        @endif

                    </td>
                    <td class="p-3">
                        {{ $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : '-' }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>