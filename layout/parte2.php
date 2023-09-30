 <!-- Main Footer -->
 <footer class="main-footer">
   <!-- To the right -->
   <div class="float-right d-none d-sm-inline">
     Anything you want
   </div>
   <!-- Default to the left -->
   <strong>Copyright <span id="anio"></span> <a href="https://www.facebook.com/mauuricio.r.gonzalez">MRG</a>.</strong> Todos los derechos reservados.
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 <!-- Bootstrap 4 -->
 <script src="<?php echo $URL;?>/public/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo $URL;?>/public/templates/dist/js/adminlte.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/jszip/jszip.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="<?php echo $URL;?>/public/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


 <script>
   var fecha = new Date;
   document.getElementById("anio").innerText = fecha.getFullYear();
 </script>
 </body>

 </html>