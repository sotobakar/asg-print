const hideSelect = (event) => {
    if (event.target.checked) {
        selectList = document
            .querySelectorAll("input[type='text']")
            .forEach((input) => {
                input.parentNode.parentNode.classList.remove("hidden");
            });
        if (event.target.value == "monthly") {
            // add "hidden" on week select
            selectList = document.querySelectorAll("input[name$='_week']");
            selectList.forEach((input) => {
                if (!input.parentNode.parentNode.classList.contains("hidden")) {
                    input.parentNode.parentNode.classList.add("hidden");
                }
            });
        } else if (event.target.value == "yearly") {
            // add "hidden" on week and month select
            selectList = document.querySelectorAll(
                "input[name$='_week'], input[name$='_month']"
            );
            selectList.forEach((input) => {
                if (!input.parentNode.parentNode.classList.contains("hidden")) {
                    input.parentNode.parentNode.classList.add("hidden");
                }
            });
        }
    }
};

document.querySelectorAll("input[name='filter_period']").forEach((input) => {
    input.addEventListener("change", hideSelect);
});
