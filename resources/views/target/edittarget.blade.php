<input type="hidden" name="id" value="{{$data['id']}}">
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
                    <td class="tg-lnq41" colspan="2">JENIS SIJIL</td>
                
                
                    <td class="tg-fa12" colspan="2">
                    <input type="text" class="form-control" name="jsijil" value="{{$data['jsijil']}}" style="width:250px;height:25px"></td>
                    
                </tr>
                <tr>
                    <td class="tg-lnq4">TAJUK ACARA</td>
                    <td class="tg-fa12"><textarea class="form-control" name="program" style="width:250px;height:90px" required >{!! str_replace("<br />", "\n", $data['program']) !!}</textarea></td>
                    <td class="tg-fa12">TEMPAT</td>
                    <td class="tg-fa12"><textarea class="form-control" name="tempat" style="width:250px;height:90px" required >{{$data['tempat']}}</textarea></td>
                </tr>
                <tr>
                    <td class="tg-lnq41" colspan="2">KATEGORI</td>
                    <td class="tg-fa12" colspan="2">
                    <input type="text" class="form-control" name="state3" value="{{$data['state3']}}" style="width:250px;height:25px"></td>
                     
                </tr>
                <tr>
                    <td class="tg-fa12">KENYATAAN KEHADIRAN / BUTIRAN</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="state1" value="{{$data['state1']}}" style="width:250px;height:25px"></td>
                     
                    <td class="tg-lnq4">PERLANTIKAN PESERTA</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="state2" value="{{$data['state2']}}" style="width:250px;height:25px"></td>
                </tr>
                 
                <tr>
                    <td class="tg-fa12">PENGANJUR</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="anjuran" value="{{$data['anjuran']}}" style="width:250px;height:25px"></td>
                     
                    <td class="tg-lnq4">PEREKA</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="username" value="{{$data['username']}}" style="width:250px;height:25px"></td>
                </tr>
                <tr>
                    <td class="tg-lnq4">TARIKH MULA</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="tarikhA" style="width:250px;height:25px" value="{{$data['tarikhA']}}" /></td>
                    <td class="tg-lnq4">TARIKH TAMAT</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="tarikhB" style="width:250px;height:25px" value="{{$data['tarikhB']}}" /></td>
                </tr>
                
                <tr>
                    <td class="tg-lnq4">PILIH TANDATANGAN PENGESAH</td>
                    <td class="tg-fa12"><select name="sainpath" class="form-control" style="width:250px;height:33px" required>
                        <option value="">--</option>  
                        <!--<option value="p1">Pengarah</option>
                        <option value="tp2">Timbalan Pengarah</option>-->
                        <option value="kppdag">Pegawai PPD Alor Gajah</option>
                        <option value="kppdmt">Pegawai PPD Melaka Tengah</option>
                        <option value="kppdj">Pegawai PPD Jasin</option>
                        
                    </select></td>
                    <td class="tg-lnq4">JAWATAN PENGESAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="jawatansain" value="{{$data['jawatansain']}}" style="width:250px;height:25px"></td>
                </tr>
                <tr>
                    <td class="tg-lnq4">NAMA PENGESAH SIJIL</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="logopath" style="width:250px;height:25px;text-transform:uppercase" value="{{$data['logopath']}}" /></td>
                    <td class="tg-fa12">KEMENTERIAN <br> / JABATAN <br> PENGESAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="jabatansain" value="{{$data['jabatansain']}}" style="width:250px;height:25px"></td>
                </tr>
                <tr>
                    <th class="tg-nt5n" colspan="4">MAKLUMAT PESERTA</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                    <td class="tg-lnq4">NAMA PESERTA</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="peserta" style="width:250px;height:25px;text-transform:uppercase" value="{{$data['peserta']}}" /></td>
                    <td class="tg-fa12">KAD PENGENALAN</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="ic" style="width:250px;height:25px" value="{{$data['ic']}}" /></td>
                </tr>
                <tr>
                    <th class="tg-nt5n1" colspan="4">ATAU</th>
                </tr>
                <tr>
                    <td class="tg-lnq4">NAMA SEKOLAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="sekolah" style="width:250px;height:25px;text-transform:uppercase" value="{{$data['sekolah']}}" /></td>
                    <td class="tg-fa12">KOD SEKOLAH</td>
                    <td class="tg-fa12"><input type="text" class="form-control" name="kodsekolah" style="width:250px;height:25px" value="{{$data['kodsekolah']}}" /></td>
                </tr>
                <tr>
                    <th class="tg-nt5n1" colspan="4">**Untuk pemberian sijil kepada Sekolah HANYA isi Nama Sekolah dan Kod Sekolah sahaja <br \>
                    *Abaikan Nama Peserta dan Kad Pengenalan</th>
                </tr>
               
               
                </tbody>
                </table>
               
              </div>
            </div>
        </div>
    </div>