@extends('app-view.layouts')
@section('content')


<div class="card" style="width:90% ;">
    <div class="card-header">Image</div>
    <div class="card-body">
       
        <div class="card-body" style="display: flex; justify-content:center">
            <img src="/images/media-assets/{{ $image->image }}" style="width : 90%" alt="">
        </div>
        
        <h6 class="card-text" style="font-weight: 700">Added At : {{ $image->created_at }}</h6>
    </div>
</div>
<br>


@endsection