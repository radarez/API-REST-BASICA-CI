![alt CRUD con Vue.js](http://www.radarez.com.mx/blog/vue-js/images/software-a-medida-todo.jpg "CRUD Vue.js")
# API REST BÁSICA CON Vue.JS 2, CodeIgniter, codeigniter-restserver y MySQL
La API es una pequeña lista de tareas y se cumplen las cuatro funciones de un CRUD
Altas, Bajas, Consultas, Modificaciones

Nota: Se pueden hacer muchas modificaciones para mejorar el código, pero esa será tarea de las personas que decidan utilizarla :) ya que el objetivo que persigo es únicamente de facilitar el aprendizaje de Vue.js.

## Tecnologías utilizadas
* Apache Server
* PHP 7.1.1
* MySQL 5.x.x
* Vue.js 2.x.x y (vue-resource) para conexión a datos
* Vue-resource 1.3.4
* CodeIgniter 3.1.5
* jQuery 3.x.x
* Bootstrap 3.x.x
* Sweetalert2 6.x.x


## Front-end con Vue.js 2
/Index.html

## Configuración Básica de CodeIgniter
### config.php
```php
$config['index_page'] = '';
```
### database.php
```php
'hostname' => '127.0.0.1',
'username' => 'todo',
'password' => '123qaz',
'database' => 'todo',
```

### autoload.php
```php
$autoload['libraries'] = array('form_validation','database', 'session');
$autoload['helper'] = array('url', 'html', 'form' ,'language', 'date','security');
$autoload['model'] = array('Todo_model');
```

### Controlador
application/controllers/Todo.php

### Modelo
application/controllers/Todo_model.php

### Rutas en
application/config/routes.php

### Ruta para obtener los datos de la tabla; si obtienes respuesta tu API funciona :), recuerda poner datos en la tabla.
http://localhost/Todo/todo

## MySQL TABLA
```sql
    CREATE TABLE `todo` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nombre_usuario` varchar(45) DEFAULT NULL,
      `nombre_tarea` varchar(100) DEFAULT NULL,
      `descripcion_tarea` varchar(200) DEFAULT NULL,
      `creada_en` datetime DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
```

### .htaccess de en raíz

    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ /Todo/index.php?/$1 [L]
    </IfModule>

##### Adrian Miranda A.
##### Twiitter: [@heyAparicio](https://twitter.com/heyaparicio?lang=es "@heyAparicio")
##### E-mail: ama@radarez.com
##### Web: [www.Radarez.com](http://www.radarez.com "Desarrollo de software a medida")
