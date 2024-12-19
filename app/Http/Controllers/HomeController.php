<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produksi;

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
    public function index(Request $request)
    {
        // Ambil daftar tahun unik dari tabel produksi
        $years = Produksi::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'asc')
            ->pluck('tahun');

        // Ambil tahun yang dipilih dari dropdown, atau gunakan tahun saat ini sebagai default
        $selectedYear = $request->input('year', date('Y'));

        // Hitung rata-rata dan total volume produksi untuk setiap jenis berdasarkan tahun yang dipilih
        $gp = Produksi::where('jenis_id', '=', '1')
            ->where('tahun', $selectedYear)
            ->pluck('volume');;

        $gp_avg = Produksi::where('jenis_id', '=', '1')
            ->where('tahun', $selectedYear)
            ->avg('volume');

        $gp_sum = Produksi::where('jenis_id', '=', '1')
            ->where('tahun', $selectedYear)
            ->sum('volume');

        $dkp = Produksi::where('jenis_id', '=', '2')
            ->where('tahun', $selectedYear)
            ->pluck('volume');

        $dkp_avg = Produksi::where('jenis_id', '=', '2')
            ->where('tahun', $selectedYear)
            ->avg('volume');

        $dkp_sum = Produksi::where('jenis_id', '=', '2')
            ->where('tahun', $selectedYear)
            ->sum('volume');

        $p = Produksi::where('jenis_id', '=', '3')
            ->where('tahun', $selectedYear)
            ->pluck('volume');

        $p_avg = Produksi::where('jenis_id', '=', '3')
            ->where('tahun', $selectedYear)
            ->avg('volume');

        $p_sum = Produksi::where('jenis_id', '=', '3')
            ->where('tahun', $selectedYear)
            ->sum('volume');

        $ee = Produksi::where('jenis_id', '=', '4')
            ->where('tahun', $selectedYear)
            ->pluck('volume');

        $ee_avg = Produksi::where('jenis_id', '=', '4')
            ->where('tahun', $selectedYear)
            ->avg('volume');

        $ee_sum = Produksi::where('jenis_id', '=', '4')
            ->where('tahun', $selectedYear)
            ->sum('volume');

        $m = Produksi::where('jenis_id', '=', '5')
            ->where('tahun', $selectedYear)
            ->pluck('volume');

        $m_avg = Produksi::where('jenis_id', '=', '5')
            ->where('tahun', $selectedYear)
            ->avg('volume');

        $m_sum = Produksi::where('jenis_id', '=', '5')
            ->where('tahun', $selectedYear)
            ->sum('volume');

        $total = $gp_sum + $dkp_sum + $p_sum + $ee_sum + $m_sum;

        $periods = Produksi::where('tahun', $selectedYear)->pluck('periode');

        return view('home', compact(
            'gp', 'gp_avg', 'gp_sum',
            'dkp', 'dkp_avg','dkp_sum',
            'p', 'p_avg', 'p_sum',
            'ee', 'ee_avg', 'ee_sum',
            'm', 'm_avg', 'm_sum',
            'years', 'selectedYear', 'total', 'periods'
        ));
    }
}
