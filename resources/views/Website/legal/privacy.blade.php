@extends('Website.components')

@section('content')
    <div class="privacyContainer">
        <h1 class="header-title" style="padding-top: 2rem;">{{__('Private Policy')}}</h1>
        @foreach($PrivacyPolicies as $PrivacyPolicie)
            <div class="terms">
                <h2 class="terms-title">{{$PrivacyPolicie->title}}</h2>
                <p>{{$PrivacyPolicie->text}}</p>
            </div>
            <br>
        @endforeach
    </div>
@endsection