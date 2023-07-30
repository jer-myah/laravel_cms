<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    /**
     * Test admin index page can be accessed by admin
     */
    public function test_admin_can_access_pages_index(): void
    {
        $user = User::where('email', 'admin@example.com')->first();
        
        $response = $this->actingAs($user)->get(route('admin.pages.index'));

        $this->assertAuthenticated();

        $response->assertStatus(200);
    }

    /**
     * Test only admin can store page
     */
    public function test_admin_can_create_page(): void
    {
        $user = User::where('email', 'admin@example.com')->first();
        $page = Page::factory()->create();
        
        $response = $this->actingAs($user)
                        ->from(route('admin.pages.index'))
                        ->post(route('admin.pages.create', $page));

        $response
            ->assertRedirect(route('admin.pages.index'));
        
        $this->assertAuthenticated();
        $this->assertNotEmpty($user);
    }
    
    /**
     * Test only admin can update page
     */
    public function test_admin_can_update_page(): void
    {
        $user = User::where('email', 'admin@example.com')->first();
        $page = Page::latest()->first();
        $data = [
            'title' => 'The scope of AI',
            'content' => '<h1>AI: the scope</h1> <p>AI paragraph </p>'.$page->content,
            'meta_title' => 'The scope of AI',
            'meta_description' => $page->meta_description,
            'meta_keywords' => $page->meta_keywords.' Additionally'
        ];
        
        $response = $this->actingAs($user)
                        ->from(route('admin.pages.edit', $page->id))
                        ->put(route('admin.pages.update', $page->id), $data);

        $response
            ->assertRedirect(route('admin.pages.index'));
        
        $this->assertAuthenticated();
        $this->assertNotEmpty($user);
    }

}
