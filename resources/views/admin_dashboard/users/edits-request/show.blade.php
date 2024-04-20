@extends('app-view.layouts')
@section('content')

{{-- <div style="display: flex; flex-direction:row">
    <div class="card" style="width:45% ; margin-right:2rem">

        <div class="card-header">
            <h2>
              Original Offer </h2>
        </div>

        <div class="card-body">

            <div class="card-body">
                @if(isset($offer->picture))
                    <img
                    src="{{ env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}"
                    class="img-fluid rounded rounded-circle"
                    style="height:100px; width:100px;object-fit: cover;margin-bottom: 1rem"
                    alt="" />
                @endif
                <h4 class="card-text">- Offer Name : {{ $offer->name }}</h4> <br>
                <h4 class="card-text"> - Merchant Name : {{ $offer->merchants->business_name }}</h4> <br>
                <h4 class="card-text"> - Type : {{ $offer->type->name }} </h4> <br>
                <h4 class="card-text"> - Product 1 : {{ $offer->product1->name }} </h4> <br>
                @if($offer->product2 != null)
                    <h4 class="card-text"> - Product 2 : {{ $offer->product2->name }} </h4> <br>
                @endif
                @if($offer->discount != null)
                    <h4 class="card-text"> - Discount : {{ $offer->discount }} % </h4> <br>
                @endif
                <h4 class="card-text"> - Condition : {{ $offer->condition }} </h4> <br>
                <h4 class="card-text"> - Created-At : {{ $offer->created_at->format('d/m/Y') }}</h4> <br>
            </div>
        </div>
    </div>
    <div class="card" style="width:45% ;">

        <div class="card-header" style="display: flex;flex-direction:row;justify-content:space-between">
            <h2>
              Offer Edits
            </h2>
            <div>
                <form method="POST" action="{{ route('my-offers.update',$req->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" title="Accept Edits" onclick="return confirm('Are you sure?')">Accept</button>
                </form>
                <form method="POST" action="{{ route('request-for-edit.destroy',$req->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" title="Decline  Edits" onclick="return confirm('Are you sure?')">Decline</button>
                </form>
            </div>
        </div>

        <div class="card-body">

            <div class="card-body">
                @if(isset($req->picture))
                    <img
                    src="{{ env('APP_URL') . '/assets/offer_pics/' .   $req->picture }}"
                    class="img-fluid rounded rounded-circle"
                    style="height:100px; width:100px;object-fit: cover;margin-bottom:1rem"
                    alt="" />
                @else
                    <img
                    src="{{ env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}"
                    class="img-fluid rounded rounded-circle"
                    style="height:100px; width:100px;object-fit: cover;margin-bottom: 1rem"
                    alt="" />
                @endif
                <h4 class="card-text" @if($req->name != $offer->name ) style="color: green;" @endif>- Offer Name : {{ $req->name }}</h4> <br>
                <h4 class="card-text" @if($req->merchant->business_name != $offer->merchants->business_name ) style="color: green;" @endif> - Merchant Name : {{ $req->merchant->business_name }}</h4> <br>
                <h4 class="card-text" @if($req->type->name != $offer->type->name ) style="color: green;" @endif> - Type : {{ $req->type->name }} </h4> <br>
                <h4 class="card-text" @if($req->product1->name != $offer->product1->name ) style="color: green;" @endif> - Product 1 : {{ $req->product1->name }} </h4> <br>
                @if($req->product2 != null)
                    <h4 class="card-text" @if($req->product2->name != $offer->product2->name ) style="color: green;" @endif> - Product 2 : {{ $req->product2->name }} </h4> <br>
                @endif
                @if($req->discount != null)
                    <h4 class="card-text" @if($req->discount != $offer->discount ) style="color: green;" @endif> - Discount : {{ $req->discount }} % </h4> <br>
                @endif
                <h4 class="card-text" @if($req->condition != $offer->condition ) style="color: green;" @endif> - Condition : {{ $req->condition }} </h4> <br>
                <h4 class="card-text"> - Requested at : {{ $req->created_at->format('d/m/Y') }}</h4> <br>
                <div style="border: 1px solid black; padding :1rem">
                    <h4 class="card-text"> <b style="color: #0D6EFD;text-decoration:underline;">Reason for edit :</b> <br><br>{{ $req->reason }}</h4> <br>
                </div>
            </div>
        </div>
    </div>
    <br>
</div> --}}
<div class="arrowBack" style="margin-bottom: 1rem;">
    <a href="{{ route('request-for-edit.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a>
</div>
<div class="editRequestContainer">
    <div class="editRequestCol1">
        <div class="editRequestHeader">
            <h2>Original Offer </h2>
        </div>
        <div class="editRequestContent">
            @if($offer->picture)
                <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" class="img-fluid rounded rounded-circle" style="height:100px; width:100px;object-fit: cover;margin-bottom:1rem" alt="" />
            @else
                <div class="messageIcon" style="height:100px; width:100px;margin-bottom:1rem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                    </svg>
                </div>
            @endif
            <p> - Merchant Name : {{ $offer->merchants->business_name }}</p> 
            <p>- Offer Name : {{ $offer->name }}</p> 
            <p> - Type : {{ $offer->type->name }} </p> 
            <p> - Product 1 : {{ $offer->product1->name }} </p> 
            @if($offer->product2 != null)
                <p> - Product 2 : {{ $offer->product2->name }} </p> 
            @endif
            @if($offer->discount != null)
                <p> - Discount : {{ $offer->discount }} % </p> 
            @endif
            <p> - Condition : {{ $offer->condition }} </p> 
            <p> - Created-At : {{ $offer->created_at->format('d/m/Y') }}</p> 
        </div>
    </div>
    <div class="editRequestCol2">
        <div class="editRequestHeader">
            <h2>Offer Edits</h2>
            <div class="btnHub">
                <form method="POST" action="{{ route('my-offers.update',$req->id) }}" accept-charset="UTF-8">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <button type="submit" class="createBtn" style="margin-right: 2rem;border:none" title="Accept Edits" onclick="return confirm('Are you sure?')">Accept</button>
                </form>
                <form method="POST" action="{{ route('request-for-edit.destroy',$req->id) }}" accept-charset="UTF-8">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="createBtn" style="border:none" title="Decline  Edits" onclick="return confirm('Are you sure?')">Decline</button>
                </form>
            </div>
        </div>
        <div class="editRequestContent">
            @if(isset($req->picture))
                <img
                src="{{ env('APP_URL') . '/assets/offer_pics/' .   $req->picture }}"
                class="img-fluid rounded rounded-circle"
                style="height:100px; width:100px;object-fit: cover;margin-bottom:1rem"
                alt="" />
            @elseif(isset($offer->picture))
                <img
                src="{{ env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}"
                class="img-fluid rounded rounded-circle"
                style="height:100px; width:100px;object-fit: cover;margin-bottom: 1rem"
                alt="" />
            @else
            <div class="messageIcon" style="height:100px; width:100px;margin-bottom:1rem">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                </svg>
            </div>
            @endif
            <p @if($req->merchant->business_name != $offer->merchants->business_name ) style="color: green;" @endif> - Merchant Name : {{ $req->merchant->business_name }}</p> 
            <p @if($req->name != $offer->name ) style="color: green;" @endif>- Offer Name : {{ $req->name }}</p> 
            <p @if($req->type->name != $offer->type->name ) style="color: green;" @endif> - Type : {{ $req->type->name }} </p> 
            <p @if($req->product1->name != $offer->product1->name ) style="color: green;" @endif> - Product 1 : {{ $req->product1->name }} </p> 
            @if($req->product2 != null && $offer->product2 != null)
                <p @if($req->product2->name != $offer->product2->name ) style="color: green;" @endif> - Product 2 : {{ $req->product2->name }} </p> 
            @elseif($req->product2 != null && $offer->product2 == null)
                <p style="color: green;"> - Product 2 : {{ $req->product2->name }} </p> 
            @endif
            @if($req->discount != null && $offer->discount != null)
                <p @if($req->discount != $offer->discount ) style="color: green;" @endif> - Discount : {{ $req->discount }} % </p> 
            @elseif($req->discount != null && $offer->discount == null)
                <p style="color: green;"> - Discount : {{ $req->discount }} % </p> 
            @endif
            <p @if($req->condition != $offer->condition ) style="color: green;" @endif> - Condition : {{ $req->condition }} </p> 
            <p> - Requested at : {{ $req->created_at->format('d/m/Y') }}</p> 
            
        </div>
    </div>
</div>
<div style="border: 1px solid #858585;border-radius:1.5rem; padding :1rem;margin-bottom:2rem;width: 90%;">
    <p> <b style="color: #858585;text-decoration:underline;">Reason for edit :</b> <br> {{ $req->reason }}</p> 
</div>
@endsection
