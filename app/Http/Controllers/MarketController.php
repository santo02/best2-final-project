<?php

namespace App\Http\Controllers;
use App\Models\Marketplaces;
use App\Models\RiskValues;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index() {
        $data = DB::select(DB::raw('SELECT risk_values.value, risk_values.score, marketplaces.id, marketplaces.nama_perusahaan, marketplaces.industri, marketplaces.jumlah_pinjaman, marketplaces.pinjaman_terkumpul, marketplaces.metode_pengembalian, marketplaces.jatuh_tempo, marketplaces.jangka_waktu, marketplaces.tingkat_keberhasilan FROM risk_values INNER JOIN marketplaces ON risk_values.risk_id = marketplaces.tingkat_keberhasilan'));
        return view('pages.market.marketplace', [
            "posts" => $data,
            "risk" => DB::table('risk_values')->get(),
        ]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'keberhasilan'      => 'required',
            'perusahaan'        => 'required',
            'industri'          => 'required',
            'pinjaman'          => 'required',
            'mtd_pengembalian'  => 'required',
            'waktu'             => 'required',
            'jatuh_tempo'       => 'required'
        ]);
        
        $tb_keberhasilan = $request->input('keberhasilan');
        $namaPerusahaan = $request->input('perusahaan');
        $jenisIndustri = $request->input('industri');
        $pinjaman = $request->input('pinjaman');
        $metodePengembalian = $request->input('mtd_pengembalian');
        $terkumpul = "0";
        $waktu = $request->input('waktu');
        $tempo = date('d, F, Y', strtotime($request->input('jatuh_tempo')));

        Marketplaces::create([
            'tingkat_keberhasilan'      => $tb_keberhasilan,
            'nama_perusahaan'           => $namaPerusahaan,
            'industri'                  => $jenisIndustri,
            'jumlah_pinjaman'           => $pinjaman,
            'pinjaman_terkumpul'        => $terkumpul,
            'metode_pengembalian'       => $metodePengembalian,
            'jatuh_tempo'               => $tempo,
            'jangka_waktu'              => $waktu,

        ]);

        return redirect()->route('marketpage.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id) {
        Marketplaces::where('id', $id)->firstorfail()->delete();
        return redirect()->route('marketpage.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'post_id'           => 'required',
            'keberhasilan'      => 'required',
            'perusahaan'        => 'required',
            'industri'          => 'required',
            'pinjaman'          => 'required',
            'mtd_pengembalian'  => 'required',
            'waktu'             => 'required',
            'jatuh_tempo'       => 'required'
        ]);
        
        $postID = $request->input('post_id');
        $tb_keberhasilan = $request->input('keberhasilan');
        $namaPerusahaan = $request->input('perusahaan');
        $jenisIndustri = $request->input('industri');
        $pinjaman = $request->input('pinjaman');
        $metodePengembalian = $request->input('mtd_pengembalian');
        $terkumpul = "0";
        $waktu = $request->input('waktu');
        $tempo = date('d, F, Y', strtotime($request->input('jatuh_tempo')));

        $requestSQL = Marketplaces::where('id', $postID)->firstorfail();

        $data = [
            'tingkat_keberhasilan'      => $tb_keberhasilan,
            'nama_perusahaan'           => $namaPerusahaan,
            'industri'                  => $jenisIndustri,
            'jumlah_pinjaman'           => $pinjaman,
            'pinjaman_terkumpul'        => $terkumpul,
            'metode_pengembalian'       => $metodePengembalian,
            'jatuh_tempo'               => $tempo,
            'jangka_waktu'              => $waktu,
        ];

        $requestSQL->update($data);
        return redirect()->route('marketpage.index')->with(['success' => 'Data Berhasil Diedit!']);
    }
}
