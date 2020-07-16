<?php

use Illuminate\Database\Seeder;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email' => 'duytungnguyen.bkhn.95@gmail.com',
                'password' => Hash::make('12345'),
                'name'=>'Nguyễn Duy Tùng',
            ]

        ];
        DB::table('adminusers')->insert($data);
    }
}
