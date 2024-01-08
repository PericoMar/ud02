<!DOCTYPE html>
<html>
<head>
  <title>Resultado</title>
</head>
<body>
  <?php
  // Verificar si se envió la fecha de nacimiento
  if (isset($_POST['date'])) {
      // Obtener la fecha de nacimiento del formulario
      $fecha_nacimiento = $_POST['date'];
      
      // date('Y-m-d') crea la fecha de hoy.
      $fecha_actual = date('Y-m-d');
      // Date create crea objetos tipo Fecha y date diff devuelve un DateInterval que tiene como atributo $y
      // que son los años de ese Intervalo de fecha.
      $diff = date_diff(date_create($fecha_nacimiento), date_create($fecha_actual));
      $edad = $diff->y;
      
      // Mostrar la edad calculada
      echo "<p>Tu edad es: $edad años</p>";
  } else {
      echo "<p>No se proporcionó la fecha de nacimiento.</p>";
  }
  ?>
</body>
</html>
