<?php

namespace Database\Seeders;

use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        ContactForm::truncate();
        User::factory(1)->create();
        ContactForm::factory(55)->create();
    }
}
