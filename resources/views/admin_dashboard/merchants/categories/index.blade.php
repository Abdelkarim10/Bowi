@extends('app-view.layouts')
@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-9" style="width:90% ;">
            <div class="card">
                <div class="card-header" style="display: flex;justify-content:space-between">
                    <h2>
                      Categroies
                    </h2>
                    <a href="{{ route('sub-categories.index') }}"   class="btn btn-secondary" title="Add New news">
                        See all Sub Categories
                    </a>
                </div>
                <div class="card-body">

                    <a href="{{ route('categories.create') }}" style="margin-right: 2rem;"  class="btn btn-success btn-sm" title="Add New news">
                        Add Category
                    </a>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>id</th>
                                    <th>image</th>
                                    <th>name</th>
                                    <th> Sub Categories </th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if($cat->image)
                                        <img src="{{ env('APP_URL') . '/images/category/' .  $cat->image }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $cat->name }}</td>
                                    <td class="align-middle"><a href="{{ route('sub-categories.show',$cat->id) }}" class="btn btn-info">Sub Categories</a></td>
                                    <td class="align-middle">
                                        <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$cat->id) }}" title="Edit  cats"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('categories.destroy',$cat->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  categories" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    </div>
    <br>
</div> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <h2>Categories </h2>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <div class="btnHub">
            <a href="{{ route('sub-categories.index') }}" class="createBtn" style="margin-right: 1rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>&nbsp;&nbsp; See all Sub Categories
            </a>
            <a href="{{ route('categories.create') }}" title="Add Category" class="createBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add Category
            </a>
        </div>
    </div>
    <div style="display: flex;justify-content:center;padding-right:10%">
        <div class="multiDivGrid">
            @foreach($cats as $cat)
                <div class="singleDiv" style="background-color: #f6f6f6;">
                    <div class="multiDivGridContent" style="justify-content:flex-start;">
                        <div style="width: 100%">
                            <div style="display: flex;flex-direction : row;align-items:center;margin-bottom:1rem">
                                <div class="catIcon">
                                    <img src="{{ env('APP_URL') . '/images/category/' .  $cat->image }}" style="height: 60px;" alt="" />
                                </div>
                                <div>
                                    <h5 style="margin-bottom:1rem ">{{ $cat->name }}</h5>
                                    <a href="{{ route('sub-categories.show',$cat->id) }}" class="SCLink">Sub Categories</a>
                                </div>
                            </div>
                            <div class="multiDivGridBtn" >
                                <form>
                                    <button formaction="{{ route('categories.edit',$cat->id) }}" title="Edit">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('categories.destroy',$cat->id) }}" accept-charset="UTF-8">
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
