function toggleMenu() {
    var sidebar = document.getElementById("sidebar");
    var mainContent = document.getElementById("main-content");

    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        mainContent.classList.remove("open");
    } else {
        sidebar.classList.add("open");
        mainContent.classList.add("open");
    }
}