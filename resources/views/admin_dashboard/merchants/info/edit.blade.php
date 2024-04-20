@extends('app-view.layouts')
@section('content')


{{-- <div class="card">
  <div class="card-header">Edit Info</div>
  <div class="card-body">

    <form action="{{ route('my-merchant.update',$merchant->id)}}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      {{method_field('put')}}
      <label><p style="font-weight:bold;margin:0">Logo</p> </label><br>
     Update this picture ? <img src="{{  env('APP_URL') . '/assets/merchants_pics/' .   $merchant->logo }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 70px;object-fit: cover" alt="" />
     <br>  <br>
              <input type="file" placeholder="Replace the File" name="logo" id="logo"  class="form-control"><br>


     <label>Business Name</label><br>
     <input required type="text" name="business_name" id="business_name" value="{{$merchant->business_name}}"  class="form-control"><br>

     <label>First name</label><br>
     <input required type="text" name="first_name" id="first_name" value="{{$merchant->first_name}}"  class="form-control"><br>

     <label>Last name</label><br>
     <input required type="text" name="last_name" id="last_name" value="{{$merchant->last_name}}"  class="form-control"><br>

     <label>Email</label><br>
     <input required type="email" name="email" id="email" value="{{$merchant->email}}"  class="form-control"><br>

     <label>City</label><br>
     <input required type="text" name="city" id="city" value="{{$merchant->city}}"  class="form-control"><br>

     <label>Address</label><br>
     <input required type="text" name="address" id="address" value="{{$merchant->address}}"  class="form-control"><br>

     <label>Zip-Code</label><br>
     <input required type="text" name="zipcode" id="zipcode" value="{{$merchant->zipcode}}"  class="form-control"><br>

     <label>Phone number</label><br>
     <input required type="text" name="phone_number" id="phone_number" value="{{$merchant->phone_number}}"  class="form-control"><br>

     <label>Merchant Sub Category</label><br>
     <input type="text" name="business_name" id="business_name" value="{{$merchant->business_name}}"  class="form-control"><br>
    


            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"><br>
        </form>

    </div>
</div>
<br><br> --}}


<div class="arrowBack" style="margin-bottom: 1rem;">
  <a href="{{ route('info.merchants') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
      </svg>
  </a>
</div>
<div class="CreatePost">
  <h1>Edit About-us</h1>

  <div style="color: red; margin-bottom: 0.5rem">
      @if($errors->any())
      {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
      @endif
  </div>
  <form action="{{ route('my-merchant.update',$merchant->id) }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method("PUT")
      <h5>Business Name</h5>
      <input type="text" name="business_name" class="CreatePostInput" id="business_name" value="{{$merchant->business_name}}">

      <h5>First name</h5>
      <input type="text" name="first_name" class="CreatePostInput" id="first_name" value="{{$merchant->first_name}}">

      <h5>Last name</h5>
      <input type="text" name="last_name" class="CreatePostInput" id="last_name" value="{{$merchant->last_name}}">

      <h5>Email</h5>
      <input type="email" name="email" class="CreatePostInput" id="email" value="{{$merchant->email}}">

      <h5>City</h5>
      <input type="text" name="city" class="CreatePostInput" id="city" value="{{$merchant->city}}">
      
      <h5>Address</h5>
      <input type="text" name="address" class="CreatePostInput" id="address" value="{{$merchant->address}}">
      
      <h5>Zip-Code</h5>
      <input type="text" name="zipcode" class="CreatePostInput" id="zipcode" value="{{$merchant->zipcode}}">
      
      <h5>Country code</h5>
      <select class="CreatePostInput" name="country_code" aria-label="Default select example">
        @foreach($countriesCodes as $countriesCode)
          <option value="+{{$countriesCode}}" @if($countriesCode == $merchant->country_code) selected @endif>+{{$countriesCode}}</option>
        @endforeach
      </select>
      
      <h5>Phone number</h5>
      <input type="text" name="phone_number" class="CreatePostInput" id="phone_number" value="{{$merchant->phone_number}}">
      
      <h5>Picture (want to replace This photo ?)</h5>
      <div class="editPostImage">
          @if($merchant->logo != null)
              <img src="{{ env('APP_URL') . '/assets/merchants_pics/' .   $merchant->logo }}" alt="" />
          @else
            <div class="messageIcon" style="height:200px; width:200px;margin:1rem 1rem 0 0;border-radius:2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                </svg>
            </div>
          @endif
          <input type="file" name="logo" accept=".jpeg,.png,.jpg,.gif,.svg" id="logo">
      </div>


      <input type="submit" class="CreatePostBtn" value="Edit">
  </form>
</div>
<br>
<br>
<br>
@endsection
