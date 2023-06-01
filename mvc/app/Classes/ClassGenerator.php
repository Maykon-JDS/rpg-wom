<?php 

    namespace App\Classes;

    class ClassGenerator{

        static private $backgroundImages = 
        [
                "background-default", 
                "background-1", 
                "background-2", 
                "background-3",
                "background-4",
                "background-5",
                "background-6",
                "background-7",
                "background-8"
        ];
        
        static public function ClasseGeneratortoCssBackgroundImage() : string
        {
            $background = mt_rand(0, 8);

            return ClassGenerator::$backgroundImages[$background];

        }
    }

?>