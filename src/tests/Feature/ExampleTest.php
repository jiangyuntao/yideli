<?php

test('the application redirects to the default language homepage', function () {
    $response = $this->get('/');

    $response->assertRedirect('/en');
});
