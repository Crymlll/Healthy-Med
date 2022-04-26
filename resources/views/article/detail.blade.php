@auth


<abbr>{{ $data->topic }}</abbr>
<b>{{ $data->user_id }}</b>
<b>{{ $data->isi }}</b>
<aside>{{ $data->judul }}</aside>

<a href='/like/{{ $data->id }}' >{{ $data->total_like}}</a>

@endauth
