<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        User::factory()->create([
            'email' => 'a@test.com',
            'password' => '12345678'
        ]);

        Ticket::factory(100)
            ->recycle($users)
            ->create();
    }
}
