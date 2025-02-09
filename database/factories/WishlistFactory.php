<?php

namespace Database\Factories;

use App\Models\Wishlist;
use App\Models\User;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Le modèle associé à la factory.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Wishlist::class;

    /**
     * Définition de l'état par défaut.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::factory(),
            "card_id" => Card::factory(),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
