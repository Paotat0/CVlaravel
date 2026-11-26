// ==========================================
// HAMBURGER MENU
// ==========================================

const hamburgerBtn = document.getElementById("hamburgerBtn");
const navMenu = document.getElementById("navMenu");

if (hamburgerBtn && navMenu) {
    hamburgerBtn.addEventListener("click", function () {

        // Menampilkan / menyembunyikan menu
        navMenu.classList.toggle("hidden");

    });

    const navLinks = navMenu.querySelectorAll("a");

    navLinks.forEach(function (link) {

        link.addEventListener("click", function () {
            navMenu.classList.add("hidden");
        });
    });
}

// ==========================================
// DARK MODE / LIGHT MODE
// ==========================================

const themeToggle = document.getElementById("themeToggle");
const themeIcon = document.getElementById("themeIcon");

if (themeToggle && themeIcon) {
    themeToggle.addEventListener("click", function () {
        document.body.classList.toggle("light-mode");

        if (document.body.classList.contains("light-mode")) {
            themeIcon.classList.remove("fa-sun");
            themeIcon.classList.add("fa-moon");
        } else {
            themeIcon.classList.remove("fa-moon");
            themeIcon.classList.add("fa-sun");
        }
    });
}

/* =========================================================
PROJECT CAROUSEL
========================================================= */

const projectSlider = document.getElementById("projectSlider");
const projectViewport = document.getElementById("projectViewport");
const projectCards = document.querySelectorAll(".project-card");
const projectPrev = document.getElementById("projectPrev");
const projectNext = document.getElementById("projectNext");

let projectIndex = 0;

function getProjectCardWidth() {
    if (!projectCards.length) return 0;
    return projectCards[0].offsetWidth + 20; // 20 = gap-5
}

function getMaxIndex() {
    if (!projectSlider || !projectViewport || !projectCards.length || !getProjectCardWidth()) return 0;
    const hidden = projectSlider.scrollWidth - projectViewport.clientWidth;
    return Math.max(0, Math.ceil(hidden / getProjectCardWidth()));
}

function updateProjectSlider() {
    if (!projectSlider || !projectViewport || !projectCards.length) return;
    const maxIndex = getMaxIndex();
    if (projectIndex > maxIndex) projectIndex = maxIndex;
    const maxShift = projectSlider.scrollWidth - projectViewport.clientWidth;
    const shift = Math.min(projectIndex * getProjectCardWidth(), Math.max(0, maxShift));
    projectSlider.style.transform = `translateX(-${shift}px)`;
}

if (projectNext && projectPrev && projectSlider && projectViewport && projectCards.length) {
    projectNext.addEventListener("click", function () {
        projectIndex = projectIndex >= getMaxIndex() ? 0 : projectIndex + 1;
        updateProjectSlider();
    });

    projectPrev.addEventListener("click", function () {
        projectIndex = projectIndex <= 0 ? getMaxIndex() : projectIndex - 1;
        updateProjectSlider();
    });

    window.addEventListener("resize", updateProjectSlider);
}