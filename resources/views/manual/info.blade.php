
<div class="container">

  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Acara:</b></li>
      <li class="list-group-item w-auto px-3 border-0 rounded-3 mb-3">{!! $manuals->program !!}</li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Anjuran:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->anjuran}}</li>
      &nbsp; &nbsp;<li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Jenis Sijil:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->jsijil}}</li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
  @if ($manuals->tarikhB != Null)
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Tarikh Mula:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->tarikhA}}</li>
      &nbsp; &nbsp;<li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Tarikh Tamat:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->tarikhB}}</li>
  @else
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Tarikh Mula / Tamat:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->tarikhA}}</li>
  @endif
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Nama Penganjur:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->username}}</li>
      &nbsp; &nbsp;<li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>No. Siri Sijil:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">JPNM{{$manuals->sn}}</li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Bertempat:</b></li>
      <li class="list-group-item w-auto px-3 border-0 rounded-3 mb-3">{{$manuals->tempat}}</li>
  </ul>
  @if ($manuals->ic != Null)
  <ul class="list-group list-group-horizontal-sm">
      <li ><p style="font-size:14px; color:blue;">**Sijil untuk peserta </b></li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>kad Pengenalan:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->ic}}</li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Nama Peserta:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->peserta}}</li>
  </ul>
  @else
  <ul class="list-group list-group-horizontal-sm">
      <li ><p style="font-size:14px; color:red;">**Sijil untuk sekolah </b></li>
  </ul>
  @endif
  @if ($manuals->kodsekolah != Null)
  <ul class="list-group list-group-horizontal-sm">
  <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Kod Sekolah:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->kodsekolah}}</li>
  </ul>
  <ul class="list-group list-group-horizontal-sm">
      <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Nama Sekolah:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->sekolah}}</li>
  </ul>    
      @else
      
      @endif

  @if ($manuals->state2 != Null)
  <ul class="list-group list-group-horizontal-sm">
  <li class="list-group-item px-3 border-0 rounded-3 list-group-item-dark mb-3" style="width: 200px;"><b>Hadir Sebagai:</b></li>
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" style="width: 300px;">{{$manuals->state2}}</li>
  </ul>
      
      @else
      
      @endif
  
  <ul class="list-group list-group-horizontal-sm">
     <li class="list-group-item px-3 border-0 rounded-3 mb-3" ><a href="{{ route('delete.manual', $manuals->id) }}" class="btn btn-danger btn-sm" role="button" aria-pressed="true"><i class="fa fa-trash" style="font-size:18px;color:white"></i></a></li> 
      <li class="list-group-item px-3 border-0 rounded-3 mb-3" ><a href="{{ route('pdf.manual', $manuals->id) }}" class="btn btn-default btn-sm" role="button" aria-pressed="true"><i class="fa fa-download" style="font-size:18px;color:black"></i></a></li>
  </ul>
 
  </ul>
  <br>
  

</div>

