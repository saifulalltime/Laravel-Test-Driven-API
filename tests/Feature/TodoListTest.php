<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;   
use Tests\TestCase;

class TodoListTest extends TestCase
{
    public function test_example()
    {
        // Preperation / prepare    

        
        // action / perform
        $response = $this->getJson('todo-list');
        dd($response->json());
        // assertion  / perdict

        $this->assertEquals(1,count($response->json()));

    }



    


}
