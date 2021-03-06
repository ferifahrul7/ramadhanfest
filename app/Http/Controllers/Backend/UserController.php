<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Hash;
use App\Http\Requests\UserRequest;
use DB;

class UserController extends BackendController
{
    function __construct()
    {
        $this->middleware('permission:read-user');
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bcrum = $this->bcrum('Data User');

        $users = User::where(function ($query) use ($request) {
            $keywords = '%' . $request->term . '%';
            $query->where('name', 'like', $keywords);
        })->paginate($this->limit);
        return view('backend.users.index', compact('users', 'bcrum'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {

        $bcrum = $this->bcrum('Create', route('users.index'), 'Data User');
        $roles = Role::pluck('name', 'name')->all();
        return view('backend.users.create', compact('user', 'roles', 'bcrum'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $this->notif('success', 'User ' . $user->name . ' berhasil di buat!');

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $bcrum = $this->bcrum('Details User', route('users.index'), 'Data User');

        $user = User::find($id);
        return view('backend.users.show', compact('user', 'bcrum'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $bcrum = $this->bcrum('Edit', route('users.index'), 'Data User');

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('backend.users.edit', compact('user', 'roles', 'bcrum'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));


        $this->notif('success', 'User ' . $user->name . ' berhasil di ubah!');

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete = User::findOrFail($id);
        $delete->delete();

        return response()->success(200, 'User ' . $delete->name . ' berhasil dihapus');
    }
}
