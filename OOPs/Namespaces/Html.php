<?php
    namespace Html;

    class Table{
        public $title = "";
        public $numRows = 0;

        function message(){
            return "The table name is {$this->title} and it has {$this->numRows} rows.";
        }
    }

    class Rows{
        public $numOfCells = 0;
        function message(){
            return "The row has {$this->numOfCells} cells.";
        }
    }
?>