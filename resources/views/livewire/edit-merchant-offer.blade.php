<div class="CreatePost" style="margin-left: 0; width:100%">
  {{-- <h5 >Offer Type</h5>
  <div style="margin-bottom: 0.5rem">
    @foreach($offertypes as $offertype)
      <input required 
        @if($offertype->id ==1) 
          wire:click="showProduct2" 
        @elseif($offertype->id ==2) 
          wire:click="showDiscount"
        @endif
        @if(isset($offer))
          @if($offertype->id == $offer->type_id) 
            checked 
          @endif
        @endif
      style="margin:0px 3px 0px 0px" name="type_id" type="radio" value="{{$offertype->id}}">{{$offertype->name}} &nbsp;&nbsp;
    @endforeach
  </div> --}}
  
  

  <h5>Product 1 </h5>
  <select required name="product1_id" @if(isset($offer))value="{{$offer->product1}}" @endif id="product1_id" class="CreatePostInput">
  @foreach($products as $product)
    <option value="{{$product->id}}" 
      @if(isset($offer))
        @if($product->id == $offer->product1_id) 
          selected
        @endif
      @endif>
      {{$product->name}}
    </option>
  @endforeach
  </select>

  @if($showProduct2 || $offer->type_id == 1)
    <h5>Product 2 </h5>
      <select required name="product2_id" id="product2_id" class="CreatePostInput">
        @foreach($products as $product)
          <option value="{{$product->id}}"
            @if(isset($offer))
              @if($product->id == $offer->product2_id) 
                  selected
              @endif
            @endif>
            {{$product->name}}</option>
        @endforeach
    </select>
  @endif
  @if($showDiscount || $offer->type_id == 2)
          <h5>Discount</h5>
    <input required type="double" name="discount" 
      @if(isset($offer))
        value="{{$offer->discount}}" 
      @endif 
      id="discount" class="CreatePostInput">
  @endif
  
</div>
