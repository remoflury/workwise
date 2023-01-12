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
    return response.text();
  })
  
  .then((data) => {
    console.log(data);
    // const myBookingsWrapper = document.querySelector('#my-bookings-wrapper');
    // const messageElem = document.createElement('article');

    // wenn fehler zurückkommt
    // if (data.error === true) {
    //   messageElem.textContent = data.message;
    //   messageElem.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'mt-8' );
    //   myBookingsWrapper.appendChild(messageElem);
    //   return;
    // }

    // renderWorkspaces(data, myBookingsWrapper);

    // myBookingsWrapper.classList.add('flex', 'flex-wrap', 'gap-12', 'justify-center')

  })
}