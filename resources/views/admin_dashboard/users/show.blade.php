@extends('app-view.layouts')
@section('content')

<div class="arrowBack">
    <a href="{{ route('users.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a>
</div>
<div class="profileContainer">
    <div class="singlePostHeader" style="flex-direction: column;justify-content: start;margin-right:0.5rem ">
        @if($user->profile_pic)
            <img src="{{  env('APP_URL') . '/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle" style="width: 200px;height: 200px;margin-bottom:1rem" alt="" />
        @else
            <div class="messageIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
            </div>
        @endif
        <h5>{{$user->name}}</h5>
    </div>
    <div class="singleMessageContent" >
        <p class="emailView"><b> Email : </b> &nbsp;&nbsp;{{$user->email}}</p>
        <p><b>Phone number :&nbsp;&nbsp;</b>{{$user->country_code . $user->phone_number}}</p>
        <p><b>Country :&nbsp;&nbsp;</b>{{$user->country->name}}</p>
        <p><b>City :&nbsp;&nbsp;</b>{{$user->city}}</p>
        <p><b>Address :&nbsp;&nbsp;</b>{{$user->address}}</p>
        <p><b>Zipcode :&nbsp;&nbsp;</b>{{$user->zipcode}}</p>
        <p><b>Joining date :&nbsp;&nbsp;</b> {{ $user->created_at->format('d/m/Y') }}</p>
        <br>
        @if($user->plan_id)
            <p><b>Plan :&nbsp;&nbsp;</b> {{ $user->plan->name }}</p>
            <p><b>Plan expiry date :&nbsp;&nbsp;</b> {{ $user->plan_expiry_date->format('d/m/Y') }}</p>
        @endif
    </div>
</div>

@endsection