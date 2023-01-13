function addStylingToBtn(btn) {
  btn.classList.add('border-2', 'border-orange-dark', 'bg-orange-dark', 'px-16', 'py-4', 'inline-block', 'hover:bg-white', 'transition', 'font-bold', 'text-white', 'hover:text-orange-dark', 'transition', 'mr-14', 'last:mr-0', 'last:ml-auto', 'mt-6')
}

function inputFieldsEmpty(valuesArray) {
  let result = false;
  valuesArray.forEach((value) => {
    // console.log(value)
    if (value == "" || value === false) {
      result = true;
    }
  })

  return result;
}

function checkEmptyRadionButtons(radioBtn1, radioBtn2) {
  let result = false;
  if (!radioBtn1 && !radioBtn2) result = true;
  return result;
}

function createErrorMessage(parentElem, textMessage, greenBg = false) {
  const messageElem = document.createElement('article');
  messageElem.id = "message"
  messageElem.textContent = textMessage;
  messageElem.classList.add('text-white', 'px-4', 'py-2', 'mt-8' )
  if (greenBg) {
    messageElem.classList.add('bg-green')
  } else {
    messageElem.classList.add('bg-red-500')
  }
  parentElem.appendChild(messageElem)
}

function validateEmail(emailValue) {
  let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; 
  let valid = false;

  if (emailValue.match(validRegex)) {
    return valid = true;
  } else {
    return valid;
  }
}