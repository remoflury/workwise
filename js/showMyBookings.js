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

    // wenn fehler zurückkommt
    if (data.error === true) {
      createErrorMessage(myBookingsWrapper, data.message)
      return;
    }
    if (data.length === 0) {
      createErrorMessage(myBookingsWrapper, "Du hast noch keinen Workspace gebucht.")
      return;
    }
    renderBookingWorkspaces(data, myBookingsWrapper);

    myBookingsWrapper.classList.add('flex', 'flex-wrap', 'gap-12', 'justify-center')
  })
}

function renderBookingWorkspaces(data, wrapper) {
  data.forEach((workspace) => {
    const workspaceElem = document.createElement('article');      
    const titleElem = document.createElement('h2');
    const imgElem = document.createElement('img');
    const dateElem = document.createElement('p');
    const userElem = document.createElement('p');

    titleElem.textContent = workspace.objectname;
    imgElem.src = workspace.imageurl;
    dateElem.textContent = 'Mietdatum: ' + workspace.date;
    userElem.textContent = 'Vermieter: ' + workspace.username;

    imgElem.classList.add('aspect-video', 'object-cover', 'w-full')
    dateElem.classList.add('mt-4')

    workspaceElem.appendChild(titleElem);
    workspaceElem.appendChild(imgElem);
    workspaceElem.appendChild(dateElem);
    workspaceElem.appendChild(userElem);

    workspaceElem.classList.add('shadow-card', 'p-4', 'max-w-[40ch]', 'lg:max-w-[45ch]')
    
    // button stornieren
    cancelBooking(workspaceElem, workspace.workspace_id)

    wrapper.appendChild(workspaceElem)

    
  })
}

function cancelBooking(parentWrapper, workspaceId) {
  const btnCancel = document.createElement('button');
  btnCancel.textContent = 'Buchung stornieren';
  addStylingToBtn(btnCancel);
  parentWrapper.appendChild(btnCancel);

  // redirect to site with workspace id 
  btnCancel.addEventListener('click', () => {
    let formData = new FormData();
    formData.append('submit', true);
    formData.append('workspaceId', workspaceId)

    if (confirm("Willst diese Workspace-Buchung wirklich stornieren?")) {

      fetch(`${baseUrl}/backend/cancelBooking.php`,{
        body: formData,
        method: "post"
      }) 
        .then((response) => {
          return response.json()
        })
  
        .then((data) => {

          if (data.error === true) {
            const messageElem = document.createElement('div');
            parentWrapper.appendChild(messageElem);
            createErrorMessage(messageElem, data.message);
            return;
          }

          window.location.reload();
        })
    }
  })
}