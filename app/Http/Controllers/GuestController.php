<?php

namespace App\Http\Controllers;

use App\Models\Sijil;
use App\Models\Target;
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

class GuestController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show(Manual $manual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function edit(Manual $manual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manual $manual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manual $manual)
    {
        //
    }

    public function searchguestJPN(Request $request)
    {
        $search = $request->input('search3');
        
        $manuals = Manual::query()
        ->where('ic', 'LIKE', "%{$search}%")
        ->orwhere('kodsekolah', 'LIKE', "%{$search}%")
        ->orderBy('id', 'desc')
        ->get();
        
        return view('/manual/searchguest', compact('manuals'));
    }

    public function searchguestPPD(Request $request)
    {
        $search = $request->input('search4');
        
        $targets = Target::query()
        ->where('ic', 'LIKE', "%{$search}%")
        ->orwhere('kodsekolah', 'LIKE', "%{$search}%")
        ->orderBy('id', 'desc')
        ->get();
       
        
        return view('/target/searchtarget3', compact('targets'));
    }

    public function pdfJPN($id)
    {
       
            $data = Manual::find($id); 
        
            $pdf = PDF::loadView('/guest/pdf3', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            
            return $pdf->download('sijilJPNMelaka.pdf'); 
    
        
        
    }

    public function pdfPPD($id)
    {
       
            $data = Target::find($id); 
        
            $pdf = PDF::loadView('/guest/pdf2', ['data'=>$data])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            
            return $pdf->download('sijilPPDMelaka.pdf'); 
    
        
        
    }
}
