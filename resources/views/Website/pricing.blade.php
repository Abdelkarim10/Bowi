@extends('Website.components')

@section('content')

<div class="body4">
    <div class="container1">
      <div class="partnerTitle">
        <h1 class="header-title" style="padding-top: 2rem;">{{__('Flexible pricing for agile teams')}}</h1>
      </div>
      <div class="partnerText">
        <p class="text">
          {{__("whether you're just getting started with rapid testing or scaling across the organization, we've got you covered")}}
        </p>
      </div>
    </div>
    <div class="body1">
        <div class="pricingCards pricingCardsMargin ">
            <div class="pricingCard pricingCardMargin ">
                <div class="column-2  ">
                    <h3 class="header-title1 " >Plans :</h3>
                </div>
            </div>
            @foreach ($plans as $plan)
            <div class="pricingCard">
                <div class="column-2">
                    <h3 class="header-title1">{{ $plan->name }}</h3>
                    <p class="text1">
                        {{ $plan->description }}
                    </p>
                    <p class="text1" id="price"><b>{{ $plan->price }}$ </b>/{{ $plan->duration }} months</p>
                    @if(Auth::user())
                      <button class="btn">subscribe</button>
                    @else
                      <a href="{{ route('login') }}" class="btn">subscribe</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection