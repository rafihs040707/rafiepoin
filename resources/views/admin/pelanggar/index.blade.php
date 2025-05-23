<!DOCTYPE html>
<html lang="en">
      
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Pelanggar</title>
</head>

<body>
      <h1>Data Pelanggar</h1>
      <a href="{{ route('admin/dashboard') }}">Menu Utama</a>
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>      
      <br><br>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
      </form>
      <br><br>
      <form action="" method="get">
            <label>Cari :</label>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
      </form>
      <br><br>
      <a href="{{ route('pelanggar.create') }}">Tambah pelanggar</a>

      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
      </div>
      @endif

      <table class="tabel" border="1" cellspacing="0" cellpadding="10">
            <tr>
                  <th>Foto</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Kelas</th>
                  <th>No Hp</th>
                  <th>Poin</th>
                  <th>Status</th>
                  <th>Aksi</th>
            </tr>
            @forelse ($pelanggars as $pelanggar)
            <tr>
                  <td>
                        <img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" width="100px" hight="100px">
                  </td>
                  <td>{{ $pelanggar->nis }}</td>
                  <td>{{ $pelanggar->name }}</td>
                  <td>{{ $pelanggar->email }}</td>
                  <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                  <td>{{ $pelanggar->hp}}</td>
                  @if ($pelanggar->status == 1) :
                  <td>Aktif</td>
                  @else
                  <td>Tidak Aktif</td>
                  @endif
                  <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pelanggar.destroy', $pelanggar->id) }}" method="POST">
                              <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="btn btn-sm btn-dark">DETAIL</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit">HAPUS</button>
                        </form>
                  </td>
            </tr>
            @empty
            <tr>
                  <td>
                        <p>data tidak ditemukan</p>
                  </td>
                  <td>
                        <a href="{{ route('siswa.index') }}">Kembali</a>
                  </td>
            </tr>
            @endforelse
      </table>
      {{ $pelanggars->links() }}

</body>
</html>
