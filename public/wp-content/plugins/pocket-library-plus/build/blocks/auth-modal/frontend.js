/******/ (() => { // webpackBootstrap
/*!*******************************************!*\
  !*** ./src/blocks/auth-modal/frontend.js ***!
  \*******************************************/
document.addEventListener("DOMContentLoaded", () => {
  const openAuthFormButton = document.querySelectorAll(".auth-container");
  const modalElement = document.querySelector(".wp-block-pocket-library-plus-auth-modal");
  const modalCloseElements = document.querySelectorAll(".auth-form-overlay, .auth-close-button");
  openAuthFormButton.forEach(el => {
    el.addEventListener("click", e => {
      e.preventDefault();
      modalElement.classList.add("auth-modal-opened");
    });
  });
  modalCloseElements.forEach(el => {
    el.addEventListener("click", e => {
      e.preventDefault();
      modalElement.classList.remove("auth-modal-opened");
    });
  });
  const tabs = document.querySelectorAll(".auth-tabs a");
  const loginForm = document.querySelector("#auth-login-form");
  const registerForm = document.querySelector("#auth-register-form");
  tabs.forEach(tab => {
    tab.addEventListener("click", e => {
      e.preventDefault();
      tabs.forEach(authActiveTab => {
        authActiveTab.classList.remove("auth-active-tab");
      });
      e.currentTarget.classList.add("auth-active-tab");
      const authActiveTab = e.currentTarget.getAttribute("href");
      if (authActiveTab === "#auth-login-form") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
      } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
      }
    });
  });
  if (registerForm || loginForm) {
    registerForm.addEventListener("submit", async e => {
      e.preventDefault();
      const registerFieldset = registerForm.querySelector("fieldset");
      registerFieldset.setAttribute("disabled", true);
      const registerStatus = registerForm.querySelector(".auth-register-status");
      registerStatus.innerHTML = `
      <div class="auth-register-status">
        Creating account...
      </div>
      `;
      const formData = {
        username: registerForm.querySelector("#auth-register-name").value,
        email: registerForm.querySelector("#auth-register-email").value,
        password: registerForm.querySelector("#auth-register-password").value
      };
      const response = await fetch(plp_auth_rest.register, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
      });
      const responseJSON = await response.json();
      if (responseJSON.status === 2) {
        registerStatus.innerHTML = `
          <div class="auth-register-status auth-status-success">
            Your account has been created.
          </div>
        `;
        location.reload();
      } else {
        registerFieldset.removeAttribute("disabled");
        registerStatus.innerHTML = `
          <div class="auth-register-status auth-status-error">
            Something went wrong.
          </div>
        `;
      }
    });
    loginForm.addEventListener("submit", async e => {
      e.preventDefault();
      const loginFieldset = loginForm.querySelector("fieldset");
      loginFieldset.setAttribute("disabled", true);
      const loginStatus = loginForm.querySelector(".auth-login-status");
      loginStatus.innerHTML = `
    <div class="auth-login-status">
      Logging in. Please wait
    </div>
    `;
      const formData = {
        user_login: loginForm.querySelector("#auth-login-email").value,
        password: loginForm.querySelector("#auth-login-password").value
      };
      const response = await fetch(plp_auth_rest.login, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
      });
      const responseJSON = await response.json();
      if (responseJSON.status === 2) {
        loginStatus.innerHTML = `
      <div class="auth-login-status auth-status-success">
        Successfully logged in
      </div>
      `;
        location.reload();
      } else {
        loginFieldset.removeAttribute("disabled");
        loginStatus.innerHTML = `
        <div class="auth-login-status auth-status-error">
          Invalid credentials. Please try again.
        </div>
      `;
      }
    });
  }

  // Toggle change form
  const changeButton = document.querySelector(".auth-change-button");
  changeButton.addEventListener("click", () => {
    const updateForm = document.querySelector(".auth-update-form");
    const publicDataContainer = document.querySelector('.auth-public-data-container');
    publicDataContainer.classList.toggle("auth-public-data-container-hide");
    updateForm.classList.toggle("auth-update-form-show");
    if (updateForm.classList.contains('auth-update-form-show')) {
      changeButton.innerHTML = ` Hide Change Info ❌`;
    } else {
      changeButton.innerHTML = ` Change Info `;
    }
  });
});
/******/ })()
;
//# sourceMappingURL=frontend.js.map