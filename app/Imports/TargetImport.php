<?php

namespace App\Imports;

use Auth;
use App\Models\Target;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TargetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Target([
            'peserta' => $row['namapeserta'],
            'ic' => $row['kadpengenalan'],
            'kodsekolah' => $row['kodsekolah'],
            'sekolah' => $row['sekolah'],
            'username' => Auth::user()->name,
            'tarikhA' => $row['tarikhmula'],
            'tarikhB' => $row['tarikhtamat'],
            'program' => nl2br($row['acara']),
            'tempat' => $row['tempat'],
            'anjuran' => $row['anjuran'],
            'jsijil' => $row['jenissijil'],
            'logopath' => $row['namapengesah'],
            'sn' => random_int(100000, 999999),
            'sainpath' => $row['tandatanganpengesah'],
            'logo' => $row['logo'],
            'jabatansain' => $row['jabatanpengesah'],
            'jawatansain' => $row['jawatanpengesah'],
            'state1' => $row['butiran'],
            'state2' => $row['perlantikan'],
            'state3' => $row['kategori'],
            'user_id' => auth()->id(),
        ]);
    }
}
