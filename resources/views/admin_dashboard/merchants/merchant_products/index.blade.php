@extends('app-view.layouts')
@section('content')

    {{-- <br><br>
<div style="width:98%;display: flex">
        <div class="container">
            <div class="row">
                <div class="col-md-9 cardSize">
                    
                        <div class="titleBackground"  style="background-color: white">

                            <h2 style="float: left">My Products</h2>
                            <a href="{{ route('my-products.create') }}"  class="btn btn-dark" style="float: right"><svg xmlns="http://www.w3.org/2000/svg" width="16"  fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg> Create Product</a>
                            
                           
                        </div>
                        <br>

                    
                        <div class="card-body">
                            <br>
                            <br />
                            @if($products->count() != 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Product Category</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                        
                                            <tr style="font-size: 90%">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->productCategory->name }}</td>
                                                <td>{{ $product->price }}$</td> 

                                                <td> <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('my-products.show',$product->id) }}" title="View product"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                    <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('my-products.edit',$product->id) }}" title="Edit  product"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                    <form method="POST" action="{{ route('my-products.destroy',$product->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete  product" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div style="display:flex;justify-content:center;">
                                    <h3 style="color: gray"> There is no products </h3>
                                </div>
                            @endif
                            <br>
                        </div>
                    
                </div>
            </div>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <h2>My Products</h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <div style="display:flex; flex-direction:row">
            <a href="{{ route('my-products.create') }}" title="Create Product" class="createBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Create Product
            </a>
        </div>
    </div>
    @foreach($products as $product)
        <a class="selectSingleMessage" href="{{ route('my-products.show',$product->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;padding:0">
                <div class="logoTextLeft">
                    @if($product->picture == null)
                        <div class="messageIcon" style="border-radius: 0.5rem 0 0 0.5rem;width: 100px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </div>
                    @else
                        <div class="messageIcon" style="width: 110px;border-radius: 0.5rem 0 0 0.5rem;overflow:hidden">
                            <img src="{{  env('APP_URL') . '/assets/product_pics/' .   $product->picture }}" style="height: 100px; width: 100px;object-fit: cover" alt="" />
                        </div>
                    @endif
                    <div class="messageHeader"  style="margin: 0.3rem 0">
                        <h5 style="margin-bottom: 1rem">{{ $product->name }}</h5>
                        <h6>{{ $product->productCategory->name }}</h6>
                    </div>
                </div>
                {{-- <div class="dateBtn" style="margin: 0.3rem 0.3rem 0.3rem 0">
                    <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('my-products.edit',$product->id) }}" title="Edit" style="margin-bottom: 0.5rem">Edit</button>
                        </form>
                    </div>
                    <p>{{ $product->created_at }}</p>
                </div> --}}
                <div class="messageIcon" style="margin:0;width: 100px;border-radius: 0 0.5rem 0.5rem 0;overflow:hidden">
                    {{ $product->price .' '. $merchant->country->currency }}
                </div>
            </div>
        </a>
    @endforeach
    <span> {{$products->onEachSide(1)->links()}}</span>
</div>
<br>
<br>
@endsection