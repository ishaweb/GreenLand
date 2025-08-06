const container = document.querySelector(".form-container");
const registerBtn = document.querySelector(".btn-register");
const loginBtn = document.querySelector(".btn-login");

registerBtn.addEventListener("click",()=>{
  container.classList.add("active");
});
loginBtn.addEventListener("click",()=>{
  container.classList.remove("active");
});
window.addEventListener("DOMContentLoaded", () => {
  if (typeof activeForm !== 'undefined' && activeForm === 'register') {
    container.classList.add("active");
  } else {
    container.classList.remove("active");
  }
})