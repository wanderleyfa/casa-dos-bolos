<?php

uses(Tests\TestCase::class);

it('has a cake list page', function () {
    $response = $this->get('/api/cake');

    $response->assertStatus(200);
});
