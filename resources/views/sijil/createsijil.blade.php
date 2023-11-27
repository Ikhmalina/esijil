<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Sistem eSijil') }}
        </h2>
    </x-slot>

<div class="container">
    <form id = "sijils1" method="POST" action="{{ route('save.sijil') }}" enctype="multipart/form-data">
        @csrf
        
        
     </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <table class="tg" align="center">
                <thead>
                <tr>
                    <th class="tg-nt5n" colspan="4">MAKLUMAT SIJIL</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="tg-lnq41" colspan="2">JUDUL SIJIL</td>
                    <td class="tg-fa12" colspan="2">
                    <select name="jsijil" class="form-control" style="width:300px;height:33px" required>
                        <option value="">--</option>  
                        <option value="Sijil Penyertaan">Sijil Penyertaan</option>
                        <option value="Sijil Penghargaan">Sijil Penghargaan</option>
                        <option value="Anugerah">Anugerah</option>
                        <option value="Anugerah">Anugerah Perkhidmatan Cemerlang</option>
                        <option value="Anugerah">Anugerah Inovasi</option>
                    </select></td>
                   
                </tr>
                <tr>
                    <td class="tg-lnq4">TAJUK ACARA</td>
                    <td class="tg-fa12"><textarea class="form-control" name="program" style="width:250px;height:90px" required ></textarea></td>
                    <td class="tg-fa12">TEMPAT</td>
                    <td class="tg-fa12"><textarea class="form-control" name="tempat" style="width:250px;height:90px" required ></textarea></td>
                <tr>
                    <td class="tg-fa12">PENGANJUR</td>
                    <td class="tg-fa12"><select name="anjuran" class="form-control" style="width:250px;height:33px" required>
                        <option value="">--</option>
                        <option value="Jabatan Pendidikan Negeri Melaka">Jabatan Pendidikan Negeri Melaka</option>
                        <!-- <option value="PPD Alor Gajah">PPD Alor Gajah</option>
                        <option value="PPD Melaka Tengah">PPD Melaka Tengah</option>
                        <option value="PPD Jasin">PPD Jasin</option> -->
                        
                    </select></td>
                     
                    <td class="tg-lnq4">DIREKA OLEH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}" style="width:250px;height:25px" readonly></td>
                </tr>
                <tr>
                    <td class="tg-lnq4">TARIKH MULA</td>
                    <td class="tg-fa12"><input type="date" class="form-control" name="tarikhA" style="width:250px;height:25px" required/></td>
                    <td class="tg-lnq4">TARIKH TAMAT</td>
                    <td class="tg-fa12"><input type="date" class="form-control" name="tarikhB" style="width:250px;height:25px" /></td>
                </tr>
                
                <tr>
                    <td class="tg-lnq4">PILIH TANDATANGAN PENGESAH</td>
                    <td class="tg-fa12"><select name="sainpath" class="form-control" style="width:250px;height:33px" required>
                        <option value="">--</option>  
                       <!-- <option value="p1">Pengarah</option> -->
                        <option value="tp2">Timbalan Pengarah</option>
                        <!-- <option value="kppdag">Pegawai PPD Alor Gajah</option>
                        <option value="kppdmt">Pegawai PPD Melaka Tengah</option>
                        <option value="kppdj">Pegawai PPD Jasin</option> -->
                        
                    </select></td>
                    <td class="tg-lnq4">JAWATAN PENGESAH</td>
                    <td class="tg-fa12"><select name="jawatansain" class="form-control" style="width:250px;height:33px" required>
                        <option value="">--</option>  
                        <!-- <option value="PENGARAH PENDIDIKAN">PENGARAH PENDIDIKAN</option> -->
                         <option value="TIMBALAN PENGARAH PENDIDIKAN">TIMBALAN PENGARAH PENDIDIKAN</option>
                        <!-- <option value="PEGAWAI PENDIDIKAN DAERAH ALOR GAJAH">PEGAWAI PENDIDIKAN DAERAH ALOR GAJAH</option>
                        <option value="PEGAWAI PENDIDIKAN DAERAH MELAKA TENGAH">PEGAWAI PENDIDIKAN DAERAH MELAKA TENGAH</option>
                        <option value="PEGAWAI PENDIDIKAN DAERAH JASIN">PEGAWAI PENDIDIKAN DAERAH JASIN</option> -->
                        
                    </select></td>
                </tr>
                <tr>
                    <td class="tg-lnq4">NAMA PENGESAH SIJIL</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="logopath" style="width:250px;height:25px;text-transform:uppercase" required /></td>
                    <td class="tg-fa12">KEMENTERIAN <br> / JABATAN <br> PENGESAH</td>
                    <td class="tg-fa12"><select name="jabatansain" class="form-control" style="width:250px;height:33px" required>
                        <option value="">--</option>
                        <option value="JABATAN PENDIDIKAN NEGERI MELAKA">Jabatan Pendidikan Negeri Melaka</option>  
                        <!-- <option value="PPD ALOR GAJAH">PPD Alor Gajah</option>
                        <option value="PPD MELAKA TENGAH">PPD Melaka Tengah</option>
                        <option value="PPD JASIN">PPD Jasin</option> -->
                        
                    </select></td>
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