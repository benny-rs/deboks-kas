@foreach($data as $warung)
    <div class="card">
        <h3 class="warung-name" id="warung-name{{ $warung->id }}">{{ $warung['nama'] }}</h3>
        <p class="warung-phone" id="warung-phone{{ $warung->id }}">{{ $warung['nohp'] }}</p>
        <p id="warung-address{{ $warung->id }}">{{ $warung['alamat'] }}</p>
        @if(!auth()->user()->is_admin)
            <div class="action">
                <button type="button" class="edit" onclick="editWarung({{ $warung->id }})">EDIT</button>
                <button type="button" class="hapus" onclick="hapusWarung({{ $warung->id }})" >DELETE</button>
            </div>
        @endif
        <a href="/pencatatan/{{ $warung['id'] }}/{{ idate('Y') }}/{{ idate('m') }}">PENCATATAN</a>
    </div>
@endforeach