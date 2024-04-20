@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:50% ;">
 
    <div class="card-body">
       
        <div class="card-body">
            <h2 class="card-title">Name: {{ $product->name }}</h2>
            <br>
            <h6 class="card-text"> Product Category: &nbsp;{{ $product->productCategory->name }}
            <br>
            <h6 class="card-text"> Price: &nbsp;{{ $product->price }}$
            <br><br>
            <h6 class="card-text" style="font-weight: 700">Created-At : {{ $product->created_at }}</h6>

        </div>
    </div>
</div>
<br> --}}

<div class="arrowBack">
    <a href="{{ route('my-products.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
    </a>
</div>
<div class="profileContainer">
    <div class="singlePostHeader" style="flex-direction: column;justify-content: start;margin-right:0.5rem ">
        @if($product->picture)
        <div class="messageIcon" style="width: 300px;border-radius: 0.5rem;overflow:hidden">
            <img src="{{  env('APP_URL') . '/assets/product_pics/' .   $product->picture }}" style="height: 300px; width: 300px;object-fit: cover" alt="" />
        </div>
        @else
            <div class="messageIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
            </div>
        @endif
        <h5><b>product Name :&nbsp;&nbsp;</b>{{$product->name}}</h5>
        <form>
            <button formaction="{{ route('my-products.edit',$product->id) }}" class="createBtn" title="Edit" style="margin-bottom: 0.5rem;border:none">Edit</button>
        </form>
    </div>
    <div class="singleMessageContent" >
        <p><b>Type :&nbsp;&nbsp;</b>{{$product->productCategory->name}}</p>
        <p><b>Price :&nbsp;&nbsp;</b>{{$product->price .' '. $merchant->country->currency}}</p>
        @if($product->created_at)
            <p><b>Created date :&nbsp;&nbsp;</b> {{ $product->created_at->format('d/m/Y') }}</p>
        @endif
        <p><b>Description :&nbsp;&nbsp;</b>{{$product->description}}</p>
    </div>
</div>
@endsection