@extends('layouts.master')
@section('title', 'Transaksi')
@section('content')

@section('styles')
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.checkboxes.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-users.css">
@endsection

 <div class="d-flex justify-content-center">@include('layouts.notif')</div>
 <section class="users-list-wrapper">
	<div class="users-list-filter px-1">
	   <div class="invoice-create-btn mb-1">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">Tambah Transaksi</a>
             <button type="button" id="btn_pilihan" class="btn btn-warning glow invoice-create" role="button" aria-pressed="true">Pilihan</button>
           @if(Request::query('tanggal_transaksi') || Request::query('lokasi'))
           <a href="{{ route('transaksi.index') }}" class="btn btn-danger glow invoice-create" role="button" aria-pressed="true">X</a>
            @endif
        </div>
	    <form action="{{ route('transaksi.index') }}" method="GET">
	        <div class="row border rounded py-2 mb-2" id="pilihan" style="display: none;">
	        	<div class="col-12 col-sm-6 col-lg-4">
	                <label for="users-list-status">Tanggal</label>
	                <fieldset class="form-group">
		                  <input type="date" name="tanggal_transaksi" value="{{ $tanggal }}" id="tanggal_transaksi" class="form-control">
	                </fieldset>
	            </div>
	            <div class="col-12 col-sm-6 col-lg-4">
	                <label for="users-list-role">Lokasi</label>
	                <fieldset class="form-group">
	                    <select class="form-control" name="lokasi">
	                        <option value="">Semua</option>
	                    	@foreach($lokasi as $data)
	                        <option value="{{ old('lokasi_cari', $data->id) }}">{{ $data->nama_lokasi }}</option>
	                        @endforeach
	                    </select>
	                </fieldset>
	            </div>
	            <div class="col-12 col-sm-6 col-lg-4">
	                <label for="users-list-verified">Kode Item</label>
	                <fieldset class="form-group">
	                    <select class="form-control" id="users-list-verified">
	                        <option value="">Semua</option>
	                    	@foreach($item as $data)
	                        <option value="{{ $data->kode }}">{{ $data->kode }}</option>
	                        @endforeach
	                    </select>
	                </fieldset>
	            </div>
	           	<div class="col-md-12">
	           		<div class="row">
           			 <div class="col-12 col-sm-6 col-lg-6 d-flex align-items-center">
		                <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0">Cari</button>
		            </div>
		               <div class="col-12 col-sm-6 col-lg-6 d-flex align-items-center">
		                <button type="reset" class="btn btn-danger btn-block glow users-list-clear mb-0">Clear</button>
		            </div>
	           		</div>
	           	</div>
	        </div>
	    </form>
	</div>
	<div class="users-list-table">
	    <div class="card">
	        <div class="card-body">
	            <!-- datatable start -->
	            <div class="table-responsive">
	                <table id="users-list-datatable" class="table dt-responsive nowrap">
	                    <thead>
	                       <tr>
			                <th>No</th>
		                    <th>Tanggal </th>
		                    <th>Kode Item</th>
		                    <th>Nama Item</th>
		                    <th>Kode Lokasi</th>
		                    <th>Nama Lokasi</th>
		                    <th>Qty Actual</th>
		                    <th>Create By</th>
		                    <th>Aksi</th>
			               </tr>
	                    </thead>
	                    <tbody>
		                @forelse($transaksi as $data)
		                <tr>
		                    <td>{{ $loop->iteration }}</td>
		                    <td>
		                        <a href="{{ route('transaksi.show', $data->id) }}">{{ $data->tanggal_transaksi }}</a>
		                    </td>
		                    <td><span class="invoice-customer">{{ $data->item->kode ?? '' }}</span></td>
		                    <td><span class="invoice-customer">{{ $data->item->nama_item ?? '' }}</span></td>
		                    <td><span class="invoice-customer">{{ $data->lokasi->kode ?? '' }}</span></td>
		                    <td>{{ $data->lokasi->nama_lokasi ?? '' }} </td>
		                    <td><span class="badge badge-light-danger badge-pill">{{ $data->qty }}</span></td>
		                    <td><span class="invoice-customer">{{ $data->karyawan->npk ?? '' }}</span></td>
		                    <td>
		                        <div class="invoice-action">
		                            <a href="{{ route('transaksi.show', $data->id) }}" class="invoice-action-view mr-1">
		                                <i class="bx bx-show-alt"></i>
		                            </a>
		                            <a href="{{ route('transaksi.edit', $data->id) }}" class="invoice-action-edit cursor-pointer">
		                                <i class="bx bx-edit"></i>
		                            </a>
		                            <a onclick="deleteData()" class="invoice-action-edit cursor-pointer">
		                                <i class="bx bx-trash"></i>
		                            </a>
		                             <form id="deleteTransaksi" action="{{ route('transaksi.delete', ['id' => $data->id]) }}" method="POST" class="d-none">
	                                    @csrf
	                                  </form>
		                        </div>
		                    </td>
		                </tr>
		                @empty
		                <tr>
		                	<td colspan="9" class="text-center">
		                		 <img src="/assets/nodata.svg" alt="" width="20%">
		                		 <br>
		                		 <h5>Data Tidak Ditemukan</h5>
		                	</td>
		                </tr>
		                @endforelse
			            </tbody>
	                </table>
	            </div>
	            <!-- datatable ends -->
	        </div>
	    </div>
	</div>
	</section>

@section('scripts')
 <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
 <script src="/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js"></script>
 <script src="/app-assets/js/scripts/pages/app-users.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$("#btn_pilihan").on("click", function(){
 			$("#pilihan").toggle()
 		})
 	})

function deleteData() {
    swal({
        title: 'Anda yakin Hapus?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#8e24aa',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Hapus? !',
        cancelButtonText: 'No, batalkan!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('deleteTransaksi').submit();
        } else if (
            result.dismiss === swal.DismissReason.cancel
        ) {
            swal(
                'Cancelled',
                'Dibatalkan :)',
                'info'
            )
        }
    })
}
 </script>
@endsection

@endsection