function registration() {

  const username = document.querySelector('#username').value;
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

  // check for passwordlength
  if (isPasswordLongEnough(password) === false) {
    createErrorMessage(messageElem, "Das Passwort muss mindestens 8 Zeichen lang sein.");
    return;
  }

  // TODO: check if empty
  let formData = new FormData();
  formData.append('submit', true)
  formData.append('username', username);
  formData.append('email', email);
  formData.append('password', password);

  fetch(`${baseUrl}/backend/registration.php`,
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
        createErrorMessage(messageElem, data.message, true);
        setTimeout(() => {
          window.location.href = '/login.php';
        }, 2000)
      } 
      // sonst style so
      else {
        createErrorMessage(messageElem, data.message);
      }
    })
}

function isPasswordLongEnough(password) {
  let result = true;
  if (password.length < 8) {
    return result = false;
  }
  return result;
}