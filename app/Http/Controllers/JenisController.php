<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Models\Jenis;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JenisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jenis = Jenis::all(
            
        );
        return view('jenis.index', ['jenis' => $jenis]);
    }

    public function excel()
    {
        return Excel::download(new JenisExport, 'Jenis.xlsx');
    }

    public function pdf()
    {
        // Ambil data jenis
        $jenis = Jenis::all();

        // Load view dengan data produksi
        $pdf = PDF::loadView('jenis.pdf', ['jenis' => $jenis]);

        // Download PDF dengan nama produksi.pdf
        return $pdf->download('jenis.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $jenis = new Jenis();
        $jenis->name = $request->j_nama;

        $jenis->save();

        return redirect('jenis');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'j_nama' => 'required|string|max:255',
        ]);

        // Temukan data produksi atau gagal
        $jenis = Jenis::findOrFail($id);

        // Update data produksi dengan data yang divalidasi, kecuali user_id
        $jenis->name = $validatedData['j_nama'];

        // Simpan perubahan
        $jenis->save();

        // Redirect ke halaman data dengan pesan sukses
        return redirect('jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $jenis = Jenis::find($id);
        $jenis->delete();

        return redirect('jenis');
    }
}
