const startDateElement = document.getElementById("start");
const endDateElement = document.getElementById("end");

function clearDateInput() {
    document.querySelectorAll("input[type='date']").forEach((input) => {
        input.value = "";
    });
}

document.querySelectorAll("input[name='filter_period']").forEach((input) => {
    input.addEventListener("change", clearDateInput);
});

startDateElement.addEventListener("change", (e) => {
    console.log(e.currentTarget.value);
    let endDate = new Date(e.currentTarget.value);

    let filterPeriodValue = document.querySelector(
        'input[name="filter_period"]:checked'
    ).value;
    if (filterPeriodValue == "weekly") {
        endDate.setDate(endDate.getDate() + 7);
    } else if (filterPeriodValue == "monthly") {
        endDate.setDate(endDate.getDate() + 30);
    } else if (filterPeriodValue == "yearly") {
        endDate.setDate(endDate.getDate() + 365);
    }

    endDateElement.value = endDate.toISOString().slice(0, 10);
});
