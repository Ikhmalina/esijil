<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">

<!--<form class="d-flex float-right mb-3" type="get" action="{{route('search.manual')}}">
<input class="form-control me-2" type="text" name="search2" placeholder="carian" aria-label="Search" title="Isi maklumat i.c peserta / kod sekolah" />
<button class="btn btn-default btn-sm fa fa-search" type="submit" ></button></form>
&nbsp; <button style="margin-bottom: 10px" class="btn btn-primary float-right mb-3 delete_all bg-navy" data-url="{{route('deletechkBoxAll.manual')}}">Hapus terpilih</button>-->
  <!-- Daftar modal -->
  <a class="btn btn-outline-primary btn-sm text-light float-right mb-3" data-toggle="modal" id="daftarButton" data-target="#daftarModal"
      data-attr="{{ route('daftar.pengguna') }}" title="Pendaftaran Pengguna"><i class="fa fa-file-o" style="font-size:14px;color:black">  Daftar</i>
  </a>

<!-- <a class="btn btn-primary float-right mb-3" href="">filter date</a> -->

<table  class="table table-bordered table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Bil</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      
      <th scope="col">Dicipta</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  @foreach ( $users as $user )
  <tbody>
  <tr>
  <td>{{ ++$i }} </td>
  <td>{{$user->name}}</td>
  <td>{{$user->email}} </td>
  
  <td>{{$user->created_at}}  </td>
  <td> 
  
    
    <a class="btn btn-warning btn-sm" data-toggle="modal" id="passwordButton" data-target="#passwordModal" data-attr="{{ route('edit.pengguna', $user->id) }}" role="button" aria-pressed="true"><i class="fa fa-edit" style="font-size:18px;color:black"></i></a> |
  <a href="{{ route('delete.pengguna', $user->id) }}" class="btn btn-danger btn-sm " role="button" aria-pressed="true"><i class="fa fa-trash" style="font-size:18px;color:black"></i></a>
   </td>

 
    </tr>
        <!--<tr>
            <td><hr style="width:100%;text-align:left;margin-left:0"></td>
        </tr>    -->
     
      
 

@endforeach
  </tbody>


    
  


</table>  

@if ($users->total())
<div class="clearfix">
    <span style="display: inline-block; vertical-align: middle; line-height: normal;">Papar {{ ($users->currentPage() * $users->perpage()) - ($users->perpage() - 1) }} hingga {{ ($users->hasMorePages()) ? ($users->currentPage() * $users->perpage()) : $users->total() }} daripada {{ $users->total() }} rekod pengguna </span>
    {{ $users->links() }}
</div>
@endif

</div>

</x-app-layout>

<!-- Daftar -->
<div class="modal fade daftarModal" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-light bg-dark">
                <h5 class="modal-title" id="exampleModalLabel1">Daftar Pengguna</h5>
                </div>
                    <form action="{{ route('daftar') }}" method="post">
                            @csrf

                    <div class="modal-body" id="daftarBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                        <div class="modal-footer">
                           <table style="border-collapse: collapse; width: 100%;" border="0">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%; text-align: right;" colspan="2">&nbsp;<button type="submit" class="btn btn-outline-success btn-sm" >Simpan</button></td>
                                        <td style="width: 25%; text-align: left;" colspan="2">&nbsp;<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Tutup</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Password -->
    <div class="modal fade passwordModal" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-light bg-dark">
                <h5 class="modal-title" id="exampleModalLabel1">Kemaskini Katalaluan</h5>
                </div>
                    <form action="{{ route('update.pengguna') }}" method="post">
                            @csrf

                    <div class="modal-body" id="passwordBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                        <div class="modal-footer">
                           <table style="border-collapse: collapse; width: 100%;" border="0">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%; text-align: right;" colspan="2">&nbsp;<button type="submit" class="btn btn-outline-success btn-sm" >Simpan</button></td>
                                        <td style="width: 25%; text-align: left;" colspan="2">&nbsp;<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Tutup</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
            </div>
        </div>
    </div>

