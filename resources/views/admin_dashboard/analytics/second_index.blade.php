@extends('app-view.layouts')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>

    <div class="AdminAna">
      <div class="AnalyticContainers">
          <div class="AnalyticContainer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
              </svg>
              <div>
                  <p style="margin: 0"><b>Number of users :</b></p>
                  <p style="margin: 0">{{$nbOfAllUsers}}</p>
              </div>
          </div>
          <div class="AnalyticContainer">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                  <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
              </svg>
              <div>
                  <p style="margin: 0"><b>Most ordered type this month:</b></p>
                  <p style="margin: 0">{{$mostUsedType->name}}</p>
              </div> 
          </div>
          <div class="AnalyticContainer">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                  <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
              </svg>
              <div>
                  <p style="margin: 0"><b>Most merchant ordered from this month:</b></p>
                  <p style="margin: 0">{{$mostMerchant->business_name}}</p>
              </div>
          </div>
      </div>
  
      <div class="analyticsTopBtns"> 
          <div class="analyticsBtnsHub">
            <a href="/analytics">Payments Received</a>
            <a href="/analytics1" style="color: white ; background-color: black;">Created Users</a>
            <a href="/analytics2">Redeemed Offers</a>
            <a href="/analytics3">Money Saved</a>
          </div>
          {{-- <a href="/system_analytics/table" class="createBtn"> 
            Tables  &nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right " viewBox="0 0 16 16" style="size: 20px">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>  
          </a>  --}}
      </div>
        <h2 >Created Users</h2>
        <div class="graph">
            <div style="width: 70%;">
                <canvas  id="createdUsers" width="70" height="30"></canvas>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row">
                <h2>Users</h2>
                <div class="col-md-9" style="width:100% ;">
                   
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Profile Pic</th>
    
                                            <th>Nb</th>
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
        </div> --}}
  
  </div>
  <br>
  <br>
<script  type="text/javascript">  

    var users = [
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0
      ];

    @php
    
    $users = json_decode($users, true);

    for($i = 0;$i < count($users);$i++){
      echo "users[" . ($users[$i]['month'] - 1) . "] = " . $users[$i]['num'] . ";";
    }

    @endphp

    console.log(users);

    getCreatedUsers(users);
    
</script>
@endsection