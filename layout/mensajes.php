<?php
if (isset($_SESSION['mensaje'])) {
  
  ?>
  
    <script>
      Swal.fire({
        position: 'top-end',
        icon: '<?php echo $_SESSION['icono'] ?>',
        title: '<?php echo  $_SESSION['mensaje'];?>',
        showConfirmButton: false,
        timer: 1200
      });
    </script>
  
  <?php 
  unset($_SESSION['mensaje']);
  unset($_SESSION['icono']);
  }