@extends('app-view.layouts')
@section('content')
{{-- <div class="card">
    <div class="card-header">Editing Country</div>
    <div class="card-body">

        <form action="{{route('countries.update',$Country->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{method_field('put')}} 
            <label>Title</label><br>
            <input type="text" name="name" id="name" value="{{$Country->name}}" class="form-control"><br>

            <label>Currency</label><br>
            <input type="text" name="currency" id="currency" value="{{$Country->currency}}" class="form-control"><br>
            <label>Country code</label><br>
            <input type="text" name="country_code" id="country_code" value="{{$Country->country_code}}" class="form-control"><br>
            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            <div style="color: green">
                {{ session()->get('message') }}
            </div>
            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"><br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Editing Country</h1>
    <form action="{{ route('countries.update',$Country->id)}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Country Name</h5>
        <input type="text" class="CreatePostInput" name="name" id="name" value="{{$Country->name}}">

        <h5>Currency</h5>
        <input type="text" class="CreatePostInput" name="currency" id="currency" value="{{$Country->currency}}">

        <h5>Country Code</h5>
        <input type="text" class="CreatePostInput" name="country_code" id="country_code" value="{{$Country->country_code}}">

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>
@endsection