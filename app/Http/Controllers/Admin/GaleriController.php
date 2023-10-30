<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Galeri::latest();
            return Datatables::of($data)
                ->addColumn('image', function ($data) {
                    return '<img src=' . $data->image . ' class="img-fluid" style="width: 100px; height: 100px;">';
                })
                ->addColumn('lihat', function ($data) {
                    return '<a href="' . $data->image . '" class="text-info" target="_blank">Lihat</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('admin.galeri.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['image', 'lihat', 'destroy'])
                ->make(true);
        }

        return view('admin.galeri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.create');
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
                'image' => 'required|mimes:png,jpg|max:3000',
            ], [], [
                'image' => 'Image',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            if ($request->hasFile('image')) {

                $path = 'uploads';

                if (!File::isDirectory(public_path($path))) {
                    File::makeDirectory(public_path($path), 0777, true, true);
                }

                $image = Str::uuid() . '.' . $request->image->extension();

                if ($request->image->move(public_path($path), $image)) {
                    Galeri::create([
                        'image' => asset('') . $path . '/' . $image
                    ]);
                };
            }

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
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
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

            $galeri = Galeri::findOrFail($id);

            if (File::exists(public_path('uploads' . '/' . basename($galeri->image)))) {
                File::delete(public_path('uploads' . '/' . basename($galeri->image)));
            }

            $galeri->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
