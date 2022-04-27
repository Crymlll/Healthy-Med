@auth
<form id="form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="form-topic">
        <input type="checkbox" name="healthy" value="1" ><label for="healthy">Healthy</label>
        <input type="checkbox" name="sports" value="1" ><label for="sports">sports</label>
        <input type="checkbox" name="politics" value="1" ><label for="politics">politics</label>
        <input type="checkbox" name="entertainment" value="1" ><label for="entertainment">entertainment</label>
        <input type="checkbox" name="technology" value="1" ><label for="technology">technology</label>
        <input type="checkbox" name="science" value="1" ><label for="science">science</label>
        
        {{-- <select id="topic" class="topic" name="topic" >
            <option value="" selected disabled hidden>Pilih topik</option>
            <option value="healthy">healthy</option>
            <option value="food">food</option>
            <option value="sport">sport</option>
            <option value="sahur">sahur</option>
        </select> --}}
        <div class="pesan"></div>
    </div>

    <div class="judul">
        <input id="judul" class="judul" type="text" placeholder="judul" name="judul">
        <div class="pesan"></div>
    </div>

    <div class="kalimat">
        <textarea id="isi" rows="25" cols="100" placeholder="isi" name="isi" ></textarea>
        <div class="pesan"></div>
    </div>
    

    <div class="gambar">
        <input type="file" id="gambar" name="gambar">
        <div class="pesan"></div>
    </div>
    

    <button class="laporbtn" type="submit" class="tombol" >Buat Laporan</button>
</form>

@else

@endauth