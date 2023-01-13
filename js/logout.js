function logout() {
  
  let formData = new FormData();
  formData.append('submit', true)

  fetch(`${baseUrl}/backend/logout.php`,
    {
      body: formData,
      method: "post",
    })

    .then((response) => {
      return response.json();
    })
    .then((data) => {
      
      console.log(data);
      window.location.href = '/';
    })

}