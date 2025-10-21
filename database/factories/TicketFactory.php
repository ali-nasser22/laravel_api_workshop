<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'user_id' => User::Factory(),
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['A', 'C', 'H', 'X']), // A=>Active, C=>Canceled, H=>Hold X=>Closed
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
