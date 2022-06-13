@foreach($data as $user)
    <div class="card">
        @if($user->foto_profil)
            <div class="employee-photo" style="background-image: url({{ asset('storage/'.$user->foto_profil) }});"></div>
        @else
            <div class="employee-photo" style="background-image: url('assets/images/default_profile.png');"></div>
        @endif
        <input type="hidden" id="employee-old-photo{{ $user->id }}" value="{{ $user->foto_profil }}">
        <h3 class="employee-name" id="employee-name{{ $user->id }}">{{ $user->nama }}</h3>
        <p class="employee-email" id="employee-email{{ $user->id }}">{{ $user->email }}</p>
        <p class="employee-username" id="employee-username{{ $user->id }}">{{ $user->username }}</p>
        <input type="hidden" id="employee-password{{ $user->id }}" value="{{ $user->password }}">
        <p class="employee-phone" id="employee-phone{{ $user->id }}">{{ $user->nohp }}</p>
        <input type="hidden" id="employee-address{{ $user->id }}" value="{{ $user->alamat }}">
        <div class="action">
            <button type="button" class="edit" onclick="editKaryawan({{ $user->id }})">EDIT</button>
            <button type="button" class="hapus" onclick="hapusKaryawan({{ $user->id }})" >DELETE</button>
        </div>
    </div>
@endforeach