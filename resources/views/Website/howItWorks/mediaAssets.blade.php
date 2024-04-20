@extends('Website.components')

@section('content')
 
    <div class="mediaHeader">
        <h3 style="padding-top: 2rem;">{{__('Logos and guidelines')}}</h3>
        <div class="body7">
            <div class="logoPart1">
                <div>
                    <a class="logoDwn" href="{{ route('download') }}"><i class='bx bxs-cloud-download'></i> {{__('Download')}}</a>
                </div>
                <div class="attention">
                    <i class='bx bx-error-circle'></i> 
                    {{__('Download requires following company and brand guidelines.')}}
                </div>
            </div>
            <div class="logoPart2">
                <img src="/images/bowi-logo.png" alt="" />
            </div>
        </div>
    </div>
    <div class="mediaHeader">
        <h3>{{__('Photo gallery')}}</h3>
        <div class="albums">
            @foreach($images as $image)
                @if($image->album_id == 1)
                    <div class="album">
                        <img src="/images/media-assets/{{$image->image}}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="mediaHeader">
        <h3>{{__('In-app screenshots')}}</h3>
        <div class="albums">
            @foreach($images as $image)
                @if($image->album_id == 2)
                    <div class="album">
                        <img src="/images/media-assets/{{$image->image}}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="mediaHeader">
        <h3>B-roll</h3>
        <div class="albums">
            @foreach($images as $image)
                @if($image->album_id == 3)
                    <div class="album">
                        <img src="/images/media-assets/{{$image->image}}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="popup-image">
        <span>&times;</span>
        <img src="" alt="">
    </div>
    <script>
        document.querySelectorAll('.album img').forEach(album => {
            album.onclick = () => {
                document.querySelector('.popup-image').style.display = 'block';
                document.querySelector('.popup-image img').src = album.getAttribute('src');
            };
        });

        document.querySelector('.popup-image span').onclick = () => {
            document.querySelector('.popup-image').style.display = 'none';
        };
    </script>
@endsection