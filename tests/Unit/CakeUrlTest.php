<?php

uses(Tests\TestCase::class);

it('has a cake list page', function () {
    $response = $this->get('/api/cakes');

    $response->assertStatus(200);
});
