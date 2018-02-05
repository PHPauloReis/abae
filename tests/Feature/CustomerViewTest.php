<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerViewTest extends TestCase
{
    use WithoutMiddleware;

    public function testCustomerListPageOk()
    {
        $user = new User([]);

        $response = $this->actingAs($user)->get('dashboard/customer');
        $response->assertStatus(200);
    }
}
