<?php

namespace Tests\Feature;

use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TravelListTest extends TestCase
{
    use RefreshDatabase;

    public function test_travels_list_shows_only_public_records(): void
    {
        $publicTravel = Travel::factory()->create(['is_public' => true]);
        Travel::factory()->create(['is_public' => false]);

        $response = $this->get('/api/travels');

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJsonPath('data.0.name', $publicTravel);
    }
}
