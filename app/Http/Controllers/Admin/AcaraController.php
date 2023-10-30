<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Acara::latest();
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('booking', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('booking', function ($data) {
                    return $data->booking->no_booking;
                })
                ->addColumn('pengantin', function ($data) {
                    return $data->nama_pengantin_pria . ' & ' . $data->nama_pengantin_wanita;
                })
                ->addColumn('show', function ($data) {
                    return '<a href="' . route('admin.acara.show', $data->id) . '" class="text-info">Detail</a>';
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('admin.acara.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    if (auth()->user()->hasRole('Super Admin')) {
                        return '<a href="' . route('admin.acara.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                    }
                })
                ->rawColumns(['booking', 'pengantin', 'show', 'edit', 'destroy'])
                ->make(true);
        }

        return view('admin.acara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acara = Acara::findOrFail($id);
        return view('admin.acara.show', compact('acara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acara = Acara::findOrFail($id);
        return view('admin.acara.edit', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'id_booking' => 'required|string|max:255',
                'tanggal_acara' => 'required|date_format:Y-m-d',
                'nama_pengantin_pria' => 'required|string|max:255',
                'tempat_lahir_pengantin_pria' => 'required|string|max:255',
                'tanggal_lahir_pengantin_pria' => 'required|date_format:Y-m-d',
                'pengantin_pria_anak_ke' => 'required|string|max:255',
                'nama_ayah_pengantin_pria' => 'required|string|max:255',
                'nama_ibu_pengantin_pria' => 'required|string|max:255',
                'nama_saudara_pengantin_pria_1' => 'nullable|string|max:255',
                'nama_saudara_pengantin_pria_2' => 'nullable|string|max:255',
                'alamat_pengantin_pria' => 'nullable|string',
                'telepon_pengantin_pria' => 'nullable|string|max:255',
                'email_pengantin_pria' => 'nullable|email|max:255',
                'pekerjaan_pengantin_pria' => 'nullable|string|max:255',
                'instagram_pengantin_pria' => 'nullable|string|max:255',
                'nama_pengantin_wanita' => 'required|string|max:255',
                'tempat_lahir_pengantin_wanita' => 'required|string|max:255',
                'tanggal_lahir_pengantin_wanita' => 'required|date_format:Y-m-d',
                'pengantin_wanita_anak_ke' => 'required|string|max:255',
                'nama_ayah_pengantin_wanita' => 'required|string|max:255',
                'nama_ibu_pengantin_wanita' => 'required|string|max:255',
                'nama_saudara_pengantin_wanita_1' => 'nullable|string|max:255',
                'nama_saudara_pengantin_wanita_2' => 'nullable|string|max:255',
                'alamat_pengantin_wanita' => 'nullable|string',
                'telepon_pengantin_wanita' => 'nullable|string|max:255',
                'email_pengantin_wanita' => 'nullable|email|max:255',
                'pekerjaan_pengantin_wanita' => 'nullable|string|max:255',
                'instagram_pengantin_wanita' => 'nullable|string|max:255',
            ], [], [
                'tanggal_acara' => 'Tanggal Acara',
                'nama_pengantin_pria' => 'Nama Pengantin Pria',
                'tempat_lahir_pengantin_pria' => 'Tempat Lahir Pengantin Pria',
                'tanggal_lahir_pengantin_pria' => 'Tanggal Lahir Pengantian Pria',
                'pengantin_pria_anak_ke' => 'Pengantin Pria Anak Ke',
                'nama_ayah_pengantin_pria' => 'Nama Ayah Pengantin Pria',
                'nama_ibu_pengantin_pria' => 'Nama Ibu Pengantin Pria',
                'nama_saudara_pengantin_pria_1' => 'Nama Saudara Pengantin Pria',
                'nama_saudara_pengantin_pria_2' => 'Nama Saudara Pengantin Pria',
                'alamat_pengantin_pria' => 'Alamat Pengantin Pria',
                'telepon_pengantin_pria' => 'Telepon Pengantin Pria',
                'email_pengantin_pria' => 'Email Pengantin Pria',
                'pekerjaan_pengantin_pria' => 'Pekerjaan Pengantin Pria',
                'instagram_pengantin_pria' => 'Instagram Pengantin Pria',
                'nama_pengantin_wanita' => 'Nama Pengantin Wanita',
                'tempat_lahir_pengantin_wanita' => 'Tempat Lahir Pengantin Wanita',
                'tanggal_lahir_pengantin_wanita' => 'Tanggal Lahir Pengantian Wanita',
                'pengantin_wanita_anak_ke' => 'Pengantin Wanita Anak Ke',
                'nama_ayah_pengantin_wanita' => 'Nama Ayah Pengantin Wanita',
                'nama_ibu_pengantin_wanita' => 'Nama Ibu Pengantin Wanita',
                'nama_saudara_pengantin_wanita_1' => 'Nama Saudara Pengantin Wanita',
                'nama_saudara_pengantin_wanita_2' => 'Nama Saudara Pengantin Wanita',
                'alamat_pengantin_wanita' => 'Alamat Pengantin Wanita',
                'telepon_pengantin_wanita' => 'Telepon Pengantin Wanita',
                'email_pengantin_wanita' => 'Email Pengantin Wanita',
                'pekerjaan_pengantin_wanita' => 'Pekerjaan Pengantin Wanita',
                'instagram_pengantin_wanita' => 'Instagram Pengantin Wanita',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $acara = Acara::findOrFail($id);

            $acara->update([
                'id_booking' => $request->id_booking,
                'tanggal_acara' => $request->tanggal_acara,
                'nama_pengantin_pria' => $request->nama_pengantin_pria,
                'tempat_lahir_pengantin_pria' => $request->tempat_lahir_pengantin_pria,
                'tanggal_lahir_pengantin_pria' => $request->tanggal_lahir_pengantin_pria,
                'pengantin_pria_anak_ke' => $request->pengantin_pria_anak_ke,
                'nama_ayah_pengantin_pria' => $request->nama_ayah_pengantin_pria,
                'nama_ibu_pengantin_pria' => $request->nama_ibu_pengantin_pria,
                'nama_saudara_pengantin_pria_1' => $request->nama_saudara_pengantin_pria_1,
                'nama_saudara_pengantin_pria_2' => $request->nama_saudara_pengantin_pria_2,
                'alamat_pengantin_pria' => $request->alamat_pengantin_pria,
                'telepon_pengantin_pria' => $request->telepon_pengantin_pria,
                'email_pengantin_pria' => $request->email_pengantin_pria,
                'pekerjaan_pengantin_pria' => $request->pekerjaan_pengantin_pria,
                'instagram_pengantin_pria' => $request->instagram_pengantin_pria,
                'nama_pengantin_wanita' => $request->nama_pengantin_wanita,
                'tempat_lahir_pengantin_wanita' => $request->tempat_lahir_pengantin_wanita,
                'tanggal_lahir_pengantin_wanita' => $request->tanggal_lahir_pengantin_wanita,
                'pengantin_wanita_anak_ke' => $request->pengantin_wanita_anak_ke,
                'nama_ayah_pengantin_wanita' => $request->nama_ayah_pengantin_wanita,
                'nama_ibu_pengantin_wanita' => $request->nama_ibu_pengantin_wanita,
                'nama_saudara_pengantin_wanita_1' => $request->nama_saudara_pengantin_wanita_1,
                'nama_saudara_pengantin_wanita_2' => $request->nama_saudara_pengantin_wanita_2,
                'alamat_pengantin_wanita' => $request->alamat_pengantin_wanita,
                'telepon_pengantin_wanita' => $request->telepon_pengantin_wanita,
                'email_pengantin_wanita' => $request->email_pengantin_wanita,
                'pekerjaan_pengantin_wanita' => $request->pekerjaan_pengantin_wanita,
                'instagram_pengantin_wanita' => $request->instagram_pengantin_wanita,
            ]);

            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $acara = Acara::findOrFail($id);
            Booking::where('id', $acara->id_booking)->update([
                'status' => 1,
            ]);

            $acara->delete();
            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }
}
