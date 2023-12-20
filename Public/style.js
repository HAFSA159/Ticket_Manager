const tbody = document.getElementById("tbody");

function loadData() {
    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Define the type of request, the URL, and whether it should be asynchronous
    xhr.open('GET', '../Views/getData.php', true);

    // Set up a callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = xhr.response
            tbody.innerHTML=data
            console.log(data)
        }
    };

    // Send the request
    xhr.send();
}
loadData()

// todo crete button that calls loaddata each time 
