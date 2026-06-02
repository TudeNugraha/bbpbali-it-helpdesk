<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Tambah Tiket
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <form method="POST" action="/admin/tickets">

                @csrf

                <div class="mb-4">
                    <label>Nama Pemohon</label>
                    <input
                        type="text"
                        name="requester_name"
                        class="border w-full p-2">
                </div>

                <div class="mb-4">
                    <label>Judul Pekerjaan</label>
                    <input
                        type="text"
                        name="title"
                        class="border w-full p-2">
                </div>

                <div class="mb-4">
                    <label>Deskripsi</label>
                    <textarea
                        name="description"
                        class="border w-full p-2"></textarea>
                </div>

                <div class="mb-4">
                    <label>Prioritas</label>

                    <select
                        name="priority"
                        class="border w-full p-2">

                        <option value="Low">Rendah</option>
                        <option value="Medium">Sedang</option>
                        <option value="High">Tinggi</option>

                    </select>
                </div>

                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded">

                    Simpan Tiket

                </button>

            </form>

        </div>
    </div>
</x-app-layout>