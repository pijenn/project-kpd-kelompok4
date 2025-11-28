<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-red-600">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="mb-4 text-lg font-bold">Daftar Semua Dokumen Masuk</h3>

                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Uploader (User ID)</th>
                            <th class="border border-gray-300 px-4 py-2">Tipe Dokumen</th>
                            <th class="border border-gray-300 px-4 py-2">Nama File Asli</th>
                            <th class="border border-gray-300 px-4 py-2">Waktu Upload</th>
                            <th class="border border-gray-300 px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $doc)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $doc->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $doc->user->name ?? 'Unknown' }} (ID: {{ $doc->user_id }})
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">
                                    {{ $doc->document_type }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $doc->original_filename }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-500">
                                {{ $doc->created_at->diffForHumans() }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                   
                                <a href="{{ route('documents.download', $doc->id) }}" 
                                   class="bg-green-600 text-black px-3 py-1 rounded text-sm hover:bg-green-700">
                                    Download
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>