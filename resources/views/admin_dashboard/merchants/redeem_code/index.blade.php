@extends('app-view.layouts')
@section('content')

    <br><br>
<div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="width:95% ;">
                    <div class="activationSet" >
                        <h2 > Redeem codes </h2>
                        <div >
                            <h2 style="color: green">{{ session()->get('message') }}</h2>
                            <h2 style="color: red">{{ session()->get('message1') }}</h2>
                        </div>
                    </div>
                    @livewire('redeem-code')
                </div>
            </div>
        </div>

@endsection
