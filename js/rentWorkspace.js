function renderRentButton(workspaceElem, workspaceId) {
  // console.log(workspaceElem)
  const btnRent = document.createElement('button');
  btnRent.textContent = 'Jetzt mieten';
  addStylingToBtn(btnRent);
  workspaceElem.appendChild(btnRent);

  // redirect to site with workspace id 
  btnRent.addEventListener('click', () => {
    window.location.href = `/rentworkspace.php?workspaceId=${workspaceId}`
  })
}

function rentWorkspace() {
  const workspaceId = document.querySelector('#workspace-id').value;
  const userId = document.querySelector('#user-id').value;

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
      // create rent workspace
      const workspaceWrapper = document.querySelector('#workspace');
      createRentWorkspace(data, workspaceWrapper);

      // Jetzt mieten button erstellen
      const btnWrapper = document.createElement('div');
      btnWrapper.classList.add('col-span-full', 'mt-4', 'lg:mt-12', 'flex', 'justify-center')
      workspaceWrapper.append(btnWrapper);
      btnWrapper.appendChild(addRentBtn("Jetzt mieten", data, userId))
    })
}

function createRentWorkspace(data, workspaceWrapper) {

  const articleElem = document.createElement('article');
  const titleElem = document.createElement('h2');
  const imgElem = document.createElement('img');
  const descElem = document.createElement('p');
  const addressElemLeft = document.createElement('p');
  const addressElemRight = document.createElement('p');
  const priceElemLeft = document.createElement('p');
  const priceElemRight = document.createElement('p');
  const dateElemLeft = document.createElement('p');
  const dateElemRight = document.createElement('p');
  const userElemLeft = document.createElement('p');
  const userElemRight = document.createElement('p');

  addressElemLeft.textContent = 'Adresse:'
  priceElemLeft.textContent = 'Preis:'
  dateElemLeft.textContent = 'Mietdatum:'
  userElemLeft.textContent = 'Vermieter*in:'
  
  titleElem.textContent = data[0].objectname;
  imgElem.src = data[0].imageurl;
  descElem.innerHTML =data[0].description;
  addressElemRight.textContent = data[0].address;
  priceElemRight.textContent = data[0].price + ' CHF / Tag';
  dateElemRight.textContent = data[0].date;
  userElemRight.textContent = data[0].users_username;
  
  workspaceWrapper.classList.add('grid', 'grid-cols-2', 'lg:grid-cols-10');
  titleElem.classList.add('col-span-full', 'lg:col-start-3')
  articleElem.classList.add('col-span-full', 'lg:col-span-6', 'lg:col-start-3', 'grid', 'grid-cols-2', 'lg:grid-cols-10', 'gap-x-4', 'gap-y-2');
  descElem.classList.add('mt-3', 'md:mt-6', 'xl:mt-10', 'mb-6', 'lead', 'col-span-full');
  imgElem.classList.add('w-full', 'aspect-video', 'object-cover', 'mx-auto', 'col-span-full', 'lg:col-span-6', 'lg:col-start-3')
  addressElemLeft.classList.add('lg:col-span-3', 'lg:col-start-2')
  priceElemLeft.classList.add('lg:col-span-3', 'lg:col-start-2')
  dateElemLeft.classList.add('lg:col-span-3', 'lg:col-start-2')
  userElemLeft.classList.add('lg:col-span-3', 'lg:col-start-2')
  addressElemRight.classList.add('lg:col-span-4')
  priceElemRight.classList.add('lg:col-span-4')
  dateElemRight.classList.add('lg:col-span-4')
  userElemRight.classList.add('lg:col-span-4')


  workspaceWrapper.appendChild(titleElem)
  workspaceWrapper.appendChild(imgElem)
  articleElem.appendChild(descElem)
  articleElem.appendChild(addressElemLeft)
  articleElem.appendChild(addressElemRight)
  articleElem.appendChild(priceElemLeft)
  articleElem.appendChild(priceElemRight)
  articleElem.appendChild(dateElemLeft)
  articleElem.appendChild(dateElemRight)
  articleElem.appendChild(userElemLeft)
  articleElem.appendChild(userElemRight)
  workspaceWrapper.appendChild(articleElem)
}

function addRentBtn(btnText, data, userId) {
  const btnRent = document.createElement('button');
  addStylingToBtn(btnRent);
  btnRent.classList.add('!mx-0')
  btnRent.textContent= btnText;

  // Funktionalität mieten
  btnRent.addEventListener('click', () => {
    rentNow(data, userId)
  })
  return btnRent;
}

function rentNow(data, userId) {
  if (confirm("Willst du du jetzt verbindlich mieten?")) {
    let formData = new FormData();
    formData.append('submit', true);
    formData.append('workspaceId', data[0].ID);
    formData.append('mieter', userId)
    formData.append('vermieter', data[0].users_id)
  
    fetch(`${baseUrl}/backend/rent.php`, {
      body: formData,
      method: "post"
    })
    
    .then((response) => {
      return response.json();
    })
  
    .then((data) => {
      console.log(data)

      let messageElem = document.createElement('article');
      messageElem.innerHTML = '';
      let messageWrapper = document.querySelector('#workspace');
      messageElem.textContent = data.message;
      messageWrapper.append(messageElem)
      // wenn ein error zurückkommt
      if (data.error === false) {
        messageElem.classList.add('bg-green', 'text-white', 'px-4', 'py-2', 'mt-8', 'col-span-full', 'lg:col-span-6', 'lg:col-start-3')
      } else {
        messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8', 'col-span-full', 'lg:col-span-6', 'lg:col-start-3')
      }

      setTimeout(() => {
        window.location.href = '/mybookings.php';
      }, 2000)
    })

  }
}
