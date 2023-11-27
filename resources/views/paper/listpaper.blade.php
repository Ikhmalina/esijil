<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

    
<div class="container">

<form class="d-flex float-right mb-3" type="get" action="">
<input class="form-control me-2" type="search" name="search" placeholder="carian " aria-label="Search">
<button class="btn btn-outline-success float-right mb-3" type="submit">Carian</button></form>

&nbsp; <a class="btn btn-primary float-right mb-3" href="{{route('create.paper')}}">+ dokumen</a>

<!-- <a class="btn btn-primary float-right mb-3" href="">filter date</a> -->
<table  class="table table-bordered table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Bil</th>
      <th scope="col">Pemuat Naik</th>
      <th scope="col">Dokumen Logo</th>
      <th scope="col">Dokumen Tandatangan</th>
      <th scope="col">Tarikh</th>
      <th scope="col">Perincian</th>
      
      
      
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ( $papers as $paper)
  
 
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$paper->username}}</td>
            <td>{{$paper->logoname}}</td>
            <td>{{$paper->sainname}}</td>
            <td>{{$paper->created_at}}</td>
            

            
            <td>
                <a href="{{ route('edit.paper', $paper->id) }}" class="btn btn-warning btn-sm fa fa-edit" role="button" aria-pressed="true"></a> | 
                <a href="{{ route('delete.paper', $paper->id) }}" class="btn btn-danger btn-sm fa fa-trash" role="button" aria-pressed="true"></a> 
                 
                             
            </td>
           
        
  
  @endforeach 

  
  </tbody>
</table>
{!! $papers->links() !!}

</div>



</x-app-layout>