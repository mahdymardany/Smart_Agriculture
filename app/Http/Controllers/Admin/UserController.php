<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('role:super_admin', ['only' => ['create','show']]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Auth::user()->getPermissionsViaRoles();
        $permission[] = "";
        foreach ($roles as $role){
            $permission[] = $role->name;
        }

        if (array_search('create-users', $permission)){
            return view('admin.users.create');
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //TODO User Create
        $user = new User($request->all());
        $user->level = $request->input('level');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect(route('users.index'));
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
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate(([
            'name' => ['required'],
            'username' => ['required'],
            'level' => ['required'],
        ]));

        if (! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            $data['password'] = $request->password;
        }
        $user->level = $request->input('level');
//        return $data;
//        return $user;
        $user->update($data);

//        $user->name = $request->input('name');
//        $user->username = $request->input('username');
//        $user->level = $request->input('level');
//        if(trim($request->input('password') != "")){
//            $user->password = Hash::make($request->input('password'));
//        }
//        $user->save();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->delete();

        return back();
    }
}
