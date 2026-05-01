@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-6">

    <h1 class="text-2xl font-bold mb-4">Cursos Disponibles</h1>

    <a href="{{ route('courses.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Crear Curso
    </a>


    {{-- corregir roles
    
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('courses.create') }}"
        class="bg-green-600 text-white px-4 py-2 rounded">
            Crear Curso
        </a>
    @endif 
       
    --}}


    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 mt-4 mb-4 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 mt-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        @foreach($courses as $course)
            <div class="bg-white p-4 shadow rounded">

                <h2 class="font-semibold text-lg">{{ $course->name }}</h2>

                <p class="text-gray-600">
                    <strong>Código:</strong> {{ $course->code }}
                </p>

                <p class="text-gray-600">
                    <strong>Cupo:</strong> {{ $course->capacity }}
                </p>

                {{-- ✅ FORMULARIO CORRECTO --}}
                <form action="{{ route('enroll', $course->id) }}"
                      method="POST"
                      class="mt-3">
                    @csrf

                    <button type="submit"
                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                        Matricular
                    </button>
                </form>

            </div>
        @endforeach
    </div>
</div>

@endsection
