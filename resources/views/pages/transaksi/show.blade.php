@extends('layouts.master')

@section('title', 'Detail Transaksi')

@section('content')
<section class="users-edit mt-3">
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                    <div class="media mb-2">
                        <div class="media-body">
                            <h4 class="media-heading">Detail Transaksi</h4>
                       </div>
                      
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-1">
                              
                                <tbody>
                                    <tr>
                                        <td>Tanggal Transaksi</td>
                                        <td>
                                           {{ $transaksi->tanggal_transaksi }}
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>Karyawan</td>
                                        <td>
                                           {{ $transaksi->karyawan->nama }}
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>Item</td>
                                        <td>
                                           {{ $transaksi->item->nama_item }}
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>Lokasi</td>
                                        <td>
                                           {{ $transaksi->lokasi->nama_lokasi }}
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>Jumlah</td>
                                        <td>
                                           {{ $transaksi->qty }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">  
                        <a href="{{ route('transaksi.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection