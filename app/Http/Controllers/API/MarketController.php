<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketplaces;
use App\Models\RiskValues;
use Illuminate\Support\Facades\DB;

class MarketController extends Controller
{
    public function index() {
        $market_data = DB::select(DB::raw('SELECT risk_values.value, risk_values.score, marketplaces.id, marketplaces.nama_perusahaan, marketplaces.industri, marketplaces.jumlah_pinjaman, marketplaces.pinjaman_terkumpul, marketplaces.metode_pengembalian, marketplaces.jatuh_tempo, marketplaces.jangka_waktu, marketplaces.tingkat_keberhasilan FROM risk_values INNER JOIN marketplaces ON risk_values.risk_id = marketplaces.tingkat_keberhasilan'));
        return array_reverse($market_data);
    }

    public function getRisk() {
        $risk_data = DB::table('risk_values')->get()->toArray();
        return array_reverse($risk_data);
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
        return response()->json('The post successfully added');
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

        return response()->json('The post successfully added');
    }

    public function destroy($id) {
        Marketplaces::where('id', $id)->firstorfail()->delete();
        return response()->json('The post successfully deleted');
    }

    public function find($id)
    {
        $data = DB::select('SELECT risk_values.value, risk_values.score, marketplaces.id, marketplaces.nama_perusahaan, marketplaces.industri, marketplaces.jumlah_pinjaman, marketplaces.pinjaman_terkumpul, marketplaces.metode_pengembalian, marketplaces.jatuh_tempo, marketplaces.jangka_waktu, marketplaces.tingkat_keberhasilan FROM risk_values INNER JOIN marketplaces WHERE marketplaces.id = ? AND marketplaces.tingkat_keberhasilan = risk_values.risk_id', [$id]);
        // $data = DB::table('marketplaces')
        //     ->where('id', '=', $id)
        //     ->first();

        if($data != null) {
            return response()->json([
                'success' => true,
                'message' => 'Detail data post',
                'data' => $data[0]
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data null'
            ]);
        }
    }

    public function calculateImbaHasil(Request $request) {
        $this->validate($request, [
            'score_percent'     => 'required',
            'pendanaan'         => 'required',
            'waktu'             => 'required'
        ]);
        $percentage = $request->input('score_percent');
        $jumlahPendanaan = $request->input('pendanaan');
        $tenor = $request->input('waktu');
        
        $calcProcess = $jumlahPendanaan * $tenor / 360 * $percentage / 100;
        $result = $jumlahPendanaan + $calcProcess;
        return response()->json([
            'success' => true,
            'result' => (int) $result
        ]);
    }
}
