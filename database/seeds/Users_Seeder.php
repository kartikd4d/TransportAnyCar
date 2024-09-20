<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = collect([
            'name',
            'username',
            'password',
            'email',
            'type',
        ]);
        $values = [
            [
                'admin',
                'admin',
                '$2y$10$JcZaElvgAyEd20Nm.475zOk3cRNz8nReRSmXcfLVXrRszcDHB0RFu',
                'admin@gmail.com',
                'admin'
            ]
        ];

        foreach ($values as $key => $value) {
            $data = $keys->combine($value);
            DB::table('users')->insert($data->all());
        }

    }
}
