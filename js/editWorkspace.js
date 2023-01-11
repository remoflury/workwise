function editWorkspace(workspaceElem, workspace) {
  const btn = document.createElement('button');
  btn.textContent = 'Bearbeiten';
  workspaceElem.appendChild(btn)

  // add "bearbeiten" button
  btn.addEventListener('click', () => {
    // ToDo 
    // let online = false;
    // let offline = false;

    // if (workspace[3] == 'online') {
    //   online = true;
    // } else {
    //   offline = true;
    // }

    // console.log('online', online)
    // console.log('offline', offline)


    // render input fields
    workspaceElem.innerHTML = `
      <div class="">
        <div class="my-2">
          <label for="status">Online</label>
          <input type="radio" name="status" id="online" >
          <label for="status">Offline</label>
          <input type="radio" name="status" id="offline">
        </div>

        <div class="my-2">
          <label for="objectname">Name Mietobjekt</label>
          <input type="text" name="objectname" id="objectname" value="${workspace[2]}">
        </div>

        
        <div class="my-2">
          <label for="image">Bild-Url</label>
          <input type="text" name="image" id="image" value="${workspace[4]}">
        </div>
        
        <div class="my-2">
          <label for="description">Beschrieb Workspace</label>
          <textarea class="h-40" type="textarea" name="description" id="description">${workspace[5]}</textarea>
        </div>
        
        <div class="my-2">
          <label for="address">Adresse</label>
          <input type="text" name="address" id="address" value="${workspace[6]}">
        </div>

        <div class="my-2">
          <label for="price">Preis (CHF) / Tag</label>
          <input type="number" name="price" id="price" value="${workspace[7]}" min="0">
        </div>

        <div class="my-2">
          <label for="date">Verfügbarkeit</label>
          <input type="date" name="date" id="date" value="${workspace[8]}">
        </div>
      </div>
    `;

    
    const btnSubmit = document.createElement('button');
    btnSubmit.textContent = 'Speichern';
    workspaceElem.append(btnSubmit);

    btnSubmit.addEventListener('click', updateWorkspace(workspaceElem, workspace));
  })
}

function updateWorkspace(workspaceElem, workspaceData) {
      
  let objectname = workspaceElem.querySelector('#objectname').value;
  let statusOnline = workspaceElem.querySelector('#online').checked;
  // let statusOffline = workspaceElem.querySelector('#offline').checked;
  let imageUrl = workspaceElem.querySelector('#image').value;
  let description = workspaceElem.querySelector('#description').value;
  let address = workspaceElem.querySelector('#address').value;
  let price = workspaceElem.querySelector('#price').value;
  let date = workspaceElem.querySelector('#date').value;
  let workspaceID = workspaceData[0];

  let status = "offline";
  if (statusOnline === true) {
    status = "online"
  } 

  let formData = new FormData();
  formData.append('submit', true);
  formData.append('objectname', objectname);
  formData.append('status', status);
  formData.append('imageurl', imageUrl);
  formData.append('description', description);
  formData.append('address', address);
  formData.append('price', price);
  formData.append('date', date);
  formData.append('workspaceid', workspaceID);

  fetch(`${baseUrl}/backend/editWorkspace.php`,
  {
    body: formData,
    method: "post",
  })

  .then((response) => {
    return response.json();
  })
  .then((data) => {
    console.log(data)

    if (data.error) {
      alert(data.message)
    }
    else {
      location.reload();
    }
  })
}

