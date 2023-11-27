<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">

<br>
<br>

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
      <th scope="col">Muatturun</th>
      
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
  <td><a href="{{ route('pdf.sijil', $sijil->id) }}" class="btn btn-default btn-sm fa fa-print" role="button" aria-pressed="true"></a>
  </td>

    @empty
    <tr>
    
    <td colspan="9">Tiada Rekod !! </td>
    
    </tr>

@endforelse
  </tbody>


    
  
  

</table>  


{{ $sijils->links() }}
  

<h1 style="text-align: center;"><a href="{{ url('/') }}" class="btn btn-success btn-sm " role="button" aria-pressed="true">Kembali</a></h1>  

</div>




</x-app-layout>