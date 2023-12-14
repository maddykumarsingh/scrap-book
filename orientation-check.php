<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
// JavaScript code to check and prompt for screen rotation on mobile with SweetAlert
function checkOrientation() {
    if (window.innerWidth < window.innerHeight) {
        // The screen is in portrait orientation
        // Show SweetAlert prompt
        Swal.fire({
            title: 'Rotate Your Screen',
            text: 'Please rotate your screen to landscape mode.',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
    }
}

// Run the check on page load and listen for orientation changes
checkOrientation();
window.addEventListener('orientationchange', checkOrientation);
</script>