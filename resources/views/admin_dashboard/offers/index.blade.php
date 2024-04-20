@extends('app-view.layouts')
@section('content')


<div class="row">
    <div class="col-md-9" style="width:70vw ; margin-bottom:1rem;">
        <div class="card">
            <div class="card-header">

                <h2> Merchant Details</h2>
            </div>
            {{-- <div class="card-body">

                LIVEWIRE(CHECKBOXES)

                <br />
                <br /> --}}
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>City</th>
                                <th>Address</th>
                                <th>ZipCode</th>
                                <th>Phone Number</th>
                                <th>Merchant Sub Category</th>


                            </tr>
                        </thead>
                        <tbody>


                            <tr style="font-size: 90%">
                                <td>{{ $merchant->city }}</td>
                                <td>{{ $merchant->address }}</td>
                                <td>{{ $merchant->zipcode }}</td>
                                <td>{{ $merchant->phone_number}}</td>
                                <td>{{ $merchant->merchantSubCategory->name }}</td>

                                {{ csrf_field() }}

                                </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>









<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:70vw ;height:auto;padding:0;">
            <div class="card">
                <div class="card-header">

                    <h2>Offers</h2>
                </div>

                <div class="card-body">



                    {{-- LIVEWIRE(CHECKBOXES) --}}

                    <br />
                    <br />
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Picture</th>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Offer Type</th>
                                    <th>Product </th>
                                    <th>Product 2</th>
                                    <th>Discount</th>
                                    <th>Pins</th>


                                    <!-- <th>Actions</th> -->

                                </tr>
                            </thead>    
                            <tbody>
                                @foreach($offers as $offer)

                                <tr style="font-size: 90%">

                                    <td class="align-middle">
                                        @if($offer->picture)
                                        <img src="{{ env('APP_URL') . '/assets/offer_pics/' .  $offer->picture }}" class="img-fluid rounded rounded-circle" style="height: 50px; width: 50px;object-fit: cover" alt="" />
                                        @endif
                                    </td>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->type->name }}</td>
                                    <td>{{ $offer->product1->name }}</td>
                                    <td>

                                        @if( $offer->product2 !==null )
                                        {{ $offer->product2->name}}
                                        @elseif ($offer->product2===null)
                                        Null
                                        @endif

                                    </td>


                                    <td>
                                        @if( $offer->discount !==null )
                                        {{ $offer->discount }}%
                                        @elseif ($offer->discount===null)
                                        Null
                                        @endif

                                    </td>
                                <td>
                                    <a href="{{ route('merchants.user-offers.index',['merchant_id' => $merchant->id, "offer_id" => $offer->id]) }}" class="btn btn-primary btn-sm" title="offers">
                                        <i class="fa fa-plus" aria-hidden="true"></i>  Pins  </a>
                                    </td>
                                    {{ csrf_field() }}

                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @foreach($usersoffertime as $useroffertime)
<p>{{$useroffertime}}</p>
@endforeach --}}

@endsection
