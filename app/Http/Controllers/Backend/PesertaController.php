<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController as Controller;
use App\Http\Requests\PesertaRequest;
use App\Models\Peserta as PesertaModel;
use App\Repository\Peserta;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{

    protected $peserta;

    public function __construct()
    {
        $this->peserta  = new Peserta;
    }
    public function index()
    {
        $bcrum = $this->bcrum('Peserta');
        return view('backend.peserta.index', compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->peserta->getPeserta($request);
            return DataTables::of($data)
                ->setRowId('idx')
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
                    return view('datatables._action-peserta', [
                        'idx' => $data->id,
                        'name' => $data->nama,
                        'edit_url' => route('peserta.edit', $data->id)
                    ]);
                })
                ->make(true);
        }
    }

    public function create()
    {
        $pesertaModel = new PesertaModel();
        $bcrum = $this->bcrum('Create', route('peserta.index'), 'Data Peserta');
        $provinsi = Provinsi::pluck("nama_prov", "kd_prov")->all();
        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];
        return view('backend.peserta.create', compact('pesertaModel', 'bcrum', 'provinsi','kabupaten','kecamatan','kelurahan'));
    }

    public function store(PesertaRequest $request)
    {
        $input = $request->all();
        $create = PesertaModel::create($input);

        $this->notif('success', 'Peserta ' . $create->nama . ' berhasil di buat!');

        return redirect()->route('peserta.index');
    }

    public function edit($id)
    {

        $bcrum = $this->bcrum('Edit', route('peserta.index'), 'Data Peserta');

        $pesertaModel = PesertaModel::find($id);

        $provinsi  = Provinsi::pluck("nama_prov", "kd_prov")->toArray();

        $kabupaten = [];
        $kecamatan = [];
        $kelurahan = [];

        if (!is_null($pesertaModel->kd_prov)) {
            $kabupaten = Kabupaten::where('kd_prov', $pesertaModel->kd_prov)
                ->pluck("nama_kab", "kd_kab")->toArray();
        }


        if (!is_null($pesertaModel->kd_kab)) {
            $kecamatan = Kecamatan::where('kd_kab', $pesertaModel->kd_kab)
                ->pluck("nama_kec", "kd_kec")->toArray();
        }

        if (!is_null($pesertaModel->kd_kec)) {
            $kelurahan = Kelurahan::where('kd_kec', $pesertaModel->kd_kec)
                ->pluck("nama_kel", "kd_kel")->toArray();
        }

        return view('backend.peserta.edit', compact('pesertaModel', 'bcrum', 'provinsi', 'kabupaten', 'kelurahan', 'kecamatan'));
    }

    public function update(PesertaRequest $request, $id)
    {
        $input = $request->all();

        $pesertaData = PesertaModel::find($id);
        $pesertaData->update($input);


        $this->notif('success', 'Peserta ' . $pesertaData->nama . ' berhasil di ubah!');

        return redirect()->route('peserta.index');
    }

    public function destroy($id)
    {

        $delete = PesertaModel::findOrFail($id);
        $delete->delete();

        return response()->success(200, 'User ' . $delete->name . ' berhasil dihapus');
    }

    public function destroyAjax(Request $request)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $input = $request->all();
                $delete = PesertaModel::findOrFail($input['idx']);

                $delete->delete();
                DB::commit();
                return response()->success(200, "Data Peserta berhasil dihapus", ['nama' => $delete->nama]);
            } catch (Exception $e) {
                DB::rollBack();
                return response()->success(201, "Data registrasi gagal dihapus", ['0' => $e->getMessage()]);
            }
        }
    }
}
