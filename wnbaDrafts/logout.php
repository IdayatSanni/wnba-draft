<?php

  include('templates/functions.php');
  session_destroy();
  header('Location: login.php');