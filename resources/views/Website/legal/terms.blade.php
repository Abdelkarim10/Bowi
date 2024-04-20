@extends('Website.components')

@section('content')
    <div class="termsContainer">
        <h1 class="header-title" style="padding-top: 2rem;">{{__('Terms')}}</h1>
        @foreach($terms as $term)
            <div class="terms">
                <h2 class="terms-title">{{$term->title}}</h2>
                <p>{{$term->term}}</p>
            </div>
            <br>
        @endforeach
    </div>
@endsection