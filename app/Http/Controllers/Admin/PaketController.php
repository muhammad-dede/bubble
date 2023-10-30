<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paket::orderBy('created_at', 'desc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('nama', 'like', "%" . request('search') . "%")->orWhere('harga', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('show', function ($data) {
                    return '<a href="' . route('admin.paket.show', $data->id) . '" class="text-info btn-modal-show">Detail</a>';
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('admin.paket.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    if (auth()->user()->hasRole('Super Admin')) {
                        return '<a href="' . route('admin.paket.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                    }
                })
                ->rawColumns(['show', 'edit', 'destroy'])
                ->make(true);
        }

        return view('admin.paket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paket.create');
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
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'diskon' => 'nullable|numeric',
                'deskripsi' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            Paket::create([
                'nama' => ucfirst($request->nama),
                'harga' => $request->harga,
                'diskon' => $request->diskon == "" ? 0 : $request->diskon,
                'deskripsi' => $request->deskripsi,
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
        $paket = Paket::findOrFail($id);
        return view('admin.paket.show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
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
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'diskon' => 'nullable|numeric',
                'deskripsi' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $paket = Paket::findOrFail($id);

            $paket->update([
                'nama' => ucfirst($request->nama),
                'harga' => $request->harga,
                'diskon' => $request->diskon == "" ? 0 : $request->diskon,
                'deskripsi' => $request->deskripsi,
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

            $paket = Paket::findOrFail($id);
            $paket->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
