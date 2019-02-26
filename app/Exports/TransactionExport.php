<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class TransactionExport implements FromQuery
{
    use Exportable;

    public function fromYear(string $fromYear){
        $this->fromYear = $fromYear;
        
        return $this;
    }

    public function toYear(string $toYear){
        $this->toYear = $toYear;
        
        return $this;
    }

    public function query(){
        return Transaction::whereBetween('created_at',[$this->fromYear, $this->toYear])->get();
    }


}
