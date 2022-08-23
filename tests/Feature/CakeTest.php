<?php

use App\Models\Cake;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('do not add a cake without data', function () {
    $response = $this->postJson('/api/cakes', []);
    $response->assertStatus(422);
});

it('add a cake with data', function () {
    $attributes = Cake::factory()->raw();
    $response = $this->postJson('/api/cakes', $attributes);
    $response->assertStatus(201)->assertJson(['message' => 'Cake created successfully!']);
    $this->assertDatabaseHas('cakes', $attributes);
});

it('can retrieve a Cake', function () {
    $cake = Cake::factory()->create();

    $response = $this->getJson("/api/cakes/{$cake->id}");

    $data = [
        'status' => 'Success',
        'message' => 'Cake recovered successfully!',
        'data' => [
            'name' => $cake->name,
            'weight' => $cake->weight,
            'value' => $cake->value,
            'inventory' => $cake->inventory,
        ],
    ];

    $response->assertStatus(200)->assertJson($data);
});

it('can update a cake', function () {
    $cake = Cake::factory()->create();

    $cakeAlterado = [
        'id' => $cake->id,
        'name' => $cake->name,
        'weight' => $cake->weight + 10,
        'value' => $cake->value + 25,
        'inventory' => $cake->inventory,
    ];

    $response = $this->putJson("/api/cakes/{$cake->id}", $cakeAlterado);
    $response->assertStatus(201)->assertJson(['message' => 'Cake Updated Successfully!']);
    $this->assertDatabaseHas('cakes', $cakeAlterado);
});

it('can erase a cake', function () {
    $cake = Cake::factory()->create();
    $response = $this->deleteJson("/api/cakes/{$cake->id}");
    $response->assertStatus(202);
    $this->assertCount(0, Cake::all());
});
