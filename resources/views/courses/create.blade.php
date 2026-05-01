
@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto bg-white p-6 mt-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Crear Curso</h1>

    <form method="POST" action="{{ route('courses.store') }}">
        @csrf

        <label class="block mb-1">Código</label>
        <input type="text" name="code" class="w-full border p-2 mb-4">

        <label class="block mb-1">Nombre</label>
        <input type="text" name="name" class="w-full border p-2 mb-4">

        <label class="block mb-1">Cupo</label>
        <input type="number" name="capacity" class="w-full border p-2 mb-4">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</div>

@endsection
