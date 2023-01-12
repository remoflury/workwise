function login() {

  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;
  const messageElem = document.querySelector('#message');
  messageElem.innerHTML = '';
  // console.log(email)
  const inputValues = [email, password];
  if (inputFieldsEmpty(inputValues)) {
    messageElem.textContent = 'Fülle bitte alle erforderlichen Felder aus.';
    messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' )
    return;
  }

  // TODO: check if empty
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