<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tracking Tiket</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">
        Tracking Tiket
    </h1>

    <div class="bg-white rounded-lg shadow p-6">

        <div class="mb-4">
            <strong>Nomor Tiket:</strong><br>
            {{ $ticket->ticket_number }}
        </div>

        <div class="mb-4">
            <strong>Nama Pemohon:</strong><br>
            {{ $ticket->requester_name }}
        </div>

        <div class="mb-4">
            <strong>Pekerjaan:</strong><br>
            {{ $ticket->title }}
        </div>

        <div class="mb-4">
            <strong>Status:</strong><br>
            {{ $ticket->status }}
        </div>

        <div class="mb-4">
            <strong>Progress:</strong><br>
            {{ $ticket->progress }}%
        </div>

        <div class="w-full bg-gray-200 rounded-full h-5">

            <div
                class="bg-blue-600 h-5 rounded-full"
                style="width: {{ $ticket->progress }}%">
            </div>

        </div>

    </div>

</div>

</body>
</html>