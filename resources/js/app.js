import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {

  // --------------------------------------------------
  // トースト通知の処理
  // --------------------------------------------------
  const toast = document.getElementById('js-toast');
  function showToast(message, duration = 4000) {
    const toastMessage = document.createElement('div');
    toastMessage.classList.add('c-toast__message');
    toastMessage.textContent = message;
    toast.prepend(toastMessage);

    setTimeout(() => {
      toastMessage.classList.add('show');
    }, 100);

    setTimeout(() => {
      toastMessage.classList.remove('show');
      toastMessage.addEventListener('transitionend', () => {
        toastMessage.remove();
      }, {once: true});
    }, duration);
  }

  const toastMessageID = document.getElementById('js-toast-message');
  if (toastMessageID) {
    toastMessageID.style.display = 'block';
    showToast(toastMessageID.textContent);
    toastMessageID.style.display = 'none';
  }

  // --------------------------------------------------
  // inputの処理
  // --------------------------------------------------

  const formGroups = document.querySelectorAll('div.js-formGroup');
  if (formGroups.length > 0) {
    formGroups.forEach(formGroup => {
      const label = formGroup.querySelector('label');
      const input = formGroup.querySelector('input');
      input.addEventListener('focus', function() {
        label.classList.add('focus');
      })
      input.addEventListener('blur', function() {
        if (input.value === "") {
          label.classList.remove('focus');
        }
      })
    });
  }
})
