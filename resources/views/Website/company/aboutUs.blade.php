@extends('Website.components')

@section('content')
    <h1 class="header-title" style="padding-top: 2rem;">{{__('About us')}}</h1>
    @foreach ($aboutuss as $aboutus)

        @if($loop->iteration % 3 === 0)
            <div class="body9">
                <div class="container grid-2">
                    <div class="column-1">
                        <h3>{{ $aboutus->title }}</h3>
                        <p class="text">{{ $aboutus->content }}</p>
                    </div>
                    <div class="column-2 image">
                    <img src="{{ env('APP_URL') . '/assets/aboutus_pics/' .   $aboutus->pic }}" alt="" />
                    </div>
                </div>
            </div>
        @else
            <div class="body8">
                <div class="container grid-2">
                    <div class="column-1 image">
                        <img src="{{ env('APP_URL') . '/assets/aboutus_pics/' .   $aboutus->pic }}" alt="" />
                    </div>
                    <div class="column-2">
                        <h3>{{ $aboutus->title }}</h3>
                        <p class="text">{{ $aboutus->content }}</p>
                    </div>
                </div>
            </div>
        @endif

    @endforeach

@endsection
