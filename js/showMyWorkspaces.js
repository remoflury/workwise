function showMyWorkspaces() {

  let formData = new FormData();
  formData.append('submit', true);

  fetch(`${baseUrl}/backend/showMyWorkspaces.php`,
  {
    body: formData,
    method: "post",
  })

  .then((response) => {
    return response.json();
  })
  
  .then((data) => {
    workspaceWrapper = document.getElementById('my-workspaces')
    const showStatus = true;
    // const renderRentBtn = true;
    renderWorkspaceCard(data, workspaceWrapper, showStatus)
    console.log(data)
  })
}