<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue()
        ->and(Validator::string(''))->toBeFalse()
        ->and(Validator::string(false))->toBeFalse();
});

it('validates a string with a minum length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('pedro@gmail.com'))->toBeTrue()
        ->and(Validator::email('pedro.com'))->toBeFalse();
});

it('validates that a number is greater than a given amount', function () {
    expect(Validator::greaterThan(10.3, 10.2))->toBeTrue()
        ->and(Validator::greaterThan(10, 100))->toBeFalse();
});