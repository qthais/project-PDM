const logoutButton = document.querySelector('.profile .logout')
const cancelBtn = document.querySelector('.appointment-item button')
logoutButton.addEventListener('click', () => {
    window.location.href = 'login.php'
})
const cancelBtnContainer = document.querySelector('.appointment-container');

cancelBtnContainer.addEventListener('click', (event) => {
    // Check if the clicked element is a cancel button
    if (event.target.matches('.appointment-item button')) {
        // Find the parent container of the clicked cancel button
        let container = event.target.closest('.appointment-item');

        // Find the date and address spans within the container
        let dateSpan = container.querySelector('.date');
        let addressSpan = container.querySelector('.address');

        // Get the text content of the date and address spans
        let date = dateSpan.innerText;
        let address = addressSpan.innerText;

        // Create the object to send in the fetch request
        var temp = {
            date: date,
            address: address
        };

        // Construct options for the fetch request
        const option = {
            "method": 'POST',
            "headers": {
                "Content-Type": "application/json; charset=utf-8"
            },
            "body": JSON.stringify(temp)
        };

        // Send the fetch request
        fetch('/profile.php', option).then(response => {
            if (response.ok) {
                console.log('Appointment canceled successfully.');
                // Remove the canceled appointment from the DOM
                container.remove();
            } else {
                console.error('Failed to cancel appointment.');
            }
        }).catch(error => {
            console.error('An error occurred:', error);
        });
    }
});