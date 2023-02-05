<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'user_id' => User::factory(),
            'personal_team' => true,
        ];
    }

    /**
     * Indicate that the team should have a subscription plan.
     *
     * @return $this
     */
    public function withSubscription(string|int $planId = null): static
    {
        return $this->afterCreating(function (Team $team) use ($planId) {
            optional($team->customer)->update(['trial_ends_at' => null]);

            $team->subscriptions()->create([
                'name' => 'default',
                'paddle_id' => random_int(1, 1000),
                'paddle_status' => 'active',
                'paddle_plan' => $planId,
                'quantity' => 1,
                'trial_ends_at' => null,
                'paused_from' => null,
                'ends_at' => null,
            ]);
        });
    }

}
