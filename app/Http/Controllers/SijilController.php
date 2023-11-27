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
use PDF;
use RealRashid\SweetAlert\Facades\Alert;


class SijilController extends Controller
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
        return view('/sijil/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createsijil()
    {
        return view('/sijil/createsijil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesijil(Request $request)
    {
                  
        $sijils = $request->all();
        $sijils['user_id'] = auth()->id();   
        
        Sijil::create($sijils);
        
        if ($sijils) {
            Alert::success('Berjaya', 'Maklumat telah disimpan');
            return redirect()->route('list.sijil');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sijil  $sijil
     * @return \Illuminate\Http\Response
     */
    public function showsijil(Sijil $sijil)
    {
        $user = Auth::user();
        
        
        if (auth()->id() <= 2)  {
            $sijils = Sijil::with('children')->whereNull('task_id')
            ->orderBy('id', 'desc')
            ->paginate(3);
		
        }
        
        else {
        
        $sijils = Sijil::where('user_id', $user->id)
        ->with('children')
        ->whereNull('task_id')
        ->orderBy('id', 'desc')
        ->paginate(3);
        //$posts = Post::all();
        }
        return view ('/sijil/listsijil', compact('user', 'sijils'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sijil  $sijil
     * @return \Illuminate\Http\Response
     */
    public function editsijil($id)
    {
        $data = Sijil::find($id); 
        return view ('/sijil/editsijil', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sijil  $sijil
     * @return \Illuminate\Http\Response
     */
    public function updatesijil(Request $request, Sijil $sijil)
    {
        $data=Sijil::find($request->id);
        
        $data['user_id'] = auth()->id();
        $data->username = $request['username'];
        $data->program = $request['program'];
        $data->tempat = $request['tempat'];
        $data->anjuran = $request['anjuran'];
        $data->tarikhA = $request['tarikhA'];
        $data->tarikhB = $request['tarikhB'];
        $data->jawatansain = $request['jawatansain'];
        $data->jabatansain = $request['jabatansain'];
        $data->logopath = $request['logopath'];
        $data->sainpath = $request['sainpath'];
        $data->jsijil = $request['jsijil'];
            
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
     * @param  \App\Models\Sijil  $sijil
     * @return \Illuminate\Http\Response
     */
    public function deletesijil($id)
    {
        $sijils = Sijil::find($id);
        $sijils != null;
        $sijils->children()->delete();
        $sijils->delete();
        
        if ($sijils) {
            Alert::success('Berjaya', 'Maklumat sijil dan peserta berkaitan telah dihapus');
            return redirect('/sijil/listsijil');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
        
    }

    public function searchsijil(Request $request)
    {
        $search = $request->input('search');
            
        $sijils = Sijil::query()
        ->Where('ic', 'LIKE', "%{$search}%")
        ->orWhere('kodsekolah', 'LIKE', "%{$search}%")
        ->orderBy('id', 'asc')
       ->paginate(5);
        
        return view('/sijil/search', compact('sijils'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function pdf($id)
    {
        
        
        $data = Sijil::find($id);
        $pdf = PDF::loadView('/sijil/pdf', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->download('sijilJPNMelaka.pdf'); 
        
        
    
    }

    
}
