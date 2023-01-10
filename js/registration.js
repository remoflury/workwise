function registration() {

  const username = document.querySelector('#username').value;
  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;


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

      const messageElem = document.querySelector('#message');
      
      // zeige nachricht in Article an
      messageElem.textContent = data.message;

      // wenn kein error, dann style so
      if (data.error == false) {
        messageElem.classList.add('bg-green', 'text-white', 'px-4', 'py-2', 'mt-8' )
        const loginLink = document.createElement('a');
        const breakElem = document.createElement('br');
        loginLink.textContent = 'Hier einloggen.';
        loginLink.href = "/login.php";
        loginLink.classList.add('underline', 'hover:opacity-80', 'transition');
        messageElem.appendChild(breakElem);
        messageElem.appendChild(loginLink);
      } 
      // sonst style so
      else {
        messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' )
      }
      // console.log(data);
    })
}