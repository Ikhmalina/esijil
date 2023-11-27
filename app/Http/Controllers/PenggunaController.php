<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Role;
use App\Models\User;
use Laratrust\Models\LaratrustRole;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Rules\MatchOldPassword;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/pengguna/daftarpengguna');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'password' => $request->password,
        ]);
        $users->attachRole($request->role_id);

        event(new Registered($users));

        //Auth::login($users);
        if ($users) {
            Alert::success('Berjaya', 'Maklumat pengguna telah didaftar');
            return redirect('/pengguna/listpengguna');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = Auth::user();
       
        if (auth()->id() <= 2 )  {
            
            $users = User::orderBy('id', 'desc')
            ->paginate(20);
        
        }
        
        else {
        
        $users = User::orderBy('id', 'desc')
        ->paginate(3);
        //$posts = Post::all();
        }

           

        return view ('/pengguna/listpengguna', compact('user', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function editPengguna($id)
    {
        $data = User::find($id); 
        return view ('/pengguna/editpengguna', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updatePengguna(Request $request, User $user)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        if ($request) {
            Alert::success('Berjaya', 'Kata laluan telah dikemaskini');
            return redirect('/pengguna/listpengguna');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users != null;
        $users->delete();

       
        if ($users) {
            Alert::success('Berjaya', 'Maklumat pengguna telah dihapuskan');
            return redirect('/pengguna/listpengguna');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }
}
