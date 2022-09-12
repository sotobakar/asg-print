const isSelected = ({ target }) => {
  if(target.checked) {
    const sizeButtons = document.querySelectorAll(`input[name="sku[]"]`);
    const allSiblings= [...sizeButtons].filter( element => element != target);

    allSiblings.forEach((element) => {
      element.parentElement.classList.remove("ring-2", "ring-offset-2", "ring-gray-900");
    });

    target.parentElement.classList.add("ring-2", "ring-offset-2", "ring-gray-900");
  }
}

const sizeButtons = document.querySelectorAll(`input[name="sku[]"]`);

sizeButtons.forEach((input) => {
  input.addEventListener('change', isSelected);
});