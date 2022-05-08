<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="scss/homepage.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head> 

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="#" class="navbar-brand"><i class="fa fa-med"></i>Healthy<b>Med</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="/" class="nav-item nav-link active"><i class="material-icons">&#xe88a;</i><span>Home</span></a>
			<a href="/liked" class="nav-item nav-link"><i class="material-icons">&#xe87d;</i><span>Liked</span></a>	
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><img src="{{asset('storage/images/img.jpg')}}"  class="avatar" alt="Avatar"><b> {{auth()->user()->name}} <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
					<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
					<div class="divider dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        {{-- <button class="logout" type="submit"><i class="material-icons">&#xE8AC;</i>logout</button> --}}
                         <button class="dropdown-item" type="submit"><i class="material-icons">&#xE8AC;</i> Logout</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</nav>

<body>
<div class="container">
	@auth
<div class="sort">
	<button>
		<i  class="material-icons">&#xe80e;</i>
		 Your Article
	</button>
</div>

<div class="sidenav">
	
	<a href="#about">Healthy lifestyle</a>
	<a href="#services">Science is fum</a>
	<a href="#clients">Yoga</a>
	<a href="#contact">Run</a>
  </div>

  <div id="hasil_search">

  </div>

  <div class="beritaList">

  </div>

    {{-- @foreach ($data as $item)
    <div class="berita-box">
		<p>Creator : {{ $item->author->name }}</p> ini gabisa bang 
        <p ><b>{{ $item->topic }}</b></p>
		
        <h4>{{  $item->judul  }}</h4>
        <p id="isi">{{ Str::limit($item->isi, 450) }}</p>
		<a href="/article/id/{{ $item->id }}">Lihat Selengkapnya</a>
		<p>{{ $item->gambar }}</p>
        <div class="keterangan">
			<a href='/like/{{ $item->id }}' class="liked"><i onclick="myFunction(this)" class="fa fa-heart-o"></i> {{ $item->total_like }}</a>
			<a href='/like/{{ $item->id }}' class="liked"><i onclick="myFunction(this)" class="material-icons">&#xe87e;</i> {{ $item->total_like }}</a>
                <p>Waktu : {{ $item->created_at->format('d-m-Y H:i:s') }}</p>
        </div>
		
		<script>
			function myFunction(x) {
				x.classList.toggle("fa-heart");
			}
		</script>
        <p>{{ $item->status_like }}</p>
    </div>
	@endforeach --}}

@endauth
</div>
	
    <script>
        var dataArtikel;
        $(document).ready(function(){
            $.ajax({
			    url: 'api/get_myarticle',
			    type: 'GET',
			    dataType: 'json',
			    success: function(data){
                    var beritaList = document.getElementsByClassName('beritaList')[0]
				    beritaList.innerHTML = ''
                    console.log(data.data.data)
                    data.data.data.forEach(element => {
										
					var berita_box = document.createElement('div')
					berita_box.className = 'berita'
					
					var img = document.createElement('img')
					img.src = "{{ URL::to('/') }}/gambar/"+element.gambar
					img.width = '400'
					berita_box.appendChild(img)
					
					var judul = document.createElement('h4')
					judul.innerHTML = element.judul
					berita_box.appendChild(judul)

					var selengkapnya = document.createElement('a')
					selengkapnya.innerHTML = 'Selengkapnya'
					selengkapnya.href = '/article/id/'+element.id
					berita_box.appendChild(selengkapnya)

					var isi = document.createElement('p')
					isi.innerHTML = element.isi
					berita_box.appendChild(isi)

					var like = document.createElement('a')
					like.innerHTML = element.total_like
					like.href = '/like/'+element.id
					berita_box.appendChild(like)

					beritaList.appendChild(berita_box)
				});
                }
		    });
        })

    </script>
</body>
</html>