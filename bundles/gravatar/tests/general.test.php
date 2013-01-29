<?php

class TestGeneral extends PHPUnit_Framework_TestCase {
	public function testAvatarImageIsGenerated() {
		Bundle::start('gravatar');
		$this->assertEquals(Gravatar::make('thepunkfan@gmail.com'), '<img src="http://www.gravatar.com/avatar/fac3a58aaa455adbcb3f684ccff663b8?s=32" />');
	}
	public function testAvatarImageIsGeneratedWithSize() {
		Bundle::start('gravatar');
		$this->assertEquals(Gravatar::make('thepunkfan@gmail.com', 64), '<img src="http://www.gravatar.com/avatar/fac3a58aaa455adbcb3f684ccff663b8?s=64" />');
	}
}