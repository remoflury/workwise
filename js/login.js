function login() {

  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  const messageElem = document.querySelector('#message');
  messageElem.innerHTML = '';

  // check for empty input
  const inputValues = [email, password];
  if (inputFieldsEmpty(inputValues)) {
    createErrorMessage(messageElem, "Bitte alle erforderlichen Felder ausfüllen.")
    return;
  }

  // check email validity
  if (validateEmail(email) === false) {
    createErrorMessage(messageElem, "Bitte ein gültiges Email Format eingeben.")
    return;
  }

  let formData = new FormData();
  formData.append('submit', true)
  formData.append('email', email);
  formData.append('password', password);

  fetch(`${baseUrl}/backend/login.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.json();
    })
    .then((data) => {

      // wenn kein error, dann style so
      if (data.error == false) {
        messageElem.innerHTML = '';
        window.location.href = "/"
      } 
      // sonst style so
      else {
        messageElem.textContent = data.message;
        messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' )
      }
      console.log(data);
    })
}