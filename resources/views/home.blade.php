@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
 <div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Dashboard</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard
                    </li>
                    
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Description -->
<section id="description" class="card">
    <div class="card-header">
        <h4 class="card-title">Dashboard</h4>
    </div>
    <div class="card text-center">
       <div class="col-12">
           <div class="row">
                <div class="col-sm-4 col-12 dashboard-users-success">
                    <div class="card-content">
                        <a href="{{ route('transaksi.index') }}" title="">
                         <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bx-trending-up font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Total Transaksi</div>
                            <h3 class="mb-0">{{ $transaksi_count }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 col-12 dashboard-users-success">
                    <div class="card-content">
                        <a href="{{ route('item.index') }}" title="">
                             <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bxs-purchase-tag font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Total Item</div>
                            <h3 class="mb-0">{{ $item_count }}</h3>
                        </div>
                        </a>
                    </div>
                </div>
               <div class="col-sm-4 col-12 dashboard-users-success">
                    <div class="card-content">
                       <a href="{{ route('karyawan.index') }}" title="">
                         <div class="card-body py-1">
                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                <i class="bx bx-user-check font-medium-5"></i>
                            </div>
                            <div class="text-muted line-ellipsis">Total Karyawan</div>
                            <h3 class="mb-0">{{ $karyawan_count }}</h3>
                        </div>
                       </a>
                    </div>
                </div>
           </div>
       </div>
    </div>
   
    <div class="card-body mt-2">
         <h1>{{ $chart1->options['chart_title'] }}</h1>
             {!! $chart1->renderHtml() !!}
    </div>
   <div class="container">
        <h3>Transaksi Per Item</h3>
     <div class="table-responsive">
        <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Item</th>
                    <th>Transaksi Per Item</th>
                </tr>
            </thead>
            <tbody>
            @forelse($transaksi_item as $data)
                <tr>
                    <td class="py-1 line-ellipsis">
                      {{ $data->kode }}
                    </td>
                    <td class="py-1">
                        <i class="bx bx-trending-up text-success align-middle mr-50"></i><span> {{ $data->nama_item ?? '' }}</span>
                    </td>
                    <td class="text-success py-1">{{ $data->transaksi_count ?? 'Belum Terjual' }}</td>
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

    <div class="container mt-4">
        <h3>Planning by Achievement</h3>
     <div class="table-responsive">
        <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Target (detik)</th>
                    <th>Hasil (menit)</th>
                    <th>Achivement (menit)</th>
                </tr>
            </thead>
            <tbody>
            @forelse($planning as $data)
            @php
                $waktu_target = (60 / $data->waktu_target) * $data->qty;
                $achivement = $waktu_target * 90;
            @endphp
                <tr>
                    <td class="py-1 line-ellipsis">
                      {{ $data->item->kode ?? '' }}
                    </td>
                    <td class="py-1">
                        <i class="bx bx-trending-up text-success align-middle mr-50"></i><span> {{ $data->item->nama_item ?? '' }}</span>
                    </td>
                    <td>{{ $data->qty ?? '' }}</td>
                    <td class="text-success py-1">{{ $data->waktu_target ?? '' }}</td>
                    <td class="text-success py-1">{{ $waktu_target ?? '' }}</td>
                    <td class="text-success py-1">{{ $achivement ?? '' }}</td>
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
</section>

@endsection

@section('scripts')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection
