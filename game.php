<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!isset($_SESSION['displayedWord'])) redirect('/'); ?>

<a href="/app/game/startgame.php"><button>New Game</button></a>

<h1>Welcome to the game!</h1>

<div class="img-container"><img class="hangman-img" src="<?php echo getImgSrc($_SESSION['wrongLetters']); ?>" alt="hangman-image"></div>

<h2 class="displayed-word"><?php echo $_SESSION['displayedWord']; ?></h2>

<ul class="wrong-letters">
    <?php foreach ($_SESSION['wrongLetters'] as $wrongLetter) : ?>
        <li><?php echo $wrongLetter; ?></li>
    <?php endforeach; ?>
</ul>

<div>
    <input class="guess-input" type="text" name="guess" maxlength="1" autofocus required>
    <button class="guess-submit">Guess</button>
</div>


<?php require __DIR__ . '/views/footer.php'; ?>
