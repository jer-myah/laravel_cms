<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Spatie\Permission\Models\Role;

class CategoryTest extends TestCase
{
    use WithoutMiddleware;
    
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
        $user = User::factory()->create();
        Role::create(['name' => 'Editor']);

        $user->assignRole('Editor');

        $response = $this->actingAs($user)->from('/admin/categories')->get('/admin/create-category');

        $response->assertForbidden();
    }

    /**
     * Test only admin can access this
     */
    public function test_create_category_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();
        Role::create(['name' => 'Admin']);

        $user->assignRole('Admin');

        $response = $this->actingAs($user)->from('/admin')->get('/admin/create-category');

        $response->assertOk();
    }

    /**
     * Test only admin can save category
     */
    public function test_admin_can_create_category(): void
    {
        $user = User::factory()->create();

        $user->assignRole('Admin');

        $response = $this->actingAs($user)
                        ->from('/admin/categories')
                        ->post('/admin/create-category', ['name' => 'Engineering'])
                        ->withoutMiddleware();

        $response->assertRedirect('/admin/categories');
    }
    
}
