@auth
<h1>welcome {{auth()->user()->name}}</h1>
<br>
<br>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    

@endauth
