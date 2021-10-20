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
        Category::factory()->create();

        //action
        $response = $this->getJson(route('api.category.index'));
        //dd($response->json()["data"]);

        //assertion
        $this->assertEquals(1,count($response->json()["data"]));
    }

    public function test_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson(route('api.category.show',$category->id))
                    ->assertOk()
                    ->json();

        $this->assertEquals($response['result']['name'],$category->name);
        $this->assertEquals($response['result']['slug'],$category->slug);
    }
}
