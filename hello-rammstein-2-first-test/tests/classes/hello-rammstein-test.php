<?php

use Xyfi\Hello_Rammstein\Hello_Rammstein;
use Xyfi\Hello_Rammstein\Tests\TestCase;

class Hello_Rammstein_Test extends TestCase {
	/**
	 * @var Hello_Rammstein
	 */
	private $instance;

	/**
	 * This function will be executed before each test.
	 */
	public function setUp(): void {
		parent::setUp();

		$this->instance = Mockery::mock( Hello_Rammstein::class )
			->shouldAllowMockingProtectedMethods()
			->makePartial();
	}

	/**
	 * Tests the return value of Hello_Rammstein::get_random_lyric.
	 *
	 * @covers Hello_Rammstein::get_random_lyric
	 */
	public function test_get_random_lyric() {
		$this->instance
			// The function we want to mock.
			->expects( 'get_random_number' )
			// The amount of times we expect the function to be called.
			->once()
			// The value the function should return.
			->andReturn( 6 );

		$expected = "Sie lieben auch in schlechten Tagen";
		$actual = $this->instance->get_random_lyric();

		$this->assertEquals( $expected, $actual );
	}

	/**
	 * Tests the return value of Hello_Rammstein::output_lyric.
	 *
	 * @covers Hello_Rammstein::output_lyric
	 */
	public function test_output_lyric() {
		$this->instance
			// The function we want to mock.
			->expects( 'get_random_lyric' )
			// The amount of times we expect the function to be called.
			->once()
			// The value the function should return.
			->andReturn( "This is the output lyric" );

		$expected = "<p id='rammstein'>This is the output lyric</p>";

		$this->instance->output_lyric();

		$this->expectOutput( $expected );
	}
}
