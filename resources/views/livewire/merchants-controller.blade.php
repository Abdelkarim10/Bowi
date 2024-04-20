<div style="overflow-y:auto;height:100vh">{{-- whole page div --}}
    <div class="container">
        <div class="row">
            <div class="col-md-9 cardSize" >

                    <div  style="display: flex ; flex-diraction:row;justify-content:space-between;">

                        <h2> Merchants</h2>
                        <div style="display: flex ;align-items:center;">
                            <button wire:click="showActivated" class="btn showBtnRadius  buttonInLivewire act" type="button" style="margin-left: 2rem;background-color: black;color:white;">
                                Show activated merchants
                            </button>

                            <button wire:click="showDeactivated" class="btn showBtnRadius  buttonInLivewire deact" type="button" style="margin: 0 2rem;background-color: black;color:white;">
                                Show deactivated merchants
                            </button>
                        </div>
                    </div>

                        <div class="card-body">



                            {{-- LIVEWIRE(CHECKBOXES) --}}
        <br>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Logo</th>
                                            <th>ID</th>
                                            <th>Business Name</th>
                                            <th>Country </th>
                                            

                                            <th>User </th>
                                            <th>Accepted</th>
                                            @if ($showActivated)
                                                <th>Top-rated</th>
                                                <th>Be The merchant</th>
                                            @endif
                                            <th>offers</th>
                                            <th>Actions</th>


                                            <!-- <th>Actions</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($merchants as $merchant)
                                            @if ($showActivated)
                                                @if($merchant->accepted !== null && $merchant->activated == 1)
                                                    <tr style="font-size: 90%">


                                                        <td class="align-middle">
                                                            @if($merchant->logo)
                                                            <img src="{{ env('APP_URL') . '/assets/merchants_pics/' .  $merchant->logo }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                                                            @endif
                                                        </td>

                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $merchant->business_name }}</td>
                                                        <td>{{ $merchant->country->name }}</td>
                                                        

                                                        <td>
                                                            @if( $merchant->user !=null )
                                                            <a class="btn" href="{{ '/users'}}" style="text-decoration: underline;">{{ $merchant->user->name}}</a></td>
                                                            @else
                                                            {{$merchant->first_name . " " . $merchant->last_name}}</td>
                                                            @endif
                                                        <td>

                                                            @if( $merchant->accepted ==0 )
                                                            Not Accepted
                                                            @elseif ($merchant->accepted==1)
                                                            Accepted
                                                            @endif

                                                        </td>

                                                        <td>
                                                            @if( $merchant->top_rated ==0 )
                                                                <button wire:click="makeTopRated({{ $merchant->id }})" class="btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-app" viewBox="0 0 16 16">
                                                                        <path d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z"/>
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <button wire:click="removeTopRated({{ $merchant->id }})" class="btn">
                                                                    <img src="/images/medal.icon.png" style="width: 30px;height:40px" alt="">
                                                                </button>
                                                            @endif
                                                        </td>

                                                        {{ csrf_field() }}

                                                        </form>
                                                        </td>
                                                        <td><a href="{{route("show-admin-view-merchant", $merchant->id)}}" type="button" class="btn btn-sm showBtnRadius EditView actbtn">Switch</a></td>

                                                        <td>

                                                            @if( $merchant->accepted ==0 )
                                                            No offers
                                                            @elseif ($merchant->accepted==1)

                                                            <a href="{{ route('merchants.merchant-offers.index',['merchant_id' => $merchant->id]) }}" class="btn btn-sm showBtnRadius EditView actbtn" title="offers">
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Offers   </a>

                                                        @endif
                                                        </td>

                                                        <td>
                                                            @if( $merchant->activated ==0 )
                                                            <button wire:click="activate({{ $merchant->id }})" style="margin:0px 0px 4px 0px ; width:100px" type="button" class="btn showBtnRadius btn-sm EditView actbtn">Activate</button>
                                                            @else
                                                            <button wire:click="deactivate({{ $merchant->id }})" style=" width:100px" type="button" class="btn showBtnRadius btn-sm EditView actbtn">Deactivate</button>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    <div wire:loading wire:target="activate({{ $merchant->id }})">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="deactivate({{ $merchant->id }})">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                            @if ($showDeactivated)
                                                @if($merchant->accepted !== null && $merchant->activated == 0)
                                                    <tr style="font-size: 90%">


                                                        <td class="align-middle">
                                                            @if($merchant->logo)
                                                            <img src="{{ env('APP_URL') . '/public/assets/profile_pics/' .  $merchant->logo }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                                                            @endif
                                                        </td>

                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $merchant->business_name }}</td>
                                                        <td>{{ $merchant->country->name }}</td>

                                                        <td>
                                                            @if( $merchant->user !=null )
                                                            <a class="btn" href="{{ '/users'}}" style="text-decoration: underline;">{{ $merchant->user->name}}</a></td>
                                                            @else
                                                            {{$merchant->first_name . " " . $merchant->last_name}}</td>
                                                            @endif
                                                        <td>

                                                            @if( $merchant->accepted ==0 )
                                                            Not Accepted
                                                            @elseif ($merchant->accepted==1)
                                                            Accepted
                                                            @endif

                                                        </td>

                                                        <td>

                                                            @if( $merchant->accepted ==0 )
                                                            No offers
                                                            @elseif ($merchant->accepted==1)

                                                            <a href="{{ route('merchants.merchant-offers.index',['merchant_id' => $merchant->id]) }}" class="btn btn-primary btn-sm" title="offers">
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Offers   </a>

                                                        @endif
                                                        </td>

                                                        {{ csrf_field() }}

                                                        </form>
                                                        </td>
                                                        <td>
                                                            @if( $merchant->activated ==0 )
                                                            <button wire:click="activate({{ $merchant->id }})" style="margin:0px 0px 4px 0px ; width:100px" type="button" class="btn btn-outline-success">Activate</button>
                                                            @else
                                                            <button wire:click="deactivate({{ $merchant->id }})" style=" width:100px" type="button" class="btn btn-outline-danger">Deactivate</button>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    <div wire:loading wire:target="activate({{ $merchant->id }})">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="deactivate({{ $merchant->id }})">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="showActivated()">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div wire:loading wire:target="showDeactivated()">
                                                        <div class="popupLoading1">
                                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


            </div>
        </div>


    </div>

    <br><br><br>




    <div class="container">
        <div class="row">
            <div class="col-md-9 cardSize" style="width:100% ;">

                    <div >

                        <h2>Requested Merchants</h2>
                    </div>
                    <div class="card-body">



                        {{-- LIVEWIRE(CHECKBOXES) --}}



                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Business Name</th>
                                        <th>Country </th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>ZipCode</th>
                                        <th>Phone Number</th>
                                        <th>Merchant Subcategory</th>
                                        <th>How did you know about us?</th>
                                        <th>User </th>
                                        <th>Actions</th>

                                        <!-- <th>Actions</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($merchants as $merchant)
                                    @if($merchant->accepted === null)
                                    <tr style="font-size: 90%">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $merchant->business_name }}</td>
                                        <td>{{ $merchant->country->name }}</td>
                                        <td>{{ $merchant->city }}</td>
                                        <td>{{ $merchant->address }}</td>
                                        <td>{{ $merchant->zipcode }}</td>
                                        <td>{{ $merchant->country_code . $merchant->phone_number}}</td>
                                        <td>{{ $merchant->merchantSubCategory->name }}</td>
                                        <td>{{ $merchant->hear_about_us }}</td>
                                        <td>
                                            @if( $merchant->user !=null )
                                            <a class="btn " href="{{ '/users'}}" style="text-decoration: underline;">{{ $merchant->user->name}}</a></td>
                                            @else
                                            {{$merchant->first_name . " " . $merchant->last_name}}</td>
                                            @endif
                                        <td>
                                            <button wire:click="accept({{ $merchant->id }})" style="margin:0px 0px 4px 0px ; width:100px" type="button" class="btn showBtnRadius btn-sm EditView actbtn">Accept</button>

                                            <button wire:click="decline({{ $merchant->id }})" style=" width:100px" type="button" class="btn showBtnRadius btn-sm EditView actbtn">Decline</button>

                                        </td>


                                        {{ csrf_field() }}

                                        </form>
                                        </td>
                                    </tr>
                                    <div wire:loading wire:target="accept({{ $merchant->id }})">
                                        <div class="popupLoading">
                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div wire:loading wire:target="decline({{ $merchant->id }})">
                                        <div class="popupLoading">
                                            <div class="la-ball-clip-rotate la-dark la-3x">
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
        <br><br>
    </div>



    </div> {{-- whole page div --}}
