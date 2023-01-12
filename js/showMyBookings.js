function showMyBookings() {
  const userId = document.querySelector('#user-id').value;

  let formData = new FormData();
  formData.append('submit', true)
  formData.append('userId', userId)

  fetch(`${baseUrl}/backend/showMyBookings.php`,
  {
    body: formData,
    method: "post",
  })

  .then((response) => {
    return response.json();
  })
  
  .then((data) => {
    console.log(data);
  })
}