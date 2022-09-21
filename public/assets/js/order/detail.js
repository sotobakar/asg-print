console.log("Hello");

const uploadFormButtonElement = document.getElementById('uploadForm');
const closeFormButtonElement = document.getElementById('closeModal');
const modalElement = document.getElementById('modal');

uploadFormButtonElement.addEventListener('click', function (e) {
    e.preventDefault();

    modalElement.classList.remove("hidden");
});

closeFormButtonElement.addEventListener('click', function (e) {
    e.preventDefault();

    modalElement.classList.add("hidden");
});