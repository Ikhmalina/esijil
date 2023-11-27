<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
        <script src="custom.js"></script>


        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            
            
            
            body {
                margin-bottom: 60px;
            }

            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                height: 60px;
                line-height: 60px;
                background-color: #003b6f;
            }
            
            .popup {
                background-color : #EEE8AA;
                height : 300px;
                width : 450px;
                padding : 30px 40px;
                position : absolute;
                transform : translate(-50%,-50%);
                left : 50%;
                top : 30%;
                border-radius : 8px;
                font-family : "Poppins", sans-serif;
                display : none;
            }

            
            .popup button {
                display : block;
                margin : 0 0 20px auto;
                background-color : transparent;
                font-size : 30px;
                color : #2F4F4F;
                border : none;
                outline : none;
                cursor : pointer;

            }

            .popup p {
                font-size : 18px;
                text-align : center;
                margin : 3px 0;
                
            }

            .popup a {
                display : block;
                width : 150px;
                position : relative;
                margin : auto;
                text-align : center;
                background-color : #0f72e5;
                color : #ffffff;
                text-decoration : none;
                padding : 5px 0;
            }

           
            </style>
           
    </head>
    <body>
    <header class="bg-warning shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                        {{ __('Sistem eSijil') }}
                    </h2>
                </div>
            </header>
    
    <div class="container">   




<!-- <a class="btn btn-primary float-right mb-3" href="">filter date</a> -->
<br>
<br>
<table  class="table table-bordered table-striped table-sm">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Kategori</th>
      <th scope="col">Acara</th>
      <th scope="col">Tempat</th>
      <th scope="col">Anjuran</th>
      
      <th scope="col">Tarikh Acara</th>
      
      <th scope="col">Peserta / Sekolah</th>
      <th scope="col">Kad pengenalan / kod Sekolah</th>
      <th scope="col">Dicipta</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  @forelse ( $manuals as $manual )
  <tr>
 
  
  <td><b>{{$manual->jsijil}} </b></td>
  <td>{!! $manual->program !!}</td>
  <td>{{$manual->tempat}} </td>
  <td>{{$manual->anjuran}} </td>
  @if($manual['tarikhB'] != Null)
  <td>{{$manual->tarikhA}}-{{$manual->tarikhB}}</td>
  @else
  <td>{{$manual->tarikhA}} </td>
  @endif
  @if($manual['peserta'] == Null)
            <td style="color: Sienna;"> {{$manual->sekolah}} </td>
      @else <td style="color: MediumSeaGreen;"> {{$manual->peserta}} </td>
      @endif 
  @if($manual['ic'] == Null)
        <td style="color: Sienna;"> {{$manual->kodsekolah}} </td>
  @else <td style="color: MediumSeaGreen;"> {{$manual->ic}} </td>
  @endif 
  <td>{{$manual->created_at}}  </td>
  <td>
    
        <a href="{{ route('pdf.guest1', $manual->id) }}" class="btn btn-default btn-sm" role="button" aria-pressed="true"><i class="fa fa-download" style="font-size:18px;color:black">&nbsp;muatturun</i></a>
  </td>
    
    @empty
    <tr>
    
    <td colspan="9">Tiada Rekod !! </td>
    
    </tr>

@endforelse

    <tr>
    
    <td colspan="10"><h1 style="text-align: center;"><a href="{{ url('/') }}" class="btn btn-success btn-sm " role="button" aria-pressed="true">Kembali</a></h1> </td>
    
    </tr>
  </tbody>


    
  
  

</table>  



</div>

<div class="popup">
    <button id="close">&times;</button>
    <center><h2>
            MAKLUMAN
    </h2></center>
    <p>**Sijil dapat dimuatturun dalam tempoh 6 bulan selepas tarikh dicipta</p>
    
    <!--<a href="#" id="close">Tutup</a>-->
</div>

<footer class="footer">
    <p style="text-align: center;color:white;">Hakcipta Terpelihara 2022 Jabatan Pendidikan Negeri Melaka</p>
    </footer> 
<script>
    <!-- popup -->
        window.addEventListener("load", function () {
            setTimeout(
                function open(event) {
                    document.querySelector(".popup").style.
                    display = "block"
                },
                1000
            )
        });

        document.querySelector("#close").addEventListener
            ("click", function() {
                document.querySelector(".popup").style.display = "none";
            });
</script>

</body>



</html>