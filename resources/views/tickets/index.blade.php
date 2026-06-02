<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Antrean Pekerjaan Tude Nugraha
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4 flex justify-between items-center">

    <a href="/admin/tickets/create"
       class="bg-green-600 text-white px-4 py-2 rounded">
        + Tambah Tiket
    </a>

    <form method="GET" class="flex gap-2">

    <input
        type="text"
        name="search"
        placeholder="Cari pemohon atau judul..."
        value="{{ request('search') }}"
        class="border rounded px-3 py-2">

    <select
        name="status"
        class="border rounded px-3 py-2">

        <option value="">Semua Status</option>

        <option value="Queue"
            {{ request('status') == 'Queue' ? 'selected' : '' }}>
            Queue
        </option>

        <option value="In Progress"
            {{ request('status') == 'In Progress' ? 'selected' : '' }}>
            In Progress
        </option>

        <option value="Completed"
            {{ request('status') == 'Completed' ? 'selected' : '' }}>
            Completed
        </option>

    </select>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Cari

    </button>

</form>

</div>

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">

                <table class="min-w-full border-collapse">

                    <thead class="bg-slate-100 text-slate-700 uppercase text-sm">
                        <tr>
                            <th class="p-3 text-left">No Tiket</th>
                            <th class="p-3 text-left">Tanggal Masuk</th>
                            <th class="p-3 text-left">Pemohon</th>
                            <th class="p-3 text-left">Judul</th>
                            <th class="p-3 text-left">Prioritas</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Progress</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($tickets as $ticket)

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-3">

                                <a href="/track/{{ $ticket->ticket_number }}"
                                class="text-indigo-600 hover:text-indigo-800 hover:underline font-semibold">

                                    {{ $ticket->ticket_number }}

                                </a>

                            </td>

                            <td class="p-3">
                                {{ $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : '-' }}
                            </td>

                            <td class="p-3">
                                {{ $ticket->requester_name }}
                            </td>

                            <td class="p-3">
                                {{ $ticket->title }}
                            </td>

                            <td class="p-3">

                                @if($ticket->priority == 'High')

                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                        🔥 Tinggi
                                    </span>

                                @elseif($ticket->priority == 'Medium')

                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                        ⚡ Sedang
                                    </span>

                                @else

                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                        🌱 Rendah
                                    </span>

                                @endif

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

                                @else
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">
                                        {{ $ticket->status }}
                                    </span>
                                @endif

                            </td>

                            <td class="p-3">

                                <div class="w-full bg-gray-200 rounded-full h-4">

                                    <div
                                        class="bg-blue-600 h-4 rounded-full"
                                        style="width: {{ $ticket->progress }}%">
                                    </div>

                                </div>

                                <small>{{ $ticket->progress }}%</small>

                            </td>

                            <td class="p-3 flex gap-2">

                                <a href="/admin/tickets/{{ $ticket->id }}/edit"
                                class="bg-blue-600 hover:bg-blue-700 transition text-white px-3 py-1 rounded shadow-sm">
                                    Edit
                                </a>

                                @if($ticket->status != 'Completed')

                                <form method="POST"
                                    action="/admin/tickets/{{ $ticket->id }}/complete">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="bg-green-600 hover:bg-green-700 transition text-white px-3 py-1 rounded shadow-sm">

                                        Selesai

                                    </button>

                                </form>

                                @endif
                                <form method="POST"
                                    action="/admin/tickets/{{ $ticket->id }}"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-600 hover:bg-red-700 transition text-white px-3 py-1 rounded shadow-sm">

                                        Hapus

                                    </button>

                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-4 text-center">
                                Belum ada tiket.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>