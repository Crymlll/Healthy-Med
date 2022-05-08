@auth

@foreach ($article as $item)
    
    <img src="{{ URL::to('/') }}/gambar/{{ $item->gambar }}" alt="{{ $item->gambar }}" width="400">
    <p>{{ $item->creator->name }}</p>
    <p>{{ $item->judul }}</p>
    <p><a href='/article/id/{{ $item->id }}' >Selengkapnya</a></p>
    <p>{{ $item->isi }}</p>
    <p><a href='/like/{{ $item->id }}' >{{ $item->total_like }}</a></p> 
@endforeach

@endauth

<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
<div class="beritaList">

</div>
