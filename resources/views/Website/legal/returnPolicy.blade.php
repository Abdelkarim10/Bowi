@extends('Website.components')

@section('content')
    <div class="privacyContainer">
        <h1 class="header-title" style="padding-top: 2rem;">{{__('Return Policy')}}</h1>
        @foreach($ReturnPolicies as $ReturnPolicie)
            <div class="terms">
                <h2 class="terms-title">{{$ReturnPolicie->title}}</h2>
                <p>{{$ReturnPolicie->text}}</p>
            </div>
            <br>
        @endforeach
    </div>
@endsection