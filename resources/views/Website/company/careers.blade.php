@extends('Website.components')

@section('content')

<div class="body1 careerTop">
    <div class="container grid-2">
      <div class="column-1 image" style="padding-top: 1rem;">
        <img src="/images/office.jpg" class="img-element z-index" alt="" />
      </div>

      <div class="column-2">
        <h1 class="header-title">Discover something different</h1>
        <p class="text">
            At Bowi, we believe in the power of communities and supporting the growth of local businesses,
            helping them reach more and more customers along the way. To accomplish this, we look for
            dreamers, thinkers, doers, go-getters, and the people who know that solving problems the right
            way, together, makes us stronger than if we acted alone.<br>
            We’re curious, fun, and passionate about making a global impact on a local scale. Join us, and
            we’ll show you what it’s like when work and life are never boring.
        </p>
        {{-- <div class="getAppBtn">
          <a href="#" class="btn">Learn more</a>
        </div> --}}
      </div>
    </div>
</div>

<div class="body1">
    <div class="cards">
        <div class="card">
            <div class="column-1 image">
                <img src="/images/office1.jpg" class="img-element z-index" alt="" />
            </div>
        
            <div class="column-2">
                <h3 class="header-title1">Discover something different</h3>
                <p class="text1">
                    At Bowi, we believe in the power of communities and supporting the growth of local businesses,
                    helping them reach more and more customers along the way. To accomplish this, we look for
                </p>
            </div>
        </div>
        <div class="card">
            <div class="column-1 image">
                <img src="/images/office1.jpg" class="img-element z-index" alt="" />
            </div>
        
            <div class="column-2">
                <h3 class="header-title1">Discover something different</h3>
                <p class="text1">
                    At Bowi, we believe in the power of communities and supporting the growth of local businesses,
                    helping them reach more and more customers along the way. To accomplish this, we look for
                </p>
            </div>
        </div>
        <div class="card">
            <div class="column-1 image">
                <img src="/images/office1.jpg" class="img-element z-index" alt="" />
            </div>
        
            <div class="column-2">
                <h3 class="header-title1">Discover something different</h3>
                <p class="text1">
                    At Bowi, we believe in the power of communities and supporting the growth of local businesses,
                    helping them reach more and more customers along the way. To accomplish this, we look for
                </p>
            </div>
        </div>
        <div class="card">
            <div class="column-1 image">
                <img src="/images/office1.jpg" class="img-element z-index" alt="" />
            </div>
        
            <div class="column-2">
                <h3 class="header-title1">Discover something different</h3>
                <p class="text1">
                    At Bowi, we believe in the power of communities and supporting the growth of local businesses,
                    helping them reach more and more customers along the way. To accomplish this, we look for
                </p>
            </div>
        </div>
    </div>
</div>

<div class="body6">
    <h1 class="header-title">Explore Opportunities</h1>
    <form method="POST" action="upload" enctype="multipart/form-data">
        @csrf
        <div class="cvForm">
            <input type="file" accept="application/pdf" name="file">
            <button type="submit" class="btn">Send CV</button>
        </div>
        @if($errors->any())
            {!! implode('',$errors->all("<div class='errorMSG'><i class='bx bx-error-circle'></i> :message </div>")) !!}
        @endif
        <div class="doneMsg">
            {{ session()->get('message') }}
        </div>
    </form>
</div>
@endsection