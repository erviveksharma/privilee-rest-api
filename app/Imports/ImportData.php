<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Services\JSONService;

class ImportData implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $jsonService = new JSONService();

        foreach ($rows as $row) {
            $jsonService->set([
                'id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'discount_percentage' => $row['discount_percentage'],
            ]);
        }

        $jsonService->save();
    }
}
