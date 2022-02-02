<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_create()
    {
        $response = $this->get('/create');

       $response->assertStatus(200);
    } 

    public function test_it_stores_new_products()
    {
        $response = $this->post('/api/products', [
           'name'=> 'Test Product',
           'description' => 'Description',
           'price'=> 2500
        ]);

        $response->assertStatus(200);

      
    } 
}
