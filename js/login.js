let loginForm = document.querySelector('.real-login-form-container');

document.querySelector('#login-btn').onclick = () => {
  loginForm.classList.toggle('active');
  checkRememberMe();
}

document.querySelector('#close-login-btn').onclick = () => {
  loginForm.classList.remove('active');
}

function loginBtnDisplay(bval) {
    var loginBtn = document.getElementById("login-btn");
    if (bval == 1) {
      loginBtn.style.display = "flex";
    } else {
      loginBtn.style.display = "none";
    }
  }