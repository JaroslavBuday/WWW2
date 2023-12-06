const password1 = document.querySelector(".pass-first")
const password2 = document.querySelector(".pass-second")
const paragraphText = document.querySelector(".result-text")

password1.addEventListener("input", () => {
    const password1Value = password1.value
    const password2Value = password2.value

  if(password1Value === password2Value){
    paragraphText.textContent = "Heslá sú zhodné"
    paragraphText.classList.add("valid")
    paragraphText.classList.remove("invalid")
  } else {
    paragraphText.textContent = "Heslá sa nezhodujú"
    paragraphText.classList.add("invalid")
    paragraphText.classList.remove("valid")
  }

  if(password1Value === "" && password2Value === ""){
    paragraphText.textContent = "Zadajte prosím heslo"
    paragraphText.classList.add("invalid")
    paragraphText.classList.remove("valid")
  }
})

password2.addEventListener("input", () => {
  const password1Value = password1.value
  const password2Value = password2.value

if(password1Value === password2Value){
  paragraphText.textContent = "Heslá sú zhodné"
  paragraphText.classList.add("valid")
  paragraphText.classList.remove("invalid")
} else {
  paragraphText.textContent = "Heslá sa nezhodujú"
  paragraphText.classList.add("invalid")
  paragraphText.classList.remove("valid")
}
if(password1Value === "" && password2Value === ""){
  paragraphText.textContent = "Zadajte prosím heslo"
  paragraphText.classList.add("invalid")
    paragraphText.classList.remove("valid")
}
})