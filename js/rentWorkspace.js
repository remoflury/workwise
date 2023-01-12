function renderRentButton(workspaceElem, workspaceId) {
  // console.log(workspaceElem)
  const btnRent = document.createElement('button');
  btnRent.textContent = 'Jetzt mieten';
  addStylingToBtn(btnRent);
  workspaceElem.appendChild(btnRent);

  // console.log(workspaceId)
  btnRent.addEventListener('click', () => {
    window.location.href = `/rentworkspace.php?workspaceId=${workspaceId}`
  })
}

function rentWorkspace() {
  const workspaceId = document.querySelector('#workspace-id').value;

  let formData = new FormData();
  formData.append('submit', true)
  formData.append('workspaceId', workspaceId)

  fetch(`${baseUrl}/backend/rentWorkspace.php`, {
    body: formData,
    method: "post"
  })
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data)
      // const workspaceWrapper = document.createElement('#workspace');

    })
}