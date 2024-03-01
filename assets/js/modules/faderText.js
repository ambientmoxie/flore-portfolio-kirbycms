/*

* -----------------------------------------------
* Text fading effect
* -----------------------------------------------

1 - Store the globale sentence
2 - Split the full sentence into to segments and map every letter of each segment to return a wrapped letter.
3 - Recompose the complete sentence by grouping the two segments
*/

export default function (target) {
  let biography = document.querySelector(target).firstElementChild;
  let biographyContent = biography.innerHTML;

  let segments = biographyContent.split("<br>"); // Keep spacing intact

  let processedSegments = segments.map((segment) => {
    return [...segment]
      .map((letter) => {
        return `<span>${letter}</span>`;
        // if (letter !== " ") {
        // return `<span>${letter}</span>`;
        // }
        // return letter;
      })
      .join("");
  });

  biographyContent = processedSegments.join("<br>");
  // const quote = "<sup>FR</sup>";
  biography.innerHTML = biographyContent;
}

/*
* --------------------
* Add to stylesheets
* --------------------
*/

// target {
//   span {
//     opacity: 1;
//     transition: opacity 0.8s 0s;
//     &:hover {
//       opacity: 0;
//       transition: opacity 0s 0s;
//     }
//   }
// }

