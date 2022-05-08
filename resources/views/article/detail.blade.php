@auth

@if ($topic->food === 1)
    <p>Food</p>
@endif
@if ($topic->sports === 1)
    <p>Sports</p>
@endif
@if ($topic->yoga === 1)
    <p>yoga</p>
@endif
@if ($topic->therapy === 1)
    <p>therapy</p>
@endif
@if ($topic->workout === 1)
    <p>workout</p>
@endif
@if ($topic->nature === 1)
    <p>nature</p>
@endif
@if ($topic->diet === 1)
    <p>diet</p>
@endif
@if ($topic->lifestyle === 1)
    <p>lifestyle</p>
@endif
@if ($topic->psychology === 1)
    <p>psychology</p>
@endif


<a href='/like/{{ $data->id }}' >{{ $data->total_like}}</a>

@if(auth()->user()->id === $data->user_id)

    <a href="/article/edit/id/{{ $data->id }}">Edit</a>

@endif

@if(auth()->user()->id === $data->user_id)
    <a href="/article/delete/id/{{ $data->id }}">Delete</a>
@endif


<p>Creator : {{ $data->author->name }}</p>

<p>{{ $data->judul }}</p>

<p>{{ $data->isi }}</p>


<a id="like" href='/like/{{ $data->id }}' >{{ $data->total_like}}</a>

<br>

{{-- Disini ada total komentar --}}

@if($komentar)
    @foreach($komentar as $komen)
    <div>
        <p>{{ $komen->userNama }}</p>
        <p>{{ $komen->komentar }}</p>
    </div>
    @endforeach
@endif

<form id="form" action="/komentar/send/{{ $data->id }}">
    @csrf
    <input type="text" name="komentar" id="komentar" placeholder="comments">
    <input type="submit" value="kirim">
</form>

@endauth
