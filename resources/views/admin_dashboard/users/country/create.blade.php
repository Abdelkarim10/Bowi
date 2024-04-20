@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Adding Country</div>
    <div class="card-body">



        <form action="{{ url('countries') }}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <label>Name</label><br>
            <input type="text" name="name" id="name" class="form-control"><br>

            <label>Currency</label><br>
            <input type="text" name="currency" id="currency" class="form-control"><br>

            <label>Country code</label><br>
            <input type="text" name="country_code" id="country_code" class="form-control"><br>

            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            <div style="color: green">
                {{ session()->get('message') }}
            </div>
            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> <br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Add Country</h1>
    <form action="{{ url('countries') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <h5>Country Name</h5>
        <input class="CreatePostInput" type="text" name="name" id="name">

        <h5>Currency</h5>
        <input class="CreatePostInput" type="text" name="currency" id="currency">
        
        <h5>Country Code</h5>
        <input class="CreatePostInput" type="text" name="country_code" id="country_code">
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save" >
    </form>
</div>
@endsection