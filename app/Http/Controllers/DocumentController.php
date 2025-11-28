<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use Illuminate\Support\Facades\Crypt; 
use Illuminate\Support\Facades\Log;


class DocumentController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    
    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        'document_type' => 'required|string|in:KTP,SLIP_GAJI',
    ]);

    $file = $request->file('file');
    $fileContent = $file->get();

    $encryptedContent = Crypt::encrypt($fileContent);

    $filename = uniqid() . '.enc';
    $path = 'private_uploads/' . $filename;

    Storage::disk('local')->put($path, $encryptedContent);

    $document = Document::create([
        'user_id' => auth()->id(),
        'document_type' => $request->document_type,
        'original_filename' => $file->getClientOriginalName(),
        'storage_path' => $path,
        'mime_type' => $file->getMimeType(),
    ]);

    Log::info('Upload berhasil', [
        'user_id' => auth()->id(),
        'doc_id' => $document->id,
        'ip' => request()->ip(),
    ]);

    return redirect()->back()->with('success', 'Upload berhasil!');
}

  
    public function download($id)
{
    $document = Document::findOrFail($id); 
    if (auth()->id() !== 2) {
        
        abort(403, 'Akses Ditolak.');
    }

    if (!Storage::disk('local')->exists($document->storage_path)) {
        abort(404, 'File tidak ditemukan');
    }

    $encryptedContent = Storage::disk('local')->get($document->storage_path);

    try {
        $decryptedContent = Crypt::decrypt($encryptedContent);
    } catch (\Exception $e) {
        abort(500, 'Gagal dekripsi file.');
    }

    return response()->streamDownload(function() use ($decryptedContent) {
        echo $decryptedContent;
    }, $document->original_filename);
}

    public function admin()
    {
        $documents = Document::latest()->get();

        return view('admin_dashboard', compact('documents'));
    }
}