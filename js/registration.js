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
      return response.text();
    })
    .then((data) => {
      if (data == 'nosubmit') {
        window.location.href = '/registration.php'
      }
      console.log(data);
    // document.querySelector('#nachricht').innerHTML = data;

    })
}