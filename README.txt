Esta aplicación necesita por lo menos PHP 7.1 para funcionar, así como una base de datos MySQL

Los parámetros de conexión a la base de datos se pueden modificar en el fichero conf/db.php

Se incluye el fichero "database.sql" para importar la base de datos, que incluye un usuario ya creado, cuyos datos de login son:
email: admin@admin.org
password: 1234

La idea que he tenido al hacer esta aplicación es hacer un formulario de Login con un CRUD de usuarios manteniendo el código lo más sencillo y modular posible, siguiendo el patrón MVC.