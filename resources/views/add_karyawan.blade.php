@foreach($data as $user)
    <div class="card">
        <div class="employee-photo" style="background-image: url({{ $user->foto_profil }});"></div>
        <h3 class="employee-name">{{ $user->nama }}</h3>
        <p class="employee-email">{{ $user->email }}</p>
        <p class="employee-username">{{ $user->username }}</p>
        <p class="employee-phone">{{ $user->nohp }}</p>
        <div class="action">
            <a href="" class="edit">EDIT</a>
            <a href="" class="delete">DELETE</a>
        </div>
    </div>
@endforeach