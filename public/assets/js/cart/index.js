const customAddressElement = document.getElementById('custom_address');
const useMyAddressCheckboxElement = document.getElementById('my_address');

useMyAddressCheckboxElement.addEventListener('click', (e) => {
    if (e.target.checked && !customAddressElement.classList.contains("hidden")) {
        customAddressElement.classList.add("hidden");
    } else {
        customAddressElement.classList.remove("hidden");
    }
});