<?php

include('./Queue.php');
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {
	
	public function test_create () {
		$Queue = new Queue();
		$this->assertSame($Queue->peek(), null, "Queue was just created but peek returns something different from null");
		$this->assertSame($Queue->get_size(), 0, "Queue was just created but size is > 0");
		$this->assertSame($Queue->get_next(), null, "Queue was just created but get_next does not return null");
	}

	public function test_add () {
		$Queue = new Queue();
		$Queue->add('item1');
		$this->assertSame($Queue->get_size(), 1, "Queue should have one element in it but size is > 1");
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
	}
	
	public function test_get_next () {
		$Queue = new Queue();
		$this->assertSame($Queue->get_next(), null, "Queue does not have the right item for head");
		$Queue->add('item1');
		$Queue->add('item2');
		$this->assertSame($Queue->get_next(), 'item1', "Queue does not have the right item for head");
		$this->assertSame($Queue->get_next(), 'item2', "Queue does not have the right item for head");
		$this->assertSame($Queue->get_next(), null , "Queue does not have the right item for head");
		$this->assertSame($Queue->get_next(), null , "Queue does not have the right item for head");
	}
	
	public function test_peek () {
		$Queue = new Queue();
		$this->assertSame($Queue->peek(), null, "Queue does not have the right item for head");
		$Queue->add('item1');
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$Queue->add('item2');
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$Queue->get_next();
		$this->assertSame($Queue->peek(), 'item2', "Queue does not have the right item for head");
	}
	
	
}


