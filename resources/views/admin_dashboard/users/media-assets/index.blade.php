@extends('app-view.layouts')
@section('content')

@livewire('media-assets-controller',[
    'Images' => $Images,
])

@endsection
