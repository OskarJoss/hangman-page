<?php require __DIR__ . '/views/header.php'; ?>

<a href="/app/game/startgame.php"><button>New Game</button></a>

<h1>Welcome to the game!</h1>

<div class="img-container"><img src="https://images.unsplash.com/photo-1567589967685-d431540f735e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=808&q=80" alt=""></div>

<h2 class="displayed-word"><?php echo $_SESSION['displayedWord']; ?></h2>

<div class="wrong-letters"></div>

<form class="guess-form" action="">
    <input type="text" name="guess" maxlength="1" autofocus required>
    <button type="submit">Guess</button>
</form>


<?php require __DIR__ . '/views/footer.php'; ?>
