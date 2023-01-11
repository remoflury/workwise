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
        const showStatus = false;
        renderWorkspaceCard(data, workspacesWrapper, false);
        console.log(data);
      }
    })
}

// function createElement(tagType, description) {
//   let descriptionElem = document.createElement('p');
//   let tag = document.createElement(tagType);
//   descriptionElem.textContent = description;
// }