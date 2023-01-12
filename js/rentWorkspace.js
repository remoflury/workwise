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