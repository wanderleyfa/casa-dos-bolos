<?php

use App\Models\Cake;
use Database\Factories\CakeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('do not add a cake without data', function () {
    $response = $this->postJson('/api/cake', []);
    $response->assertStatus(422);
});

test('add a cake with data', function () {
    $attributes = CakeFactory::factory()->raw();
    $response = $this->postJson('/api/cake', $attributes);
    $response->assertStatus(201)->assertJson(['message' => 'Cake created successfully!']);
    $this->assertDatabaseHas('cakes', $attributes);
});

test('can retrieve a Cake', function () {
    $cake = CakeFactory::factory()->create();

    $response = $this->getJson("/api/cake/{$cake->id}");

    $data = [
        'status' => 'Success',
        'message' => 'Cake recovered successfully!',
        'data' => [
            "name" => $cake->name,
            "weight" => $cake->weight,
            "value" => $cake->value,
            "inventory" => $cake->inventory,
        ]
    ];

    $response->assertStatus(200)->assertJson($data);
});

test('can update a cake', function () {
    $cake = CakeFactory::factory()->create();

    $cakeAlterado = [
        'id' => $cake->id,
        "name" => $cake->name,
        "weight" => $cake->weight + 10,
        "value" => $cake->value + 25,
        "inventory" => $cake->inventory,
    ];

    $response = $this->putJson("/api/cake/{$cake->id}", $cakeAlterado);
    $response->assertStatus(201)->assertJson(['message' => 'Cake Updated Successfully!']);
    $this->assertDatabaseHas('cakes', $cakeAlterado);
});

test('can erase a cake', function () {
    $cake = CakeFactory::factory()->create();
    $response = $this->deleteJson("/api/cake/{$cake->id}");
    $response->assertStatus(202);
    $this->assertCount(0, Cake::all());
});
