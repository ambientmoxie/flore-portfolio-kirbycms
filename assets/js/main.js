// Sass import
//--------------------------
import "../scss/main.scss";

// Librairies
//--------------------------
import { gsap } from "gsap";
import faderText from "./modules/faderText";
import { isMobile } from "mobile-device-detect";
import LazyLoad from "vanilla-lazyload";

// Hover fading animation
//--------------------------
const aboutTextContainer = document.querySelector("#about");
if (aboutTextContainer && !isMobile) {
  faderText("#bio");
  faderText("#solo-shows");
  faderText("#duo-shows");
  faderText("#group-shows");
  faderText("#assistant");
  faderText("#residencies");
}

// Lazy loading
//--------------------------
let lazyLoadInstance;

document.addEventListener("DOMContentLoaded", function () {
  lazyLoadInstance = new LazyLoad({
    elements_selector: "[data-lazyload]",
  });
});

// Update LazyLoad
function updateLazyLoad() {
  if (lazyLoadInstance) {
    lazyLoadInstance.update();
  }
}

// Floating thumbnail
//--------------------------
if (document.querySelector("#header") && !isMobile) {
  const floatingThumb = document.getElementById("floating-thumb");
  console.log(floatingThumb);

  function moveThumb(e) {
    gsap.to(floatingThumb, {
      css: {
        left: e.pageX,
        top: e.pageY,
      },
      duration: 0,
    });
  }

  window.addEventListener("mousemove", moveThumb);

  // Fetch and display floating image container
  const projects = document.querySelectorAll("#header a");

  let floatingImg, floatingUrl;

  // Loop through all the projects and links
  for (let project of projects) {
    project.addEventListener("mouseover", () => {
      floatingThumb.style.opacity = "1";
      displayAndPreviewImage(project);
    });
    project.addEventListener("mouseout", () => {
      floatingThumb.style.opacity = "0";
    });
  }

  function displayAndPreviewImage(project) {
    // Create the image tag only once
    if (!floatingThumb.hasChildNodes()) {
      floatingImg = document.createElement("img");
    }

    // Fetch attribute, set up the src and append image inside container
    floatingUrl = project.getAttribute("data-floating-url");
    floatingImg.src = floatingUrl;
    floatingImg.setAttribute("draggable", false);
    floatingThumb.appendChild(floatingImg);
  }
}

// Modal logic (ahem...)
//--------------------------
if (document.getElementById("project")) {
  const mainContainer = document.getElementById("focus");
  const imageContainer = mainContainer.lastElementChild;
  const focusInfos = document.getElementById("focus__infos");
  const closeBtn = document.getElementById("focus_close-btn");

  function createTitleElement(picture) {
    const focusTitle = document.createElement("h1");
    let artworkTitle = picture.dataset.title;
    let artworkYear = picture.dataset.year;
    let artworkTechnique = picture.dataset.technique;
    let artworkSize = picture.dataset.size;
    let artworkMore = picture.dataset.more;

    focusTitle.innerHTML = `
    ${artworkTitle ? `<span>${artworkTitle}</span>` : ""}
    ${artworkYear ? `<span>${artworkYear}</span>` : ""}
    ${artworkTechnique ? `<span>${artworkTechnique}</span>` : ""}
    ${artworkSize ? `<span>${artworkSize}</span>` : ""}
    ${artworkMore ? `<span>${artworkMore}</span>` : ""}`;

    return focusTitle;
  }

  function createPictureElement(picture) {
    var targetAvif = picture.children[0];
    var targetWebp = picture.children[1];
    var targetJpg = picture.children[2];
    var picture = document.createElement("picture");

    // Create avif
    var sourceAvif = document.createElement("source");
    sourceAvif.setAttribute("data-srcset", targetAvif.srcset);
    sourceAvif.setAttribute("sizes", "100vw");
    sourceAvif.setAttribute("type", "image/avif");
    picture.appendChild(sourceAvif);

    // Create webp
    var sourceWebp = document.createElement("source");
    sourceWebp.setAttribute("data-srcset", targetWebp.srcset);
    sourceWebp.setAttribute("sizes", "100vw");
    sourceWebp.setAttribute("type", "image/webp");
    picture.appendChild(sourceWebp);

    // Create img
    var img = document.createElement("img");
    img.setAttribute("data-lazyload", "");
    img.setAttribute("data-srcset", targetJpg.srcset);
    img.src = targetJpg.src;
    img.sizes = "100vw";
    picture.appendChild(img);

    return picture;
  }

  document.querySelectorAll("#gallery picture").forEach((picture) => {
    picture.addEventListener("click", () => {
      imageContainer.innerHTML = "";
      focusInfos.innerHTML = "";
      focusInfos.appendChild(createTitleElement(picture));
      imageContainer.appendChild(createPictureElement(picture));
      mainContainer.style.display = "grid";
      document.body.style.position = "fixed";

      // Update lazy loading for new images
      updateLazyLoad();
    });
  });

  closeBtn.addEventListener("click", () => {
    mainContainer.style.display = "none";
    document.body.style.position = "initial";
  });
}

// Dark mode
//--------------------------
const themeBtn = document.getElementById("switch-theme");
const userPrefersDark = localStorage.getItem("darkMode") === "true";

if (userPrefersDark) {
  document.body.classList.add("dark-mode");
  themeBtn.innerText = "Light Mode";
}

function updateButtonText() {
  const isDarkMode = document.body.classList.contains("dark-mode");
  themeBtn.innerText = isDarkMode ? "Light Mode" : "Dark Mode";
}

function toggleDarkMode() {
  console.log("check");
  const isDarkMode = document.body.classList.toggle("dark-mode");
  localStorage.setItem("darkMode", isDarkMode);
  updateButtonText();
}

themeBtn.addEventListener("click", toggleDarkMode);
updateButtonText();
