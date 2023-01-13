function createWorkspace() {
  const objectname = document.querySelector('#objectname').value;
  const statusOnline = document.querySelector('#online').checked;
  const statusOffline = document.querySelector('#offline').checked;
  const imageUrl = document.querySelector('#image').value;
  const description = document.querySelector('#description').value;
  const address = document.querySelector('#address').value;
  const price = document.querySelector('#price').value;
  const date = document.querySelector('#date').value;
  let status;
  if (statusOnline === true) {
    status = "online"
  } else if (statusOffline === true) {
    status = "offline"
  }

  // Todo check for empty inputs
  let formData = new FormData();
  formData.append('submit', true)
  formData.append('objectname', objectname);
  formData.append('status', status);
  formData.append('imageurl', imageUrl);
  formData.append('description', description);
  formData.append('address', address);
  formData.append('price', price);
  formData.append('date', date);
  console.log(date)

  fetch(`${baseUrl}/backend/newworkspace.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data)
      const messageElem = document.querySelector('#message');
      
      // zeige nachricht in Article an
      messageElem.textContent = data.message;
      window.location.href = 'newworkspace.php#message'

      // wenn kein error, dann style so
      if (data.error === false) {
        messageElem.classList.add('bg-green', 'text-white', 'px-4', 'py-2', 'mt-8' )

        setTimeout(() => {
          window.location.href = "/"
        }, 2500)
      }
      // sonst style so
      else {
        messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' )
      }
    })
}