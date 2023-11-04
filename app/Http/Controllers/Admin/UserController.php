<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)->addColumn('action', function ($item) {
                return '
                <div class="btn-group">
                <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-bs-toggle="dropdown">Aksi</button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">Sunting</a>

                <form action="' . route('user.destroy', $item->id) . '" method="POST">
                ' . method_field('delete') . csrf_field() . '
                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                </form>
                </div>
                </div>
                </div>
                ';
            })->editColumn('photo', function ($item) {
                return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height:40px"/>' : '';
            })->rawColumns(['action', 'photo'])->make();
        }

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $data['photo'] = $request->file('photo')->store('assets/users', 'public');

        User::create($data);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('pages.admin.user.edit', [
            'item' => $item,
        ]);
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
        $data = $request->all();
        $item = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->has('photo')) {
            Storage::disk('public')->delete($item->photo);

            $data['photo'] = $request->file('photo')->store('assets/users', 'public');
        } else {
            $data['photo'] = $item->photo;
        }

        $rules = [
            'name' => 'required|string|max:60',
            'roles' => 'nullable|string|in:ADMIN,USER',
        ];

        if ($request->email != $item->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $$item = $request->validate($rules);

        $item->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        if ($item->photo) {
            Storage::disk('public')->delete($item->photo);
        }

        $item->delete();

        return redirect()->route('user.index');
    }
}
