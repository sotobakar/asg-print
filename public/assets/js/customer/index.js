const userMenuElement = document.getElementById('user_menu');
const userMenuDropdownElement = document.getElementById('user_menu_dropdown');

userMenuElement.addEventListener('click', function (e) {
    e.preventDefault;

    userMenuDropdownElement.classList.toggle('hidden');
})