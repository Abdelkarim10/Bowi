@extends('app-view.layouts')
@section('content')


{{-- <div class="card"   >
  <div class="card-header">@if($offersCount < 3 && $products->count() > 0)You should have at least 3 offers , that's why just the first time you're gonna add 3 offers @elseif($products->count() == 0) Attention !!!!  @else Create Offer @endif </div>
  <div class="card-body">
    @if($products->count() > 0)
      <form action="{{ route("my-merchant-offers.store") }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        @livewire('create-merchant-offer',[
          'offertypes'=>$offertypes,
          'products'=>$products,
          'offersCount'=>$offersCount,
          ])

        <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"><br>
      </form>
    @else
      <h3>You should have at least one product to create an offer</h3>
    @endif

  </div>
</div><br><br> --}}

<div class="CreatePost">
  <h4>@if($offersCount < 3 && $products->count() > 0)You should have at least 3 offers , that's why just the first time you're gonna add 3 offers @elseif($products->count() == 0) Attention !!!!  @else Add Offer @endif </h4>
  @if($products->count() > 0)
    <form action="{{ route("my-merchant-offers.store") }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}

        @livewire('create-merchant-offer',[
          'offertypes'=>$offertypes,
          'products'=>$products,
          'offersCount'=>$offersCount,
          ])

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>
        
        <br>
        <input class="CreatePostBtn" type="submit" value="Save" >
        <br>
        <br>
    </form>
  @else
    <h3>You should have at least one product to create an offer</h3>
  @endif
</div>
@endsection
