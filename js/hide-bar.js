// Get all the bar elements
const bars = document.querySelectorAll('.bar');

// Function to hide the bars
function hideBars() {
    bars.forEach(bar => {
        bar.style.display = 'none';
    });
}

// Add an event listener to call the hideBars function after the animation duration
setTimeout(hideBars, 1000); // 500ms matches the animation duration