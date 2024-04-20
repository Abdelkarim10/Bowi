@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:50% ;">

    <div class="card-body">

        <div class="card-body">
            <h2 class="card-title">Title : {{ $newsroomsShow->title }}</h2>
            <br>
            <h6 class="card-text"> <h6 style="color: #0D6EFD;text-decoration:underline;font-weight:700;font-size:20px">Content:</h6> {{ $newsroomsShow->content }}</h6>
            <br><br>
            <h6 class="card-text" style="font-weight: 700">Picture : @if(isset($newsroomsShow->pic))  <img src="{{ env('APP_URL') . '/assets/news_pics/' .   $newsroomsShow->pic }}"
                                                                      class="img-fluid rounded rounded-circle"
                                                                      style="height:70px; width:75px;object-fit: cover"
                                                                      alt="" />
                                                                     @endif</h6>
            <h6 class="card-text" style="font-weight: 700">Created-At : {{ $newsroomsShow->created_at }}</h6>

        </div>
    </div>
</div>
<br> --}}


<div class="singlePostView">
    <div class="singlePostHeader">
        <h2>{{ $newsroomsShow->title }}</h2>
        <p><b>Date :</b> {{ $newsroomsShow->created_at->format('h:i A - d/m/Y') }}</p>
    </div>
    <div class="singlePostViewContent">
        <p>{{ $newsroomsShow->content }}</p>
        @if($newsroomsShow->pic != null)
            <img src="{{ env('url') . '/assets/news_pics/' .   $newsroomsShow->pic }}" alt="" />
        @else
            <img src="{{ asset('images/noimage.jpg/') }}" alt="">
        @endif
    </div>
</div>


@endsection
