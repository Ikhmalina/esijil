<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sijil</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&family=Source+Serif+4:opsz,wght@8..60,600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- Styles -->
        
        <style>
        @page { margin: 0in; }
        body {
            width:100%;
            height:100%;
        }
        .next0 {
            margin: auto;
            width: auto;
            padding-top: 140px;
            padding-left: 55px;
            padding-bottom: 80px;
            color: white;
            font-family: 'Merriweather', serif;
            font-size: 42px;            
        }
        
        .next1 {
        margin: auto;
        width: auto;
        padding-top: 0px;
        padding-bottom: 0px;
        color: black;
        }

        .next2 {
        margin: auto;
        width: auto;
        padding-top: 35px;
        padding-left: 55px;
        padding-right: 55px;
        padding-bottom: 0px;
        color: black;
        }

        .next3 {
        margin: auto;
        width: auto;
        padding-top: 45px;        
        padding-left: 55px;
        padding-right: 55px;
        padding-bottom: 0px;
        color: black;
        }

        .uppercase {
        text-transform: uppercase;
        }
        
        
         </style>
        
    </head>
    
<body>

<div style="position: fixed; background-repeat:no-repeat; z-index: -1000; ">
      <img src="./storage/logo/sijilbaru.png" style="width: 794px; height: 1123px;">
</div>

<form id = "pdf" method="GET" action="" enctype="multipart/form-data">

<div class="next0" >
        
    <table align="left" border="0" cellpadding="5" cellspacing="1">
        <tbody>
            <tr>
                <td>{{$data['jsijil']}}</td>
            </tr>
        </tbody>
    </table>

</div>

<div class="next1" >
    <table align="center" style="text-align:center; width:100%;" class="table table-borderless table-sm">
    <tbody>
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Dengan ini diperakukan bahawa</span></span></td>
                </tr>
                @if ($data['sekolah'] == Null )
                <tr>
                    <td style="text-align:center">
                    <span style="font-size:24px"><span class="uppercase" style="font-family: 'Source Serif 4', serif;"><b>{{ $data['peserta'] }}</b></span></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center"><span style="font-size:14px"><p class="uppercase">No. K/P: {{ $data['ic'] }}</p></span></td>
                </tr>
                @elseif ($data['peserta'] == Null )
               <tr>
                    <td style="text-align:center">
                    <span style="font-size:24px"><span class="uppercase" style="font-family: 'Source Serif 4', serif;"><b>{{ $data['sekolah'] }}</b></span></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center"><span class="uppercase" style="font-size:14px">Kod Sekolah: {{ $data['kodsekolah'] }}</span></td>
                </tr>
                 @elseif ($data['ic'] == Null )
               <tr>
                    <td style="text-align:center">
                    <span style="font-size:24px"><span class="uppercase" style="font-family: 'Source Serif 4', serif;"><b>{{ $data['peserta'] }}</b></span></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center"><span class="uppercase" style="font-size:14px">Kod Sekolah: {{ $data['kodsekolah'] }}</span></td>
                </tr>
                @else
                <tr>
                    <td style="text-align:center">
                    <span style="font-size:24px"><span class="uppercase" style="font-family: 'Source Serif 4', serif;"><b>{{ $data['peserta'] }}</b></span></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center"><span class="uppercase" style="font-size:14px">No. K/P: {{ $data['ic'] }}</span></td>
                </tr>
                @endif
            </tbody>
    </table>

</div>

<div class="next2" >
    <table align="center" style="text-align:center; width:100%;" class="table table-borderless table-sm">
    <tbody>                
                @if ($data['state3'] != Null ) <!-- kategori -->
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span class="uppercase" style="font-size:16px"><b>{{$data['state3']}}</b></span></span></td>
                </tr>
                @elseif ($data['state3'] == Null )    
                <tr>
                    <td style="text-align:center"></td>
                </tr>  
                @endif

                @if (($data['state1'] != Null) && ($data['state3'] == Null )) <!-- butiran -->
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span class="uppercase" style="font-size:16px"><b>{{$data['state1']}}</b></span></span></td>
                </tr>
                @elseif (($data['state1'] != Null) && ($data['state3'] != Null ))
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span class="uppercase" style="font-size:16px">{{$data['state1']}}</span></span></td>
                </tr>
                @else
                <tr>
                    <td style="text-align:center"></td>
                </tr>                
                @endif
                
                @if (($data['state3'] || $data['state1']) == Null )
                <tr>
                    <td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman, Times, serif">telah menyertai</span></span></td>
                </tr>
                @elseif (($data['state3'] || $data['state1']) != Null )
                <tr>
                    <td style="text-align:center"></td>
                </tr>  
                @endif
                <tr>
                    <td style="text-align:center">
                    <span style="font-size:24px"><span class="uppercase" style="font-family:Times New Roman,Times,serif"><B>{!! $data->program !!}</B></span></span>
                    </td>
                </tr>
                
                @if ($data['state2'] != Null ) <!-- perlantikan -->
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><br></span>&nbsp;<span style="font-size:16px"><b>{{$data['state2']}}</b></span></span></td>
                </tr>
                @elseif ($data['state2'] == Null )
                <tr>
                    <td style="text-align:center"></td>
                </tr>
                @endif

                </tbody>
    </table>

</div>

<div class="next3" >
    <table align="center" style="text-align:center; width: 100%;" class="table table-borderless table-sm">
    <tbody>
               
                @if ($data['tarikhB'] != Null )
                <tr>
                    <td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{{$data['tarikhA']}} - {{$data['tarikhB']}}<br>{{$data['tempat']}}</br><br>{{$data['anjuran']}}.</span></span></td>
                </tr>
                @elseif ($data['tarikhB'] == Null )
                <tr>
                    <td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{{$data['tarikhA']}}<br>{{$data['tempat']}}</br><br>{{$data['anjuran']}}</span></span></td>
                </tr>
                @endif
                <tr>
                    <td style="text-align:center"></td>
                </tr> 
    </tbody>
    </table>

</div>

    <table align="center" style="text-align:center; width: 600px; height:10%;" class="table table-borderless table-sm">
    <tbody>
                @if ($data['sainpath'] == 'p1' || $data['sainpath'] == 'P1')
                <tr>
                    <td style="text-align:center"><img src="./storage/sain/p1.png" alt height="5%" width="25%" ></td>
                </tr>
                @elseif ($data['sainpath'] == 'tp2' )
                <tr>
                    <td style="text-align:center"><img src="./storage/sain/tp2.png" alt height="10%" width="30%"  ></td>
                </tr>
                @elseif ($data['sainpath'] == 'kppdag' )
                <tr>
                    <td style="text-align:center"><img src="./storage/sain/kppdag.png" alt height="10%" width="30%"  ></td>
                </tr>
                @elseif ($data['sainpath'] == 'kppdmt' )
                <tr>
                    <td style="text-align:center"><img src="./storage/sain/kppdmt.png" alt height="10%" width="30%"  ></td>
                </tr>
                @elseif ($data['sainpath'] == 'kppdj' )
                <tr>
                    <td style="text-align:center"><img src="./storage/sain/kppdj.png" alt height="10%" width="30%"  ></td>
                </tr>
                @else
                
                @endif
                <tr>
                    <td style="text-align:center"><span style="font-family:Times New Roman,Times,serif"><span class="uppercase" style="font-size:14px">{{$data['logopath']}}<br>{{$data['jawatansain']}}<br>{{$data['jabatansain']}}</span></span></td>
                </tr>
                <tr>
                    <td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span class="uppercase" style="font-size:8px">KPM/JPNMEL153/{{$data['sn']}}</span></span></td>
                </tr>
            </tbody>
        </table>

</form> 

</body>



</html>