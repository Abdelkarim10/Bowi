@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:50% ;">
 
    <div class="card-body">
       
        <div class="card-body">
            <h2 class="card-title">Question: {{ $faqs->question }}</h2>
            <br>
            <h6 class="card-text"> <h6 style="color: #0D6EFD;text-decoration:underline;font-weight:700;font-size:20px">Answer:</h6> {{ $faqs->answer }}</h6>
            <br><br>
            <h6 class="card-text" style="font-weight: 700">Created-At : {{ $faqs->created_at }}</h6>

        </div>
    </div>
</div>
<br> --}}
<div class="arrowBack">
    <a href="{{ route('faqs.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a>
</div>
<div class="singlePostView1">
    <div class="singlePostHeader">
        <p></p>
        <p><b>Date :</b> {{ $faqs->created_at->format('h:i A - d/m/Y') }}</p>
    </div>
    <div class="singleMessageContent">
        <h2>{{ $faqs->question }}</h2><br>
        <p>{{ $faqs->answer }}</p>
    </div>
</div>

@endsection