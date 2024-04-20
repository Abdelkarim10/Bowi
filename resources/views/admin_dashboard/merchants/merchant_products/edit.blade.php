@extends('app-view.layouts')
@section('content')


{{-- <div class="card">
    <div class="card-header">Editing Product</div>
    <div class="card-body">

        <form action="{{ url('/my-products') }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$product->id}}" id="id" />

            <label>Name</label><br>
            <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control"><br>

      
            <label>Product Category</label><br>
            
          <select required name="product_category_id" id="product_category_id" style="width:30% ;height:30px;">
              @foreach($productCategorys as $productCategory)
              <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
              @endforeach
            </select><br><br>
          
      
            <label>Price </label><br>
            <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control"><br>



            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h4>Editing Product</h4>
    <form action="{{ route('my-products.update',$product->id) }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        @method("PUT")
  
        <input type="hidden" name="id" id="id" value="{{$product->id}}"/>
        <h5>Name</h5>
        <input type="text" name="name" class="CreatePostInput" id="name" value="{{$product->name}}">
  
        <h5>Price</h5>
        <input type="text" name="price" class="CreatePostInput" id="price" value="{{$product->price}}">

        <h5>Product Category </h5>
        <select required name="product_category_id" id="product_category_id" class="CreatePostInput">
            @foreach($productCategorys as $productCategory)
                <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
            @endforeach
        </select>
        
        <h5>Description</h5>
        <textarea required name="description" id="description" class="CreatePostInput" style="height: 200px;resize:none">{{$product->description}}</textarea>
  
  
        <h5>Picture (want to replace This photo ?)</h5>
        <div class="editPostImage">
            @if($product->picture != null)
                <img src="{{ env('APP_URL') . '/assets/product_pics/' .   $product->picture }}" alt="" />
            @else
                <img src="{{ asset('images/noimage.jpg/') }}" alt="">
            @endif
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