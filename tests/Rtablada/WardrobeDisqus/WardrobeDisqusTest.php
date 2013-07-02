<?php namespace Rtablada\WardrobeDisqus;

use Mockery as m;

class WardrobeDisqusTest extends \PHPUnit_Framework_Testcase
{
	public function setup()
	{
		$this->resultComment = file_get_contents(__DIR__ . '/stubs/disqus.txt');

		$config = m::mock('Illuminate\Config\Repository');
		$config->shouldReceive('get')->once()
			->with('wardrobe-disqus::disqus_shortname')
			->andReturn('example');

		$this->disqus = new WardrobeDisqus($config);
	}

	public function teardown()
	{
		m::close();
	}

	public function testCanCreateComments()
	{
		$comments = $this->disqus->comments();

		$this->assertEquals($this->resultComment, $comments);
	}
}
