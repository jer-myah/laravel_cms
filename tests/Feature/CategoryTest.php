<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Spatie\Permission\Traits\HasRoles;

class CategoryTest extends TestCase
{
    use HasRoles;
    
    protected function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now re-register all the roles and permissions (clears cache and reloads relations)
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

    }

    /**
     * Test user with proper role should not access this
     */
    public function test_create_category_screen_cannot_be_rendered_to_non_admin(): void
    {
        $this->artisan('db:seed');

        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->from('/admin/categories')->get('/admin/create-category');

        $response->assertForbidden();
    }

    /**
     * Test only admin can access this
     */
    public function test_create_category_screen_can_be_rendered(): void
    {
        $user = User::where('email', 'admin@example.com')->first();

        $response = $this->actingAs($user)->from('/admin/categories')->get('/admin/create-category');
        $response->assertStatus(200);
    }

    /**
     * Test only admin can save category
     */
    public function test_admin_can_create_category(): void
    {
        $user = User::where('email', 'admin@example.com')->first();

        $response = $this->actingAs($user)
                        ->from('/admin/categories')
                        ->post('/admin/create-category', ['name' => 'Engineering']);

        $response
            ->assertRedirect('/admin/categories');
        
        $this->assertAuthenticated();
        $this->assertNotEmpty($user);
    }
    

    /**
     * Test only admin can update category
     */
    public function test_admin_can_update_category(): void
    {
        $user = User::where('email', 'admin@example.com')->first();

        $response = $this->actingAs($user)
                        ->from(route('admin.categories.edit', 1))
                        ->put(route('admin.categories.update', 1), ['name' => 'Marketing']);

        $response
            ->assertRedirect('/admin/categories');
        
        $this->assertAuthenticated();
        $this->assertNotEmpty($user);
    }
}
