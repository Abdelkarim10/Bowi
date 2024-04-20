@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9" style="width:90% ;">
            
                <div class="activationSet">
                    <h2>
                      FAQs </h2>
                      <a href="{{ route('faqs.create') }}"   class="btn buttonInLivewire act"  style="height: fit-content" title="Add New news">
                        <i class="fa fa-plus" aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg> Add  FAQs
                    </a>
                </div>
                <div class="card-body">
                   
                   
                   
                 
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  
                                    <th>id</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Created At</th>
                                    
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>{{ $faq->question }}</td>
                                    <td> View Content via the button </td>
                                    <td>{{ $faq->created_at }}  </td>
                                    <td>
                                        <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('faqs.show',$faq->id) }}" title="View faqs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('faqs.edit',$faq->id) }}" title="Edit  faqs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('faqs.destroy',$faq->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm EditView" style="background-color: #e2e2e2" title="Delete  faqs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           
        </div>
    </div>
    <br>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <h2>FAQs </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <a href="{{ route('faqs.create') }}" title="Add FAQs" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Add FAQs
        </a>
    </div>
    @foreach($faqs as $faq)
        <a class="selectSingleMessage" href="{{ route('faqs.show',$faq->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;">
                <div class="logoTextLeft">
                    <div class="messageIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                          </svg>
                    </div>
                    <div class="messageHeader">
                        <h5>{{ $faq->question }}</h5>
                        {{-- <h6>{{ $Q->title }}</h6> --}}
                    </div>
                </div>
                <div class="dateBtn">
                    <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('faqs.edit',$faq->id) }}" title="Edit Rule">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('faqs.destroy',$faq->id) }}" accept-charset="UTF-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                    <p>{{ $faq->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
