<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;


class UserControllerTest extends TestCase
{

    /**
     * Index Method Test.
     *
     * @return void
     */
    public function testIndexTest()
    {
        $user = User::first();
        Passport::actingAs(
            $user, ['*']
        );
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    /**
     * Store Method Test.
     *
     * @return void
     */
    public function testStoreTest()
    {
        $user = User::first();
        Passport::actingAs(
            $user, ['*']
        );
        $user2 = factory(User::class)->make()->toArray();
        $user2['password_confirmation'] = $user2['password'] = 123456;

        $response = $this->post('/api/users', $user2);
        $response->assertStatus(200);
    }

    /**
     * Show Method Test.
     *
     * @return void
     */
    public function testShowTest()
    {
        $user = User::first();
        Passport::actingAs(
            $user, ['*']
        );
        $response = $this->get('/api/users/' . $user->id);

        $response->assertStatus(200);
    }

    /**
     * Update Method Test.
     *
     * @return void
     */
    public function testUpdateTest()
    {
        $user = User::first();
        Passport::actingAs(
            $user, ['*']
        );
        $user2 = factory(User::class)->create();

        $response = $this->put('/api/users/' . $user2->id, $user2->toArray());

        $response->assertStatus(200);
    }

    /**
     * Destroy Method Test.
     *
     * @return void
     */
    public function testDestroyTest()
    {
        $user2 = factory(User::class)->create();
        $user = User::first();
        Passport::actingAs(
            $user, ['*']
        );
        $response = $this->delete('/api/users/' . $user2->id);

        $response->assertStatus(200);
    }


}
