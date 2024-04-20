@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9" style="width:90% ;">
           
                <div class="activationSet">
                    <h2>
                        Countries </h2>
                        <a href="{{ route('countries.create') }}"   class="btn buttonInLivewire act" style="height: fit-content" title="Add New news">
                            <i class="fa fa-plus" aria-hidden="true"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>Add  Country
                        </a>
                </div>
                <div class="card-body">
                   
                  
                   
                
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  
                                    <th>id</th>
                                    <th>name</th>
                                    <th>Currency</th>
                                    <th>Country code</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Countries as $Country)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>{{ $Country->name }}</td>
                                        <td>{{ $Country->currency }}</td>
                                        <td>{{ $Country->country_code }}</td>
                                        <td>
                                            <a class="btn btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('countries.edit',$Country->id) }}" title="Edit Country"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                           
                                                <form method="POST" action="{{ route('countries.destroy',$Country->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
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
        <h2>Countries </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <a href="{{ route('countries.create') }}" title="Add Country" class="createBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Add Country
        </a>
    </div>
    <div style="display: flex;justify-content:center;padding-right:10%">
        <div class="multiDivGrid">
            @foreach($Countries as $Country)
                <div class="singleDiv" style="background-color: #f6f6f6;">
                    <div class="multiDivGridContent">
                        <div>
                            <div style="display: flex;flex-direction : row;align-items:center;margin-bottom:1rem">
                                <div class="messageIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
                                        <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.476.476 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.602.602 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.453.453 0 0 0 .138-.326ZM5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.702.702 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52l.761.325Z"/>
                                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.882.882 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a6.998 6.998 0 0 1 3.425 7.692 1.015 1.015 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a.998.998 0 0 0 .283.126 7.001 7.001 0 0 1-9.49-3.409Z"/>
                                    </svg>
                                </div>
                                <h6>{{ $Country->name }}</h6>
                            </div>
                            <p style="margin: 0"><b> Currency :</b> {{ $Country->currency }}</p>
                            <p style="margin: 0 0 0.5rem 0"><b>Country code :</b>{{ $Country->country_code }}</p>
                            <div class="multiDivGridBtn">
                                <form>
                                    <button formaction="{{ route('countries.edit',$Country->id) }}" title="Edit Rule">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('countries.destroy',$Country->id) }}" accept-charset="UTF-8">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
