@extends('Website.components')

@section('content')
<div class="privacyContainer">
    <h1 class="header-title" style="padding-top: 2rem;">{{__('Rules of use')}}</h1>
    @foreach($rules as $rule)
        <div class="terms">
            <h2 class="terms-title">{{$rule->title}}</h2>
            <p>{{$rule->text}}</p>
        </div>
        <br>
    @endforeach
</div>
@endsection