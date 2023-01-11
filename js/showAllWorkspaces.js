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
        let messageElem = document.createElement('article');
        messageElem.textContent = data.message;
        messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-4', 'mt-8' )
        workspacesWrapper.appendChild(messageElem);
      }
      else {
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
          workspaceElem.classList.add('p-4', 'shadow-card', 'mb-8', 'last:mb-0')
          workspacesWrapper.append(workspaceElem);
          image.src = workspace[4];
        })
      }
      console.log(data);
    })
}

// function createElement(tagType, description) {
//   let descriptionElem = document.createElement('p');
//   let tag = document.createElement(tagType);
//   descriptionElem.textContent = description;
// }