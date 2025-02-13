<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = array_reduce(fake()->paragraphs(rand(2, 3)), function ($carry, $paragraph) {
            return $carry.'<p>'.$paragraph.'</p>';
        }, '');

        return [
            'author_id' => User::factory(),
            'title' => fake()->realText(50),
            'content' => $content,
            'is_published' => rand(0, 1),
        ];
    }
}
