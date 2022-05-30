@foreach($data as $produk)
    <div class="card">
        <div class="produk-img" style="background-image: url(https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070);"></div>
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