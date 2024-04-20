@extends('app-view.layouts')
@section('content')

@livewire('users-controller',[
    'users' => $users,
    'countries' => $countries,
    'plans' => $plans,
    ])

@endsection