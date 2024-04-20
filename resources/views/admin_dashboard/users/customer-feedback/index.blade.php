@extends('app-view.layouts')
@section('content')

@foreach($customers as $customer)
<div class="card" style="width:50% ;">
 
    <div class="card-body">
       
        <div class="card-body">
            <h5 class="card-title">Title : {{ $customer->title }}</h5>
            <p class="card-text">Message : {{ $customer->content }}</p>
            <p class="card-text">Rating : {{ $customer->rating }}</a>

        </div>
    </div>
</div>
<br>
@endforeach

@endsection