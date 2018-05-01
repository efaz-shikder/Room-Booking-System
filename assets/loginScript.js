// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Toggle password visibilty
function togglePasswordVisibility()
{
    var password = document.getElementById("password");
    var el = document.getElementById("toggle");

    if (password.type === "password")
    {
      password.type = "text";
      el.innerHTML = "Hide Password";
    }
    else
    {
      password.type = "password";
      el.innerHTML = "Show Password";
    }
}
