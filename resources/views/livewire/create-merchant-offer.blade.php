<div class="CreatePost" style="margin-left: 0; width:100%">
  
        {{-- <h5>Question</h5>
        <input class="CreatePostInput" type="text" name="question" id="question">

        <h5>Answer</h5>
        <textarea class="CreatePostInput" type="text" name="answer" id="answer" style="height: 200px;resize:none"></textarea> --}}
        
  @if(!str_contains(Route::currentRouteName(),"edit"))
    <h5>Name @if($offersCount < 3)of the first offer @endif</h5>
    <input class="CreatePostInput" type="text" name="name" id="name" required>

    <h5 style="margin-bottom: 0.5rem">Picture</h5>
    <input type="file" name="picture" id="picture" required style="margin-bottom: 1rem">

    <h5 style="margin-bottom: 0.5rem">Offer Type</h5>
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
        style="margin:0 3px 0 0" name="type_id" type="radio" value="{{$offertype->id}}"><span style="margin-right:1rem">{{$offertype->name}}</span>
      @endforeach
    </div>

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

    @if($showProduct2)
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
    @if($showDiscount)
      <h5>Discount</h5>
      <input required type="double" name="discount" 
        @if(isset($offer))
          value="{{$offer->discount}}" 
        @endif 
        id="discount" class="CreatePostInput">
    @endif
     
    <h5>Condition </h5>
    <select required name="condition" id="condition" class="CreatePostInput">
        <option>Dine-in</option>
        <option>Takeaway</option>
    </select>

    <h5>Estimated Saving for offer 1</h5>
    <input type="number" name="estimated_saving" id="estimated_saving"   class="CreatePostInput">

    



    @if(!isset($offer))
      @if($offersCount < 3)
        <hr style="border: 5px solid;border-radius:2rem">
        <h5>Name of the second offer</h5>
        <input type="text" name="name1" id="name1" class="CreatePostInput" required>

        <h5>Picture</h5>
        <input type="file" name="picture1" id="picture1" style="margin-bottom: 1rem" required>

        <h5 style="margin-bottom: 0.5rem">Offer Type</h5>
        <div style="margin-bottom: 0.5rem">
          @foreach($offertypes as $offertype)
            <input required 
              @if($offertype->id ==1) 
                wire:click="showProduct21" 
              @elseif($offertype->id ==2) 
                wire:click="showDiscount1"
              @endif
            style="margin:0px 3px 0px 0px" name="type_id1" type="radio" value="{{$offertype->id}}"><span style="margin-right:1rem">{{$offertype->name}} </span>
          @endforeach
        </div>
        
        

        <h5>Product 1 </h5>
        <select required name="product1_id1" id="product1_id1" class="CreatePostInput">
        @foreach($products as $product)
          <option value="{{$product->id}}">
            {{$product->name}}
          </option>
        @endforeach
        </select>

    

        @if($showProduct21)
          <h5>Product 2 </h5>
            <select required name="product2_id1" id="product2_id1" class="CreatePostInput">
              @foreach($products as $product)
                <option value="{{$product->id}}">
                  {{$product->name}}</option>
              @endforeach
          </select>
        @endif
        @if($showDiscount1)
                <h5>Discount</h5>
          <input required type="double" name="discount1" id="discount1" class="CreatePostInput">
        @endif
        
        <h5>Condition </h5>
        <select required name="condition1" id="condition1" class="CreatePostInput">
            <option>Dine-in</option>
            <option>Takeaway</option>
        </select>
        <h5 for="estimated_saving1">Estimated Saving for offer 2</h5>
        <input class="CreatePostInput" type="number" name="estimated_saving1" id="estimated_saving1"   class="CreatePostInput">




      <hr style="border: 5px solid;border-radius:2rem">

      <h5>Name of the third offer</h5>
      <input type="text" name="name2" id="name2" class="CreatePostInput" required>

      <h5 style="margin-bottom: 0.5rem">Picture</h5>
      <input type="file" name="picture2" id="picture2" required style="margin-bottom: 1rem"> 

      <h5 style="margin-bottom: 0.5rem">Offer Type</h5>
      <div style="margin-bottom: 0.5rem">
        @foreach($offertypes as $offertype)
          <input required 
            @if($offertype->id ==1) 
              wire:click="showProduct22" 
            @elseif($offertype->id ==2) 
              wire:click="showDiscount2"
            @endif
          style="margin:0px 3px 0px 0px" name="type_id2" type="radio" value="{{$offertype->id}}">{{$offertype->name}} &nbsp;&nbsp;
        @endforeach
      </div>
      
      

      <h5>Product 1 </h5>
      <select required name="product1_id2" id="product1_id2" class="CreatePostInput">
      @foreach($products as $product)
        <option value="{{$product->id}}">
          {{$product->name}}
        </option>
      @endforeach
      </select>

      @if($showProduct22)
        <h5>Product 2 </h5>
          <select required name="product2_id2" id="product2_id2" class="CreatePostInput">
            @foreach($products as $product)
              <option value="{{$product->id}}">
                {{$product->name}}</option>
            @endforeach
        </select>
      @endif
      @if($showDiscount2)
              <h5>Discount</h5>
        <input required type="double" name="discount2" id="discount2" class="CreatePostInput">
      @endif
      
      <h5>Condition </h5>
      <select required name="condition2" id="condition2" class="CreatePostInput">
          <option>Dine-in</option>
          <option>Takeaway</option>
      </select>
      <h5 for="estimated_saving2">Estimated Saving for offer 3</h5>
      <input class="CreatePostInput" type="number" name="estimated_saving2" id="estimated_saving2"   class="CreatePostInput">
      @endif
    @endif
  @endif
</div>
