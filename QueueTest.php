<?php

include('./Queue.php');
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

	public function testCreate () {
		$Queue = new Queue();
		$this->assertSame($Queue->peek(), null, "Queue was just created but peek returns something different from null");
		$this->assertSame($Queue->getSize(), 0, "Queue was just created but size is > 0");
		$this->assertSame($Queue->getNext(), null, "Queue was just created but getNext does not return null");
	}

	public function testAdd () {
		$Queue = new Queue();
		$Queue->add('item1');
		$this->assertSame($Queue->getSize(), 1, "Queue should have one element in it but size is > 1");
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
	}

	public function testGetNext () {
		$Queue = new Queue();
		$this->assertSame($Queue->getNext(), null, "Queue does not have the right item for head");
		$Queue->add('item1');
		$Queue->add('item2');
		$this->assertSame($Queue->getNext(), 'item1', "Queue does not have the right item for head");
		$this->assertSame($Queue->getNext(), 'item2', "Queue does not have the right item for head");
		$this->assertSame($Queue->getNext(), null , "Queue does not have the right item for head");
		$this->assertSame($Queue->getNext(), null , "Queue does not have the right item for head");
	}

	public function testPeek () {
		$Queue = new Queue();
		$this->assertSame($Queue->peek(), null, "Queue does not have the right item for head");
		$Queue->add('item1');
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$Queue->add('item2');
		$this->assertSame($Queue->peek(), 'item1', "Queue does not have the right item for head");
		$Queue->getNext();
		$this->assertSame($Queue->peek(), 'item2', "Queue does not have the right item for head");
	}


}
