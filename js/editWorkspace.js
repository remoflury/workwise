function editWorkspace(workspaceElem, workspace) {

  // create Bearbeite-Button
  const btn = document.createElement('button');
  btn.textContent = 'Bearbeiten';
  addStylingToBtn(btn);
  workspaceElem.appendChild(btn);

  // Delete-Button erstellen
  const btnDelete = document.createElement('button');
  btnDelete.textContent = 'Löschen';
  addStylingToBtn(btnDelete)
  workspaceElem.appendChild(btnDelete);

  btnDelete.addEventListener('click', () =>{
    deleteWorkspace(workspaceElem, workspace);
  })

  btn.addEventListener('click', () => {
    workspaceElem.classList.toggle('min-w-full')

    // input fields statt statische Elemente anzeigen
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

    // Speichern-Button erstellen
    const btnSubmit = document.createElement('button');
    btnSubmit.textContent = 'Speichern';
    addStylingToBtn(btnSubmit)
    workspaceElem.append(btnSubmit);
    
    // on click auf Speicher, führe diese funktion aus.
    btnSubmit.addEventListener('click', () => {
      updateWorkspace(workspaceElem, workspace)
    });
  })
}

function updateWorkspace(workspaceElem, workspaceData) {
    
  // speichere alle Werte der Input fields
  let objectname = workspaceElem.querySelector('#objectname').value;
  let statusOnline = workspaceElem.querySelector('#online').checked;
  let statusOffline = workspaceElem.querySelector('#offline').checked;
  let imageUrl = workspaceElem.querySelector('#image').value;
  let description = workspaceElem.querySelector('#description').value;
  let address = workspaceElem.querySelector('#address').value;
  let price = workspaceElem.querySelector('#price').value;
  let date = workspaceElem.querySelector('#date').value;
  let workspaceID = workspaceData[0];

  
  // check for empty inputs
  const inputValues = [objectname, imageUrl];
  if (inputFieldsEmpty(inputValues)) {
    createErrorMessage(workspaceElem, "Bitte alle erforderlichen Felder ausfüllen.")
    return;
  }
  
  if (checkEmptyRadionButtons(statusOnline, statusOffline)) {
    createErrorMessage(workspaceElem, "Bitte den Status (online / offline) setzen.")
    return;
  }

  if (workspaceElem.querySelector('#message')) workspaceElem.querySelector('#message').remove();
  

  let status = "offline";
  if (statusOnline === true) {
    status = "online"
  }
  // erstelle neue formularDaten
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


  // fetche backend
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

    // falls DB-error, dann..
    if (data.error) {
      alert(data.message)
    }
    // falls kein DB-Error, dann lade die Seite neu.
    else {
      location.reload();
    }
  })
}

function deleteWorkspace(workspaceElem, workspaceData) {

  if (confirm("Willst du dein Inserat wirklich löschen?")) {
    let formData = new FormData();
    formData.append('submit', true);
    formData.append('workspaceid', workspaceData[0]);

    fetch(`${baseUrl}/backend/deleteWorkspace.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.json();
    })
    .then((data) => {

      // console.log(data)
      // Wenn DB-Fehler
      if (data.error === true) {
        alert(data.message)
      }

      location.reload();
    })
  }
}
