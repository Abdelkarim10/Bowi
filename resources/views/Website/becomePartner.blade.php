@extends('Website.components')

@section('content')

    <div class="header-content">
        <div class="container grid-2">
        <div class="column-1">
            <h1 class="header-title header47" >{{__('Promote your Business with Bowi.')}}</h1>
            <p class="text">
              {{__('Reach New Customers. Build Loyalty. Become a True Destination. Get started today for only $50 a year!')}}
            </p>
        </div>

        <div class="column-2 bapCol">
            <div class="infoFrom">
                <h3>{{__('Sign up to get started')}}</h3>
                <form  method="POST" action="{{ route('becomePartner.store') }}">
                  @csrf
                    <input class="textInput" name="business_name" type="text" placeholder="{{__('Business Name')}}" >
                    <div class="doubleInput">
                      <select required name="country_id" class="form-select selectInput" aria-label="Default select example">
                        <option selected disabled>{{__('Country')}} : </option>
                        @foreach($countries as $country)
                        <option value={{$country->id}}>{{__($country->name)}}</option>
                        @endforeach
                      </select>
                      <input required name="city" type="text" placeholder="{{__('City')}}">
                    </div>
                    <div class="doubleInput">
                      <input required name="address" type="text" placeholder="{{__('Address')}}">
                      <input required name="zipcode" type="text" placeholder="{{__('Zip Code')}}">
                    </div>
                    <div class="doubleInput">
                      <input required name="first_name" type="text" placeholder="{{__('First Name')}}">
                      <input required name="last_name" type="text" placeholder="{{__('Last Name')}}">
                    </div>
                    <input class="textInput" required name="email" type="text" placeholder="{{__('Email Address')}}">
                    <div class="phoneInput">
                      <select required class="phoneInputCode" required name="country_code" class="form-select selectInput" aria-label="Default select example">
                        <option selected disabled>{{__('Code')}}</option>
                        @foreach($countriesCodes as $countriesCode)
                        <option value="+{{$countriesCode}}">+{{$countriesCode}}</option>
                        @endforeach
                      </select>
                      <input class="phoneInputNumber" required name="phone_number" type="text" placeholder="{{__('Phone Number')}}">
                    </div>

                    {{-- @livewire('become-a-partner') --}}
                    
                    <div>
                      <select wire:model="categoryId" name="merchant_category_id" id="MCat" class="form-select selectInput" aria-label="Default select example" onchange="getSubCat(this.id,'MSubCat')">
                          <option selected disabled value="">{{__('Category')}} : </option>
                          @foreach($categories as $category)
                          <option value={{$category->id}}>{{__($category->name)}}</option>
                          @endforeach
                      </select>

                      <select name="merchant_sub_category_id" id="MSubCat" class="form-select selectInput" aria-label="Default select example">
                          <option selected disabled value="">{{__('Sub Category')}} : ({{__('Select category first')}}) </option>
                          {{-- @if($subCategories != null)
                              @foreach($subCategories as $subCategory)
                              <option value={{$subCategory->id}}>{{__($subCategory->name)}}</option>
                              @endforeach
                          @else
                              <option disabled value="">{{__('No subcategories')}} </option>
                          @endif --}}
                      </select>

                      <select name="hear_about_us" class="form-select selectInput" aria-label="Default select example" id="HAU" onchange="createInput(this.id,'others')">
                          <option selected disabled value="">{{__('How did you hear about us ')}}? </option>
                          <option value="Influencer">Influencer</option>
                          <option value="Social Media">Social Media</option>
                          <option value="SMS">SMS</option>
                          <option value="Linkedin">Linkedin</option>
                          <option value="Others">Others</option>
                      </select>

                      <div id="others">
                          {{-- <input class="textInput" required name="others" type="text" placeholder="{{__('Write it here')}}"> --}}
                      </div>
                    </div>

                    <div class="errorMsg">
                      @if($errors->any())
                        {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                      @endif
                    </div>
                    <div class="doneMsg">
                      {{ session()->get('message') }}
                    </div>
                    <input class="subBtn" type="submit" value="{{__('Submit')}}">
                </form>
                <p>{{__('By clicking Submit, I represent that I have read , understand and agree to the ')}}<a href="{{ route('terms') }}">{{__('Terms')}}</a> {{__('and')}} <a href="{{ route('privacy') }}">{{__('Private Policy')}}</a>.</p>
            </div>
        </div>
    </div>

    <div class="body3">
      <div class="container grid-2">
        <div class="column-1">
          <h1 class="header-title">{{__('An Unmatched Way to Attract New Customers and Build Brand Loyalty')}}</h1>
          <p class="text">
            {{__('You have something unique to offer, and you need to reach people who want to experience it.With Bowi, you can promote your business. Everyday excellence. Extraordinary experiences.No matter the need, you make it happen. We help you find visitors, and you give them something to remember')}}.
          </p>
        </div>
        <div class="column-2 image">
          <img src="/images/bap first.jpg" alt="" />
        </div>
      </div>
    </div>

    <div class="body2">
      <div class="container grid-2">
        <div class="column-1 image">
          <img src="/images/bap second.jpg" alt="" />
        </div>

        <div class="column-2">
          <h1 class="header-title">{{__('Bowi is the Marketplace for Local Experiences')}}</h1>
          <p class="text">
            {{__("Bowi is more than a place to shop for deals. It's where customers in Lebanon explore where to go, what to do, or what to buy today. Here's how Bowi helps promote your business")}}.            
          </p>
        </div>
      </div>
    </div>

    <div class="body3">
      <div class="container grid-2">
        <div class="column-1">
          <h1 class="header-title">{{__('Go Beyond Deals. Become a Destination.')}}</h1>
          <p class="text">
            {{__('Bowi Merchant is your platform for becoming someone’s favorite place. Let’s work together to make you a destination.')}}'
          </p>
        </div>
        <div class="column-2 image">
          <img src="/images/bap third.jpg" alt="" />
        </div>
      </div>
      </div>
    </div>

    <script>
      function getSubCat(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        //add options if category is selected
        if(s1.value != ""){
          var optionArray = ["|{{__('Select sub category')}}"];
          @foreach($subCategories as $subCategory)
            if(s1.value == "{{$subCategory->category_id}}"){
              optionArray.push("{{$subCategory->id}}|{{__($subCategory->name)}}");
            }
          @endforeach
          for(var option in optionArray){
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
          }
        }
      }

      function createInput(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        //add input if others is selected
        if(s1.value == "Others"){
          var newInput = document.createElement("input");
          newInput.setAttribute("class","textInput");
          newInput.setAttribute("required","required");
          newInput.setAttribute("name","others");
          newInput.setAttribute("type","text");
          newInput.setAttribute("placeholder","{{__('Write it here')}}");
          s2.appendChild(newInput);
        }
      }
    </script>

@endsection