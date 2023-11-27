<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">

<form class="d-flex float-right mb-3" type="get" action="{{ route('search.sijil') }}">
<input class="form-control me-2" type="search" name="search" placeholder="carian sekolah" aria-label="Search" title="Isi maklumat i.c peserta / kod sekolah" />
<button class="btn btn-outline-success float-right mb-3" type="submit">Carian</button></form>

&nbsp; <a class="btn btn-primary float-right mb-3" href="{{route('list.sijil')}}">Senarai Sijil</a>




<!-- <a class="btn btn-primary float-right mb-3" href="">filter date</a> -->

<table  class="table table-bordered table-striped table-md">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Bil</th>
      <th scope="col">Program</th>
      <th scope="col">Kad Pengenalan</th>
      <th scope="col">Kod Sekolah</th>
      <th scope="col">Peserta</th>
      <th scope="col">Sekolah</th>
      <th scope="col">Anjuran</th>
      <th scope="col">Nama Penganjur</th> 
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  @forelse ( $sijils as $sijil )
  <tr>
 
  <td>{{ ++$i }} </td>
  <td>{{$sijil->program}}</td>
  <td>{{$sijil->ic}} </td>
  <td>{{$sijil->kodsekolah}} </td>
  <td>{{$sijil->peserta}} </td>
  <td>{{$sijil->sekolah}} </td>
  <td>{{$sijil->anjuran}} </td>
  <td>{{$sijil->username}}  </td>
  <td><a href="{{ route('edit.sijil', $sijil->id) }}" class="btn btn-info btn-sm fa fa-edit" role="button" aria-pressed="true"> Sijil</a> | 
  <a href="{{ route('edit.peserta', $sijil->id) }}" class="btn btn-warning btn-sm fa fa-edit" role="button" aria-pressed="true"> Peserta</a> | 
  <a href="{{ route('pdf.sijil', $sijil->id) }}" class="btn btn-default btn-sm fa fa-print" role="button" aria-pressed="true"></a>
  @if (auth()->id() == 1  )
  <a href="{{ route('delete.sijil', $sijil->id) }}" class="btn btn-danger btn-sm fa fa-trash" role="button" aria-pressed="true"></a> 
  @elseif (auth()->id() == 2  )
  <a href="{{ route('delete.sijil', $sijil->id) }}" class="btn btn-danger btn-sm fa fa-trash" role="button" aria-pressed="true"></a> 
  @endif
  </td>

    @empty
    <tr>
    
    <td colspan="9">Tiada Rekod !! </td>
    
    </tr>

@endforelse
  </tbody>


   
  
  

</table>  

{!! $sijils->links() !!}
  

  

</div>




</x-app-layout>