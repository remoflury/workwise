function showMyBookings() {
  const userId = document.querySelector('#user-id').value;

  let formData = new FormData();
  formData.append('submit', true)
  formData.append('userId', userId)

  fetch(`${baseUrl}/backend/showMyBookings.php`,
  {
    body: formData,
    method: "post",
  })

  .then((response) => {
    return response.json();
  })
  
  .then((data) => {
    console.log(data);
    const myBookingsWrapper = document.querySelector('#my-bookings-wrapper');
    const messageElem = document.createElement('article');

    // wenn fehler zurückkommt
    if (data.error === true) {
      messageElem.textContent = data.message;
      messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' );
      myBookingsWrapper.appendChild(messageElem);
      return;
    }

    data.forEach((workspace) => {
      const workspaceElem = document.createElement('article');      
      const titleElem = document.createElement('h2');
      const imgElem = document.createElement('img');
      const dateElem = document.createElement('p');
      const userElem = document.createElement('p');
  
      titleElem.textContent = workspace[2];
      imgElem.src = workspace[4];
      dateElem.textContent = 'Mietdatum: ' + workspace[8];
      userElem.textContent = 'Vermieter: ' + workspace[9];

      imgElem.classList.add('aspect-video', 'object-cover')
      dateElem.classList.add('mt-4')

      workspaceElem.appendChild(titleElem);
      workspaceElem.appendChild(imgElem);
      workspaceElem.appendChild(dateElem);
      workspaceElem.appendChild(userElem);

      workspaceElem.classList.add('shadow-card', 'p-4', 'max-w-[40ch]', 'lg:max-w-[45ch]')

      myBookingsWrapper.appendChild(workspaceElem)
    })

    myBookingsWrapper.classList.add('flex', 'flex-wrap', 'gap-12', 'justify-center')





    
  })
}