const msg = document.querySelector('[data-removable]'); //jei turim msg kuriame yra poreikis kazka isnaikinti

if (msg) {
  setTimeout(_ => {
    msg.remove();
  }, parseInt(msg.dataset.removeAfter) * 1000);
}