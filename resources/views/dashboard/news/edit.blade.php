<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

    @if($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-input" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="content" class="form-textarea" required>{{ old('content', $news->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar (opsional)</label>
            @if($news->image)
                <div><img src="{{ asset('storage/' . $news->image) }}" alt="gambar" class="news-thumb" style="max-width:200px"></div>
            @endif
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Tanggal Terbit (opsional)</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $news->published_at ? \Illuminate\Support\Carbon::parse($news->published_at)->format('Y-m-d\\TH:i') : '') }}" class="form-input">
        </div>
        <button type="submit" class="btn-primary">Perbarui</button>
    </form>
</body>
</html>
