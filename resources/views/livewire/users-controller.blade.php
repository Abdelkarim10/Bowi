<div class="container">
    <div class="row">
        <div class="col-md-9 cardSize" >

                <div class="activationSet">

                    <h2> Users</h2>
                    <div style="display: flex; flex-direction:row">
                        <a href="/contact-us" class="createBtn">Contact us page</a>
                        <a href="#" class="createBtn" style="margin-left: 1rem">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                            </svg>
                            Extract into Excel sheet
                        </a>
                    </div>
                </div>

               <div style="display: flex; flex-direction:row ;justify-content:space-between;margin-top:2rem">
                    <div style="display: flex;flex-direction:row;align-items:center">
                        <button wire:click="showActivated" class="showBtn" @if ($showActivated) style="color: white ; background-color: black;"@endif>
                            Show activated users
                        </button>

                        <button wire:click="showDeactivated" class="showBtn" @if ($showDeactivated) style="color: white ; background-color: black;" @endif>
                            Show deactivated users
                        </button>
                    </div>
                    <div style="display: flex; flex-direction:row">
                        <select wire:model="age" class="selectBTn" aria-label="Default select example">
                            <option value="allAges">{{__('all ages')}}</option>
                            <option value="0-18">Below 18</option>
                            <option value="18-24">18 - 24</option>
                            <option value="25-29">25 - 29</option>
                            <option value="30-39">30 - 39</option>
                            <option value="40-49">40 - 49</option>
                            <option value="50+">Above 50</option>
                        </select>

                        <select wire:model="gender" class="selectBTn" aria-label="Default select example">
                            <option value="allGenders">{{__('all genders')}}</option>
                            <option value="Male">{{__('male')}}</option>
                            <option value="Female">{{__('female')}}</option>
                        </select>

                        <select wire:model="countryy" class="selectBTn" aria-label="Default select example">
                            <option value="allCountries">{{__('all countries')}}</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>

                        <select wire:model="userStatus" class="selectBTn" aria-label="Default select example">
                            <option value="allUsers">{{__('all users')}}</option>
                            @foreach($plans as $plan)
                                <option value="{{$plan->id}}">{{$plan->name}}</option>
                            @endforeach
                            <option value="subscribed">{{__('subscribed')}}</option>
                            <option value="unsubscribed">{{__('unsubscribed')}}</option>
                        </select>
                        <button wire:click="filterResult" class="createBtn" style="display:flex;align-items:center;border:none;border-radius:2rem">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="usersContainer">
                    @foreach($users as $user)
                        @if ($showActivated)
                            @if($user->activated ==1 )
                                {{-- <tr >
                                    <td class="align-middle">
                                        @if($user->profile_pic)
                                        <img src="{{  env('APP_URL') . '/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle"  alt="" />
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


                                    <td>{{ $user->country_code . $user->phone_number }}</td>
                                    <td>{{ $user->role->name }}</td>

                                    @if($user->plan != null)
                                        <td>{{ $user->plan->name}}</td>
                                    @else
                                        <td>Not Subscribed</td>
                                    @endif

                                    <td>
                                        <button wire:click="deactivate({{ $user->id }})" class="">Deactivate</button>
                                    </td>

                                    </td>
                                </tr> --}}
                                <div class="userContainer">
                                    <a class="selectSingleMessage" href="{{ route('users.show',$user->id) }}">
                                        <div class="logoTextLeft">
                                            @if($user->profile_pic)
                                                <img src="{{  env('APP_URL') . '/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle" style="width: 74px;height:74px;margin-right:1rem" alt="" />
                                            @else
                                                <div class="messageIcon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="messageHeader" style="overflow:hidden">
                                                <p style="font-size: 30px;font-size: 0.9vw;">{{ $user->name }}</p>
                                                <p style="font-size: 30px;font-size: 0.9vw;">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    <button wire:click="deactivate({{ $user->id }})" class="Btn1" style="border: none;margin-top:0.5rem">Deactivate</button>
                                </div>
                            @endif
                        @endif
                        @if ($showDeactivated)
                            @if($user->activated ==0 )
                                {{-- <tr >
                                    <td class="align-middle">
                                        @if($user->profile_pic)
                                        <img src="{{  env('APP_URL') . '/public/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle"  alt="" />
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

                                    @if($user->plan != null)
                                        <td>{{ $user->plan->name}}</td>
                                    @else
                                        <td>Not Subscribed</td>
                                    @endif

                                    <td>
                                        <button wire:click="activate({{ $user->id }})" style=" width:100px" type="button" class="btn btn-sm EditView  actbtn" >Activate</button>
                                    </td>

                                    </td>
                                </tr> --}}
                                <div class="userContainer">
                                    <a class="selectSingleMessage" href="{{ route('users.show',$user->id) }}">
                                        <div class="logoTextLeft">
                                            @if($user->profile_pic)
                                                <img src="{{  env('APP_URL') . '/assets/profile_pics/' .   $user->profile_pic }}" class="img-fluid rounded rounded-circle" style="width: 74px;height:74px;margin-right:1rem" alt="" />
                                            @else
                                                <div class="messageIcon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="messageHeader" style="overflow:hidden">
                                                <p style="font-size: 30px;font-size: 0.9vw;">{{ $user->name }}</p>
                                                <p style="font-size: 30px;font-size: 0.9vw;">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                    <button wire:click="activate({{ $user->id }})" class="Btn1" style="border: none;margin-top:0.5rem">Activate</button>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    
                </div>
                <div wire:loading wire:target="deactivate({{ $user->id }})">
                    <div class="popupLoading1">
                        <div class="la-ball-clip-rotate la-dark la-3x">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div wire:loading wire:target="activate({{ $user->id }})">
                    <div class="popupLoading1">
                        <div class="la-ball-clip-rotate la-dark la-3x">
                            <div></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <br>
    {{-- <div class="row" style="width:95% ;margin:auto">
        <label style="padding: 0;">Notification:</label>
        <input type="text" style="width:25% ;height:25px;margin-right:5px;">
        <button type="submit" class="btn btn-primary" style="width:5% ;height:30px;padding:0;">Notify</button>
    </div>
    <br>
    <br> --}}
</div>
