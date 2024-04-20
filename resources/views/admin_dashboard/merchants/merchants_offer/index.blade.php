@extends('app-view.layouts')
@section('content')

{{-- <div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9 cardSize"  >
                    

                      

                        <div  style="background-color:white ;display:flex;flex-direction:row; justify-content:space-between">


                            <h2>My Offers</h2>

                            @if(session()->get('message'))
                                <div style="color: green">
                                    <h4>{{ session()->get('message') }}</h4>
                                </div>
                            @else
                                <div style="color: red">
                                    <h4>{{ session()->get('message1') }}</h4>
                                </div>
                            @endif

                            <a href="{{ route('my-merchant-offers.create') }}"  class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16"  fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg> Create Offer
                            </a>
                        </div>
                        <br>
                        <a href="{{ route('merchant.old-offers') }}" class="btn btn-dark">Old Offers</a>

                        <div class="card-body">

                            @if($offers->count() != 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Picture</th>
                                                <th>Offer Type</th>
                                                <th>Product 1</th>
                                                <th>Product 2</th>
                                                <th>Rate</th>
                                                <th>Condition</th>
                                                <th>Expiration Date</th>
                                                <th>Discount</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)

                                            <tr style="font-size: 90%">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $offer->name }}</td>

                                                <td
                                                class="align-middle">
                                                    @if($offer->picture)
                                                    <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                                                    @endif
                                                </td>
                                                <td>{{ $offer->type->name }}</td>
                                                <td> @if($offer->product1)
                                                    {{ $offer->product1->name }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($offer->product2)
                                                        {{ $offer->product2->name }}
                                                    @else
                                                        ------------
                                                    @endif
                                                </td>
                                                <td>{{ $offer->rate }}</td>
                                                <td>{{ $offer->condition }}</td>
                                                <td>{{ $offer->expired_date->format('d/m/Y') }}</td>
                                                <td>
                                                    @if($offer->discount)
                                                        {{ $offer->discount }}
                                                    @else
                                                        ------------
                                                    @endif</td>
                                                <td> <a class="btn btn-info btn-sm" href="{{ route('my-offers.show',$offer->id) }}" title="View offer"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('my-offers.edit',$offer->id) }}" title="Edit  offer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Request for Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div style="display:flex;justify-content:center;">
                                    <h3 style="color: gray"> There is no offers </h3>
                                </div>
                            @endif
                            <br>
                        </div>

                </div>
            </div>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <h2>My Offers </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <div style="display:flex; flex-direction:row">
            <a href="{{ route('merchant.old-offers') }}" class="createBtn" style="margin-right: 2rem">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16"  style="margin-right:0.5rem">
                    <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
                </svg>
                Old Offers
            </a>
            <a href="{{ route('my-merchant-offers.create') }}" title="Add offer" class="createBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add offer
            </a>
        </div>
    </div>
    @foreach($offers as $offer)
        <a class="selectSingleMessage" href="{{ route('my-offers.show',$offer->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;padding:0">
                <div class="logoTextLeft">
                    @if($offer->picture ==null )
                        <div class="messageIcon" style="border-radius: 0.5rem 0 0 0.5rem;width: 105px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                        </div>
                    @else 
                        <div class="messageIcon" style="width: 100px;border-radius: 0.5rem 0 0 0.5rem;overflow:hidden">
                            <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" style="height: 100px; width: 100px;object-fit: cover" alt="" />
                        </div>
                    @endif
                    <div class="messageHeader"  style="margin: 0.3rem 0">
                        <h5 style="margin-bottom: 1rem">{{ $offer->name }}</h5>
                        <h6>{{ $offer->type->name }}</h6>
                    </div>
                </div>
                <div class="dateBtn" style="margin: 0.3rem 0.3rem 0.3rem 0">
                    <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('my-offers.edit',$offer->id) }}" title="Request for Edit" style="margin-bottom: 0.5rem">Request for Edit</button>
                        </form>
                    </div>
                    <p>{{ $offer->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
    <span> {{$offers->onEachSide(1)->links()}}</span>
</div>
<br>
<br>
@endsection
