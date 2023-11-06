<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia turistica</title>
</head>
<body>
    <h1>Guia turistica</h1>

    <?php
    //Cargamos el array
    $paises_europeos = array(
        "España",
        "Francia",
        "Italia",
        "Alemania",
        "Reino Unido",
        "Portugal",
        "Holanda",
        "Bélgica",
        "Suiza",
        "Austria",
        "Suecia",
        "Noruega",
        "Dinamarca"
    );
    
    //Función para escoger el país:
    function generarSelectPaises($paises_europeos){
        //Se crea el select con los paises del array
        echo "<select name='pais' id='pais'>";
        foreach ($paises_europeos as $pais) {
            echo "<option value='" . $pais . "'>" . $pais . "</option>";
        }
        echo "</select>";
    }
    /*
    <%-- Codigo JSP --%>
    No hay funciones en JSP, pero se puede hacer de la siguiente manera:
    <%
    String[] paises_europeos = {
        "España", "Francia", "Italia", "Alemania", "Reino Unido",
        "Portugal", "Holanda", "Bélgica", "Suiza", "Austria",
        "Suecia", "Noruega", "Dinamarca"
    };
    %>

    <select name="pais" id="pais">
    <c:forEach items="${paises_europeos}" var="pais">
        <option value="${pais}">${pais}</option>
    </c:forEach>
    </select>
    */

    /*
        --Función en lenguaje ASP--
    <%
    Dim paises_europeos
    paises_europeos = Array( _
        "España", "Francia", "Italia", "Alemania", "Reino Unido", _
        "Portugal", "Holanda", "Bélgica", "Suiza", "Austria", _
        "Suecia", "Noruega", "Dinamarca" _
    )
    %>

    <select name="pais" id="pais">
    <% For Each pais In paises_europeos %>
        <option value="<%=pais%>"><%=pais%></option>
    <% Next %>
    </select>
    */

    //Función para comprobar si el nombre es correcto:
    function nombreValido($nombre){
        //Se comprueba que el nombre empiece por mayuscula y que tenga entre 2 y 20 caracteres
        //devuelve true si es correcto, false si no lo es.
        return preg_match("/^[A-ZÁÉÍÓÚ][a-záéíóú]{2,20}$/" , $nombre);
    }
    
    /* --Codigo JSP--
    String nombre = request.getParameter("nombre");
    String patron = "^[A-ZÁÉÍÓÚ][a-záéíóú]{2,20}$";
    boolean nombreValido = nombre.matches(patron);
    */

    /* --Función ASP--
    <%
        Function nombreValido(nombre)
        nombreValido = False
        Set regEx = New RegExp
        regEx.Global = True
        regEx.IgnoreCase = True
        regEx.Pattern = "^[A-ZÁÉÍÓÚ][a-záéíóú]{2,20}$"
        If regEx.Test(nombre) Then
        nombreValido = True
        End If
    End Function
    %>
    */
    ?>

    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="pais">Escoge un pais:</label>
        <!-- Input de tipo select, que al desplegarse , mostrará una serie de paises
        que se carga desde el array. -->
            <?php
                generarSelectPaises($paises_europeos);
            ?>
        <input type="submit" value="Seleccionar">
    </form>
    <?php
    //Si el metodo de envio es POST, se recoge el pais seleccionado y se redirige a la pagina pais.php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Solo si esta seteado el nombre se sigue con la ejecucion
        if(isset($_POST["nombre"])){
            //Se valida la informacion introducida por el ususario. (funcion strip_tags para evitar inyeccion de codigo).
            $nombre = strip_tags($_POST["nombre"]);
            if(nombreValido($nombre)){
                $pais = $_POST["pais"];
                //Se le pasa el pais seleccionado con el metodo GET, es decir dentro de la URL.
                header("Location: pais.php?pais=" . urlencode($pais) . "&nombre=" . urlencode($nombre));
            } else {
                echo "Nombre no valido";
            }
        }
    }

    ?>
</body>
</html>