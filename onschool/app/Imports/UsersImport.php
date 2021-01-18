<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithChunkReading, ShouldQueue, WithBatchInserts, WithStartRow
{

    public function model(array $row)
    {
        return new User([
            'name'       => $row['1'],
            'email'      => $row['2'],
            'phone'      => $row['3'],
            'password'   => Hash::make('123'),
            'created_at' => $row['4'],
        ]);
    } // end of model

    public function startRow(): int
    {
        return 2;
    } // end of startRow

    public function batchSize(): int
    {
        return 50;
    } // end of batchSize

    public function chunkSize(): int
    {
        return 50;
    } // end of chunkSize

} // end of users import
