<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;
use App\Models\Achivement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'user',
            'continuous_time'       => true,
        ];

        $chart1 = new LaravelChart($chart_options);
        return view('home', compact('chart1'));
    }
}
