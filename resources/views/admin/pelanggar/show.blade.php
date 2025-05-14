<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Show pelanggar</title>
      <style type="text/css">
            table {
                  border-collapse: collapse;
                  margin: 20px 0px;
                  text-align: left;
            }
            
            table,
            th,
            td {
                  border: 1px solid;
                  text-align: left;
                  padding-right: 20px;
            }
      </style>
</head>

<body>

      <h1>Detail Pelanggar</h1>
      <a href="{{ route('pelanggar.index') }}">Kembali</a>


      <table>
            <tr>
                  <td colspan="4" style="text-align: center;"><img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" width="120px" hight="120px"></td>
            </tr>
            <tr>
                  <td colspan="2">Akun pelanggar</td>
                  <td colspan="2">Data pelanggar</td>
            </tr>
            <tr>
                  <th>Nama</th>
                  <td>: {{ $pelanggar->name }}</td>
                  <th>Nis</th>
                  <td>: {{ $pelanggar->nis }}</td>
            </tr>
            <tr>
                  <th>Email</th>
                  <td>: {{ $pelanggar->email }}</td>
                  <th>Kelas</th>
                  <td>: {{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
            </tr>
            <tr>
                  <td></td>
                  <td></td>
                  <th>No HP</th>
                  <td>: {{ $pelanggar->hp }}</td>
            </tr>
            <tr>
                  <td></td>
                  <td></td>
                  <th>Status</th>
                  @if($pelanggar->status == 1) :
                  <td>: Aktif</td>
                  @else
                  <td>: Tidak Aktif</td>
                  @endif
            </tr>
      </table>
      <br><br>

    <h1>Pilih Pelanggaran</h1>
    <br><br>
    <form action="" method="get">
        <label>Cari :</label>
        <input type="text" name="cari">
        <input type="submit" value="Cari">
    </form>
    <br><br>

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="tabel">
        <tr>
            <th>Jenis</th>
            <th>Konsekuensi</th>
            <th>Poin</th>
            <th>Aksi</th>
        </tr>
        @forelse ($pelanggarans as $pelanggaran)
        <tr>
            <td>{{ $pelanggaran->jenis }}</td>
            <td>{{ $pelanggaran->Konsekuensi }}</td>
            <td>{{ $pelanggaran->poin }}</td>
            <td>
                <form action="{{ route('pelanggar.storePelanggaran', $pelanggaran->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="id_pelangar" value="{{ $pelanggar->id }}">
                    <input type="hidden" name="id_user" value="{{ $iduser }}">
                    <input type="hidden" name="id_pelanggaran" value="{{ $pelanggaran->id }}">
                    <button type="submit">Tambah Pelanggaran</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>
                <p>data tidak ditemukan</p>
            </td>
            <td>
                <a href="{{ route('pelanggaran.index') }}">Kembali</a>
            </td>
        </tr>
        @endforelse
    </table>
    {{ $pelanggarans->links() }}

</body>

</html>