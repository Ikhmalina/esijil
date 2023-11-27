 
<table  class="table table-bordered table-striped table-sm">  

  <thead class="table-info">
    <tr>
     
      <th scope="col">Program</th>
      <th scope="col">Peserta</th>
      <th scope="col">Kad Pengenalan</th>
      <th scope="col">Sekolah</th>
      <th scope="col">Kod Sekolah</th>
      <th scope="col"></th>
    </tr>
  </thead>

 <tbody> 
 
  
 @foreach ($sijil->children as $sijil)
   
 <tr> 
       
        <td>{{$sijil->program}} </td>
        <td>{{$sijil->peserta}} </td>
        <td>{{$sijil->ic}} </td>
        <td>{{$sijil->sekolah}} </td>
        <td>{{$sijil->kodsekolah}} </td>
        <td> 
          <a href="{{ route('edit.peserta', $sijil->id) }}" class="btn btn-warning btn-sm fa fa-edit" role="button" aria-pressed="true"></a> |
          <a href="{{ route('delete.peserta', $sijil->id) }}" class="btn btn-danger btn-sm fa fa-trash" role="button" aria-pressed="true"></a> |
          <a href="{{ route('pdf.sijil', $sijil->id) }}" class="btn btn-default btn-sm fa fa-print" role="button" aria-pressed="true"></a>
        </td>
  </tr>

  @endforeach
</table> 


  </tbody>
  





 