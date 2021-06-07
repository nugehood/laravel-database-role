<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Flower;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function filter(Request $request){
        $flowers = DB::table('flowers')
                    ->orderBy($request->selectdata, $request->order)
                    ->paginate($request->rows);
    
        return view('dashboard',['flowers' => $flowers]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'real_name'=>'required',
            'habitat'=>'required',
        ]);
        Flower::create($request->all());
        Alert::success('Success!', 'Data has been successfully created!');
        return Redirect::away('/flower/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flower $flowers)
    {
        return view('view', compact('flowers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flower $flowers)
    {
        return view('edit', compact('flowers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Flower $flowers)
    {
        $request->validate([
            'name' => 'required',
            'real_name' => 'required',
            'habitat' => 'required',
        ]);

        Flower::where('id', $flowers->id)
                ->update([
                    'name' => $request->name,
                    'real_name' => $request->real_name,
                    'habitat' => $request->habitat,
                ]);

                Alert::success('Changed!', 'Data has been successfully changed!');
                return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flower $flowers)
    {
        Flower::destroy($flowers->id);
        Alert::success('Deleted!', 'The data has been deleted!');
        return redirect('/dashboard');
    }
}
