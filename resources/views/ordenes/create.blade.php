{{-- resources/views/ordenes/create.blade.php --}}
@extends('layouts.app')

@section('contenido')
    <div class="container container-principal">
        {{-- Aquí solo llamamos al componente Livewire --}}
        @livewire('crear-orden')
    </div>
@endsection