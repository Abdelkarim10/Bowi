@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Creating term</div>
    <div class="card-body">



        <form action="{{ url('term') }}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <label>Title</label><br>
            <input type="text" name="title" id="title" class="form-control"><br>

            <label>Term</label><br>
            <input type="term" name="term" id="term" class="form-control"><br>
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
    <h1>Add New term</h1>
    <form action="{{ url('term') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <h5>Title</h5>
        <input class="CreatePostInput" type="text" name="title" id="title">

        <h5>Term</h5>
        <textarea class="CreatePostInput" type="text" name="term" id="term" style="height: 200px;resize:none"></textarea>
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save" >
    </form>
</div>
@endsection