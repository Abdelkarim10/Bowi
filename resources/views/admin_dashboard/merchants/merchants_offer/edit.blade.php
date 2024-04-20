@extends('app-view.layouts')
@section('content')


{{-- <div class="card">
  <div class="card-header">Request Edit For Offer</div>
  <div class="card-body">

    <form action="{{ url('/request-for-edit') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}

      <input type="text" name="offer_id" id="offer_id" value="{{$offer->id}}"  class="form-control" hidden>
      <input type="text" name="expired_date" id="expired_date" value="{{$offer->expired_date}}"  class="form-control" hidden>

      <label>Name</label><br>
      <input type="text" name="name" id="name" value="{{$offer->name}}"  class="form-control"><br>

      <label>Picture</label><br>
     Update this picture ? <img src="{{  env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 70px;object-fit: cover" alt="" />
               <br>
              <input type="file" placeholder="Replace the File" name="picture" id="picture"  class="form-control"><br>


   @livewire('edit-merchant-offer',['offertypes'=>$offertypes,'products'=>$products,'offer'=>$offer])


    <label>Condition </label><br>
      <select required name="condition" value="{{$offer->condition}}" id="condition" style="width:30% ;height:30px;">
         <option>Dine-in</option>
         <option>Takeaway</option>
        
    </select><br><br>
   
    <label for="estimated_saving">Estimated Saving</label><br>
    <input type="double" name="estimated_saving" id="estimated_saving" value="{{$offer->estimated_saving}}"  class="form-control"><br>

    </select>



    <label>Reason for edit</label><br>
    <textarea required name="reason" id="reason" class="form-control" style="height: 200px;resize:none"></textarea><br>

            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"><br>
        </form>

    </div>
</div>
<br>
<br> --}}

<div class="CreatePost">
  <h4>Request Edit For Offer</h4>
  <form action="{{ url('/request-for-edit') }}" method="post" enctype="multipart/form-data" >
      {!! csrf_field() !!}

      <input type="text" name="offer_id" id="offer_id" value="{{$offer->id}}" hidden>      
      <input type="text" name="expired_date" id="expired_date" value="{{$offer->expired_date}}" hidden>
      <input type="text" name="type_id" id="type_id" value="{{$offer->type_id}}" hidden> 

      <h5>Name</h5>
      <input type="text" name="name" class="CreatePostInput" id="name" value="{{$offer->name}}">

      <h5>Picture (want to replace This photo ?)</h5>
      <div class="editPostImage">
          @if($offer->picture != null)
              <img src="{{ env('APP_URL') . '/assets/offer_pics/' .   $offer->picture }}" alt="" />
          @else
              <img src="{{ asset('images/noimage.jpg/') }}" alt="">
          @endif
          <input type="file" name="picture" accept=".jpeg,.png,.jpg,.gif,.svg" id="picture">
      </div>

      @livewire('edit-merchant-offer',['offertypes'=>$offertypes,'products'=>$products,'offer'=>$offer])

      <h5>Condition </h5>
      <select required name="condition" value="{{$offer->condition}}" id="condition" class="CreatePostInput">
         <option>Dine-in</option>
         <option>Takeaway</option>
      </select>
    
      <h5 for="estimated_saving">Estimated Saving</h5>
      <input type="double" name="estimated_saving" id="estimated_saving" value="{{$offer->estimated_saving}}"  class="CreatePostInput">

      <h5>Reason for edit</h5>
      <textarea required name="reason" id="reason" class="CreatePostInput" style="height: 200px;resize:none"></textarea>

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
