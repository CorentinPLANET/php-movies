<?php

$error = [];

use Models\Movie;

$allMovies = new Movie;

$allMovies = $allMovies->getAll();

if (!empty($_POST)) {
    
    $movies = new Models\Movie;
    
    
    try {
        $movies->setTitle($_POST['title']);
    } catch (\Exception $e) {
        $error['title'] = $e->getMessage();
    }
    try {
        $movies->setType($_POST['type']);
    } catch (\Exception $e) {
        $error['type'] = $e->getMessage();
    }
    if (isset($_POST['genre'])) {
        try {
            $movies->setGenre($_POST['genre']);
        } catch (\Exception $e) {
            var_dump('cas4');
            $error['genre'] = $e->getMessage();
        }
    }
    if (isset($_POST['rating'])) {
        try {
            $movies->setRating($_POST['rating']);
        } catch (\Exception $e) {
            $error['rating'] = $e->getMessage();
        }
    }
    if (isset($_POST['watchStatus'])) {
        try {
            $movies->setWatchStatus($_POST['watchStatus']);
        } catch (\Exception $e) {
            $error['watchStatus'] = $e->getMessage();
        }
    }
    
    if (empty($error)) {
        if ($movies->newMovie()) {
            redirectTo('/movies');
        } else {
            $error['global'] = 'Echec de l\'enregistrement';
        }
    }
}
render('movies', false, [
    'movies' => $allMovies,
    'error' => $error
]);
