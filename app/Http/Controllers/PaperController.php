<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;
use App\Models\Sijil;
use DB;
use App\Models\Peserta;
use Illuminate\Support\Facades\File; 
use Auth;
use App\Models\Role;
use App\Models\User;
use Laratrust\Models\LaratrustRole;
use Webpatser\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;


class PaperController extends Controller
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
    public function createpaper()
    {
        return view('/paper/createpaper');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storepaper(Request $request)
    {
        $papers = $request->all();
        $papers['user_id'] = auth()->id();
        
        
        $papers['uuid'] = (string)Uuid::generate();
            if ($request->hasFile('logoname'))  {
            $papers['logoname'] = $request->logoname->getClientOriginalName();
            $request->logoname->storeAs('/logo', $papers['logoname']);
            
            }
            
        $papers['uuid1'] = (string)Uuid::generate();    
            if ($request->hasFile('sainname')) {
                $papers['sainname'] = $request->sainname->getClientOriginalName();
                $request->sainname->storeAs('/sain', $papers['sainname']);
            }
            
        //    Post::insert($arrayData);
        Paper::create($papers);
        if ($papers) {
            Alert::success('Berjaya', 'Maklumat telah disimpan');
            return redirect()->route('list.paper');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function showpaper(Paper $papers)
    {
        $user = Auth::user();
        

        if (auth()->id() == 1 )  {
            $papers = Paper::orderBy('id', 'desc')->paginate(5);
		
        }
        elseif (auth()->id() == 2 )  {
            $papers = Paper::orderBy('id', 'desc')->paginate(5);
		
        }
        else {
        
        $papers = Paper::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);
        //$posts = Post::all();
        }
        return view ('/paper/listpaper', compact('user', 'papers'))->with('i', (request()->input('page', 1) - 1) * 5);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function editpaper($id)
    {
        $data = Paper::find($id); 
        return view ('/paper/editpaper', ['data'=>$data]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function updatepaper(Request $request, Paper $paper)
    {
        $data=Paper::find($request->id);
        
        $data['user_id'] = auth()->id();
        $data->username = $request['username'];
      

        $data['uuid'] = (string)Uuid::generate();
        if($request->logoname != ''){        
            $path = public_path('storage/logo/');
  
            //code for remove old file
            if($data->logoname != ''  && $data->logoname != null){
                $file_old = $path.$data->logoname;
                unlink($file_old);
           }
  
            //upload new file
            $file = $request->logoname;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $data->update(['logoname' => $filename]);
            }
        
            $data['uuid1'] = (string)Uuid::generate();
            if($request->sainname != ''){        
                $path = public_path('storage/sain/');
      
                //code for remove old file
                if($data->sainname != ''  && $data->sainname != null){
                     $file_old1 = $path.$data->sainname;
                     unlink($file_old1);
                }
      
                //upload new file
                $file1 = $request->sainname;
                $filename1 = $file1->getClientOriginalName();
                $file1->move($path, $filename1);
      
                //for update in table
                $data->update(['sainname' => $filename1]);
                }
            
        $data->save();

        if ($data) {
            Alert::success('Berjaya', 'Maklumat telah dikemaskini');
            return redirect()->route('list.paper');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function deletepaper($id)
    {
        $papers = Paper::findOrFail($id);
        $pathToFile = public_path('storage/logo/' . $papers->logoname);

        if (File::exists($pathToFile)) {
            File::delete($pathToFile);
        
        }

        $pathToFile1 = public_path('storage/sain/' . $papers->sainname);

        if (File::exists($pathToFile1)) {
            File::delete($pathToFile1);
        
        }
        $papers->delete();
        if ($papers) {
            Alert::success('Berjaya', 'Maklumat telah dihapuskan');
            return redirect('/paper/listpaper');
        }
        else {
            Alert::error('Gagal', 'Cuba lagi');
            return back();
        }        
    }
}
