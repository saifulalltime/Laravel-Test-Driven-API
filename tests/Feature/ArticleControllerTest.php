<?php

namespace Tests\Feature;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**  
     * @test
     * There are two type of Test
     * HTTP Test / URL Check wise Test
     * Direct Method wise Test
    */

    use RefreshDatabase;

     /** 
         * @PHPunit Standard AAA (Arrange, Act, Assert)
         * @Arrange - Essential Requirements write in Arrange
         * @Act - How to Run/what we want to check
         * @Assert - Expectation 
    */


    // This is Method Wise Test
    public function it_will_show_list_of_article()
    {
        // Arrange / Preperation / prepare   
            Article::factory()->count(10)->create();
        
        // Act / Action / perform
        $post = (new ArticleController)->index();

        // Assertion  / perdict
        $this->assertEquals(10,$post->count());
    }


    /**
     * @test
     */
     // This test will test a single article
     public function it_will_show_a_single_of_article()
     {
        // Arrange / Preperation / prepare   
        $post = Article::factory()->create([
            'title' => 'This is a single article title',
            'body' => 'This is a single article body',
        ]);
         
        // Act / Action / perform
        $getPost = (new ArticleController)->show($post->id);

        // Assertion  / perdict
        $this->assertEquals($post->id, $getPost['id']);
        $this->assertEquals('This is a single article title', $getPost['title']);
     }
     
}
