// DataTables
    "use strict";

    var KTAppEcommerceReportSales = function () {
        return {
            init: function () {
                var tableElement = document.querySelector("#table");
                if (tableElement) {
                    // Inisialisasi DataTables
                    var dataTable = $(tableElement).DataTable({
                        info: false,
                        paging: true,
                        order: [],
                        pageLength: 10,
                        scrollX: true,
                        scrollCollapse: true,
                        fixedColumns: {
                            left: 1,
                            right: 1
                        }
                    });


                    // Column Visibility dinamis
                    var colVisDropdown = document.querySelector('#colVisDropdown');
                    dataTable.columns().every(function (index) {
                        var columnTitle = $(tableElement).find('thead th').eq(index).text().trim();
                        if (columnTitle) {
                            var item = document.createElement('label');
                            item.className = 'dropdown-item d-flex align-items-center';

                            var checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.checked = this.visible();
                            checkbox.style.marginRight = "10px";
                            checkbox.addEventListener('change', function () {
                                var column = dataTable.column(index);
                                column.visible(this.checked);
                            });

                            item.appendChild(checkbox);
                            item.appendChild(document.createTextNode(columnTitle));
                            colVisDropdown.appendChild(item);
                        }
                    });

                    // Search
                    var searchInput = document.querySelector('input[table-search="search"]');
                    if (searchInput) {
                        searchInput.addEventListener("keyup", function () {
                            dataTable.search(this.value).draw();
                        });
                    }

                    // Inisialisasi tombol DataTables
                    new $.fn.dataTable.Buttons(dataTable, {
                        buttons: [
                            { extend: 'copy', className: 'buttons-copy d-none', exportOptions: { columns: ':visible' } },
                            { extend: 'excel', className: 'buttons-excel d-none', exportOptions: { columns: ':visible' } },
                            { extend: 'pdf', className: 'buttons-pdf d-none', exportOptions: { columns: ':visible' } },
                            { extend: 'print', className: 'buttons-print d-none', exportOptions: { columns: ':visible' } }
                        ]
                    });

                    document.getElementById('copyBtn').addEventListener('click', function () {
                        dataTable.button('.buttons-copy').trigger();
                    });

                    document.getElementById('excelBtn').addEventListener('click', function () {
                        dataTable.button('.buttons-excel').trigger();
                    });

                    document.getElementById('pdfBtn').addEventListener('click', function () {
                        dataTable.button('.buttons-pdf').trigger();
                    });

                    document.getElementById('printBtn').addEventListener('click', function () {
                        dataTable.button('.buttons-print').trigger();
                    });
                }
            }
        };
    }();

    KTUtil.onDOMContentLoaded(function () {
        KTAppEcommerceReportSales.init();
    });


// Date Picker 
    new tempusDominus.TempusDominus(document.getElementById("date-event"), {
        localization: {
            locale: "en",
            startOfTheWeek: 1,
            format: "dd/MM/yyyy"
        }
    });

// Text Editor Add
ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_tambah'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });

// Text Editor Edit
    ClassicEditor
    .create(document.querySelector('#kt_docs_ckeditor_edit'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    })


// Alert Confirm
function showActivationAlert() {
    Swal.fire({
        text: "Apakah Anda yakin ingin menyetujui ini?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Ya, Setujui",
        cancelButtonText: "Tidak",
        customClass: {
            confirmButton: "btn fw-bold btn-primary",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then((result) => {
        if (result.value) {
            // Jika konfirmasi "Ya"
            Swal.fire({
                text: "Berhasil disetujui!",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                }
            });
        } else if (result.dismiss === "cancel") {
            // Jika konfirmasi "Tidak"
            Swal.fire({
                text: "Tidak disetujui.",
                icon: "error",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                }
            });
        }
    });
}
