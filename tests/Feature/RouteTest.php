<?php
namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWelcomeRoute()
    {
        $response = $this->get(route('welcome'));
        $response->assertStatus(200);
        $response->assertViewIs('welcome');
    }

    public function testNewsRoutes()
    {
        $response = $this->get(route('news_categories'));
        $response->assertStatus(200);
        $response->assertViewIs('news_categories');

        $response = $this->get(route('news', ['id' => 1]));
        $response->assertStatus(200);
        $response->assertViewIs('news');
    }

    public function testAuthorizationPageRoute()
    {
        $response = $this->get(route('authorizationPage'));
        $response->assertStatus(200);
        $response->assertViewIs('authorization');
    }

    public function testAdminRoutes()
    {
        $response = $this->get(route('addNews'));
        $response->assertStatus(200);
        $response->assertViewIs('addNews');

        $response = $this->get(route('feedbackNews'));
        $response->assertStatus(200);
        $response->assertViewIs('feedback');

        $response = $this->get(route('orderNews'));
        $response->assertStatus(200);
        $response->assertViewIs('orderNews');

        $response = $this->post(route('feedback.store'), ['name' => 'John', 'email' => 'john@example.com', 'message' => 'Test message']);
        $response->assertStatus(302);
        $response->assertRedirect(route('orderNews'));

        $response = $this->post(route('order.store'), ['name' => 'John', 'email' => 'john@example.com', 'phone' => '1234567890', 'message' => 'Test message']);
        $response->assertStatus(302);
        $response->assertRedirect(route('orderNews'));
    }
}
