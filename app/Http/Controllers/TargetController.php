<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Models\Paper;
use \Bkwld\Cloner\Cloneable;
use DB;
use Illuminate\Support\Facades\File; 
use Auth;
use App\Models\Role;
use App\Models\User;
use Laratrust\Models\LaratrustRole;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
use App\Imports\TargetImport;
use PDF;

class TargetController extends Controller
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
   public function createtarget()
    {
        return view('/target/createtarget');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importForm1(Request $request)
    {
       Excel::import(new TargetImport, $request->file);
       return redirect()->route('list.target');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        $user = Auth::user();
       
        if ($user->hasRole( 'admin') ) { // Auth::user()->hasRole( 'admin') // auth()->id() <= 2 
            
            $targets = Target::where('user_id', '>=', '2')->orwhere('user_id', '<=', '5')->orderBy('id', 'desc')
            ->paginate(20);
        
        }
        
        else {
        
        $targets = Target::where('user_id', $user->id)->orderBy('id', 'desc')
        ->paginate(20);
        //$posts = Post::all();
        }

           

        return view ('/target/listtarget', compact('user', 'targets'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edittarget($id)
    {
        $data = Target::find($id); 
        return view ('/target/edittarget', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function updatetarget(Request $request, Target $target)
    {
        $data=Target::find($request->id);
        
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
            return redirect()->route('list.target');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function deletetarget($id)
    {
        $targets = Target::find($id);
        $targets != null;
        $targets->delete();

       
        if ($targets) {
            Alert::success('Berjaya', 'Maklumat telah dihapuskan');
            return redirect('/target/listtarget');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }
    }

    public function pdf($id)
    {
        
        
        $data = Target::find($id); 
        $pdf = PDF::loadView('/target/pdf', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->download('sijilJPNMelaka.pdf'); 
     
    }
    
    public function pdfnontemp($id)
    {
        
        
        $data = Target::find($id); 
        $pdf = PDF::loadView('/target/pdfnontemp', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        
        return $pdf->download('sijilJPNMelaka0.pdf'); 
     
    }

    public function searchtarget(Request $request)
    {
        $search = $request->input('search2');
            
        $targets = Target::query()
        ->where('ic', 'LIKE', "%{$search}%")
        ->orwhere('kodsekolah', 'LIKE', "%{$search}%")
        ->orwhere('program', 'LIKE', "%{$search}%")
        ->orwhere('username', 'LIKE', "%{$search}%")
        ->orderBy('id', 'asc')
        ->paginate(10);
        
        return view('/target/searchtarget', compact('targets'))->with('i', (request()->input('page', 1) - 1) * 10);
        
    }

    public function info($id)
    {
        $targets = Target::find($id);
        $targets->get();
        return view ('/target/info', ['targets'=>$targets]);
    }

    public function destroy($id)
    {
      Target::delete($id);
      return response()->json(['success'=>"Sijil terpilih dihapuskan.", 'tr'=>'tr_'.$id]);
      
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Target::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Sijil terpilih dihapuskan."]);
    }
    
    public function AdsearchPost1(Request $request)
    {
        $user = Auth::user();
        
        if ($user->hasRole( 'admin') ) {
            
        $targets = Target::whereBetween('created_at',[$request->start_date,$request->end_date])->orderBy('id', 'desc')
        ->paginate(10);    
        }
        else {
        
        $targets = Target::whereBetween('created_at',[$request->start_date,$request->end_date])->where('user_id', $user->id)->orderBy('id', 'desc')
        ->paginate(10);
        }
     

        return view('/target/searchtarget2', compact('user', 'targets'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
