@extends('app-view.layouts')
@section('content')

@livewire('home-section-controller',[
    'merchants' => $merchants,
    'merchant_categories' => $merchant_categories,
    'merchant_sub_categories' => $merchant_sub_categories,
    'offers' => $offers,
    'offer_types' => $offer_types,
    ])

@endsection