<?php

    class domin{
        protected static function getDominName(){
            echo "www.google.com";
        }
    }

    class dominG extends domin{
        public $websiteName;
        function __construct()
        {
            $this->websiteName = parent::getDominName();
        }
    }

    $result = new dominG();
    echo $result->websiteName;