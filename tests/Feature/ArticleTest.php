<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $user = User::factory()->create();
        $article = Article::factory()->create();
        $response = $this->actingAs($user)
            /*
             * Fungsi from digunakan untuk membuat simulasi seolah-olah
             * action dilakukan dari halaman yang diminta
             */
            ->from('/articles-create')
            ->post('/articles-store', [
                'name' => $this->faker->name,
                'description' => $this->faker->text,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/articles-create');
    }
}
