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
    if (data.length === 0) {
      createErrorMessage(workspaceWrapper, "Du hast noch keine Workspace-Inserate erfasst.")
    }
    const showStatus = true;
    renderWorkspaceCard(data, workspaceWrapper, showStatus)
    console.log(data)
  })
}