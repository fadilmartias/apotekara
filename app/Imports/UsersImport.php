<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nama_user'     => $row['nama'],
            'username'    => $row['username'],
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'no_hp' => $row['no_hp'],
            'is_admin' => $row['is_admin'],
        ]);
    }

    public function onError(Throwable $error)
    {

    }

    // public function rules(): array
    // {
    //     return [
    //         '*.username' => ['string', 'unique:users,username'],
    //         '*.email' => ['email', 'unique:users,email']
    //     ];
    // }
}
