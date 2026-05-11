const profile = document.getElementById("profile");
const dropdown = document.querySelector(".dropdown");

profile.addEventListener("click", function(e) {
  console.log("Klik masuk");
  e.stopPropagation();
  dropdown.classList.toggle("active");
});

document.addEventListener("click", function() {
  dropdown.classList.remove("active");
});