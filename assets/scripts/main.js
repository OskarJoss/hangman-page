"use_strict";

const displayedWord = document.querySelector(".displayed-word");
const input = document.querySelector(".guess-input");
const submitBtn = document.querySelector(".guess-submit");
const wrongLettersList = document.querySelector(".wrong-letters");
const hangmanImg = document.querySelector(".hangman-img");
const replayBtn = document.querySelector(".replay-btn");

const handleEvents = e => {
    if (e.type === "keydown") {
        handleKeydown(e);
    }
    if (e.type === "click") {
        handleClick(e);
    }
};

const handleKeydown = e => {
    if (e.keyCode === 13) {
        if (input.value.length > 0) {
            handleGuess(input.value);
            resetInput();
        }
    }
};

const handleClick = e => {
    if (input.value.length > 0) {
        handleGuess(input.value);
        resetInput();
    }
};

const handleGuess = guess => {
    const formData = new FormData();
    formData.append("guess", guess);
    fetch("/app/game/guess.php", {
        method: "post",
        body: formData
    })
        .then(response => response.json())
        .then(response => {
            handleResponse(response);
        });
};

const handleResponse = response => {
    if (response.isValidResponse) {
        if (response.isCorrectGuess) {
            displayedWord.innerHTML = response.displayedWord;
            if (response.winGame) {
                endGame("win");
            }
        } else {
            li = createListElement(response.guess);
            wrongLettersList.appendChild(li);
            hangmanImg.src = getImgSrc(response.wrongLetters);
            if (response.loseGame) {
                endGame("lose");
            }
        }
    } else {
        window.alert(response.error);
    }
};

const resetInput = () => {
    input.value = "";
    input.focus();
};

const createListElement = letter => {
    const li = document.createElement("li");
    li.textContent = letter;
    return li;
};

const getImgSrc = wrongLettersArray => {
    const numberOfWrongGuesses = wrongLettersArray.length;
    const imgArray = [
        "/images/01.png",
        "/images/02.png",
        "/images/03.png",
        "/images/04.png",
        "/images/05.png",
        "/images/06.png",
        "/images/07.png",
        "/images/08.png",
        "/images/09.png",
        "/images/10.png",
        "/images/11.png",
        "/images/12.png"
    ];

    return imgArray[numberOfWrongGuesses];
};

const endGame = winOrLose => {
    const endGameDiv = document.querySelector(".end-game-div");
    const endGameHeader = document.querySelector(".end-game-h1");
    const endGameText = document.querySelector(".end-game-p");
    const replayBtn = document.querySelector(".replay-btn");

    fetch("/app/game/endgame.php")
        .then(response => response.json())
        .then(response => {
            if (winOrLose === "win") {
                endGameHeader.textContent = "You Win!";
                endGameText.textContent = "Congratulations!";
            } else {
                endGameHeader.textContent = "You Lose!";
                endGameText.textContent = `The word was ${response.word}`;
            }
            replayBtn.parentElement.href += response.category;

            setTimeout(() => {
                endGameDiv.classList.remove("hidden");
            }, 500);
        });
};

input.addEventListener("keydown", handleEvents);
submitBtn.addEventListener("click", handleEvents);
