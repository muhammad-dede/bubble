<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::with(['roles'])->orderBy('name', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('name', 'like', "%" . request('search') . "%")->orWhere('email', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('role', function ($data) {
                    return $data->roles->pluck('name')[0];
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('admin.pengguna.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('admin.pengguna.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['role', 'edit', 'destroy'])
                ->make(true);
        }

        return view('admin.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.pengguna.create', compact('roles'));
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
                'email' => 'required|email|max:255|unique:admin,email',
                'password' => 'required|between:8,20|string',
                'role' => 'required|string|max:36',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $admin = Admin::create([
                'name' => ucfirst($request->name),
                'email' => strtolower($request->email),
                'password' => bcrypt($request->password),
            ]);

            $admin->assignRole($request->role);

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
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.pengguna.edit', compact('roles', 'admin'));
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
                'email' => 'required|email|max:255|unique:admin,email,' . $id . ',id',
                'password' => 'nullable|between:8,20|string',
                'role' => 'required|string|max:36',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $admin = Admin::findOrFail($id);

            $admin->update([
                'name' => ucfirst($request->name),
                'email' => strtolower($request->email),
                'password' => $request->password ? bcrypt($request->password) : $admin->password,
            ]);

            $admin->syncRoles($request->role);

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
            $admin = Admin::findOrFail($id);
            $admin->delete();
            $admin->roles()->detach();
            $admin->permissions()->detach();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
