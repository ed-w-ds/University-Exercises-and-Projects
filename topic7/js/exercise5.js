function saveName() {
    var firstName = document.getElementById("firstname").value;
    var lastName = document.getElementById("surname").value;
    localStorage.setItem("firstName", firstName);
    localStorage.setItem("lastName", lastName);
    alert("Name saved!");
}

function clearName() {
    localStorage.removeItem("firstName");
    localStorage.removeItem("lastName");
}


// Retrieve the first name and last name from localStorage
var firstName = localStorage.getItem("firstName");
var lastName = localStorage.getItem("lastName");

// Create a text node with the full name
var name1 = document.createTextNode("Hi " + firstName + " " + lastName);
let h1 = document.getElementById("displayname");
h1.style = "color: black"
h1.appendChild(name1);

