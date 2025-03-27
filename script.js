function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault();
  let form = this;
  let formData = new FormData(form);

  fetch("send_email.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => alert("Berhasil Terkirim"))
    .catch((error) => alert("Error: " + error));
});
