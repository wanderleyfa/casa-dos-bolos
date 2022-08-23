<?php

uses(Tests\TestCase::class);

it('has a lead list page', function () {
    $response = $this->get('/api/leads');

    $response->assertStatus(200);
});
