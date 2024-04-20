@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9 cardSize" >
           
                <div class="activationSet">
                    <h2>
                        Contact us messages </h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th> 
                                    <th>title</th>
                                    <th>message</th>
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Qs as $Q)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Q->name }}</td>
                                        <td>{{ $Q->email }}</td>
                                        <td>{{ $Q->title }}</td>
                                        <td>View Content via the button</td>
                                        <td>{{ $Q->created_at }}  </td>
                                        <td>
                                            <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('contact-us.show',$Q->id) }}" title="View message"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
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
        <h2>Contact us messages </h2>
        <div >
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        {{-- <a href="#" class="createBtn">Mark all as read</a> --}}
    </div>
    @foreach($Qs as $Q)
        <a class="selectSingleMessage" href="{{ route('contact-us.show',$Q->id) }}">
            <div class="singleMessage" @if(!$Q->is_read) style="background-color: #caf3b9;" @else style="background-color: #f6f6f6;" @endif>
                <div class="logoTextLeft">
                    <div class="messageIcon">
                        @if(!$Q->is_read)
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                                <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="messageHeader">
                        <h5>{{ $Q->name }}</h5>
                        <h6>{{ $Q->title }}</h6>
                    </div>
                </div>
                <div class="dateBtn">
                    <form method="POST" action="{{ route('contact-us.destroy',$Q->id) }}" accept-charset="UTF-8">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <p>{{ $Q->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
