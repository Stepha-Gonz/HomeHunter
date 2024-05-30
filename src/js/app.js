document.addEventListener("DOMContentLoaded", function () {
  eventlListeners();
  darkMode();
});
function darkMode() {
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");
  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener("change", function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");
  });
}
function eventlListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  mobileMenu.addEventListener("click", navegacionResponsive);

  //muestra campos condicionales

  const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

  metodoContacto.forEach((input) => input.addEventListener("click", mostrarMetodosContacto));
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".navegacion");
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.remove("mostrar");
  } else {
    navegacion.classList.add("mostrar");
  }
}

function mostrarMetodosContacto(e) {
  const contactoDiv = document.querySelector("#contacto");

  if (e.target.value === "telefono") {
    contactoDiv.textContent = "telefono";
    contactoDiv.innerHTML = `
      <label for="telefono">Ingresa tu número:</label>
      <input type="number" placeholder="Tu telefono" id="telefono" name="contacto[telefono]" />
      <p>Elija la fecha y hora en que desea ser contactado</p>

      <label for="fecha-contacto">Fecha:</label>
      <input type="date" id="fecha-contacto" name="contacto[fecha]"/>
      <label for="hora-contacto">Hora:</label>
      <input type="time" id="hora-contacto" min="09:00" max="18:00" name="contacto[hora]" />
    `;
  } else {
    contactoDiv.innerHTML = `
      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" />
    
    `;
  }
}
