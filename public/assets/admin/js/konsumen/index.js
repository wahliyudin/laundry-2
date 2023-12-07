"use strict"
document.addEventListener("DOMContentLoaded", function (event) {
    var dataTableEl = d.getElementById('datatable');
    if (dataTableEl) {
        const dataTable = new simpleDatatables.DataTable(dataTableEl);
    }
});
