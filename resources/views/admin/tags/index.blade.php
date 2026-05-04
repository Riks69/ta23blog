@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6 flex-wrap gap-4">
    <div>
        <h1 class="text-3xl font-bold">🏷️ Sildid</h1>
        <p class="text-base-content/60">Halda oma blogi silte</p>
    </div>
    <a href="/admin/tags/create" class="btn btn-primary">+ Lisa uus silt</a>
</div>

<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Slug</th>
                        <th>Postitusi</th>
                        <th>Tegevused</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>
                            <span class="badge badge-primary badge-lg">{{ $tag->name }}</span>
                        </td>
                        <td class="font-mono text-sm">{{ $tag->slug }}</td>
                        <td>
                            <span class="badge badge-ghost">{{ $tag->posts_count }} postitust</span>
                        </td>
                        <td class="flex gap-2">
                            <a href="/admin/tags/{{ $tag->id }}/edit" class="btn btn-sm btn-warning">✏️ Muuda</a>
                            <form action="/admin/tags/{{ $tag->id }}" method="POST" onsubmit="return confirm('Kas oled kindel?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error">🗑️ Kustuta</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection