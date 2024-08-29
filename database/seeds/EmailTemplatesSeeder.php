<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for email_templates table
        DB::table('emailtemplates')->insert([
            'subject' => 'Welcome Email',
            'status' => '1',
            'body' => 'This is the body of the welcome email.',
            'name' => 'Welcome Email Template',
            'to_email' => 'example@example.com',
            'fields' => '{{name}},{{date}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more seed data here if needed
    }
}
