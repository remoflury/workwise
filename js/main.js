const baseUrl = 'http://localhost:8080';



//Beispiel
function test() {
  let textValue = document.querySelector('#test');

  let formData = new FormData();
  formData.append('submit', true);
  formData.append('text', textValue);

  fetch(`${baseUrl}/backend/test.php`,
    {
        body: formData,
        method: "post",
    })

    .then((response) => {
      return response.json();
    })

    .then((data) => {
      console.log(data);
      // if site is not accessed with submit button
      if (data.error == "no submit set") {
        window.location.href = `${baseUrl}/${data.header}`;
      } 
      // if site is accessed with submit button
      else if (data.error == "none") {
        console.log("juhui")
      }
    }) 
}