<?php ob_start();

require_once "./controllers/moviesController.php"

?>

<h1>Ma Collection</h1>
<?php
foreach ($movies as $row) {
    echo "<h2> " . $row['title'] . " </h2>";
    echo "<span>".$row['type']."</span>";
}

?>




<?php
render('default', true, [
    'title' => 'Ma Collection',
    'css' => 'index',
    'content' => ob_get_clean(),
]);
?>