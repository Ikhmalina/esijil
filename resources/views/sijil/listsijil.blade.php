<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">

<form class="d-flex float-right mb-3" type="get" action="{{route('search.sijil')}}">
<input class="form-control me-2" type="text" name="search" placeholder="carian sekolah" aria-label="Search" title="Isi maklumat i.c peserta / kod sekolah" />
<button class="btn btn-outline-success float-right mb-3" type="submit" >Carian</button></form>

&nbsp; <a class="btn btn-primary float-right mb-3" href="{{route('create.sijil')}}">+ Sijil</a>




<!-- <a class="btn btn-primary float-right mb-3" href="">filter date</a> -->
@foreach ( $sijils as $sijil )
<table  class="table table-bordered table-striped table-dark table-md">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Bil</th>
      <th scope="col">Acara</th></th>
      <th scope="col">Tempat</th>
      <th scope="col">Penganjur</th>
      <th scope="col">Dicipta Oleh</th>
      <th scope="col">Tarikh Mula</th>
      <th scope="col">Tarikh Tamat</th>
      <th scope="col">Perincian</th> 
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  <tr>
 
  <td>{{ ++$i }} </td>
  <td>{{$sijil->program}}</td>
  <td>{{$sijil->tempat}} </td>
  <td>{{$sijil->anjuran}} </td>
  <td>{{$sijil->username}} </td>
  <td>{{$sijil->tarikhA}} </td>
  <td>{{$sijil->tarikhB}} </td>
  <td>{{$sijil->created_at}}  </td>
  <td><a href="{{ route('create.peserta', $sijil->id) }}" class="btn btn-success btn-sm fa fa-edit" role="button" aria-pressed="true">+peserta</a> <br> 
  <a href="{{ route('edit.sijil', $sijil->id) }}" class="btn btn-warning btn-sm fa fa-edit" role="button" aria-pressed="true"> kemaskini</a> <br>
  
  <a href="{{ route('delete.sijil', $sijil->id) }}" class="btn btn-danger btn-sm fa fa-trash" role="button" aria-pressed="true"> hapus total</a> 
  
  </td>

  @if (count($sijil['children']) > 0 )
        @include ('peserta.listpeserta', ['task_id' => $sijil->children])
        Sebanyak {{$sijil['children']->count()}} sijil peserta dijana.
  @endif 
</tr>
        <tr>
            <td><hr style="width:100%;text-align:left;margin-left:0"></td>
        </tr>    
     
      
 

@endforeach
  </tbody>


    
  
  

</table>  

@if ($sijils->total())
<div class="clearfix">
    <span style="display: inline-block; vertical-align: middle; line-height: normal;">Papar {{ ($sijils->currentPage() * $sijils->perpage()) - ($sijils->perpage() - 1) }} hingga {{ ($sijils->hasMorePages()) ? ($sijils->currentPage() * $sijils->perpage()) : $sijils->total() }} daripada {{ $sijils->total() }} rekod</span>
        {{ $sijils->links() }}
</div>
@endif
  

  

</div>

    


</x-app-layout>

