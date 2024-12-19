<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;

use App\Models\Jenis;
use App\Models\Produksi;
use App\Exports\ProduksiExport;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil pengguna yang saat ini diotentikasi
        $user = Auth::user();

        $jenisId = $request->input('jenis_id');
        $jenis = Jenis::all();

        // Mengambil data produksi yang terkait dengan user_id dari pengguna yang saat ini diotentikasi
        $produksi = Produksi::where('user_id', $user->id)
            ->when($jenisId, function ($query) use ($jenisId) {
                return $query->where('jenis_id', $jenisId);
            })
            ->get(); // Perlu ditambahkan get() untuk mengeksekusi query dan mengambil hasilnya

        // Mengembalikan data ke view
        return view('data.index', [
            'produksi' => $produksi,
            'jenisId' => $jenisId,
            'jenis' => $jenis,
        ]);
    }

    public function dataExport()
    {
        return Excel::download(new ProduksiExport, 'produksi.xlsx');
    }

    public function createPDF()
    {
        // Ambil data produksi
        $produksi = Produksi::all();
        $jenis = Jenis::all();

        // Load view dengan data produksi
        $pdf = PDF::loadView('data.pdf', ['produksi' => $produksi, 'jenis' => $jenis]);

        // Download PDF dengan nama produksi.pdf
        return $pdf->download('produksi.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Membuat instance baru Produksi
        $produk = new Produksi();
        $produk->periode = $request->periode;
        $produk->tahun = $request->th_periode;
        $produk->jenis_id = $request->jenis_id;  // Ambil jenis_id dari request
        $produk->volume = $request->volume;
        $produk->user_id = Auth::user()->id;

        // Menyimpan data ke database
        $produk->save();

        // Redirect ke halaman 'data' setelah berhasil menyimpan
        return redirect('data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'periode' => 'required|string|max:255',
            'th_periode' => 'required|integer|min:1900|max:' . date('Y'),
            'volume' => 'required|numeric|min:0',
            'jenis_id' => 'required|exists:jenis,id',
        ]);

        // Temukan data produksi atau gagal
        $produksi = Produksi::findOrFail($id);

        // Update data produksi dengan data yang divalidasi, kecuali user_id
        $produksi->periode = $validatedData['periode'];
        $produksi->tahun = $validatedData['th_periode'];
        $produksi->volume = $validatedData['volume'];
        $produksi->jenis_id = $validatedData['jenis_id'];

        // Simpan perubahan
        $produksi->save();

        // Redirect ke halaman data dengan pesan sukses
        return redirect('data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produk = Produksi::find($id);
        $produk->delete();

        return redirect('data');
    }
}
