// let name1 = document.getElementsByName("Name");
// let email = document.getElementsByName("Email");
// let address = document.getElementsByName("Address");
// let postcode = document.getElementsByName("Postcode");
// let checkbox = document.getElementsByName("accept");
// let submit = document.getElementById("submit");



// submit.preventDefault();

const form = document.querySelector('form');
const nameInput = document.getElementsByName("Name")[0];
const emailInput = document.getElementsByName("Email")[0];
const addressInput = document.getElementsByName("Address")[0];
const postcodeInput = document.getElementsByName("Postcode")[0];
const checkbox = document.getElementsByName("accept")[0];
const submitBtn = document.getElementById("submit");

form.addEventListener('submit', function(event) {

    
  event.preventDefault();


  if (nameInput.value === "") {
    nameInput.style="background-color: purple";

  }

  if (emailInput.value === "") {
    emailInput.style="background-color: purple";

  }
  if (addressInput.value === "") {
    addressInput.style="background-color: purple";

  }
  if (postcodeInput.value === "") {
    postcodeInput.style="background-color: purple";

  }

  if (!checkbox.checked) {
    checkbox.style="background-color: purple"

  }

  form.submit();
});
