<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings() :array
    {
        return ['ID', __('users.username'), __('users.email'), __('users.phone'), __('users.password'), __('general.created_at')];
    } // end of headings

    public function collection()
    {
        return User::select(['id', 'username', 'email', 'phone', 'password', 'created_at'])->get();
        // return User::getUsers();
    } // end of collection

} // end of users export
