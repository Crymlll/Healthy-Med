@auth
<h1>welcome {{auth()->user()->name}}</h1>
<p>{{ auth()->user()->id }}</p>
<p>{{ auth()->user()->email }}</p>
    <a href="/article/create">buat artikel</a>


    @foreach ($data as $item)
    <div class="item">
        <hr>
        <p><b>{{ $item->topic }}</b></p>
        <p>{{  $item->judul  }}</p>
        <p>{{ Str::limit($item->isi, 450) }}</p>
        <div class="keterangan">
            <p>{{ $item->gambar }}</p>
                <p>Waktu : {{ $item->created_at->format('d-m-Y H:i:s') }}</p>
                <a href="/preview/{{ $item->id }}">Lihat Selengkapnya ></a>
        </div>
        <hr>
    </div>
@endforeach

    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    

@endauth
