<?php

class Node {

	public $value;
	public $next;

	public function __construct ($value, $next) {
		$this->value = $value;
		$this->next = $next;
	}

}

class Queue {

	private $head = null;
	private $tail = null;
	private $size = 0;

	/**
	* add a new item to the back of the queue
	* @param string $item
	*/
	public function add ($item) {
		$newItem = new Node($item, null);
		if (is_null($this->head)) {
			$this->head = $newItem;
		} else if (is_null($this->tail)) {
			$this->tail = $newItem;
			$this->head->next = $newItem;
		} else {
			$previousTail = $this->tail;
			$this->tail = $newItem;
			$previousTail->next = $this->tail;
		}
		$this->size++;
	}

	/**
	* pops the first item in the queue
	* @return string item first in line
	*/
	public function getNext () {
		$previousHead = $this->head;
		if (is_null($previousHead)) {return null;}
		$this->head = $previousHead->next;
		$this->size--;
		return $previousHead->value;
	}

	/**
	* return first item in the queue without removing it
	* @param string item first in line
	*/
	public function peek () {
		if (is_null($this->head)) { return null; }
		return $this->head->value;
	}

	/**
	* returns the current size of the queue
	* @return int - size of the queue
	*/
	public function getSize () {
		return $this->size;
	}

}


?>
