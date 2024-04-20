@extends('app-view.layouts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 cardSize" >

                <div class="activationSet" >
                    <h2 > News </h2>
                    <div >
                        <h2 style="color: green">{{ session()->get('message') }}</h2>
                        <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
                    </div>
                    <a href="{{ route('news.create') }}" class="createBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                        Add News
                    </a>
                </div>
                {{-- <div class="card-body">
                   
                    
                   
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>Pic</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newsrooms as $newsroom)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="align-middle">
                                        @if(isset($newsroom->pic))

                                        <img
                                        src="{{ env('APP_URL') . '/assets/news_pics/' .   $newsroom->pic }}"
                                        class="img-fluid rounded rounded-circle"
                                        style="height:70px; width:75px;object-fit: cover"
                                        alt="" />

                                        @endif
                                    </td>

                                    <td>{{ $newsroom->title }}</td>
                                    <td> View Content via the button </td>
                                    <td>{{ $newsroom->created_at }}  </td>
                                    <td>
                                        <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('news.show',$newsroom->id) }}" title="View news"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn  btn-sm EditView" style="background-color: #e2e2e2" href="{{ route('news.edit',$newsroom->id) }}" title="Edit  news"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('news.destroy',$newsroom->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn  btn-sm EditView" style="background-color: #e2e2e2" title="Delete  newsroom" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                            <div style="color: green">
                                                {{ session()->get('message') }}
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div>
                    @foreach($newsrooms as $newsroom)
                        <div class="postView">
                            <div class="postViewImage">
                                @if($newsroom->pic != null)
                                    <img src="{{ env('url') . '/assets/news_pics/' .   $newsroom->pic }}" alt="" />
                                @else
                                    <img src="{{ asset('images/noimage.jpg/') }}" alt="">
                                @endif
                            </div>
                            <div class="postViewText">
                                <h4>{{ $newsroom->title }}</h4>
                                <p>{{ $newsroom->content }}</p>
                                <div class="postViewBtn">
                                    <a href="{{ route('news.show',$newsroom->id) }}" title="View news"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <a href="{{ route('news.edit',$newsroom->id) }}" title="Edit  news"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <form method="POST" action="{{ route('news.destroy',$newsroom->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" title="Delete  newsroom" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
