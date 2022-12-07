<?php

?>

<!-- REQUIRED SCRIPTS -->






<!-- AdminLTE App -->
<script src="<?php echo $URL; ?>app/template/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="<?php echo $URL; ?>app/template/plugins/jquery/jquery.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/fontawesome-free/js/all.min.js">
</script>
<!-- Bootstrap -->
<script
    src="<?php echo $URL; ?>app/template/plugins/bootstrap/js/bootstrap.bundle.min.js">
</script>
<!-- overlayScrollbars -->
<script
    src="<?php echo $URL; ?>app/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?php echo $URL; ?>app/template/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script
    src="<?php echo $URL; ?>app/template/plugins/jquery-mousewheel/jquery.mousewheel.js">
</script>
<script src="<?php echo $URL; ?>app/template/plugins/raphael/raphael.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/jquery-mapael/jquery.mapael.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/jquery-mapael/maps/usa_states.min.js">
</script>
<!-- ChartJS -->
<script src="<?php echo $URL; ?>app/template/plugins/chart.js/Chart.min.js">
</script>

<!-- AdminLTE for demo purposes 
<script src="<?php echo $URL; ?>app/template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo $URL; ?>app/template/dist/js/pages/dashboard2.js">
</script> -->
<!-- DataTables  & Plugins -->
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables/jquery.dataTables.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-buttons/js/dataTables.buttons.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
</script>
<script src="<?php echo $URL; ?>app/template/plugins/jszip/jszip.min.js">
</script>
<script src="<?php echo $URL; ?>app/template/plugins/pdfmake/pdfmake.min.js">
</script>
<script src="<?php echo $URL; ?>app/template/plugins/pdfmake/vfs_fonts.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-buttons/js/buttons.html5.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-buttons/js/buttons.print.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/datatables-buttons/js/buttons.colVis.min.js">
</script>
<!-- Select2 -->
<script
    src="<?php echo $URL; ?>app/template/plugins/select2/js/select2.full.min.js">
</script>
<!-- Bootstrap4 Duallistbox -->
<script
    src="<?php echo $URL; ?>app/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js">
</script>
<!-- InputMask -->
<script src="<?php echo $URL; ?>app/template/plugins/moment/moment.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/plugins/inputmask/jquery.inputmask.min.js">
</script>
<!-- date-range-picker -->
<script
    src="<?php echo $URL; ?>app/template/plugins/daterangepicker/daterangepicker.js">
</script>
<!-- bootstrap color picker -->
<script
    src="<?php echo $URL; ?>app/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
</script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="<?php echo $URL; ?>app/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script
    src="<?php echo $URL; ?>app/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js">
</script>
<!-- BS-Stepper -->
<script
    src="<?php echo $URL; ?>app/template/plugins/bs-stepper/js/bs-stepper.min.js">
</script>
<!-- dropzonejs -->
<script
    src="<?php echo $URL; ?>app/template/plugins/dropzone/min/dropzone.min.js">
</script>

<script
    src="<?php echo $URL; ?>app/template/sweetalert2/dist/sweetalert2.min.js">
</script>
<script
    src="<?php echo $URL; ?>app/template/sweetalert2/dist/sweetalert2.all.min.js">
</script>


<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo(
        '#example1_wrapper .col-md-6:eq(0)');
    /* $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    }); */
});
</script>

<script>
function deshabilitaRetroceso() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function() {
        window.location.hash = "no-back-button";
    }
}
</script>

<script>
function archivo(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                // Insertamos la imagen
                document.getElementById("list").innerHTML = [
                    '<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}

document.getElementById('file').addEventListener('change', archivo, false);
</script>

<script>
function archivo(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                // Insertamos la imagen
                document.getElementById("list1").innerHTML = [
                    '<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}

document.getElementById('file1').addEventListener('change', archivo, false);
</script>

<script>
function archivo(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                // Insertamos la imagen
                document.getElementById("list2").innerHTML = [
                    '<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}

document.getElementById('file2').addEventListener('change', archivo, false);
</script>
