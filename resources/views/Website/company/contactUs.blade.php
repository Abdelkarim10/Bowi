@extends('Website.components')

@section('content')

    <h1 class="header-title" style="padding-top: 2rem;">{{__('Contact us form')}}</h1>
    <div class="ContactUsFrom">
        <form  method="POST" action="{{ route('contactUs.store') }}">
            <h3>{{__('Send us a message :')}}</h3>
            @csrf
            <input class="textInput" name="name" type="text" placeholder="{{__('Name')}}" >
            <input class="textInput" name="email" type="email" placeholder="{{__('Email')}}" >
            <input class="textInput" name="title" type="text" placeholder="{{__('Title')}}" >
            <textarea class="textInput" name="message" placeholder="{{__('Message')}} ..." ></textarea>
            <div class="errorMsg">
                @if($errors->any())
                {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            <div class="doneMsg">
                {{ session()->get('message') }}
            </div>
            <input class="subBtn" type="submit" value="{{__('Submit')}}">
        </form>
    </div>
    <h1 class="header-title">{{__('Contact us')}}</h1>
    <div class="contactDiv">
        <div class="phoneDiv">
            <div class="contactLogo"><i class='bx bx-phone-call'></i></div>
            <h2 class="contactTitle">{{__('Phone')}}</h2>
            <p class="contactText">+1 800 123 4567</p>
        </div>
        <div class="emailDiv">
            <div class="contactLogo"><i class='bx bx-envelope'></i></div>
            <h2 class="contactTitle">{{__('Email')}}</h2>
            <p class="contactText">bowi@email.com</p>
        </div>
        <div class="addressDiv">
            <div class="contactLogo"><i class='bx bx-map'></i></div>
            <h2 class="contactTitle">{{__('Address')}}</h2>
            <p class="contactText">Maldova</p>
        </div>
    </div>
@endsection