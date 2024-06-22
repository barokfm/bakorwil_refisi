@extends('user.layouts.utama')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection

@section('main-page')
    <body>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex flex-column flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Data Peminjam</h1>
                <div class="btn-toolbar mb-2 mb-md-0"></div>
            </div>
            <div class="container mt-5">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="stripe row-border order-column nowrap" style="width:100%" id="data_table">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No. Hp</th>
                                        <th>No. Ktp</th>
                                        <th>Foto Ktp</th>
                                        <th>Agenda</th>
                                        <th>Tgl. Awal</th>
                                        <th>Tgl. Akhir</th>
                                        <th>Jam Operasional</th>
                                        <th>Status Sekertaris</th>
                                        <th>Status Kepala</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($peminjams as $key => $peminjam)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $peminjam->nama_peminjam }}</td>
                                            <td>{{ $peminjam->alamat }}</td>
                                            <td>{{ $peminjam->email }}</td>
                                            <td>{{ $peminjam->no_hp }}</td>
                                            <td>{{ $peminjam->no_ktp }}</td>
                                            <td><img src="storage/{{ $peminjam->foto_ktp }}" alt="foto_ktp" width="80px">
                                            <td>{{ $peminjam->agenda }}</td>
                                            <td>{{ $peminjam->tgl_awal }}</td>
                                            <td>{{ $peminjam->tgl_akhir }}</td>
                                            <td>{{ $peminjam->jam_operasional }}</td>
                                            <td class="">
                                                @if ($peminjam->status_sekertaris === 1)
                                                    <img src="/svg/check.svg" alt="validated">
                                                @else
                                                    <img src="/svg/cancel.svg" alt="invalidated">
                                                @endif
                                            </td>
                                            <td class="">
                                                @if ($peminjam->status_kepala === 1)
                                                    <img src="/svg/check.svg" alt="validated">
                                                @else
                                                    <img src="/svg/cancel.svg" alt="invalidated">
                                                @endif
                                            </td>
                                            <td class="text-center d-flex gap-2">
                                                @can('admin')
                                                    <a href="/edit/{{ $peminjam->id }}" class="btn btn-sm btn-primary">EDIT</a>
                                                    <a type="button" href="/cetak/{{ $peminjam->id }}"
                                                        class="btnPrint btn btn-sm btn-warning">PRINT</a>
                                                    <a href="/hapus/{{ $peminjam->id }}"
                                                        class="btn btn-sm btn-danger">HAPUS</a>
                                                @endcan
                                                @can('kepala')
                                                    <form action="/kepala/{{ $peminjam->id }}" method="POST">
                                                        @csrf
                                                        <input type="radio" name="status_kepala" class="d-none" value='true'
                                                            checked>
                                                        <button type="submit" class="btn btn-success">Approved</button>
                                                    </form>
                                                    <form action="/kepalaTolak/{{ $peminjam->id }}" method="POST">
                                                        @csrf
                                                        <input type="radio" name="status_kepala" class="d-none" value='true'
                                                            checked>
                                                        <button type="submit" class="btn btn-danger">Disapproved</button>
                                                    </form>
                                                @endcan
                                                @can('sekertaris')
                                                    <form action="/sekertaris/{{ $peminjam->id }}" method="POST">
                                                        @csrf
                                                        <input type="radio" name="status_sekertaris" class="d-none"
                                                            value='true' checked>
                                                        <button type="submit" class="btn btn-success">Approved</button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Peminjam belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $peminjams->links() }}
                        </div>
                    </div>
                </div>
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </div>
            <a href="/" class="btn btn-warning mb-3">Back to Home</a>
        </main>
    </body>
    @section('script')
        <script>
            $(document).ready(function() {
                $(".btnPrint").printPage();
            });
        </script>

        <script>
            var table = new DataTable('#data_table', {
                // ajax: '../ajax/data/objects.txt',
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                fixedColumns: {
                    left: 2
                },
                order: [
                    [1, 'asc']
                ],
                paging: true,
                scrollCollapse: true,
                scrollX: true,
                scrollY: 1000,
                select: {
                    style: 'os',
                    selector: 'td:first-child'
                },
            });

            table.rows().every(function() {
                this.child();
            });

            $('#data_table').on('click', 'tr', function() {
                var child = table.row(this).child;

                if (child.isShown()) {
                    child.hide();
                } else {
                    child.show();
                }
            });
        </script>
    @endsection
@endsection
