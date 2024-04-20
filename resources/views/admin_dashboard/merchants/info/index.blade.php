@extends('app-view.layouts')
@section('content')

    <br><br>
<div style="width:98%;display:flex;flex-direction:row">
        <div class="container">
            <div class="row">
                <div  style="background-color: white">

                    <h1>My Info <span style="color: green">{{ session()->get('message') }}</span></h1>
                </div>
                <br><br>
                <div class="col-md-9" style="width:95% ;display:flex;flex-direction:row">
                    
                        
                    <div style="width:15%;display:flex;flex-direction:row"></div>
                        <div  style="width:25%;display:flex;flex-direction:row">
                            
                                <div style="display:flex;flex-direction:column;justify-content:center">
                                   
                                    <p><b> Business Name :</b>  {{ $merchant->business_name }}</p>
                                    <p><b> First name : </b> {{ $merchant->first_name }}</p>
                                    <p><b> Last name : </b> {{ $merchant->last_name }}</p>                       
                                    <p><b> Email : </b> {{ $merchant->email }}</p>
                                    <p><b> City : </b> {{ $merchant->city }}</p>
                                    <p><b> Address : </b> {{ $merchant->address }}</p>
                                    <p><b> Zip-Code : </b> {{ $merchant->zipcode }}</p>
                                    <p><b> Phone Number : </b> {{ $merchant->country_code . $merchant->phone_number }}</p>
                                    <p><b> Merchant Sub Category :</b>{{ $merchant->merchantSubCategory->name }}</p>
                                   

                                </div>
                        </div> 
                           
                                    <div  style="width:8%;margin:0 0 0 20px;padding:25px 0 0 0;display:flex;flex-direction:row">
                                        <div class="d-flex" style="height: 450px;">
                                            <div class="vr"></div>
                                         </div>
                                    
                                    </div> 
                                      
                        
                                            <div  style="width:45%;display:flex;flex-direction:row">
                                              <h5 class="card-title" >Logo: </h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <table style="border:none" >
                                                <thead>
                                                    
                                                    <th style="border:none">
                                                        @if(isset($merchant->logo))
                                                        <img
                                                        src="{{ env('url') . '/assets/merchants_pics/' .   $merchant->logo }}"
                                                        class="img-fluid "
                                                        style="height:300px; object-fit: cover"
                                                        alt="" />
                                                        @else
                                                            <div class="messageIcon" style="height:300px; width:300px;margin:1rem 0 0 0;border-radius:2rem;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="220" height="220" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                                                </svg>
                                                            </div>
                                                        @endif 
                                                     </th>

                                                </thead>
                                                <tbody>
                                                    <td style="border:none">
                                                        <p><a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('edit.info.merchants',$merchant->id) }}" title="edit info"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a></p>
                                                      </td> 
                                               

                                                </tbody>
                                                       
                                                          
                                            
                                                </table>
                                          
                                                  
                                            
                                            
                                            </div>   
                                             



                         
                        
                </div>
            </div>
        </div>

    
</div>
       
         <br><br>
       
  

       </div>

         <br><br>



@endsection
