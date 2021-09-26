<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')
            ->insert([
                [
                    'type' => 'B',
                    'name' => 'Środki trwałe',
                    'number' => '010',
                    'is_balance_account' => 1,
                    'is_result_account' => 0,
                    'is_beyond_balance_account' => 0,
                    'is_clearing_account' => 0,
                    'is_file_account' => 0,
                ],
                [
                    'type' => 'B',
                    'name' => 'Grunty',
                    'number' => '010-00',
                    'is_balance_account' => 1,
                    'is_result_account' => 0,
                    'is_beyond_balance_account' => 0,
                    'is_clearing_account' => 0,
                    'is_file_account' => 0,
                ],
                [
                    'type' => 'B',
                    'name' => 'Budynki i lokale, spółdzielcze własnościowe prawo do lokalu',
                    'number' => '010-01',
                    'is_balance_account' => 1,
                    'is_result_account' => 0,
                    'is_beyond_balance_account' => 0,
                    'is_clearing_account' => 0,
                    'is_file_account' => 0,
                ],
                [
                    'type' => 'B',
                    'name' => 'Obiekty inżynierii lądowej i wodnej',
                    'number' => '010-01',
                    'is_balance_account' => 1,
                    'is_result_account' => 0,
                    'is_beyond_balance_account' => 0,
                    'is_clearing_account' => 0,
                    'is_file_account' => 0,
                ],
            ]);
    }
}
