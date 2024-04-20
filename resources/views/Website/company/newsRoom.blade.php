@extends('Website.components')

@section('content')
    <h1 class="header-title" style="padding-top: 2rem;">{{__('Newsroom')}}</h1>
    <div class="body10">

        @foreach ($news->reverse() as $new)
        <div class="column">
            <div class="container2 gridLV">
                <div class="column-3 image">
                    <img src="{{ env('url') . '/assets/news_pics/' .   $new->pic }}" alt="" />
                </div>
                <div class="column-2">
                    <h3>{{ $new->title}}</h3>
                    <p class="text">{{ $new->content }}</p>
                    <div class="postBot">
                        <div class="readMoreBtn">
                            <a href="{{ route('newsRoomPost',['id' =>$new->id]) }}" class="btn">{{__('View post')}}</a>
                        </div>
                        <p class="text">Date : {{ $new->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

@endsection
