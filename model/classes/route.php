<?php

    class Route {
        function __construct($path) {
            $this->path = $this->getRealPath($path);
        }

        private function getRealPath($path) {



            $realPath = $path;



            return $realPath;
        }

        public function getPath() {
            return $this->path . '.php';
        }
    }