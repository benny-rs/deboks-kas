@foreach($data as $produk)
    <div class="card">
        @if($produk->foto)
            <div class="produk-img" style="background-image: url({{ asset('storage/'.$produk->foto) }});"></div>
        @else
            <div class="produk-img" style="background-image: url('assets/images/default_product.jpg');"></div>
        @endif
        <input type="hidden" id="produk-old-photo{{ $produk->id }}" value="{{ $produk->foto }}">
        <div class="produk-content">
            <h3 id="produk-nama{{ $produk->id }}">{{ $produk['nama'] }}</h3>
            <div class="produk-detail-action">
                <div class="produk-detail">
                    <p>Rp <span id="produk-harga{{ $produk->id }}">{{ $produk['harga'] }}</span>/pcs</p>
                    <p>Tersedia : <span id="produk-kuantitas{{ $produk->id }}">{{ $produk['kuantitas'] }}</span>pcs</p>
                </div>
                <div class="action">
                    <button type="button" class="edit" onclick="editProduk({{ $produk->id }})"><span class="material-symbols-rounded">edit</span></button>
                    <button type="button" class="hapus" onclick="hapusProduk({{ $produk->id }})" ><span class="material-symbols-rounded">delete</span></button>
                </div>
            </div>
        </div>
    </div>
@endforeach