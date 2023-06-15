<?php

namespace App\Imports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Absen([
            'nama' => $row['nama'],
            'jabatan' => $row['jabatan'],
            'masuk' =>    \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['masuk']),
            'pulang'  =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['pulang']),
            'tanggal'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
        
        ]);
    }
}
