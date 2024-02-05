<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;   
use Tests\TestCase;

class TodoListTest extends TestCase
{
    public function test_example()
    {
        // Arrange / Preperation / prepare   

        
        // Act / Action / perform
        $response = $this->getJson('todo-list');
        dd($response->json());


        // Assertion  / perdict
        $this->assertEquals(1,count($response->json()));

    }



    


}
