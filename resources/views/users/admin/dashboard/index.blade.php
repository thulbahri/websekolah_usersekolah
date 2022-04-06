@extends('layouts.admin')

@section('header')
<link rel="stylesheet" href="<?=url('/')?>/public/template/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=url('/')?>/public/template/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" 
rel="stylesheet"/>
<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);     
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
@endsection

@section('modal')
{{-- modal tambah surat --}}

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-trash fa-4x mb-3 "></i>
          <h4>Apakah Yakin Ingin Menghapus Data Ini ?
          </h4>
        </div>
      </div>
      <div class="modal-footer justify-content-between ">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <form action="{{url()->current()}}/delete" method="POST">
          @csrf
          <input name="id" id="delete_id" hidden>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Guru</h3>
    <div class="card-tools">
      <div class="input-group input-group-sm">
        <a href="{{url()->current()}}/add" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah Guru</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table id="datatable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($data_tes as $row)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{$row->nama}}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-info">Action</button>
              <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" role="menu" style="">
                <a class="dropdown-item" href="{{url()->current()}}/change/{{$row->id}}">Ubah</a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item" onclick="delete_data('{{$row->id}}')">Hapus</div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer')

<!-- DataTables -->
<script src="<?=url('/')?>/public/template/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=url('/')?>/public/template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=url('/')?>/public/template/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=url('/')?>/public/template/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
    $('#datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function delete_data(id){
    $("#delete_id").val(id);
    $("#modal-delete").modal('show');

  }
</script>
@endsection