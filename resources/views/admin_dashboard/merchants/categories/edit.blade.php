@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">
    <div class="card-header">Editing Categories</div>
    <div class="card-body">



        <form action="{{ route('categories.update',$cat->id)}}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            {{method_field('put')}}
            <label for="name" >Name:</label><br>
            <input type="text" name="name" id="name" value="{{$cat->name}}" class="form-control"><br>
            <label>Replace This photo ?</label><br><br>

            <img
                 src="{{ env('APP_URL') . '/images/category/' .   $cat->image }}"
                 class="img-fluid rounded rounded-circle"
                 style="height:70px; width:75px;object-fit: cover"
                 alt="" />
                 <br><br>
            <input type="file" name="image" id="image" class="form-control"><br>

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
    <h1>Editing Category</h1>
    <form action="{{ route('categories.update',$cat->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Title</h5>
        <input type="text" name="name" class="CreatePostInput" id="name" value="{{$cat->name}}">

        <h5>Image (want to replace This photo ?)</h5>
        <div class="editPostImage">
            <img src="{{ env('APP_URL') . '/images/category/' .   $cat->image }}" alt="" />
            <input type="file" accept=".jpeg,.png,.jpg,.gif,.svg" name="image" id="image">
        </div>

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
            {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>
@endsection
