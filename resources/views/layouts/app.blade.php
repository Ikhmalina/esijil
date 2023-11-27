<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        
        <!--PWA -->
    	<meta name="theme-color" content="#6777ef"/>
    	<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    	<link rel="manifest" href="{{ asset('/manifest.json') }}">
    	
        <meta name="csrf-token" content="{{ csrf_token() }}">
    	

        <title>eSijil</title>

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

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        
        <!-- Datepicker -->
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>      
        <link href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />   
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js"></script>  
            
            
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:center}
            .tg .tg-kfkg{background-color:#dae8fc;border-color:inherit;text-align:center;vertical-align:center}
            .tg .tg-nt5n{background-color:#68cbd0;border-color:inherit;color:#000000;font-weight:bold;text-align:center;vertical-align:center}
            .tg .tg-nt5n1{background-color:#c7db76;border-color:inherit;color:#000000;font-weight:bold;text-align:center;vertical-align:center}
            .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:center}
            .tg .tg-lnq4{border-color:inherit;font-size:12px;text-align:left;vertical-align:center}
            .tg .tg-fa12{border-color:inherit;text-align:left;vertical-align:center}
            .tg .tg-lnq41{border-color:inherit;font-size:12px;text-align:right;vertical-align:center}
            .tg .tg-0lax{border-color:inherit;text-align:left;vertical-align:center}
            .tg .tg-z0uw{background-color:#dae8fc;border-color:inherit;text-align:center;vertical-align:center}
            .tg .tg-0pkj{border-color:inherit;text-align:center;vertical-align:center}
            
        </style>
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
            
            @media (max-width: 767px) {
            .popup1 {
                background-color : #F0F8FF;
                height : 80%;
                width : 50%;
                padding : 30px 40px;
                position : absolute;
                transform : translate(-50%,-50%);
                left : 50%;
                top : 350px;
                border-radius : 8px;
                font-family : "Poppins", sans-serif;
                display : none;
            }

            
            .popup1 button {
                display : block;
                margin : 0 0 20px auto;
                background-color : transparent;
                font-size : 30px;
                color : #2F4F4F;
                border : none;
                outline : none;
                cursor : pointer;

            }

            .popup1 p {
                font-size : 28px;
                text-align : center;
                margin : 3px 0;
                
            }

            .popup1 a {
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
        }   
            
        </style>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' type='text/javascript'></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="custom.js"></script>

    </head>
    <body class="font-sans antialiased">
    @include('sweetalert::alert')
        <!-- Page Heading -->
        <header class="bg-warning shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
    
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>


        <footer class="footer">
            <p style="text-align: center;color:white;">Hakcipta Terpelihara 2022 Jabatan Pendidikan Negeri Melaka</p>
        </footer>
        
        <!-- Script delete all -->
        <script type="text/javascript">
            $(document).ready(function () {

                $('#master').on('click', function(e) {
                if($(this).is(':checked',true))  
                {
                    $(".sub_chk").prop('checked', true);  
                } else {  
                    $(".sub_chk").prop('checked',false);  
                }  
                });

                $('.delete_all').on('click', function(e) {

                    var allVals = [];  
                    $(".sub_chk:checked").each(function() {  
                        allVals.push($(this).attr('data-id'));
                    });  

                    if(allVals.length <=0)  
                    {  
                        alert("Sila pilih data untuk dihapuskan.");  
                    }  else {  

                        var check = confirm("Adakah anda pasti untuk hapus data yang terpilih?");  
                        if(check == true){  

                            var join_selected_values = allVals.join(","); 

                            $.ajax({
                                url: $(this).data('url'),
                                type: 'DELETE',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: 'ids='+join_selected_values,
                                success: function (data) {
                                    if (data['success']) {
                                        $(".sub_chk:checked").each(function() {  
                                            $(this).parents("tr").remove();
                                        });
                                        alert(data['success']);
                                    } else if (data['error']) {
                                        alert(data['error']);
                                    } else {
                                        alert('Whoops!! Ralat!!');
                                    }
                                },
                                error: function (data) {
                                    alert(data.responseText);
                                }
                            });

                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                        }  
                    }  
                });

                $('[data-toggle=confirmation]').confirmation({
                    rootSelector: '[data-toggle=confirmation]',
                    onConfirm: function (event, element) {
                        element.trigger('confirm');
                    }
                });

                $(document).on('confirm', function (e) {
                    var ele = e.target;
                    e.preventDefault();

                    $.ajax({
                        url: ele.href,
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            if (data['success']) {
                                $("#" + data['tr']).slideUp("slow");
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops!! Ralat!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                    return false;
                });
            });


            <!-- buat Modal -->
            $(document).on('click', '#CiptaButton1', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#CiptaModal1').modal("show");
                    $('#CiptaBody1').html(result).show();
                    
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        <!-- edit Modal -->
        $(document).on('click', '#EditButton1', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#EditModal1').modal("show");
                    $('#EditBody1').html(result).show();
                    
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        <!-- info Modal -->
        $(document).on('click', '#InfoButton1', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#InfoModal1').modal("show");
                    $('#InfoBody1').html(result).show();
                    
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        <!-- test Modal -->
        $(document).on('click', '#TestButton1', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#TestModal1').modal("show");
                    $('#TestBody1').html(result).show();
                    
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        //modal daftar
        $(document).on('click', '#daftarButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#daftarModal').modal("show");
                    $('#daftarBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        //modal password pengguna
        $(document).on('click', '#passwordButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#passwordModal').modal("show");
                    $('#passwordBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        <!-- popup -->
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                $('#popup1').modal('show'); // Show the modal after a delay
            }, 1000);
        });

        $('#close').on('click', function () {
            $('#popup1').modal('hide');
        });
        </script>
        
        	<!-- PWA -->
        	<script src="{{ asset('/sw.js') }}"></script>
        	<script>
        	    if (!navigator.serviceWorker.controller) {
        	        navigator.serviceWorker.register("/sw.js").then(function (reg) {
        	            console.log("Service worker has been registered for scope: " + reg.scope);
        	        });
            }
        	</script> 
        

    </body>
    
</html>
