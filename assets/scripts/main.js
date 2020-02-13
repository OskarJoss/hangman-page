"use_strict";

const guessForm = document.querySelector(".guess-form");
const displayedWord = document.querySelector(".displayed-word");

guessForm.addEventListener("submit", e => {
    e.preventDefault();
    const formData = new FormData(e.target);

    fetch("/app/game/guess.php", {
        method: "post",
        body: formData
    })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            // if (response.isValidResponse) {
            //     // displayedWord.innerHTML = response.
            //     const input = e.target.querySelector("input");
            //     input.value = "";
            //     input.focus();
            //     console.log(response);
            // } else {
            //     consol.log("yo");
            // }
        });
});
