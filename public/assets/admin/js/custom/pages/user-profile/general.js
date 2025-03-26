"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const tambahButtons = document.querySelectorAll("[data-kt-tambah-btn]");

    tambahButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();

            button.setAttribute("data-kt-indicator", "on");
            button.disabled = true;

            const indicatorLabel = button.querySelector(".indicator-label");
            const telahDitambahIcon = button.querySelector(".telahDitambah");
            const tambahIcon = button.querySelector(".tambah");

            setTimeout(() => {
                button.removeAttribute("data-kt-indicator");
                button.disabled = false;

                if (button.classList.contains("btn-light-primary")) {
                    button.classList.remove("btn-light-primary");
                    button.classList.add("btn-light");
                    tambahIcon.classList.remove("d-none");
                    telahDitambahIcon.classList.add("d-none");
                    indicatorLabel.innerHTML = "Tambah";
                } else {
                    button.classList.add("btn-light-primary");
                    button.classList.remove("btn-light");
                    tambahIcon.classList.add("d-none");
                    telahDitambahIcon.classList.remove("d-none");
                    indicatorLabel.innerHTML = "Telah ditambahkan";
                }
            }, 1500);
        });
    });
});
