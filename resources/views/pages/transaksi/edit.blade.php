@extends('layouts.master')

@section('title', 'Edit Transaksi')

<!-- css code -->
@section('styles')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
@endsection
<!-- end css code -->

@section('content')
 <div class="d-flex justify-content-center">@include('layouts.notif')</div>
<section class="users-edit mt-3">
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                    <div class="media mb-2">
                        <div class="media-body">
                            <h4 class="media-heading">Edit Transaksi</h4>
                       </div>
                      
                    </div>
                    <!-- form update transaksi -->
                    <form class="form-validate" method="POST" action="{{ route('transaksi.update', $transaksi->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                  <div class="controls">
                                     <label>Tanggal Transaksi</label>
                                       <input type="text" class="form-control" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}" readonly="">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Karyawan</label>
                                        <select class="select2 form-control" name="karyawan_id" id="karyawan_id" required>
                                            {!! $transaksi->karyawan_id ? '<option value="'.$transaksi->karyawan_id.'" selected="selected">'.$transaksi->karyawan->npk.' - '.$transaksi->karyawan->nama.'</option>' : '' !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label>Item</label>
                                         <select class="select2 form-control" name="item_id" id="item_id" required>
                                               {!! $transaksi->item_id ? '<option value="'.$transaksi->item_id.'" selected="selected">'.$transaksi->item->kode.' - '.$transaksi->item->nama_item.'</option>' : '' !!}
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                     <select class="select2 form-control" name="lokasi_id" id="lokasi_id" required>
                                            {!! $transaksi->lokasi_id ? '<option value="'.$transaksi->lokasi_id.'" selected="selected">'.$transaksi->lokasi->kode.' - '.$transaksi->lokasi->nama_lokasi.'</option>' : '' !!}
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input type="number" value="{{ $transaksi->qty }}" name="qty" id="qty" class="form-control" placeholder="Contoh: 10">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Transaksi</button>
                                <a href="{{ route('transaksi.index') }}" class="btn btn-light">Batalkan</a>
                            </div>
                        </div>
                    </form>
                    <!-- end form update transaksi -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- javascript code -->
@section('scripts')
 <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="/app-assets/js/scripts/forms/select/form-select2.js"></script>
 <script type="text/javascript">
    // select2 Karyawan
      $('#karyawan_id').select2({
            placeholder: '--Pilih Karyawan--'
            , ajax: {
                url: '{{ route('res.karyawan') }}'
                , dataType: "JSON"
                , type: "GET"
                , data: function(params) {
                    let query = {
                        search: params.term
                        , page: params.page || 1
                    , }
                    return query
                }
                , processResults: function(res) {
                    let filtered = []
                    res.results.data.map(v => {
                        let obj = {
                            id: v.id
                            , text: `${v.npk} - ${v.nama}`
                        }
                        filtered.push(obj)
                    })
                    return {
                        results: filtered
                        , pagination: {
                            more: res.results.current_page !== res.results.last_page
                        }
                    }
                }
                , cache: true
            }
        })
      // select2 Item
      $('#item_id').select2({
            placeholder: '--Pilih Item--'
            , ajax: {
                url: '{{ route('res.item') }}'
                , dataType: "JSON"
                , type: "GET"
                , data: function(params) {
                    let query = {
                        search: params.term
                        , page: params.page || 1
                    , }
                    return query
                }
                , processResults: function(res) {
                    let filtered = []
                    res.results.data.map(v => {
                        let obj = {
                            id: v.id
                            , text: `${v.kode} - ${v.nama_item}`
                        }
                        filtered.push(obj)
                    })
                    return {
                        results: filtered
                        , pagination: {
                            more: res.results.current_page !== res.results.last_page
                        }
                    }
                }
                , cache: true
            }
        })
      // select2 Lokasi
       $('#lokasi_id').select2({
            placeholder: '--Pilih Item--'
            , ajax: {
                url: '{{ route('res.lokasi') }}'
                , dataType: "JSON"
                , type: "GET"
                , data: function(params) {
                    let query = {
                        search: params.term
                        , page: params.page || 1
                    , }
                    return query
                }
                , processResults: function(res) {
                    let filtered = []
                    res.results.data.map(v => {
                        let obj = {
                            id: v.id
                            , text: `${v.kode} - ${v.nama_lokasi}`
                        }
                        filtered.push(obj)
                    })
                    return {
                        results: filtered
                        , pagination: {
                            more: res.results.current_page !== res.results.last_page
                        }
                    }
                }
                , cache: true
            }
        })
 </script>
@endsection
<!-- end javascript code -->

@endsection