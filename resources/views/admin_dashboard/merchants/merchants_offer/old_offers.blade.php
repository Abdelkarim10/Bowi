@extends('app-view.layouts')
@section('content')

    {{-- <br><br>
<div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9" style="width:95% ;">

                        <div  style="background-color:white ;display:flex;flex-direction:row; justify-content:space-between">

                            <h2>My Old Offers</h2>
                        </div>

                        <div class="card-body">

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
                                            <th>Expired Date</th>
                                            <th>Discount</th>

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
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>

                </div>
            </div>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <div style="display: flex;flex-direction:row ; align-items:center">
            <div class="arrowBack" style="margin: 0">
                <a href="{{ route('my-offers.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </a>
            </div>
            <h2 style="margin: 0 0 0 1rem">My Old Offers </h2>
        </div>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
    </div>
    @foreach($offers as $offer)
        <a class="selectSingleMessage" href="{{ route('my-offers.show',$offer->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;padding:0">
                <div class="logoTextLeft">
                    @if($offer->picture == null)
                        <div class="messageIcon" style="border-radius: 0.5rem 0 0 0.5rem">
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
                    {{-- <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('my-offers.edit',$offer->id) }}" title="Request for Edit" style="margin-bottom: 0.5rem">Request for Edit</button>
                        </form>
                    </div> --}}
                    <p>{{ $offer->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
    <span> {{$offers->onEachSide(1)->links()}}</span>
</div>

@endsection
