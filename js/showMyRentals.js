function showMyRentals() {
  const userId = document.querySelector('#user-id').value;

  let formData = new FormData();
  formData.append('submit', true)
  formData.append('userId', userId)

  fetch(`${baseUrl}/backend/showMyRentals.php`,
  {
    body: formData,
    method: "post",
  })

  .then((response) => {
    return response.json();
  })
  
  .then((data) => {
    console.log(data);
    const myRentalsWrapper = document.querySelector('#my-rentals-wrapper');

    // wenn fehler zurückkommt
    if (data.error === true) {
      createErrorMessage(myRentalsWrapper, data.message)
      return;
    }

    if (data.length === 0) {
      createErrorMessage(myRentalsWrapper, "Du hast leider noch keine deiner Workspaces vermietet.")
      return;
    }
    renderRentalWorkspaces(data, myRentalsWrapper);

    myRentalsWrapper.classList.add('flex', 'flex-wrap', 'gap-12', 'justify-center')

  })
}


function renderRentalWorkspaces(data, wrapper) {
  data.forEach((workspace) => {
    const workspaceElem = document.createElement('article');      
    const titleElem = document.createElement('h2');
    const imgElem = document.createElement('img');
    const dateElem = document.createElement('p');
    const userElem = document.createElement('p');

    titleElem.textContent = workspace.objectname;
    imgElem.src = workspace.imageurl;
    dateElem.textContent = 'Mietdatum: ' + workspace.date;
    userElem.textContent = 'Mieter: ' + workspace.username;

    imgElem.classList.add('aspect-video', 'object-cover', 'w-full')
    dateElem.classList.add('mt-4')

    workspaceElem.appendChild(titleElem);
    workspaceElem.appendChild(imgElem);
    workspaceElem.appendChild(dateElem);
    workspaceElem.appendChild(userElem);

    workspaceElem.classList.add('shadow-card', 'p-4', 'max-w-[40ch]', 'lg:max-w-[45ch]')

    wrapper.appendChild(workspaceElem)
  })
}