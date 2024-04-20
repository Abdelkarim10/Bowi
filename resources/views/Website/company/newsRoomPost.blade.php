@extends('Website.components')

@section('content')

<div class="Post">
    <div class="body3" style="padding-top: 2rem;">
        <div class="container grid-2">
        <div class="column-1">
            <h1 class="header-title">{{ $new->title }}</h1>
            <p class="text">
            {{ $new->content }}
            </p>
            <p class="text" style="color: black ;margin-top:1rem">Date : {{ $new->created_at->format('d/m/Y') }}</p>
        </div>
        @if($new->image != null)
        <div class="column-2 image">
            <img src="{{ env('APP_URL') . '/public/assets/pics/' .   $new->pic }}" alt="" />
        </div>
        @else
        <div class="column-2 image">
            <img src="/images/News.jpg" alt="" />
        </div>
        @endif
        </div>
    </div>
</div>
@endsection
