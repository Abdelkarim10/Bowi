<div>
    <div style="display:flex;flex-direction:row">
        <select wire:model="date" class="form-select selectInput" style="width:150px;border-radius: 2rem ; border:none ;color:white;background-color:gray" aria-label="Default select example">
            <option value="allTimes">{{__('all times')}}</option>
            @foreach($DBDates as $DBDate)
                <option value="{{$DBDate->year}}-{{$DBDate->month}}">{{$DBDate->month." - ".$DBDate->year}}</option>
            @endforeach
        </select>
        <select wire:model="branch" class="form-select selectInput" style="width:150px;margin-left:2rem;border-radius: 2rem ; border:none ;color:white;background-color:gray" aria-label="Default select example">
            <option value="allBranches">{{__('all branches')}}</option>
            @foreach($DBBranches as $DBDate)
                <option value="{{$DBDate->id}}">{{$DBDate->city}}</option>
            @endforeach
        </select>
    </div>

    @if($showDiv)
        <div class="AnalyticContainers" style="width:100%;margin: 1rem 0;">
            <div class="AnalyticContainer" style="margin-right: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-caret-up-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M3.544 10.705A.5.5 0 0 0 4 11h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5a.5.5 0 0 0-.082.537z"/>
                </svg>
                <div>
                    <p style="margin: 0 0 0.5rem 0"><b>Best Selling Offer :</b></p>
                    @foreach($bestSellingOffers as $bestSellingOffer)
                        @if(isset($bestSellingOffer->offer_id))
                            <p style="margin-bottom:0"><a href="{{ route('my-offers.show',$bestSellingOffer->offer_id) }}" class="SCLink">{{ $bestSellingOffer->name }}</a></p>
                        @else
                            <p style="margin-bottom:0">none</p>
                        @endif
                    @endforeach
                </div> 
            </div>
            <div class="AnalyticContainer" style="margin-right: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-caret-down-square" viewBox="0 0 16 16">
                    <path d="M3.626 6.832A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5z"/>
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2z"/>
                </svg>
                <div>
                    <p style="margin: 0 0 0.5rem 0"><b>Lowest Selling Offer : </b></p>
                    @foreach($lowestSellingOffers as $lowestSellingOffer)
                        @if(isset($lowestSellingOffer->offer_id))
                            <p style="margin-bottom:0"><a href="{{ route('my-offers.show',$lowestSellingOffer->offer_id) }}" class="SCLink">{{ $lowestSellingOffer->name }}</a></p>
                        @else
                            <p style="margin-bottom:0">none</p>
                        @endif
                    @endforeach
                </div> 
            </div>
            <div class="AnalyticContainer" style="margin-right: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                </svg>
                <div>
                    <p style="margin: 0 0 0.5rem 0"><b>Total customers :</b></p>
                    <p style="margin-bottom:0">{{ $totalCustomerNumber }}</p>
                </div> 
            </div>
            <div class="AnalyticContainer">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                    <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
                <div>
                    <p style="margin: 0 0 0.5rem 0"><b>Total Sales :</b></p>
                    <p style="margin-bottom:0">{{ $totalOffers }}</p>
                </div> 
            </div>
        </div>

        <div class="table-responsive">
            <h2>The Redeemed Offers :</h2>
            @if(count($usedOffers)>0)
                <table class="table">
                    <thead>
                        <tr>
                        
                            <th>Offer type</th>
                            <th>Offer name</th>
                            <th>Count</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offerTypes as $offerType)
                            @foreach($usedOffers as $usedOffer)
                                @if($usedOffer->type_id == $offerType->id)
                                    <tr>
                                        <td><a href="{{ route('my-offers.show',$usedOffer->offer_id) }}" class="btn" title="View offer"><i class="fa fa-eye" aria-hidden="true"></i> {{$usedOffer->name}}</a></td>
                                        <td>{{ $offerType->name }}</td>
                                        <td>{{ $usedOffer->count }}  </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                
            @else
                <div style="display: flex;align-items:center;justify-content:center;margin-top: 5rem">
                    <h2 style="color: gray">No Redeemed Offers</h2>
                </div>
            @endif
        </div>
    @endif
</div>
