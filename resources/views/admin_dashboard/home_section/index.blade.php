@extends('app-view.layouts')
@section('content')

@livewire('home-section-sort-controller',['homesections' => $homesections])

@endsection