<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('name', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('name', 'like', "%" . request('search') . "%")->orWhere('email', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('admin.client.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    if (auth()->user()->hasRole('Super Admin')) {
                        return '<a href="' . route('admin.client.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                    }
                })
                ->rawColumns(['edit', 'destroy'])
                ->make(true);
        }

        return view('admin.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:user,email',
                'phone' => 'required|string|max:255|unique:user,phone',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            User::create([
                'name' => ucfirst($request->name),
                'email' => strtolower($request->email),
                'phone' => $request->phone,
                'password' => bcrypt("password"),
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
        $client = User::findOrFail($id);
        return view('admin.client.edit', compact('client'));
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
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:user,email,' . $id . ',id',
                'phone' => 'required|string|max:255|unique:user,phone,' . $id . ',id',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $client = User::findOrFail($id);

            $client->update([
                'name' => ucfirst($request->name),
                'email' => strtolower($request->email),
                'phone' => $request->phone,
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

            $client = User::findOrFail($id);
            $client->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
