<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Antrean Pekerjaan IT</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-2">
        Antrean Pekerjaan Tude Nugraha
    </h1>

    <p class="text-gray-600 mb-2">
    Sistem Informasi Pemantauan Pekerjaan Tude Nugraha
    </p>

    <p class="text-gray-500 mb-6">
        Halaman ini menampilkan status dan progres pekerjaan yang sedang ditangani oleh Putu Gede Nugraha Widiantara, S.Kom.
    </p>

    <p class="text-gray-600 mb-6">
        Balai Bahasa Provinsi Bali
    </p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500">📋 Total Tiket</div>
            <div class="text-3xl font-bold">
                {{ $totalTickets }}
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500">⏳ Menunggu Antrean</div>
            <div class="text-3xl font-bold text-orange-600">
                {{ $queueTickets }}
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500">🔧 Sedang Dikerjakan</div>
            <div class="text-3xl font-bold text-blue-600">
                {{ $inProgressTickets }}
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500">✅ Selesai</div>
            <div class="text-3xl font-bold text-green-600">
                {{ $completedTickets }}
            </div>
        </div>

    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Posisi</th>
                    <th class="p-3 text-left">Tanggal Masuk</th>
                    <th class="p-4 text-left">Tiket</th>
                    <th class="p-4 text-left">Pemohon</th>
                    <th class="p-4 text-left">Pekerjaan</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Progress</th>
                </tr>
            </thead>

            <tbody>
            @php
            $queuePosition = 1;
            @endphp
            @foreach($tickets as $index => $ticket)

                <tr class="border-t">

                    <td class="p-4">
                       @if($ticket->status == 'In Progress')

                            <span class="text-blue-600 font-semibold">
                                🔧 Sedang Dikerjakan
                            </span>

                        @elseif($ticket->status == 'Queue')

                            <span class="text-orange-600 font-semibold">
                                ⏳ Antrean #{{ $queuePosition++ }}
                            </span>

                        @elseif($ticket->status == 'Completed')

                            <span class="text-green-600 font-semibold">
                                ✅ Selesai
                            </span>

                        @endif
                    </td>

                    <td class="p-3">
                        {{ $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : '-' }}
                    </td>

                    <td class="p-4">
                        <a href="/track/{{ $ticket->ticket_number }}"
                        class="text-blue-600 hover:underline font-semibold">
                            {{ $ticket->ticket_number }}
                        </a>
                    </td>

                    <td class="p-4">
                        {{ $ticket->requester_name }}
                    </td>

                    <td class="p-4">
                        {{ $ticket->title }}
                    </td>

                    <td class="p-4">

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

                    <td class="p-4">

                        <div class="w-full bg-gray-200 rounded-full h-4">

                            <div
                                class="bg-blue-600 h-4 rounded-full"
                                style="width: {{ $ticket->progress }}%">
                            </div>

                        </div>

                        <small>{{ $ticket->progress }}%</small>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>