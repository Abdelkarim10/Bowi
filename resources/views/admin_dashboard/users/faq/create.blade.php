@extends('app-view.layouts')
@section('content')

{{-- <div class="card" style="width: 90%">
    <div class="card-header">Creating FAQs</div>
    <div class="card-body">



        <form action="{{ url('faqs') }}" method="post"  >
            {!! csrf_field() !!}
            <label for="question" >Question:</label><br>
            <input type="text" name="question" id="question" class="form-control"><br>

            <label for="answer">Answer:</label><br>
            <input type="text" name="answer" id="answer" class="form-control"><br>

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
    <h1>Add FAQs</h1>
    <form action="{{ url('faqs') }}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <h5>Question</h5>
        <input class="CreatePostInput" type="text" name="question" id="question">

        <h5>Answer</h5>
        <textarea class="CreatePostInput" type="text" name="answer" id="answer" style="height: 200px;resize:none"></textarea>
        
        <div style="color: red; margin-bottom: 0.5rem">
            @if($errors->any())
              {!! implode('',$errors->all("<div><i class='bx bx-error-circle'></i> :message </div>")) !!}
            @endif
        </div>

        <input class="CreatePostBtn" type="submit" value="Save" >
    </form>
</div>

@endsection
