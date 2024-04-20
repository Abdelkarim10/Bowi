@extends('Website.components')

@section('content')

<div class="FAQContainer">
    <h1 class="header-title" style="padding-top: 2rem;">{{__('Frequently Asked Questions page (FAQs)')}}</h1>

    @foreach ($faqs as $faq)
        <div class="accordion">
            <div class="faqIcon"><i class='bx bx-chevron-down'></i></div>
            <h3>{{ $faq->question }}</h3>
        </div>
        <div class="panel">
            <p>{{ $faq->answer }}</p>
        </div>
    @endforeach

</div>

@endsection