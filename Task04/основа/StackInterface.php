<?php

interface StackInterface
{
    public function push(...$elem);
	public function pop();
	public function top();
	public function isEmpty();
	public function copy();
	public function __toString();
}
