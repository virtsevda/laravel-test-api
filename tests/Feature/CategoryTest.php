<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_category_list()
    {
        //prepare
        $this->withoutExceptionHandling();
        Category::create([
            "name"=>"test",
            "slug"=>"slug"
        ]);
        Category::create([
            "name"=>"test2",
            "slug"=>"slug2"
        ]);

        //action
        $response = $this->getJson(route('api.category.index'));
        //dd($response->json()["data"]);

        //assertion
        $this->assertEquals(2,count($response->json()["data"]));

    }
}
