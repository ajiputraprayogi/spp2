<?php

namespace App\Http\Controllers\petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\petugasModel;
use Illuminate\Support\Facades\Hash;

class petugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = petugasModel::paginate(10);

        if($request->ajax()){
            return view('petugas/petugas', compact('data'));
        }
        return view('petugas/indexPetugas', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        petugasModel::create([
            'id'=>$request->id,
            'nama_petugas'=>$request->nama_petugas,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'level'=>$request->level,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = petugasModel::where('id',$id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       petugasModel::destroy($id);
    }
}
