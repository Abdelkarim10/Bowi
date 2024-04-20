@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9 cardSize" >
          
                <div class="activationSet">
                    <h2>
                        Rules of use </h2>
                        <a href="{{ route('rules-of-use.create') }}"   class=" btn buttonInLivewire act" style="height: fit-content" title="Add New news">
                            <i class="fa fa-plus" aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg> Add  Rule
                        </a>
                </div>
                <div class="card-body">
                   
                    
                   
                  
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Content</th> 
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Rules as $Rule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $Rule->title }}</td>
                                        <td> View Content via the button </td>
                                        <td>{{ $Rule->created_at }}  </td>
                                        <td>
                                            <a class="btn btn-sm EditView " style="background-color: #e2e2e2" href="{{ route('rules-of-use.show',$Rule->id) }}" title="View Rule"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('rules-of-use.edit',$Rule->id) }}" title="Edit Rule"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ route('rules-of-use.destroy',$Rule->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm EditView" style="background-color: #e2e2e2" title="Delete  newsroom" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
        <h2>Rules of use </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <a href="{{ route('rules-of-use.create') }}" title="Add New rules" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Add  Rule
        </a>
    </div>
    @foreach($Rules as $Rule)
        <a class="selectSingleMessage" href="{{ route('rules-of-use.show',$Rule->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;">
                <div class="logoTextLeft">
                    <div class="messageIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16">
                            <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                            <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                            <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z"/>
                          </svg>
                    </div>
                    <div class="messageHeader">
                        <h5>{{ $Rule->title }}</h5>
                        {{-- <h6>{{ $Q->title }}</h6> --}}
                    </div>
                </div>
                <div class="dateBtn">
                    <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('rules-of-use.edit',$Rule->id) }}" title="Edit Rule">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('rules-of-use.destroy',$Rule->id) }}" accept-charset="UTF-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                    <p>{{ $Rule->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
