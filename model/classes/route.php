<?php

    class Route {

        public static function getRealPath($path) {



            $realPath = $path . '.php';



            return $realPath;
        }

        // public function getPath() {
        //     return $this->path . '.php';
        // }
    }