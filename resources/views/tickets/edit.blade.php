<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Tiket
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <form method="POST" action="/admin/tickets/{{ $ticket->id }}">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label>Status</label>

                    <select
                        name="status"
                        class="border w-full p-2">

                        <option value="Queue"
                            {{ $ticket->status == 'Queue' ? 'selected' : '' }}>
                            Queue
                        </option>

                        <option value="In Progress"
                            {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="Waiting User"
                            {{ $ticket->status == 'Waiting User' ? 'selected' : '' }}>
                            Waiting User
                        </option>

                        <option value="Completed"
                            {{ $ticket->status == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>
                </div>

                <div class="mb-4">
                    <label>Progress (%)</label>

                    <input
                        type="number"
                        name="progress"
                        min="0"
                        max="100"
                        value="{{ $ticket->progress }}"
                        class="border w-full p-2">
                </div>

                <button
                    class="bg-green-600 text-white px-4 py-2 rounded">

                    Simpan Perubahan

                </button>

            </form>

        </div>
    </div>
</x-app-layout>