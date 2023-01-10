function logout() {
  
  let formData = new FormData();
  formData.append('submit', true)

  fetch(`${baseUrl}/backend/logout.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.text();
    })
    .then((data) => {
      
      console.log(data);
      location.reload();
    })

}