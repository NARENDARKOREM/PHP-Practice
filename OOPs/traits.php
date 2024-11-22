<?php

trait Book{
    function msg1(){
        echo "Atlas Shrugged";
    }
}

trait Author{
    function msg2(){
        echo "Ayn rand";
    }
}

class BookDetails{
    use Book;
    use Author;
}

$book_details = new BookDetails();
echo $book_details->msg1();
echo $book_details->msg2();