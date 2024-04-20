@extends('Website.components')

@section('content')

        <div class="header-content">
            <div class="container grid-2">
              <div class="column-1">
                <h1 class="header-title header47" >{{__('The Best Buy 1 Get 1 Free & Discount Offers.')}}</h1>
                <p class="text">
                  {{__('Never miss a chance to save with offers that renew every month!')}}
                </p>
                <div class="downloadBtn">
                    <a href="#" class="btn"><i class='bx bxl-play-store'></i> Android</a>
                    <a href="#" class="btn"><i class='bx bxl-apple'></i> IOS</a>
                </div>
              </div>
  
              <div class="column-2 image">
                <img src="/images/two iphone 13 mockup.png" class="img-element z-index" alt="" />
              </div>
            </div>
        </div>

        <div class="body5">
          <h1 class="header-title">{{__('Explore, save, repeat!')}} </h1>
          <p class="text">{{__('Get thousand of offers at popular near you, and enjoy a simple way to save on everyday experience.')}}</p>
          
          <div class="parts">
            <div class="part">
              <div class="part-img">
                <img src="/images/explore.first.pic.png" class="img-element z-index" alt="" />
              </div>
              <div class="col-2">
                <h3 class="header-title2 textToBlack">{{__("Find places you'll love")}}</h3>
                <p class="text1 textToBlack">
                  {{__('Explore new places and enjoy offers with friends or family, or by yourself.')}}
                </p>
              </div>
            </div>

            <div class="part">
              <div class="part-img">
                <img src="/images/second.pic.png" class="img-element z-index" alt="" />
              </div>
              <div class="col-2">
                <h3 class="header-title2 textToBlack">{{__('Use offers again & again')}}</h3>
                <p class="text1 textToBlack">
                  {{__('Get more savings with offers that renew every month.')}}
                </p>
              </div>
            </div>

            <div class="part">
              <div class="part-img">
                <img src="/images/third.pic.png" class="img-element z-index" alt="" />
              </div>
              <div class="col-2">
                <h3 class="header-title2 textToBlack">{{__('Share the savings')}}</h3>
                <p class="text1 textToBlack">
                  {{__('Share the savings by gifting offers to friends & family.')}}
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="body1">
          <h1 class="header-title">{{__('How it Works')}} </h1>
          <div class="phones">
            <div class="image">
              <img src="/images/iphone 13 mockup.png" class="image_img" alt="" />
              <div class="image_overlay">
                <div class="image_title">title</div>
                <p class="image_description">
                  heloo i am kouku
                </p>
              </div>
            </div>
            <div class="image">
              <img src="/images/iphone 13 mockup.png" class="image_img" alt="" />
              <div class="image_overlay">
                <div class="image_title">title</div>
                <div class="image_description">
                  Wikipedia is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Wikimedia Foundation.                </div>
              </div>
            </div>
            <div class="image">
              <img src="/images/iphone 13 mockup.png" class="image_img" alt="" />
              <div class="image_overlay">
                <div class="image_title">title</div>
                <p class="image_description">
                  heloo i am kouku
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="body4">
          <div class="container1">
            <div class="partnerTitle">
              <h1 class="header-title">{{__('Our Partners')}}</h1>
            </div>
            <div class="partnerText">
              <p class="text">
                {{__('Enjoy saving on thousands of monthly renewing offers at 800+ merchant partners including:')}}
              </p>
            </div>
          </div>
          <section class="slide-track slider">
            <div class="slide">
              <img src="/images/burgerking.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/McDonalds-logo.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/kfc-logo.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/burgerking.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/McDonalds-logo.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/kfc-logo.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/Starbucks.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/burgerking.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/McDonalds-logo.png" alt="logo">
            </div>
            <div class="slide">
              <img src="/images/bowi-logo.png" alt="logo">
            </div>
          </section>

        </div>
@endsection
        