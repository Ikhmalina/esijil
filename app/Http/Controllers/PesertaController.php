<?php

namespace App\Http\Controllers;

use App\Models\Sijil;
use Illuminate\Http\Request;
use App\Models\Paper;
use \Bkwld\Cloner\Cloneable;
use DB;
use App\Models\Peserta;
use Illuminate\Support\Facades\File; 
use Auth;
use App\Models\Role;
use App\Models\User;
use Laratrust\Models\LaratrustRole;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaController extends Controller
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
    
    public function listpeserta(Sijil $sijil) {
        $user = Auth::user();
        
        
        if (auth()->id() <= 2 )  {
            $sijils = Sijil::with('children')->whereNull('task_id'=='id')
            ->orderBy('id', 'desc')
            ->get();
		
        }
       
        else {
        
        $sijils = Sijil::where('user_id', $user->id)
        ->with('children')
        ->where('task_id'=='id')
        ->orderBy('id', 'desc')
        ->get();
        //$posts = Post::all();
        }
        return view ('/peserta/listpeserta', compact('user', 'sijils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createpeserta($id)
    {
        $data = Sijil::find($id); 
        $data->save();
        return view ('peserta.createpeserta', ['data'=>$data]);
    }

    public function storepeserta(Request $request, Sijil $sijil)
    {
        $data=Sijil::find($request->id)->replicate(['task_id']);
        
        $data['user_id'] = auth()->id();
        $data->task_id = $request['task_id'];
        $data->peserta = $request['peserta'];
        $data->ic = $request['ic'];
        $data->kodsekolah = $request['kodsekolah'];
        $data->sekolah = $request['sekolah'];
        $data['sn'] = random_int(100000, 999999);
        $data->save();
        
        if ($data) {
            Alert::success('Berjaya', 'Maklumat telah disimpan dan isi maklumat peserta seterusnya');
            return redirect()->route('create.peserta', $data->task_id);
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function editpeserta($id)
    {
        $data = Sijil::find($id); 
        return view ('/peserta/editpeserta', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function updatepeserta(Request $request, Sijil $sijil)
    {
        $data=Sijil::find($request->id);
        
        $data['user_id'] = auth()->id();
        $data->peserta = $request['peserta'];
        $data->ic = $request['ic'];
        $data->sekolah = $request['sekolah'];
        $data->kodsekolah = $request['kodsekolah'];
                    
        $data->save();
        
        if ($data) {
            Alert::success('Berjaya', 'Maklumat telah dikemaskini');
            return redirect()->route('list.sijil');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function deletepeserta($id)
    {
        $sijils = Sijil::find($id);
        $sijils != null;
        $sijils->delete();

        if ($sijils) {
            Alert::success('Berjaya', 'Maklumat peserta telah dihapuskan');
            return redirect('/sijil/listsijil');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    public function searchic(Request $request)
    {
       $search = $request->input('search1');
            
        $sijils = Sijil::query()
        ->where('ic', 'LIKE', "%{$search}%")
        ->orderBy('id', 'asc')
        ->paginate(5);
        
        return view('/searchic', compact('sijils'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
}