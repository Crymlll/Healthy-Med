@auth


@if ($topic->healthy === 1)
    <p>Healthy</p>
@endif
@if ($topic->sports === 1)
    <p>Sports</p>
@endif
@if ($topic->politics === 1)
    <p>politics</p>
@endif
@if ($topic->entertainment === 1)
    <p>entertainment</p>
@endif
@if ($topic->technology === 1)
    <p>technology</p>
@endif
@if ($topic->science === 1)
    <p>science</p>
@endif


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
    @foreach($komen as $komentar)
        <p>{{ $komen->userNama }}</p>
        <p>{{ $komen->isi }}</p>
    @endforeach
@endif

<form id="form" action="/komentar/send/{{ $data->id }}">
    @csrf
    <input type="text" name="komentar" id="komentar" placeholder="comments">
    <input type="submit" value="kirim">
</form>

@endauth
