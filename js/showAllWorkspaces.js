function showAllWorkspaces() {

  let formData = new FormData();
  formData.append('submit', true);

  fetch(`${baseUrl}/backend/showAllWorkspaces.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.json();
    })
    .then((data) => {

      const workspacesWrapper = document.querySelector('#workspaces');

      // wenn fetch von DB einen error zurückgibt
      if (data.error == true) { 
        createErrorMessage(workspacesWrapper, data.message)
        return;        
      }
      const showStatus = false;
      let renderRentBtn = false;
      if (data[0] === true) {
        renderRentBtn = true
      }
      console.log(data);
      renderWorkspaceCard(data, workspacesWrapper, showStatus, renderRentBtn);
    })
}

// Funktion um Workspace-Cards zu rendern
function renderWorkspaceCard(data, wrapper, showStatus, renderRentBtn = false) {

  for (let i = 0; i < data.length; i++) {
    breakpoint: {

      // escape logged in status
      if (i == 0) {
        break breakpoint;
      }
      // creating Elements
      const workspaceElem = document.createElement('article');
      const objectName = document.createElement('h2');
      const image = document.createElement('img');
      const description = document.createElement('p');
      const address = document.createElement('p');
      const price = document.createElement('p');
      const date = document.createElement('p');
      const user = document.createElement('p');
  
      // wenn Status angezeigt werden soll, dann..
      if (showStatus) {
        const status = document.createElement('p');
        let statusBall = document.createElement('span');
        statusBall.classList.add('w-4', 'h-4', 'rounded-full')
        status.classList.add('flex', 'gap-4', 'items-center', 'mb-4')
        
        if (data[i][3] == 'online') {
          statusBall.classList.add('bg-green')
        } else {
          statusBall.classList.add('bg-orange-dark')
        }
  
        status.textContent = 'Status: ';
        status.appendChild(statusBall)
        workspaceElem.appendChild(status);
      }
      
      // add data to elements
      objectName.textContent = data[i][2];
      image.src = data[i][4];
      description.textContent = data[i][5];
      address.textContent = 'Adresse: ' + data[i][6]
      price.textContent = 'Preis: ' + data[i][7] + ' CHF / Tag';
      date.textContent = 'Verfügbar am: ' + data[i][8];
      user.textContent = 'Vermieter*in : ' + data[i][9];
  
      // styling
      image.classList.add('aspect-video', 'w-full', 'h-full', 'mb-6', 'object-cover')
      description.classList.add('my-4')
      workspaceElem.classList.add('p-4', 'shadow-card', 'mb-8', 'last:mb-0', 'max-w-[40ch]', 'lg:max-w-[45ch]')
  
      // appending elems
      workspaceElem.appendChild(objectName);
      workspaceElem.appendChild(image);
      workspaceElem.appendChild(description);
      workspaceElem.appendChild(address);
      workspaceElem.appendChild(price);
      workspaceElem.appendChild(date);
      workspaceElem.appendChild(user);
      wrapper.append(workspaceElem);
  
      // wenn alle inserate angezeigt werden sollen, dann..
      if (showStatus) {
        editWorkspace(workspaceElem, data[i])
      }
  
      // für Startseite: Jetzt mieten Button
      if (renderRentBtn) {
        renderRentButton(workspaceElem, data[i][0])
      }
    }
  }
}