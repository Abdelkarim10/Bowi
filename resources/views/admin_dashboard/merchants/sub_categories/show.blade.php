@extends('app-view.layouts')
@section('content')


{{-- <div class="card" style="width:90% ;">

    <div class="card-header">
        <h2>
          {{ $cat->name }}'s Sub Categroies </h2>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                        <th>id</th>
                        <th>image</th>
                        <th>name</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($subCats as $subCat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="align-middle">
                            @if($subCat->image)
                            <img src="{{ env('APP_URL') . '/images/sub-category/' .  $subCat->image }}" class="img-fluid rounded rounded-circle" style="height: 60px; width: 60px;object-fit: cover" alt="" />
                            @endif
                        </td>
                        <td>{{ $subCat->name }}</td>

                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('sub-categories.edit',$subCat->id) }}" title="Edit  cats"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            <form method="POST" action="{{ route('sub-categories.destroy',$subCat->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete  sub-categories" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br> --}}

<div class="messageView">
    <div class="messageViewTitle">
        <div class="arrowBack" style="margin: 0;display:flex;flex-direction:row;align-items:center">
            <a href="{{ route('categories.index') }}" style="margin-right: 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
            </a>
            <h2>{{ $cat->name }}'s Sub Categroies </h2>
        </div>
        <div >
            <h2 style="color: green">{{ session()->get('message') }}</h2>
            <h2 style="color: red">{{ session()->get('flash_message') }}</h2>
        </div>
        <div class="btnHub">
            <a href="{{ route('sub-categories.create') }}" title="Add Sub Category" class="createBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg> Add Sub Category
            </a>
        </div>
    </div>
    <div style="display: flex;justify-content:center;padding-right:10%">
        <div class="multiDivGrid">
            @foreach($subCats as $subCat)
                <div class="singleDiv" style="background-color: #f6f6f6;">
                    <div class="multiDivGridContent" style="justify-content:flex-start;">
                        <div style="width: 100%">
                            <div style="display: flex;flex-direction : row;align-items:center;margin-bottom:1rem">
                                <div class="catIcon">
                                    <img src="{{ env('APP_URL') . '/images/sub-category/' .  $subCat->image }}" style="height: 60px;" alt="" />
                                </div>
                                <div>
                                    <h5 style="margin-bottom:1rem ">{{ $subCat->name }}</h5>
                                </div>
                            </div>
                            <div class="multiDivGridBtn" >
                                <form>
                                    <button formaction="{{ route('sub-categories.edit',$subCat->id) }}" title="Edit">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('sub-categories.destroy',$subCat->id) }}" accept-charset="UTF-8">
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
