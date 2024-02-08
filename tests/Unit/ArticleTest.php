<?php

namespace Tests\Unit;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     * @test
     */
    public function a_article_belongs_to_a_user()
    {
        // Arrange / Preperation / prepare   
        $user = User::factory()->create();
        $post = Article::factory()->create([
            'title' => 'This is a single article title',
            'body' => 'This is a single article body',
            'user_id' => $user->id,
        ]);
        // dd($post);
        // // Act / Action / perform
        (new ArticleController)->show($post->id);

        // // Assertion  / perdict
        $this->assertEquals($user->id,$post->user_id);

    }
}
