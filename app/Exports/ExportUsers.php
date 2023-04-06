<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsers implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'id',
            'Name',
            'Email'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        // return User::select('name', 'email')->get();
        return collect(User::getUserCsv());
    }
}
