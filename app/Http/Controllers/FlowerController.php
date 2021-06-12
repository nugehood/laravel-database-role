<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Flower;
use Carbon\Carbon;
use App\Exports\FlowersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

    public function cardView(){
        $flowers = DB::table('flowers')->paginate(25);
    
        return view('cards',['flowers' => $flowers]);
    }

    public function filter(Request $request){

        $flowers = DB::table('flowers')
                    ->orderBy($request->selectdata, $request->order)
                    ->where($request->searchIndex,'like', $request->search.'%')
                    ->paginate($request->rows);
        if($request->cardActive == '1')
        {
            return view('cards',['flowers' => $flowers]);
        }
        else
        {
            return view('dashboard',['flowers' => $flowers]);
        }
        
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

    public function exportExcel()
    {
        $mytime = Carbon::now();
        return Excel::download(new FlowersExport, 'flowers '. $mytime .'.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $flowers = Flower::all();
        $mytime = Carbon::now();
        $pdf = PDF::loadView('print', ['flowers' =>$flowers], ['mytime' => $mytime]);
        return $pdf->download('flowers '. $mytime .'.pdf');
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

    public function change(Flower $flowers)
    {
        return view('change', compact('flowers'));     
    }

    public function upload(Flower $flowers, Request $request){
        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('images', $filename);
            $flowers->img = $filename;
        }
        $flowers->save();
        Alert::success('Updated!', 'Picture successfully updated!');
        return redirect('/flower/' . $flowers->id);
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
                return redirect('/flower/' . $flowers->id);
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
