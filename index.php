<?php require __DIR__ . '/views/header.php'; ?>



<?php if (isset($_SESSION['displayedWord'])) : ?>

    <a href="/game.php"><button>Continue</button></a>

    <a href="/categories.php"><button>New Game</button></a>

<?php else : ?>

    <a href="/categories.php"><button>Start Game</button></a>

<?php endif; ?>



<?php require __DIR__ . '/views/footer.php'; ?>
