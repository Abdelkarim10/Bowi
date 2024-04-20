@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:50% ;">
 
    <div class="card-body">

        <div class="card-body">
            <h2 class="card-title">Title : {{ $aboutus->title }}</h2>
            <br>
            <h6 class="card-text"> <h6 style="color: #0D6EFD;text-decoration:underline;font-weight:700;font-size:20px">Content:</h6> {{ $aboutus->content }}</h6>
            <br><br>
            <h6 class="card-text" style="font-weight: 700">Picture : @if(isset($aboutus->pic))  <img src="{{ env('APP_URL') . '/assets/aboutus_pics/' .   $aboutus->pic }}"
                                                                      class="img-fluid rounded rounded-circle"
                                                                      style="height:70px; width:75px;object-fit: cover"
                                                                      alt="" />
                                                                     @endif</h6>
                                                                     <br>
            <h6 class="card-text" style="font-weight: 700">Created-At : {{ $aboutus->created_at }}</h6>

        </div>
    </div>
</div>
<br> --}}

<div class="singlePostView">
    <div class="singlePostHeader">
        <h2>{{ $aboutus->title }}</h2>
        <p><b>Date :</b> {{ $aboutus->created_at->format('h:i A - d/m/Y') }}</p>
    </div>
    <div class="singlePostViewContent">
        <p>{{ $aboutus->content }}</p>
        @if($aboutus->pic != null)
            <img src="{{ env('url') . '/assets/aboutus_pics/' .   $aboutus->pic }}" alt="" />
        @else
            <img src="{{ asset('images/noimage.jpg/') }}" alt="">
        @endif
    </div>
</div>


@endsection
