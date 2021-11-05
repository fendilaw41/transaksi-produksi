<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;
use App\Models\Achivement;
use App\Models\Transaksi;
use App\Models\Item;
use App\Models\Karyawan;
use App\Models\Planning;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** DASHBOARD **/
    public function index()
    {
        // $time = array();
        //  $time = Achivement::select('time_from', 'kode')->get();
        // // $time = ['18:00', '19:00', '20:00', '21:00'];

        // $achivement = [];
        // foreach ($time as $key => $value) {
        //     $achivement[] = Achivement::where(\DB::raw("DATE_FORMAT(time_from, '%H')"), $value)->get();
        // }
        // return view('home')->with('time', json_encode($time, JSON_NUMERIC_CHECK))->with('achivement', json_encode($achivement, JSON_NUMERIC_CHECK));

         $chart_options = [
            'chart_title'           => 'Transaksi Produksi Harian',
            'chart_type'            => 'bar',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Transaksi',
            'group_by_field'        => 'tanggal_transaksi',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'tanggal_transaksi',
            'filter_days'           => '30',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-6',
            'entries_number'        => '5',
            'translation_key'       => 'user',
            'continuous_time'       => true,
        ];

        $chart1 = new LaravelChart($chart_options);

        $transaksi_count = Transaksi::count();
        $item_count = Item::count();
        $karyawan_count = Karyawan::count();

        $transaksi_qty = Transaksi::whereHas('item', function($q){
        return $q->where('item_id', '=', 1);
          })->sum('qty');

        $transaksi_item = Item::with(['transaksi'])->withCount('transaksi')->get();

        $planning = Planning::with(['item'])->get();

        $data = array (
            'chart1' => $chart1,
            'transaksi_count' => $transaksi_count,
            'item_count' => $item_count,
            'karyawan_count' => $karyawan_count,
            'transaksi_item' => $transaksi_item,
            'planning' => $planning,
        );

        return view('home', $data);
    }
}
