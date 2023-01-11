// Funktion um Workspace-Cards zu rendern
function renderWorkspaceCard(data, wrapper, showStatus) {
  data.forEach((workspace) => {
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
      
      if (workspace[3] == 'online') {
        statusBall.classList.add('bg-green')
      } else {
        statusBall.classList.add('bg-orange-dark')
      }

      status.textContent = 'Status: ';
      status.appendChild(statusBall)
      workspaceElem.appendChild(status);
    }
    
    // add data to elements
    objectName.textContent = workspace[2];
    image.src = workspace[4];
    description.textContent = 'Beschreibung: ' + workspace[5];
    address.textContent = 'Adresse: ' + workspace[6]
    price.textContent = 'Preis: ' + workspace[7] + ' CHF / Tag';
    date.textContent = 'Verfügbar am: ' + workspace[8];
    user.textContent = 'Von Nutzer : ' + workspace[9];

    // styling
    image.classList.add('aspect-video', 'w-full', 'h-full', 'mb-6', 'object-cover')

    workspaceElem.appendChild(objectName);
    workspaceElem.appendChild(image);
    workspaceElem.appendChild(description);
    workspaceElem.appendChild(address);
    workspaceElem.appendChild(price);
    workspaceElem.appendChild(date);
    workspaceElem.appendChild(user);
    workspaceElem.classList.add('p-4', 'shadow-card', 'mb-8', 'last:mb-0', 'max-w-[40ch]', 'lg:max-w-[50ch]')
    wrapper.append(workspaceElem);
    image.src = workspace[4];

    // wenn alle inserate angezeigt werden sollen, dann..
    if (showStatus) {
      editWorkspace(workspaceElem, workspace)
    }
  })
}

function addStylingToBtn(btn) {
  btn.classList.add('border-2', 'border-orange-dark', 'bg-orange-dark', 'px-16', 'py-4', 'inline-block', 'hover:bg-white', 'transition', 'font-bold', 'text-white', 'hover:text-orange-dark', 'transition', 'mr-14', 'last:mr-0', 'last:ml-auto', 'mt-6')
}