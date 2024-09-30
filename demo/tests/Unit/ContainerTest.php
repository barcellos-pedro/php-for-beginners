<?php

use Core\Container;
use Core\Exceptions\BindingNotFoundException;

test('it can resolve something out of the container', function () {
    // arrange
    $container = new Container();
    $container->bind('foo', fn() => 'bar');

    // act
    $result = $container->resolve('foo');

    // assert
    expect($result)->toEqual('bar');
});

it('it should not resolve something out of the container', function () {
    $container = new Container();
    $container->bind('foo', fn() => 'bar');
    $container->resolve('goo');
})->throws(BindingNotFoundException::class, "No matching binding found for: goo");