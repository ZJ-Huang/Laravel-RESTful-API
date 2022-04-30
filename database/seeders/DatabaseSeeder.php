<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
      Schema::disableForeignKeyConstraints();
      Animal::truncate();
      User::truncate();
      Type::truncate();

      Type::factory(5)->create();
      User::factory(5)->create();
      Animal::factory(10000)->create();
      Schema::enableForeignKeyConstraints();
    }
}
