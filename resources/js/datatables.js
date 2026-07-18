import $ from 'jquery';

window.$ = window.jQuery = $;

// DataTables
import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/dataTables.dataTables.css';

// Responsive
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.css';

// Buttons
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons-dt/css/buttons.dataTables.css';

// Excel/PDF
import JSZip from 'jszip';
window.JSZip = JSZip;

import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

pdfMake.vfs = pdfFonts.vfs;

// Buttons actions
import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';

$(function () {

    if ($('#myTable').length) {

        $('#myTable').DataTable({
            responsive: false,
            autoWidth: false,
            order: [[7, 'desc']],

            dom: 'Bfrtip',

            buttons: [

                {

                    extend: 'excelHtml5',

                    text: '📗 Excel',

                    className: 'btn btn-success'

                },

                {

                    extend: 'pdfHtml5',

                    text: '📕 PDF',

                    className: 'btn btn-danger'

                },

                {

                    extend: 'print',

                    text: '🖨️ Imprimir',

                    className: 'btn btn-secondary'

                }

            ],

            language: {
                lengthMenu: "Mostrar _MENU_ registros",
                zeroRecords: "No se encontró registro",
                info: "Página _PAGE_ de _PAGES_",
                search: "Buscar:",
                paginate: {
                    next: "Siguiente",
                    previous: "Anterior"
                }
            }
        });

    }

});