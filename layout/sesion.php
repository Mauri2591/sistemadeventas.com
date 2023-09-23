<?php
session_start();
if (isset($_SESSION['sesion_email']) || isset($_SESSION['nombres'])) {
  $email_sesion = $_SESSION['sesion_email'];
  $nombre_sesion = $_SESSION['nombres'];
} else {
  echo "No hay sesión";
  header("Location:" . $URL . "/login");
}