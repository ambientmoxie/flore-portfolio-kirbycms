//& Stylesheets
//& ------------------------------
import "../scss/main.scss";

//& Librairies
//& ------------------------------

import Loadeer from "loadeer";
import faderText from "./modules/faderText";
import Lenis from "@studio-freight/lenis";
import { gsap } from "gsap";
import { isMobile } from "mobile-device-detect";

//? Lenis Scroll
//? -------------------------------

const lenis = new Lenis({
  lerp: 0.2,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

//? Hover Fading Text Animation
//? -------------------------------

const aboutTextContainer = document.querySelector("#about__biography");
const projectTextContainer = document.querySelector("#project-description");

if (aboutTextContainer) {
  faderText("#about__biography");
}
if (projectTextContainer) {
  faderText("#project-description");
}

//? Lazy Loading
//? -------------------------------

const loadeer = new Loadeer();
loadeer.observe();

// Floating thumbnail

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

// Modal logic

if (document.getElementById("project")) {
  const mainContainer = document.getElementById("focus");
  const imageContainer = mainContainer.lastElementChild;
  const closeBtn = document.getElementById("focus_close-btn");

  function createPictureElement(picture) {
    var targetAvif = picture.children[0];
    var targetWebp = picture.children[1];
    var targetJpg = picture.children[2];
    var picture = document.createElement("picture");

    // Add avif
    var sourceAvif = document.createElement("source");
    sourceAvif.setAttribute("srcset", targetAvif.srcset);
    sourceAvif.setAttribute("sizes", "100vw");
    sourceAvif.setAttribute("type", "image/avif");
    picture.appendChild(sourceAvif);

    // Add webp
    var sourceWebp = document.createElement("source");
    sourceWebp.setAttribute("srcset", targetWebp.srcset);
    sourceWebp.setAttribute("sizes", "100vw");
    sourceWebp.setAttribute("type", "image/webp");
    picture.appendChild(sourceWebp);

    // Add img
    var img = document.createElement("img");
    img.src = targetJpg.src;
    img.srcset = targetJpg.srcset;
    img.sizes = "100vw";
    picture.appendChild(img);

    return picture;
  }

  document.querySelectorAll("#gallery picture").forEach((picture) => {
    picture.addEventListener("click", () => {
      imageContainer.innerHTML = "";
      imageContainer.appendChild(createPictureElement(picture));
      mainContainer.style.display = "grid";
    });
  });

  closeBtn.addEventListener("click", () => {
    mainContainer.style.display = "none";
  });
}

// DARK MODE

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
