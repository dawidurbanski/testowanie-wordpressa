<?php
/**
 * Dumme hello test
 *
 * @package TestingWordPress
 */

namespace Tests;

uses( TestCase::class );

test(
	'Should always pass',
	function () {
		expect( true )->toBeTrue();
	}
);