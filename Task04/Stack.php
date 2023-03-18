<?php
class Stack {
  public $top_number;
  public $stack_pull = array();

  function __construct() {
    $this->top_number = -1;
  }
  
  public function push(...$elem) {
	foreach ($elem as $new){
    $this->stack_pull[++$this->top_number] = $new;
	}
  }
  
  public function pop() {
    if($this->top_number < 0){
      return NULL;
    } else {
      $x = $this->stack_pull[$this->top_number];
	  unset($this->stack_pull[$this->top_number--]);
	  return $x;
    }    
  }

  public function top() {
    if($this->top_number < 0) {
      return NULL;
    } else {
      return $this->stack_pull[$this->top_number];
    }
  }
  
  public function isEmpty(){
    if($this->top_number == -1) {
	  return true;
    } else {
      return false;
    }
  }
  
   public function copy(){
	   $temp = new Stack();
       foreach($this->stack_pull as $old){	   
	   $temp->push($old);
	   }
	   return $temp;
   }  
	  
   public function __toString(){
   $full = "[";
   $full.=$this->stack_pull[$this->top_number];
for ($i = 1; $i <=$this->top_number; $i++) {
   $sum=$this->stack_pull[$this->top_number-$i];
   $full=$full . "->" . $sum;
}
 $full.= "]";
 return $full;
}
	
  public function size() { 
     return $this->top_number+1;
  }
}

$s= new Stack();
$m1=1;$m4=2;$m5=3;
$m2="Розовый";$m3="4";
$s->push($m1,$m4,$m5,$m2,$m3); 
$s->__toString();
echo $s->__toString()." = check s2\n";
echo $s->top()." = check s3\n";
echo $s->top_number." = check s3\n";
$s2=$s->copy();
echo "\n\n".$s2->__toString()." = check s2\n";
echo $s->pop()." = check s1\n";
echo $s->__toString()." = check s2\n";
echo $s->top()." = check s3\n";
echo $s->top_number." = check s3\n";
$s1=$s->copy();
echo "\n\n".$s1->__toString()." = check s2\n";