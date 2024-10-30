// Custom JavaScript for loading screen

document.addEventListener("DOMContentLoaded", () => {
    const loadingScreen = document.getElementById("global-loading");

    function showLoadingScreen() {
        loadingScreen.style.display = "flex";
    }

    function hideLoadingScreen() {
        loadingScreen.style.display = "none";
    }

    // Example: Show the loading screen on page load and hide it after 2 seconds
    showLoadingScreen();
    setTimeout(hideLoadingScreen, 2000); // Adjust timing as needed

    // Use these functions to control loading based on application logic
});

// Integrate with AJAX (if using jQuery)
$(document).ajaxStart(function() {
    showLoadingScreen(); // Show loading screen before AJAX request
}).ajaxStop(function() {
    hideLoadingScreen(); // Hide loading screen after AJAX request
});
