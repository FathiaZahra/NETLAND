@extends('layout.layout')
@section('title', 'Peminjaman')
@section('content')
    <div>
        <div class="col-md-12">
        <span class="h1">
                        Data Akomodasi
                    </span>
            <div>
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-mr-10">
                            <a href="akomodasi/tambah">
                                <button style="margin-left: 960px;" class="btn btn-success my-3">Tambah Akomodasi</button>
                            </a>
                        </div>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Link Maps</th>
                                    <th>Gambar</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akomodasi as $item)
                                    <tr>
                                        <td>{{ $item->nama_akomodasi }}</td>
                                        <td><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507647.0516525166!2d107.03405311976242!3d-6.264703617624422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69775e79e70e01%3A0x301576d14feb9e0!2sKarawang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700462276102!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                                        <td class="text-center">
                                            @if ($item->file)
                                                <img src="{{ url('foto_akomodasi') . '/' . $item->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                        <a href="akomodasi/detail/{{ $item->id_akomodasi }}">
                                                <button class="btn btn-warning">DETAIL</button>
                                            </a>
                                            <a href="akomodasi/edit/{{ $item->id_akomodasi }}">
                                                <button class="btn btn-primary">EDIT</button>
                                            </a>
                                            <button class="btn btn-danger btnHapus" idInfo="{{ $item->id_akomodasi }}">HAPUS
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idInfo = $(this).closest('.btnHapus').attr('idInfo');
            swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda tidak dapat mengembalikan nya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Hapus!",
                cancelButtonText: "Batalkan!"
            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'akomodasi/hapus',
                        data: {
                            id_akomodasi: idInfo,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

@endsection
