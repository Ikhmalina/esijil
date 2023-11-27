<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">
<form class="d-flex float-right mb-3" type="get" action="{{route('search.manual')}}">
<input class="form-control me-2" type="text" name="search2" placeholder="carian" aria-label="Search" title="Isi kad pengenalan peserta (tanpa simpang) / kod sekolah / program" style="height:31px" />
<button class="btn btn-default btn-sm" type="submit" ><i class="fa fa-search" style="font-size:18px;color:grey"></i></button></form>
&nbsp; <button style="margin-bottom: 10px" class="btn btn-outline-danger float-right mb-3 delete_all bg-navy btn-sm " data-url="{{route('deletechkBoxAll.manual')}}">Hapus terpilih</button>

<table  class="table table-bordered table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><input type="checkbox" id="master" /></th>
      <th scope="col">Bil</th>
      <th scope="col">Program</th>
      <th scope="col">Tempat</th>
      <th scope="col">Anjuran</th>
      <th scope="col">Nama Penganjur</th>
      <th scope="col">Tarikh Mula</th>
      <th scope="col">Tarikh Tamat</th>
      <th scope="col">Peserta / Sekolah</th>
      <th scope="col">Kad pengenalan / kod Sekolah</th>
      <th scope="col">Dicipta</th> 
      <th scope="col"></th>
      
    </tr>
  </thead>
  @foreach ( $manuals as $manual )
  <tbody>
  <tr id="tr_{{$manual->id}}">
  <td><input type="checkbox" class="sub_chk" data-id="{{$manual->id}}" /></td>
  <td>{{ ++$i }} </td>
  <td style="color: BlueViolet;">{!! $manual->program !!}</td>
  <td>{{$manual->tempat}} </td>
  <td>{{$manual->anjuran}} </td>
  <td>{{$manual->username}} </td>
  <td>{{$manual->tarikhA}} </td>
  <td>{{$manual->tarikhB}} </td>
  @if($manual['peserta'] == Null)
      <td style="color: MediumSpringGreen;">{{$manual->sekolah}}</td>
      @else <td style="color: Maroon;"> {{$manual->peserta}} </td>
      @endif 
  @if($manual['ic'] == Null)
  <td > {{$manual->sekolah}} </td>
  @else <td style="color: Maroon;"> {{$manual->ic}} </td>
  @endif 
  <td>{{$manual->created_at}}  </td>
  <td> 
       <a class="btn btn-sm" style="background-color:CadetBlue;" data-toggle="modal" id="InfoButton1" data-target="#InfoModal1" data-attr="{{ route('info.manual', $manual->id) }}" title="Edit Borang"><i class="fa fa-info" style="font-size:18px;color:white">&nbsp;info</i></a> 
          <a class="btn btn-warning btn-sm " data-toggle="modal" id="EditButton1" data-target="#EditModal1"
                    data-attr="{{ route('edit.manual', $manual->id) }}" title="Edit Borang"><i class="fa fa-edit" style="font-size:18px;color:white">&nbsp;kemaskini</i></a>
          <a href="{{ route('delete.manual', $manual->id) }}" class="btn btn-danger btn-sm" role="button" aria-pressed="true"><i class="fa fa-trash" style="font-size:18px;color:white">&nbsp;hapus</i></a>
          <a href="{{ route('pdf.manual', $manual->id) }}" class="btn btn-default btn-sm" role="button" aria-pressed="true"><i class="fa fa-download" style="font-size:18px;color:black">&nbsp;muatturun</i></a>
  </td>

 
    </tr>
        <!--<tr>
            <td><hr style="width:100%;text-align:left;margin-left:0"></td>
        </tr>    -->
     
      
 

@endforeach
  </tbody>


    
  


</table>  

@if ($manuals->total())
<div class="clearfix">
    <span style="display: inline-block; vertical-align: middle; line-height: normal;">Papar {{ ($manuals->currentPage() * $manuals->perpage()) - ($manuals->perpage() - 1) }} hingga {{ ($manuals->hasMorePages()) ? ($manuals->currentPage() * $manuals->perpage()) : $manuals->total() }} daripada {{ $manuals->total() }} rekod sijil </span>
    {{ $manuals->links() }}
</div>
@endif

</div>

</x-app-layout>

<!-- cipta modal -->
<div class="modal fade CiptaModal1" id="CiptaModal1" tabindex="-1" role="dialog" aria-labelledby="CiptaModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-light bg-dark">
                <h5 class="modal-title" id="exampleModalLabel1">Cipta Sijil</h5>  
                </div>
                <form id = "manual1" method="POST" action="{{ route('save.manual') }}" enctype="multipart/form-data">
                @csrf
                            
                    <div class="modal-body" id="CiptaBody1">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                        <div class="modal-footer">
                           <table style="border-collapse: collapse; width: 100%;" border="0">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%; text-align: right;" colspan="2">&nbsp;<button type="submit" class="btn btn-success btn-sm" >Hantar</button></td>
                                        <td style="width: 25%; text-align: left;" colspan="2">&nbsp;<a href="{{route('list.manual')}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Tutup</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    
        <!-- edit modal -->
<div class="modal fade BigModal" id="EditModal1" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header text-light bg-dark">
                <h5 class="modal-title" id="exampleModalLabel2">Kemaskini Sijil</h5>  
                </div>
                <form id = "manual1" method="POST" action="{{ route('update.manual') }}" enctype="multipart/form-data">
                @csrf
                            
                    <div class="modal-body" id="EditBody1">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                        <div class="modal-footer">
                           <table style="border-collapse: collapse; width: 100%;" border="0">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%; text-align: right;" colspan="2">&nbsp;<button type="submit" class="btn btn-success btn-sm" >Hantar</button></td>
                                        <td style="width: 25%; text-align: left;" colspan="2">&nbsp;<a href="{{route('list.manual')}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Tutup</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <!-- info modal -->
<div class="modal fade BigModal" id="InfoModal1" tabindex="-1" role="dialog" aria-labelledby="InfoModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header text-light bg-dark">
                <h5 class="modal-title" id="exampleModalLabel2">Maklumat Sijil</h5>  
                </div>
                   
                    <div class="modal-body" id="InfoBody1">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                        <div class="modal-footer">
                           <table style="border-collapse: collapse; width: 100%;" border="0">
                                <tbody>
                                    <tr>
                                        
                                        <td style="width: 50%; text-align: center;" colspan="2">&nbsp;<a href="{{route('list.manual')}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">Tutup</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>

