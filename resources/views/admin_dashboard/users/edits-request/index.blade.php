@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9" style="width:90% ;">
            <div class="card">
                <div class="card-header" style="display: flex ; justify-content:space-between">
                    <h2>
                      Edits Request
                    </h2>

                    <div style="display: flex ; flex-direction:row">
                        <h2 style="color: green">{{ session()->get('message') }}</h2>
                        <h2 style="color: red">{{ session()->get('messageD') }}</h2>
                    </div>
                </div>
                <div class="card-body">

                    <br />
                    <br />
                    <div class="table-responsive">
                        @if($Reqs->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>id</th>
                                        <th>Picture</th>
                                        <th>offer name</th>
                                        <th>merchant name</th>

                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Reqs as $req)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if(isset($req->picture))
                                                <img
                                                src="{{ env('APP_URL') . '/assets/offer_pics/' .   $req->picture }}"
                                                class="img-fluid rounded rounded-circle"
                                                style="height:70px; width:70px;object-fit: cover;margin-bottom: 1rem"
                                                alt="" />
                                            @endif
                                        </td>
                                        <td>{{ $req->name }}</td>
                                        <td>{{ $req->merchant->business_name }}  </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('request-for-edit.show',$req->id) }}" title="View faqs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="display: flex;align-items:center;justify-content:center">
                                <h2 style="color: gray">No Requests</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <h2>Edits Request </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
    </div>
    @if($Reqs->count() > 0)
        @foreach($Reqs as $req)
            <div class="singleMessage" style="background-color: #f6f6f6;">
                <div class="logoTextLeft">
                    @if($req->picture)
                        <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $req->picture }}" class="img-fluid rounded rounded-circle" style="height:74px; width:74px;object-fit: cover;margin-right:1rem" alt="" />
                    @else
                        <div class="messageIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="messageHeader">
                        <h5>{{ $req->name }}</h5>
                        <h6>{{ $req->merchant->business_name }}</h6>
                    </div>
                </div>
                <div class="dateBtn">
                    <form>
                        <button formaction="{{ route('request-for-edit.show',$req->id) }}" title="Edit Rule">View</button>
                    </form>
                    <p>{{ $req->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        @endforeach
    @else
        <div style="display: flex;align-items:center;justify-content:center;margin-top: 5rem">
            <h2 style="color: gray">No Requests</h2>
        </div>
    @endif
</div>
@endsection
