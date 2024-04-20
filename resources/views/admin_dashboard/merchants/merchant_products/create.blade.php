@extends('app-view.layouts')
@section('content')


{{-- <div class="card">
  <div class="card-header">Creating Product</div>
  <div class="card-body">

    <form action="{{ url('/my-products') }}" method="post">
      {!! csrf_field() !!}
      <label>Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>

      <label>Product Category</label><br>
      <select required name="product_category_id" id="product_category" style="width:30% ;height:30px;">
              @foreach($productCategorys as $productCategory)
              <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
              @endforeach
          </select><br><br>
        

      <label>Price </label><br>
      <input type="text" name="price" id="price" class="form-control"><br>

      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"><br>
    </form>

  </div>
</div> --}}

<div class="CreatePost">
  <h4>Creating Product</h4>
  <form action="{{ route("my-products.store") }}" method="post" enctype="multipart/form-data" >
      {!! csrf_field() !!}

      <h5>Name</h5>
      <input type="text" name="name" class="CreatePostInput" id="name">

      <h5>Price</h5>
      <input type="text" name="price" class="CreatePostInput" id="price">

      <h5>Product Category </h5>
      <select required name="product_category_id" id="product_category_id" class="CreatePostInput">
          @foreach($productCategorys as $productCategory)
              <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
          @endforeach
      </select>
      
      <h5>Description</h5>
      <textarea required name="description" id="description" class="CreatePostInput" style="height: 200px;resize:none"></textarea>


      <h5>Picture (want to replace This photo ?)</h5>
      <div class="editPostImage">
          <img src="{{ asset('images/noimage.jpg/') }}" alt="">
          <input type="file" name="picture" accept=".jpeg,.png,.jpg,.gif,.svg" id="picture">
      </div>

      <div style="color: red; margin-bottom: 0.5rem">
          @if($errors->any())
            {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
          @endif
      </div>
      
      <input class="CreatePostBtn" type="submit" value="Save" >
      <br>
      <br>
      <br>
  </form>
</div>
@endsection