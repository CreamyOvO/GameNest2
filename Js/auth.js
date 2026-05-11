const btn = document.getElementById("toggleBtn");
const container = document.querySelector(".container");

btn.addEventListener("click", function(e) {
  e.preventDefault();

  container.classList.toggle("signup-mode");

  const title = document.querySelector("#pindahbox h3");

  if (container.classList.contains("signup-mode")) {
    title.innerText = "Sudah Punya Akun?";
    btn.innerText = "Masuk";
  } else {
    title.innerText = "Belum Punya Akun?";
    btn.innerText = "Daftar";
  }
});