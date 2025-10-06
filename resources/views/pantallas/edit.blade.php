@extends('layouts.app')

@section('contenido')
        @livewire('pantalla-update', ['pantalla' => $pantalla])
@endsection
