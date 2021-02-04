<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreteLandRequest;
use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class LandController extends Controller
{

    public function __construct()
    {
//        $this->middleware('can:creatse-land', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lands = Land::all();
        return view('admin.lands.index',compact('lands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-land')){
            $users=User::all();
            return view('admin.lands.create',compact('users'));
        }
        abort(404);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreteLandRequest $request,Land $land)
    {
        $land->name = $request->input('name');
        $land->user_id = $request->input('user_id');
        $land->points = $request->input('points');
        $land->save();
        return redirect(route('lands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Land $land)
    {
        return view('admin.lands.show',compact(['land']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        $users=User::all();
        return view('admin.lands.edit', compact(['land','users']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Land $land)
    {
        $land->user_id = $request->input('userid');
        $land->update($request->all());
        return redirect(route('lands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Land $land)
    {
        $land->delete();
        foreach ($land->sensors as $sensor){
            $sensor->delete();
        }
        return redirect(route('lands.index'));
    }
}

