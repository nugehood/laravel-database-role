<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Exports\UsersExport;

use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(25);
    
        return view('user.dashboard',['users' => $users]);
    }

    public function cardView()
    {
        $users = DB::table('users')->paginate(25);

        return view('user.cards',['users' => $users]);
    }


    public function exportExcel()
    {
        $mytime = Carbon::now();
        return Excel::download(new UsersExport, 'users '. $mytime .'.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $users = User::all();
        $mytime = Carbon::now();
        $pdf = PDF::loadView('user.print', ['users' =>$users], ['mytime' => $mytime]);
        return $pdf->download('users '. $mytime .'.pdf');
    }

    public function filter(Request $request)
    {
        $users = DB::table('users')
                    ->orderBy($request->selectdata, $request->order)
                    ->where($request->searchIndex,'like', $request->search.'%')
                    ->paginate($request->rows);
        if($request->cardActive == '1')
        {
            return view('user.cards',['users' => $users]);
        }
        else
        {
            return view('user.dashboard',['users' => $users]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRoles([
            $request->user,
            $request->admin,
            $request->superadmin, 
        ]);

        event(new Registered($user));
        Alert::success('Success!', 'Data has been successfully created!');
        return Redirect::away('/user/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return view('user.view', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        User::where('id', $users->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            Alert::success('Changed!', 'Data has been successfully changed!');
            return redirect('/user/' . $users->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        User::destroy($users->id);
        Alert::success('Deleted!', 'The data has been deleted!');
        return redirect('/user/dashboard');
    }
}
