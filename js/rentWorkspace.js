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
      const workspaceWrapper = document.querySelector('#workspace');

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
      
      titleElem.textContent = data[0][2];
      imgElem.src = data[0][4];
      descElem.innerHTML =data[0][5];
      addressElemRight.textContent = data[0][6];
      priceElemRight.textContent = data[0][7] + ' CHF / Tag';
      dateElemRight.textContent = data[0][8];
      userElemRight.textContent = data[0][9];
      
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

      // titleElem.textContent = data[0][2];
      // imgElem.src = data[0][4];
      // descElem.innerHTML =data[0][5];
      // addressElem.innerHTML = 'Adresse: </p>' + data[0][6] + '</p>';
      // // priceElem.innerHTML = 'Preis:<p>'+ data[0][7] + ' CHF / Tag</p>';;
      // // dateElem.innerHTML = 'Mietdatum:<p>'+ data[0][8] + '</p>';;
      // // userElem.innerHTML = 'Vermieter:<p>'+ data[0][9] + '</p>';;
      
      // descElem.classList.add('mt-3', 'mb-6', 'lead', 'col-span-full');
      // articleElem.classList.add('grid', 'grid-cols-2')

      // workspaceWrapper.appendChild(titleElem)
      // workspaceWrapper.appendChild(imgElem)
      // articleElem.appendChild(descElem)
      // articleElem.appendChild(addressElem)
      // articleElem.appendChild(priceElem)
      // articleElem.appendChild(dateElem)
      // articleElem.appendChild(userElem)
      // workspaceWrapper.appendChild(articleElem)


    })
}