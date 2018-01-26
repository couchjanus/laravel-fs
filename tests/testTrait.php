<?php
 
class Animal {
   public function say() {
      echo "Bla, bla, bla ...";
   }
}
 
trait Cat {
   public function say() {
      echo "Meow, meow, meow ...";
   }
}
 
class Tiger extends Animal {
   use Cat;
}
 
$tiger = new Tiger;
$tiger->say();



// trait BigCat {
//    public function kill() {
//       echo "Blaha-muha! Kill an animal";
//    }
// }
 
// class Tiger extends Animal {
//    use Cat;
//    use BigCat;
// }
 
// $tiger = new Tiger;
// $tiger->roar();
// $tiger->kill();
