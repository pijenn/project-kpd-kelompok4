<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen</title>
    <style>
        body { font-family: sans-serif; display: grid; place-items: center; min-height: 90vh; background-color: #f4f4f4; }
        form { background: #fff; border: 1px solid #ccc; padding: 25px; border-radius: 8px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="file"], select { width: 300px; padding: 8px; }
        button { background: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>

    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Form Upload Dokumen</h2>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <label for="document_type">Tipe Dokumen:</label>
            <select name="document_type" id="document_type">
                <option value="KTP">KTP</option>
                <option value="SLIP_GAJI">Slip Gaji</option>
            </select>
        </div>

        <div>
            <label for="file">Pilih File (Max 2MB):</label>
            <input type="file" name="file" id="file">
            
            @error('file')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Upload File</button>
    </form>

</body>
</html>