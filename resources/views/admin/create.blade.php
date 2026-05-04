@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-2">✏️ Lisa uus postitus</h1>
            <p class="text-base-content/60 mb-6">Jaga oma mõtteid ja lugusid</p>
            
            <form method="POST" action="/admin/posts">
                @csrf
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">Pealkiri</span>
                    </label>
                    <input type="text" name="title" class="input input-bordered" placeholder="Minu põnev postitus" required>
                </div>
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">Autor</span>
                    </label>
                    <input type="text" name="author" class="input input-bordered" placeholder="Sinu nimi" required>
                </div>
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">Pildi URL</span>
                    </label>
                    <input type="url" name="image" class="input input-bordered" placeholder="https://pildid.ee/pilt.jpg">
                    <p class="text-sm text-base-content/50 mt-1">Jäta tühjaks, kui pole pilti</p>
                </div>
                
                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text font-semibold">Sisu</span>
                    </label>
                    <textarea name="content" rows="10" class="textarea textarea-bordered" placeholder="Kirjuta oma postitus siia..." required></textarea>
                </div>
                
                @php $tags = \App\Models\Tag::all(); @endphp
                @if($tags->count() > 0)
                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold">Sildid (Tags)</span>
                    </label>
                    <select name="tags[]" multiple class="select select-bordered">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm text-base-content/50 mt-1">Hoia Ctrl all, et valida mitu silti</p>
                </div>
                @endif
                
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary">📤 Avalda postitus</button>
                    <a href="/admin" class="btn btn-ghost">Tagasi</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection