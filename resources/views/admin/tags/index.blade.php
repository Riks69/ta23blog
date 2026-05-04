@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">📌 Sildid (Tags)</h1>
    <a href="/admin/tags/create" class="btn btn-primary">+ Lisa uus silt</a>
</div>

@if(session('success'))
    <div class="alert alert-success mb-4">{{ session('success') }}</div>
@endif

<div class="card bg-base-100 shadow-xl">
    <div class="card-body">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nimi</th>
                        <th>Slug</th>
                        <th>Postitusi</th>
                        <th>Tegevused</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                            </td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->posts_count }}</td>
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