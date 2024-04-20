@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">  
    <div class="card-header">Editing FAQs</div>
    <div class="card-body">



        <form action="{{ url('faqs') }}" method="post"  >
            {!! csrf_field() !!}
            <label for="question" >Question:</label><br>
            <input type="text" name="question" id="question" value="{{$faq->question}}" class="form-control"><br>

            <label for="answer">Answer:</label><br>
            <input type="text" name="answer" id="answer" value="{{$faq->answer}}" class="form-control"><br>

            <div style="color: red; margin-bottom: 0.5rem">
                @if($errors->any())
                  {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
                @endif
            </div>
            
            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> <br>
        </form>

    </div>
</div> --}}

<div class="CreatePost">
    <h1>Editing FAQs</h1>
    <form action="{{ route('faqs.update',$faq->id)}}" method="post" >
        {!! csrf_field() !!}
        @method("PUT")
        <h5>Question</h5>
        <input type="text" class="CreatePostInput" name="question" id="question" value="{{$faq->question}}">

        <h5>Answer</h5>
        <textarea class="CreatePostInput" type="text" name="answer" id="answer" style="height: 200px;resize:none">{{$faq->answer}}</textarea>

        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>


        <input type="submit" class="CreatePostBtn" value="Edit">
    </form>
</div>
@endsection