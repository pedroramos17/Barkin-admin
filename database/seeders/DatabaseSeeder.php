<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DateTimeZone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory()->create([
      'name' => 'Pedro',
      'email' => 'pedro@test.com',
      'is_admin' => true,
      'author' => json_encode([
        "id" => 1,
        "name" => "Pedro",
        "datetime" => new \DateTime('now', new DateTimeZone('America/Sao_Paulo'))
      ]),
    ]);

    \App\Models\User::factory(10)->create();
    
    \App\Models\Driver::factory()
        ->has(\App\Models\Vehicle::factory())
        ->create();
  }
}
