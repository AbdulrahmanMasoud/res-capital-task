<?php

namespace Tests\Feature;

use App\Models\Advertising;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdvertisingTest extends TestCase
{
    use RefreshDatabase;

    private function createAdvertising(array $data = []): Advertising
    {
        return Advertising::factory()->create($data);
    }

    /**
     * test all advertising endpoint is working prefctly
     *
     * @return void
     */
    public function test_can_get_all_advertising()
    {
        $response = $this->get('/api/advertising');

        $response->assertStatus(200);
    }

      /**
     * test can create advertising.
     *
     * @return void
     */
    public function test_can_create_advertising()
    {
        $createAdv = $this->createAdvertising([
            'name' => 'test name',
            'from' => '2022-09-10',
            'to' => '2022-09-29',
            'total' => '867.8',
        ]);

        $response = $this->postJson('/api/advertising', $createAdv->toArray());

        $response->assertStatus(201);
    }

    /**
     * test can update advertising.
     *
     * @return void
     */
    public function test_can_update_advertising()
    {
        $createAdv = $this->createAdvertising([
            'name' => 'test name',
            'from' => '2022-09-10',
            'to' => '2022-09-29',
            'total' => '867.8',
        ]);

        $updatedAdv = [
            'name' => 'updated test name',
            'from' => '2022-09-10',
            'to' => '2022-09-29',
            'total' => '867.8',
        ];

        $response = $this->putJson('/api/advertising/'.$createAdv->id, $updatedAdv);
        $response->assertStatus(200);
    }

    /**
     * test can delete advertising.
     *
     * @return void
     */
    public function test_can_delete_advertising()
    {
        $createAdv = $this->createAdvertising([
            'name' => 'test name',
            'from' => '2022-09-10',
            'to' => '2022-09-29',
            'total' => '867.8',
        ]);


        $response = $this->deleteJson('/api/advertising/'.$createAdv->id);
        $response->assertStatus(204);
    }
}
