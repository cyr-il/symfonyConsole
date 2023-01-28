const textElement = document.querySelector(".text--dynamic");
const wordsArray = ["entity", "controller", "form", "auth", "crud"];
let arrayLength = wordsArray.length;

let currentLetterCount = 0,
  currentWordCount = 0,
  currentText = [],
  currentWord = "",
  currentLetter = "",
  reverse = false;

function typeWriting() {
  if (currentWordCount <= arrayLength) {
    if (currentWordCount == arrayLength) {
      currentWordCount = 0;
    }

    let letterCount = wordsArray[currentWordCount].length;
    currentWord = wordsArray[currentWordCount];

    if (!reverse && currentLetterCount < letterCount) {
      currentLetter = currentWord[currentLetterCount];
      currentText.push(currentLetter);

      textElement.textContent = currentText.join("");
      currentLetterCount++;
      // console.log(currentText, currentLetterCount, letterCount);
    }

    if (reverse && currentLetterCount <= letterCount) {
      currentText.pop();
      textElement.textContent = currentText.join("");
      currentLetterCount--;
      // console.log(currentText, currentLetterCount);
    }

    if (currentLetterCount == letterCount) {
      reverse = true;
    }

    if (reverse && currentLetterCount == 0) {
      currentText = [];
      currentWordCount++;
      reverse = false;
    }
  }
  setTimeout(typeWriting, 6000);
}

window.addEventListener("load", typeWriting);
