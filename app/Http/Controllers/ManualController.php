<?php

namespace App\Http\Controllers;

use App\Models\Sijil;
use App\Models\Manual;
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
use Excel;
use App\Imports\PesertaImport;
use PDF;


class ManualController extends Controller
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
    public function createmanual()
    {
        return view('/manual/createmanual');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importForm(Request $request)
    {
        Excel::import(new PesertaImport, $request->file);
        return redirect()->route('list.manual');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show(Manual $manual)
    {
        $user = Auth::user();
        
        
        if (auth()->id() <= 2 )  {
            $manuals = Manual::orderBy('id', 'desc')
            ->paginate(50);
		
        }
        
        else {
        
        $manuals = Manual::where('username', $user->name)->orderBy('id', 'desc')
        ->paginate(50);
        //$posts = Post::all();
        }
        return view ('/manual/listmanual', compact('user', 'manuals'))->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function editmanual($id)
    {
        $data = Manual::find($id); 
        return view ('/manual/editmanual', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function updatemanual(Request $request, Manual $manual)
    {
        $data=Manual::find($request->id);
        
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
        $data->peserta = $request['peserta'];
        $data->ic = $request['ic'];
        $data->sekolah = $request['sekolah'];
        $data->kodsekolah = $request['kodsekolah'];
        $data->state1 = $request['state1'];
        $data->state2 = $request['state2'];
        $data->state3 = $request['state3'];
        $data->save();

        if ($data) {
            Alert::success('Berjaya', 'Maklumat telah dikemaskini');
            return redirect()->route('list.manual');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function deletemanual($id)
    {
        $manuals = Manual::find($id);
        $manuals != null;
        $manuals->delete();

        if ($manuals) {
            Alert::success('Berjaya', 'Maklumat telah dihapuskan');
            return redirect('/manual/listmanual');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    public function pdf($id)
    {
        
        
        $data = Manual::find($id); 
        $pdf = PDF::loadView('/manual/pdf', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('sijilJPNMelaka.pdf'); 
     
    }
    
    public function pdfnontemp($id)
    {
        
        
        $data = Manual::find($id); 
        $pdf = PDF::loadView('/manual/pdfnontemp', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->download('sijilJPNMelaka0.pdf'); 
     
    }
    
    public function searchmanual(Request $request)
    {
        $search = $request->input('search2');
            
        $manuals = Manual::query()
        ->where('ic', 'LIKE', "%{$search}%")
        ->orwhere('kodsekolah', 'LIKE', "%{$search}%")
        ->orwhere('program', 'LIKE', "%{$search}%")
        ->orwhere('username', 'LIKE', "%{$search}%")
        ->orderBy('id', 'asc')
        ->paginate(50);
        
        return view('/manual/searchmanual', compact('manuals'))->with('i', (request()->input('page', 1) - 1) * 10);
        
    }
    
    public function info($id)
    {
        $manuals = Manual::find($id);
        $manuals->get();
        return view ('/manual/info', ['manuals'=>$manuals]);
    }
    
    public function AdsearchPost(Request $request)
    {
        $user = Auth::user();
        
        if ($user->hasRole( 'admin') ) {
        $manuals = Manual::whereBetween('created_at',[$request->start_date,$request->end_date])->orderBy('id', 'desc')->paginate(10);
        }
        
        else {
        
        $manuals = Manual::whereBetween('created_at',[$request->start_date,$request->end_date])->where('user_id', $user->id)->orderBy('id', 'desc')
        ->paginate(10);
        }
     

        return view('/manual/searchmanual1', compact('user', 'manuals'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    public function destroy($id)
    {
          Manual::delete($id);
          return response()->json(['success'=>"Sijil terpilih dihapuskan.", 'tr'=>'tr_'.$id]);
          
    }

    public function deleteAll(Request $request)
    {
            $ids = $request->ids;
            Manual::whereIn('id',explode(",",$ids))->delete();
            return response()->json(['success'=>"Sijil terpilih dihapuskan."]);
    }
}
