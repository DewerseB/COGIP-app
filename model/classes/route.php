<?php

    class Route {

        public static function getRealPath($path) {



            $realPath = $path . '.php';



            

            $arrayPath = explode("/",$path);

            $pages = scandir('./view/pages');
            
            in_array($arrayPath[0], $pages);

            
            
            return $realPath;
        }

        
    }