import './bootstrap';

window.livewire.onError(statusCode => {
  if (statusCode === 419) {
    window.location.reload();

    return false;
  }
});
