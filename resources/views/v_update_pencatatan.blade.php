<table>
    <tr>
        <th>Minggu</th>
        <th>Jumlah Produk Terbeli</th>
        <th>Pemasukan</th>
        <th>Pengeluaran</th>
        <th>Pendapatan</th>
        <th>Action</th>
    </tr>
    @foreach($data as $pencatatan)
        <tr>
            <td class="pencatatan-minggu_ke" id="pencatatan-minggu_ke{{ $pencatatan->id }}">{{ $pencatatan->minggu_ke }}</td>
            <td class="pencatatan-produk_terbeli" id="pencatatan-produk_terbeli{{ $pencatatan->id }}">{{ $pencatatan->produk_terbeli }}</td>
            <td class="pencatatan-pemasukan" id="pencatatan-pemasukan{{ $pencatatan->id }}">Rp {{ $pencatatan->pemasukan }}</td>
            <td class="pencatatan-pengeluaran" id="pencatatan-pengeluaran{{ $pencatatan->id }}">Rp {{ $pencatatan->pengeluaran }}</td>
            <td>Rp {{ $pencatatan->pemasukan-$pencatatan->pengeluaran }}</td>
            @if(!auth()->user()->is_admin)
                <td class="action">
                    <button type="button" class="edit" onclick="editPencatatan({{ $pencatatan->id }})"><span class="material-symbols-rounded">edit</span></button>
                    <button type="button" class="hapus" onclick="hapusPencatatan({{ $pencatatan->id }})" ><span class="material-symbols-rounded">delete</span></button>
                </td>
            @endif
        </tr>
    @endforeach
    <tr>
        <th>Total</th>
        <th>{{ $data->sum('produk_terbeli') }}</th>
        <th>Rp {{ $data->sum('pemasukan') }}</th>
        <th>Rp {{ $data->sum('pengeluaran') }}</th>
        <th>Rp {{ $data->sum('pemasukan')-$data->sum('pengeluaran') }}</th>
    </tr>
</table>