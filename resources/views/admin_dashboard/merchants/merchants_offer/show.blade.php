@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:50% ;">

    <div class="card-body">

        <div class="card-body">
            <h2 class="card-title">Name: {{ $offer->name }}</h2>
            <br>
            <h6 class="card-text"> Picture: &nbsp;@if($offer->picture) <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />@endif
            <br>
            <h6 class="card-text"> Product 1: &nbsp;@if($offer->product1) {{ $offer->product1->name }}@endif
           <br>
            @if($offer->product2 != null)
                <h6 class="card-text"> Product 2: &nbsp;{{ $offer->product2->name }}
                <br>
            @endif
          <h6 class="card-text"> Rate: &nbsp; {{ $offer->rate }}
          <br>
          <h6 class="card-text"> Condition: &nbsp; {{ $offer->condition }}
            <br>
            <h6 class="card-text"> Expired Date: &nbsp; {{ $offer->expired_date->format('m/d/Y') }}
            <br>
            @if($offer->discount != null)
                <h6 class="card-text"> Discount: &nbsp; {{ $offer->discount }}
            @endif
            <br><br>
            <h6 class="card-text" style="font-weight: 700">Created-At : {{ $offer->created_at }}</h6>

        </div>
    </div>
</div>
<br> --}}

<div class="arrowBack">
    <a href="{{ route('my-offers.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a>
</div>
<div class="profileContainer">
    <div class="singlePostHeader" style="flex-direction: column;justify-content: start;margin-right:0.5rem ">
        @if($offer->picture)
        <div class="messageIcon" style="width: 300px;border-radius: 0.5rem;overflow:hidden">
            <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" style="height: 300px; width: 300px;object-fit: cover" alt="" />
        </div>
        @else
            <div class="messageIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
            </div>
        @endif
        <h5><b>Offer Name :&nbsp;&nbsp;</b>{{$offer->name}}</h5>
    </div>
    <div class="singleMessageContent" >
        <p><b>Type :&nbsp;&nbsp;</b>{{$offer->type->name}}</p>
        <p><b>Product 1 :&nbsp;&nbsp;</b>{{$offer->product1->name}}</p>
        @if($offer->product2_id)
            <p><b>Product 2 :&nbsp;&nbsp;</b>{{$offer->product2->name}}</p>
        @else
            <p><b>Discount :&nbsp;&nbsp;</b>{{$offer->discount}} %</p>
        @endif
        <p><b>Rate :&nbsp;&nbsp;</b>{{$offer->rate}}</p>
        <p><b>Estimated saving :&nbsp;&nbsp;</b>{{$offer->estimated_saving}}</p>
        <p><b>Created date :&nbsp;&nbsp;</b> {{ $offer->created_at->format('d/m/Y') }}</p>
        <p><b>Expiration date :&nbsp;&nbsp;</b> {{ $offer->expired_date->format('d/m/Y') }}</p>
    </div>
</div>

@endsection
