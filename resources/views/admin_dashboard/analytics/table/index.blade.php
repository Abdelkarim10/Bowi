@extends('app-view.layouts')
@section('content')

<div style="width:98%;margin:auto "><a class="btn " href="/analytics" style="font-size:25px;font-weight:400 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
  </svg> Graphs</a></div>
<br>
<div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9 cardSize" >
                    <div class="card">
                        <div class="card-header">

                            <h2>Payment</h2>
                        </div>


                        <div class="card-body">

                            {{-- LIVEWIRE(CHECKBOXES) --}}

                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Amount</th>
                                            <th>Created At</th>

                                            <!-- {{-- <th>Role rank</th>--}} -->
                                            <!-- <th>Actions</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pays as $pay)

                                        <tr style="font-size: 90%">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if(isset($pay->amount))
                                                {{ $pay->amount }}$
                                                @endif

                                            <td>
                                                @if(isset($pay->created_at))
                                                {{ $pay->created_at }}
                                                @endif </td>

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



        <div class="container">
            <div class="row">
                <div class="col-md-9" style="width:95% ;">
                    <div class="card">
                        <div class="card-header">

                            <h2>Savings</h2>
                        </div>


                        <div class="card-body">

                            {{-- LIVEWIRE(CHECKBOXES) --}}

                            <br />
                            <br />
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>User</th>
                                            <th>Offer</th>
                                            <th>Saving</th>
                                            <th>Created At</th>

                                            <!-- {{-- <th>Role rank</th>--}} -->
                                            <!-- <th>Actions</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($savings as $saving)

                                        <tr style="font-size: 90%">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $saving->user->name }}</td>
                                            <td>{{ $saving->offer->id }}</td>
                                            <td>{{ $saving->saving }}$</td>
                                            <td>{{ $saving->created_at }} </td>

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
</div>



<br><br>






    <div class="container">
        <div class="row">
            <div class="col-md-9" style="width:100% ;">
                <div class="card">
                    <div class="card-header">

                        <h2>Users</h2>
                    </div>


                    <div class="card-body">

                        {{-- LIVEWIRE(CHECKBOXES) --}}

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Profile Pic</th>

                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>

                                        <th>Country</th>
                                        <th>Region</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Zipcode</th>

                                        <th>Phone Number</th>
                                        <th>Role Name</th>
                                        <th>FCM Token</th>
                                        <th>Plan</th>
                                        <th>Created At</th>
                                        <th>Activated</th>

                                        <!-- {{-- <th>Role rank</th>--}} -->
                                        <!-- <th>Actions</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usersnow as $user)

                                    <tr style="font-size: 90%">
                                        <td class="align-middle">
                                            @if($user->profile_pic)
                                            <img src="{{  env('APP_URL') . '/public/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                                            @endif
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->gender}}</td>

                                        <td>{{ $user->country->name }}</td>
                                        <td>{{ $user->region }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->zipcode }}</td>


                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->fcm_token }}</td>

                                        @if($user->plan != null)
                                            <td>{{ $user->plan->name}}</td>
                                        @else
                                            <td>Not Subscribed</td>
                                        @endif

                                        <td>{{ $user->created_at}}</td>
                                        <td>
                                            @if( $user->activated ==0 )
                                            Not Activated
                                            @elseif ($user->activated==1)
                                            Activated
                                            @endif
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

<br><br>







@endsection

