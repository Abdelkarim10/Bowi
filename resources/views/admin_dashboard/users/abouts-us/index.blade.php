@extends('app-view.layouts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 cardSize" >

                <div class="activationSet">
                    <h2>About-us </h2>
                    <div >
                        <h2 style="color: green">{{ session()->get('message') }}</h2>
                        <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
                    </div>
                    <a href="{{ route('about-us.create') }}" class="createBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Add about-us
                    </a>
                </div>
                {{-- <div class="card-body">
                   
                   
                   
                   
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                    
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aboutus as $about)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="align-middle">
                                        @if(isset($about->pic))

                                        <img
                                        src="{{ env('APP_URL') . '/assets/aboutus_pics/' .   $about->pic }}"
                                        class="img-fluid rounded rounded-circle"
                                        style="height:70px; width:75px;object-fit: cover"
                                        alt="" />

                                        @endif
                                    </td>

                                    <td>{{ $about->title }}</td>
                                    <td> View Content via the button </td>
                                    <td>{{ $about->created_at }}  </td>
                                    <td>
                                        <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('about-us.show',$about->id) }}" title="View about-us" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('about-us.edit',$about->id) }}" title="Edit  about-us"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('about-us.destroy',$about->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn  btn-sm EditView" style="background-color: #e2e2e2" title="Delete  about-us" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div>
                    @foreach($aboutus as $about)
                        <div class="postView">
                            <div class="postViewImage">
                                @if($about->pic != null)
                                    <img src="{{ env('url') . '/assets/aboutus_pics/' .   $about->pic }}" alt="" />
                                @else
                                    <img src="{{ asset('images/noimage.jpg/') }}" alt="">
                                @endif
                            </div>
                            <div class="postViewText">
                                <h4>{{ $about->title }}</h4>
                                <p>{{ $about->content }}</p>
                                <div class="postViewBtn">
                                    <a href="{{ route('about-us.show',$about->id) }}" title="View about-us" ><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <a href="{{ route('about-us.edit',$about->id) }}" title="Edit  about-us"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <form method="POST" action="{{ route('about-us.destroy',$about->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" title="Delete  about-us" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

        </div>
    </div>
    <br>
</div>
@endsection
