@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Create a new Branch</div>
    <div class="card-body">



        <form action="{{route('merchant-branches.store')}}" method="post"  >
            {!! csrf_field() !!}
            {{method_field('post')}}

            <input type="text" value="{{Auth::user()->merchant->id}}" hidden name="merchant_id">

         <label for="country_id">Country:</label> &nbsp;
              <select name="country_id" id="country_id">
                @foreach($countries as $country)
               <option value="{{$country->id}}"> {{$country->name}}</option>
               @endforeach
            </select>
     <br><br>
            <label for="city" >City:</label><br>
            <input type="text" name="city" id="city" class="form-control"><br>

            <label for="longitude" >Longitude:</label><br>
            <input type="text" name="longitude" id="longitude"  class="form-control"><br>

            <label for="latitude" >Latitude:</label><br>
            <input type="text" name="latitude" id="latitude" class="form-control"><br>

            <label for="language" >Language:</label><br>
            <input type="text" name="language" id="language"  class="form-control"><br>


          

           

            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            
            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> <br>
        </form>

    </div>
</div> --}}
<div class="CreatePost">
    <h1>Edit Branch</h1>
    <form action="{{ route('merchant-branches.store')}}" method="post" >
        {!! csrf_field() !!}
        @method("POST")

        <h5>Country</h5>
        <select class="CreatePostInput" name="country_id" aria-label="Default select example">
            @foreach($countries as $country)
            <option value="{{$country->id}}"> {{$country->name}}</option>
            @endforeach
        </select>

        <h5>City</h5>
        <input type="text" class="CreatePostInput" name="city" id="city">

        <h5>Longitude</h5>
        <input type="text" class="CreatePostInput" name="longitude" id="longitude">
        
        <h5>Latitude</h5>
        <input type="text" class="CreatePostInput" name="latitude" id="latitude">
        
        <h5>Language</h5>
        <input type="text" class="CreatePostInput" name="language" id="language">

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Submit">
    </form>
</div>
@endsection


