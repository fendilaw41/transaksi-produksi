<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;

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
        $chart_options = [
        'chart_title' => 'Data Berdasarkan Time From',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Achivement',
        'group_by_field' => 'time_from',
        'group_by_field_format' => 'H:i:s',
        'group_by_period' => 'day',
        'chart_type' => 'bar',
    ];
    $chart1 = new LaravelChart($chart_options);

        return view('home', compact('chart1'));
    }
}
