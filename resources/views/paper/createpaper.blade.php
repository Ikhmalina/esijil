<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

<div class="container">
    <form id = "sijils" method="POST" action="{{ route('save.paper') }}" enctype="multipart/form-data">
        @csrf
  
     </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <table class="tg" align="center">
                <thead>
                <tr>
                    <th class="tg-nt5n" colspan="4">MAKLUMAT DOKUMEN</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                    <td class="tg-lnq4">PEMUAT NAIK</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}" style="width:250px;height:25px" readonly></td>
                    
                </tr>
               
                <tr>
                    <td class="tg-kfkg" colspan="4">PILIH LOGO</td>
                </tr>
                <tr>
                <td class="tg-0pky" colspan="4">
                    
                <input type="file" name="logoname">
                    
                </td>
                    
                </tr>
                <tr>
                    <td class="tg-kfkg" colspan="4">MUATNAIK TANDATANGAN</td>
                </tr>
                <tr>
                <td class="tg-0pky" colspan="4"><input type="file" name="sainname"></td>
                    
                </tr>

                <tr>
                    <td class="tg-z0uw" colspan="4"><input type="submit" value=" Hantar " class="btn btn-primary"></td>
                </tr>
               
                </tbody>
                </table>
                </form>
              </div>
            </div>
        </div>
    </div>

</x-app-layout>