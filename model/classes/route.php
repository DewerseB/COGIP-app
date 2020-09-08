<?php

    class Route {
        function __construct($path) {
            $this->path = $path;
        }

        public function getPath() {
            return $this->path . '.php';
        }
    }