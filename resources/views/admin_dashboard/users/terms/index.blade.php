@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9" style="width:90% ;">
           
                <div class="activationSet">
                    <h2>
                      Terms </h2>
                      <a href="{{ route('term.create') }}"   class="btn buttonInLivewire act" style="height: fit-content" title="Add New news">
                        <i class="fa fa-plus" aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg> Add  Terms
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
                                @foreach($terms as $term)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $term->title }}</td>
                                        <td> View Content via the button </td>
                                        <td>{{ $term->created_at }}  </td>
                                        <td>
                                            <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('term.show',$term->id) }}" title="View term"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('term.edit',$term->id) }}" title="Edit term"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ route('term.destroy',$term->id) }}" accept-charset="UTF-8" style="display:inline">
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
        <h2>Terms </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <a href="{{ route('term.create') }}" title="Add New Terms" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Add  Terms
        </a>
    </div>
    @foreach($terms as $term)
        <a class="selectSingleMessage" href="{{ route('term.show',$term->id) }}">
            <div class="singleMessage" style="background-color: #f6f6f6;">
                <div class="logoTextLeft">
                    <div class="messageHeader">
                        <h4>{{ $term->title }}</h4>
                        <p>{{ $term->term }}</p>
                    </div>
                </div>
                <div class="dateBtn">
                    <div class="DEBtn">
                        <form>
                            <button formaction="{{ route('term.edit',$term->id) }}" title="Edit term">Edit</button>
                        </form>
                        <form method="POST" action="{{ route('term.destroy',$term->id) }}" accept-charset="UTF-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                    <p>{{ $term->created_at->format('h:i A - d/m/Y') }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
