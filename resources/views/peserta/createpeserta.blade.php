<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

<div class="container">
    <form id = "sijils" method="POST" action="{{ route('save.peserta') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$data['id']}}">
     </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <table class="tg" align="center">
                <thead>
                <tr>
                    <th class="tg-nt5n" colspan="4">MAKLUMAT PESERTA</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="tg-fa12">
                        <input type="hidden" class="form-control" name="task_id" value="{{$data['id']}}" />
                    </td>
                </tr>
                              
                <tr>
                    <td class="tg-lnq4">NAMA PESERTA</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="peserta" style="width:250px;height:25px;text-transform:uppercase" value="" /></td>
                    <td class="tg-fa12">KAD PENGENALAN</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="ic" style="width:250px;height:25px" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" /></td>
                </tr>
                <tr>
                    <th class="tg-nt5n1" colspan="4">ATAU</th>
                </tr>
                <tr>
                    <td class="tg-lnq4">NAMA SEKOLAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="sekolah" style="width:250px;height:25px;text-transform:uppercase" value="" /></td>
                    <td class="tg-fa12">KOD SEKOLAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="kodsekolah" style="width:250px;height:25px" value="" /></td>
                </tr>   
                <tr>
                    <th class="tg-nt5n1" colspan="4">**Untuk pemberian sijil kepada Sekolah HANYA isi Nama Sekolah dan Kod Sekolah sahaja <br \>
                    *Abaikan Nama Peserta dan Kad Pengenalan</th>
                </tr>
                <tr>
                    <td class="tg-z0uw" colspan="4"><input type="submit" value=" +Peserta " class="btn btn-primary btn-sm"> &nbsp <a href="{{ route('list.sijil') }}" class="btn btn-success btn-sm " role="button" aria-pressed="true">Kembali</a></td>
                   
                </tr>
                

                </tbody>
                </table>
                </form>
              </div>
            </div>
        </div>
    </div>

</x-app-layout>