<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Status',
            'Locker',
            'Tr_no',
            'Sl_no',
            'Product',
            'Dis_status',
            'Price',
            'Lit',
            'Money',
            'Money',
            'Pfc_tot',
            'Tr_status',
            'Rfid',
            'Ctype',
            'Method',
            'Bill_no',
            'Created_at',
            'Updated_at',
        ];
    }
}
