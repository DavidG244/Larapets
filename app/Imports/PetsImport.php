<?php

namespace App\Imports;

use App\Models\Pet;
use Maatwebsite\Excel\Concerns\ToModel;

class PetsImport implements ToModel
{
    public function model(array $row)
    {
        return new Pet([
            'name' => $row[0],
            'kind' => $row[1] ?? null,
            'weight' => $row[2] ?? null,
            'age' => $row[3] ?? null,
            'breed' => $row[4] ?? null,
            'location' => $row[5] ?? null,
            'description' => $row[6] ?? null,
            'active' => isset($row[7]) ? (int)$row[7] : 1,
            'status' => $row[8] ?? null,
        ]);
    }
}