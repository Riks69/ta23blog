@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-6">➕ Lisa uus silt</h1>
            
            <form method="POST" action="/admin/tags">
                @csrf
                
                <div class="form-control mb-4">
                    <label class="label">Sildi nimi</label>
                    <input type="text" name="name" class="input input-bordered" required>
                    <p class="text-sm opacity-50 mt-1">Näiteks: Laravel, PHP, DaisyUI, Blogi</p>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary">💾 Salvesta</button>
                    <a href="/admin/tags" class="btn btn-ghost">Tagasi</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection