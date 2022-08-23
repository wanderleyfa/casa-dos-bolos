<?php

use App\Models\Cake;
use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->cake = Cake::factory()->create();
});


it('do not add a lead without data', function () {
    $response = $this->postJson('/api/leads', []);
    $response->assertStatus(422);
});

test('add a lead with data', function () {
    $attributes = Lead::factory()->raw();
    $response = $this->postJson('/api/leads', $attributes);
    $response->assertStatus(201)->assertJson(['message' => 'Lead created successfully!']);
    $this->assertDatabaseHas('leads', $attributes);
});

test('can retrieve a Lead', function () {
    $lead = Lead::factory()->create();

    $response = $this->getJson("/api/leads/{$lead->id}");

    $data = [
        'status' => 'Success',
        'message' => 'Lead recovered successfully!',
        'data' => [
            'name' => $lead->name,
            'email' => $lead->email,
        ],
    ];

    $response->assertStatus(200)->assertJson($data);
});

test('can update a lead', function () {
    $lead = Lead::factory()->create();

    $leadAlterado = [
        'id' => $lead->id,
        'name' => $lead->name,
        'email' => $lead->email,
    ];

    $response = $this->putJson("/api/leads/{$lead->id}", $leadAlterado);
    $response->assertStatus(201)->assertJson(['message' => 'Lead Updated Successfully!']);
    $this->assertDatabaseHas('leads', $leadAlterado);
});

test('can erase a lead', function () {
    $lead = Lead::factory()->create();
    $response = $this->deleteJson("/api/leads/{$lead->id}");
    $response->assertStatus(202);
    $this->assertCount(0, Lead::all());
});
