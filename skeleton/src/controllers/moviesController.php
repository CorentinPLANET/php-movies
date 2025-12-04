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
        $user->setType($_POST['type']);
    } catch (\Exception $e) {
        $error['type'] = $e->getMessage();
    }
    try {
        $user->setRating($_POST['rating']);
    } catch (\Exception $e) {
        $error['rating'] = $e->getMessage();
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
