<div class="container">
    <div class="row">
        <div class="col-md-9 " style="width:100% ;margin-bottom:4rem;">
           
                <div class="activationSet-header" style="display: flex ; flex-diraction:row;justify-content:space-between;">

                    <h2> Media Assets</h2>
                    
                    <div style="color: green">
                        <h2>{{ session()->get('message') }}</h2>
                    </div>
                    <div style="color: red">
                        <h2>{{ session()->get('message1') }}</h2>
                    </div>
                    <div style="display: flex ;align-items:center;">
                        <button wire:click="showFirst" class="createBtn" @if($showFirst) style="color: black;background-color: #AAAAAA;margin-left: 1rem; border:none;" @else style="margin-left: 1rem; border:none;" @endif >
                            Show Photo Gallery
                        </button>

                        <button wire:click="showSecond" class="createBtn" @if($showSecond) style="color: black;background-color: #AAAAAA;margin-left: 1rem; border:none;" @else style="margin-left: 1rem; border:none;" @endif>
                            Show In-App Screenshots
                        </button>

                        <button wire:click="showThird" class="createBtn" @if($showThird) style="color: black;background-color: #AAAAAA;margin-left: 1rem; border:none;" @else style="margin-left: 1rem; border:none;" @endif>
                            Show B-roll
                        </button>
                    </div>
                </div>
                
                <div style="display: flex; align-items:center;margin-top:1rem">
                    <a href="{{ route('media-assets.create') }}" class="createBtn" title="Add New Image">
                        <i class="fa fa-plus" aria-hidden="true"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                          </svg> Add  Image to an album
                    </a>
                </div>

               
                <div style="display:flex;justify-content:space-between;flex-wrap: wrap;flex-direction:row;padding:1rem 1rem 1rem 0">
                    @foreach ($Images as $Image)
                        @if ($showFirst)
                            @if($Image->album_id == 1)
                                <div style="display:flex;justify-content:space-between;flex-direction:column;width:fit-content;border: 1px solid #858585;border-radius: 2rem;padding:1rem;margin:0.5rem 0">
                                    <img src="/images/media-assets/{{ $Image->image }}" style="width : 350px;margin-bottom:1rem;border-radius: 1rem;" alt="">
                                    <div style="display:flex;justify-content:space-between;flex-direction:row;">
                                        <div class="postViewBtn">
                                            <a href="{{ route('media-assets.edit',$Image->id) }}" title="Edit Image"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ route('media-assets.destroy',$Image->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" title="Delete image" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </div>
                                        <p><b>Date : {{ $Image->created_at->format('d/m/Y') }}</b></p>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($showSecond)
                            @if($Image->album_id == 2)
                                <div style="display:flex;justify-content:space-between;flex-direction:column;width:fit-content;border: 1px solid #858585;border-radius: 2rem;padding:1rem;margin:0.5rem 0">
                                    <img src="/images/media-assets/{{ $Image->image }}" style="width : 350px;margin-bottom:1rem;border-radius: 1rem;" alt="">
                                    <div style="display:flex;justify-content:space-between;flex-direction:row;">
                                        <div class="postViewBtn">
                                            <a href="{{ route('media-assets.edit',$Image->id) }}" title="Edit Image"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ route('media-assets.destroy',$Image->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" title="Delete image" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </div>
                                        <p><b>Date : {{ $Image->created_at->format('d/m/Y') }}</b></p>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($showThird)
                            @if($Image->album_id == 3)
                                <div style="display:flex;justify-content:space-between;flex-direction:column;width:fit-content;border: 1px solid #858585;border-radius: 2rem;padding:1rem;margin:0.5rem 0">
                                    <img src="/images/media-assets/{{ $Image->image }}" style="width : 350px;margin-bottom:1rem;border-radius: 1rem;" alt="">
                                    <div style="display:flex;justify-content:space-between;flex-direction:row;">
                                        <div class="postViewBtn">
                                            <a href="{{ route('media-assets.edit',$Image->id) }}" title="Edit Image"><i class="fa fa-eye" aria-hidden="true"></i> Edit</a>
                                            <form method="POST" action="{{ route('media-assets.destroy',$Image->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" title="Delete image" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </div>
                                        <p><b>Date : {{ $Image->created_at->format('d/m/Y') }}</b></p>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

          
        </div>
    </div>
</div>