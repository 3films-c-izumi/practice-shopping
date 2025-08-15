import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
  const toast = document.getElementById('js-toast');
  function showToast(message, duration = 3000) {
    const toastMessage = document.createElement('div');
    toastMessage.classList.add('c-toast__message');
    toastMessage.textContent = message;
    toast.appendChild(toastMessage);

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
})
