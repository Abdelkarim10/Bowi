@extends('app-view.layouts')
@section('content')

<div style="width:98%;display: flex">
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="width:95% ;">
                <div class="card" style="border-color :white">
                    <div class="card-header" style="background-color:white ;border-color :white">
                        <h1>Sales</h1>
                    </div>

                
                    <div class="card-body">
                        @livewire('merchant-sales')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection