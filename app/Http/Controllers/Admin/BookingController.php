<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Booking;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\str;
use Yajra\Datatables\Datatables;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::latest();
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('no_booking', 'like', "%" . request('search') . "%")->orWhere('user', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('user', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('paket', function ($data) {
                    return $data->paket->nama;
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == 0) {
                        return '<a href="' . route('admin.booking.konfirmasi', $data->id) . '" class="text-warning btn-konfirmasi">Konfirmasi</a>';
                    } elseif ($data->status == 1) {
                        return '<a href="' . route('admin.booking.create.acara', $data->id) . '" class="text-primary btn-modal-show">Buat Acara</a>';
                    } else {
                        return '<a href="' . route('admin.acara.show', $data->id) . '" class="text-info ">Detail Acara</a>';
                    }
                })
                ->addColumn('show', function ($data) {
                    return '<a href="' . route('admin.booking.show', $data->id) . '" class="text-info btn-modal-show">Detail</a>';
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('admin.booking.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    if (auth()->user()->hasRole('Super Admin')) {
                        return '<a href="' . route('admin.booking.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                    }
                })
                ->rawColumns(['user', 'paket', 'status', 'show', 'edit', 'destroy'])
                ->make(true);
        }

        return view('admin.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no_booking = strtoupper(Str::random(10));

        if (Booking::where('no_booking', $no_booking)) {
            $no_booking = Str::random(10);
        }

        $clients = User::latest()->get();
        $pakets = Paket::latest()->get();
        return view('admin.booking.create', compact('no_booking', 'clients', 'pakets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'no_booking' => 'required|string|max:255|unique:booking,no_booking',
                'id_user' => 'required|string|max:20',
                'id_paket' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            Booking::create([
                'no_booking' => $request->no_booking,
                'id_user' => $request->id_user,
                'id_paket' => $request->id_paket,
                'status' => 0,
            ]);

            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $clients = User::latest()->get();
        $pakets = Paket::latest()->get();
        return view('admin.booking.edit', compact('booking', 'clients', 'pakets'));
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
                'no_booking' => 'required|string|max:255|unique:booking,no_booking,' . $id . ',id',
                'id_user' => 'required|string|max:20',
                'id_paket' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }
            $booking = Booking::findOrFail($id);

            $booking->update([
                'no_booking' => $request->no_booking,
                'id_user' => $request->id_user,
                'id_paket' => $request->id_paket,
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
            $booking = Booking::findOrFail($id);
            $booking->delete();
            return response()->json(['success' => 'Berhasil dihapus!']);
        }
    }

    public function konfirmasi(Request $request, $id)
    {
        if ($request->ajax()) {
            $booking = Booking::findOrFail($id);
            $booking->update([
                'status' => 1,
            ]);

            return response()->json(['success' => 'Berhasil dikonfirmasi!']);
        }
    }

    public function create_acara($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.create-acara', compact('booking'));
    }

    public function store_acara(Request $request)
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

            Acara::create([
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

            Booking::where('id', $request->id_booking)->update([
                'status' => 2,
            ]);

            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }
}
