<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_category_list()
    {
        //prepare
        //$this->withoutExceptionHandling();

        //action
        $response = $this->getJson(route('api.category.index'));


        //assertion
        $this->assertEquals(1,count($response->json()));

    }
}
