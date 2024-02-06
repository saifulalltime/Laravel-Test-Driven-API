<?php

namespace Tests\Feature;

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

    // This is Method Wise Test
    public function it_shows_list_of_todo()
    {
        /** 
         * @PHPunit Standard AAA (Arrange, Act, Assert)
         * @Arrange - Essential Requirements write in Arrange
         * @Act - How to Run/what we want to check
         * @Assert - Expectation 
        */


        // Arrange / Preperation / prepare   
            Article::factory()->count(10)->create();
        
        // Act / Action / perform
        // $response = $this->getJson('todo-list');
        // dd($response->json());


        // Assertion  / perdict
        // $this->assertEquals(1,count($response->json()));

    }
    
}
