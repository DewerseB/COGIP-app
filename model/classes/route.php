<?php

    class Route {

        public static function checkPath($path, &$message, &$require) {

            $validPath = 'dashboard';
            $explodedPath = explode('/', $path);

            switch (count($explodedPath)) {
                case 1:
                    if (in_array($explodedPath[0] . '.php', scandir('./view/pages'))) {
                        $validPath = $path;
                    } else {
                        $message = "Page inconnue, retour au dashboard";
                        $validPath = 'dashboard';
                    }
                break;
                case 2:
                    if (in_array($explodedPath[0], scandir('./view/pages'))) {
                        if (in_array($explodedPath[1] . '.php', scandir('./view/pages/' . $explodedPath[0])) && $explodedPath[1] !== 'details') {
                            if ($explodedPath[1] === 'add') $require = 'moderator';
                            if ($explodedPath[0] === 'admin') $require = 'admin';
                            $validPath = $path;
                        } else {
                            $message = "Page inconnue, retour à la liste";
                            $validPath = $explodedPath[0] . '/list';
                        }
                    } else {
                        $message =  "Table inconnue, retour au dashboard";
                        $validPath = 'dashboard';
                    }
                break;
                case 3:
                    if (in_array($explodedPath[0], scandir('./view/pages'))) {
                        if ((in_array($explodedPath[1] . '.php', scandir('./view/pages/' . $explodedPath[0])) && $explodedPath[1] === 'details') || $explodedPath[1] === 'delete' || $explodedPath[1] === 'update') {
                            if (preg_match('/^[0-9]*$/', $explodedPath[2]) && strlen($explodedPath[2]) !== 0) {
                                $require = ($explodedPath[1] === 'delete' || $explodedPath[1] === 'update') ? 'admin' : 'guest';
                                $validPath = $path;
                            } else {
                                $message = "Id invalide, retour à la liste";
                                $validPath = $explodedPath[0] . '/list';
                            }
                        } else {
                            $message = "Page inconnue, retour à la liste";
                            $validPath = $explodedPath[0] . '/list';
                        }
                    } else {
                        $message =  "Table inconnue, retour au dashboard";
                        $validPath = 'dashboard';
                    }
                break;
                default:
                    $validPath = 'dashboard';
                break;
            }

            return $validPath;
        }
        
        public static function getViewPath($path) {

            $explodedPath = explode('/', $path);

            $viewPath = (count($explodedPath) !== 3) ? $path . '.php' : $explodedPath[0] . '/' . $explodedPath[1] . '.php';

            return $viewPath;
        }
        
        public static function getDataPath($path) {

            $dataPath = explode('/', $path);

            return $dataPath;
        }
    }