<?php
ob_start();

?>

<h1>Ma Collection</h1>

<form action="" method="post">
    <textarea name="title" placeholder="Titre"></textarea>
    <small id="titleError"><?= isset($error['title']) ? $error['title'] : '' ?></small>
    <select name="type">
        <option value="film" selected>Film</option>
        <option value="serie">Serie</option>
    </select>
    <small id="typeError"><?= isset($error['type']) ? $error['type'] : '' ?></small>
    <select name="rating">
        <optgroup label="Rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </optgroup>
    </select>
    <textarea name="genre" placeholder="Genre"></textarea>
    <select name="watchStatus">
        <option value="0" selected>A voir</option>
        <option value="1">Vu</option>
    </select>
    <button type="submit">Enregistrer</button>
</form>

<?php
foreach ($movies as $row) {
    echo "<div class='movie'>";
    echo "<h2> " . $row['title'] . " </h2>";
    echo "<span>" . $row['type'] . "</span>";
    if (isset($row['genre'])) {
        echo "<span>" . $row['genre'] . "</span>";
    }
    if ($row['is_watched'] == FALSE) {
        echo "<span>A voir</span>";
    } else {
        echo "<span>Vu</span>";
    }
    echo "</div>";
}

render('default', true, [
    'title' => 'Ma Collection',
    'css' => 'movies',
    'content' => ob_get_clean(),
]);
