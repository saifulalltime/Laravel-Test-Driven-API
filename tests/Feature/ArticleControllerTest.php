<?php

namespace Tests\Feature;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**  
     * @test
     * There are two type of Test
     * HTTP Test / Route wise Test /URL Check wise Test
     * Direct Method wise Test
    */

    use RefreshDatabase;

     /** 
         * @PHPunit Standard AAA (Arrange, Act, Assert)
         * @Arrange - Essential Requirements write in Arrange
         * @Act - How to Run/what we want to check
         * @Assert - Expectation 
    */

    /**
     * @test
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
            'user_id' => User::factory()->create()->id
        ]);
         
        // Act / Action / perform
        $getPost = (new ArticleController)->show($post->id);

        // Assertion  / perdict
        $this->assertEquals($post->id, $getPost['id']);
        $this->assertEquals('This is a single article title', $getPost['title']);
     }

      /**
     * @test
     */
     // This test will test a single article
     public function it_trow_exception_if_wrong_id_passed()
     {
        // Arrange / Preperation / prepare   
        $post = Article::factory()->create();
        
        // Assertion  / perdict
        $this->expectException(ModelNotFoundException::class);

        // Act / Action / perform
        (new ArticleController)->show(99);
     }

      /**
     * @test
     */
    // Create a new Article
    public function it_creates_a_new_article()
    {
        // Pree Assertion 
        $this->assertDatabaseCount('articles', 0);
        // Arrange / Preperation / prepare   
        $post = [
            'title' => 'This is a single article title',
            'body' => 'This is a single article body',
            'user_id' => User::factory()->create()->id,
        ];
        
        // Act / Action / perform
        (new ArticleController)->store($post);

        // Assertion  / perdict
        $this->assertDatabaseCount('articles',1);
    }

    /**
     * @test
     */
    // Delete a new Article
    public function it_delete_a_specific_article()
    {

        // Arrange / Preperation / prepare   
        // Pree Assertion 
        // DECOY: This record will be untouched
        $untouchedPost = Article::factory()->create();
        $deleteAblePost = Article::factory()->create();
    
        $this->assertDatabaseCount('articles',2);

        // Act / Action / perform
        (new ArticleController)->destroy($deleteAblePost->id);

        // Assertion  / perdict
        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseMissing('articles', ['id' => $deleteAblePost->id]);
        $this->assertDatabaseHas('articles', ['id' => $untouchedPost->id]);
        // Optionally, you can also assert that attempting to delete the untouchable post does not affect the database
        // dd($untouchedPost->id);
        $response = (new ArticleController)->destroy($untouchedPost->id);
        $this->assertDatabaseCount('articles', 0);
    }



     
}
