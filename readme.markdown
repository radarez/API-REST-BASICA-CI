# API REST BÁSICA CON Vue.JS 2, CodeIgniter, codeigniter-restserver y MySQL
## Tecnologías utilizadas
* Apache Server
* PHP 7.1.1
* MySQL 5.x.x
* Vue.js 2.x.x y (vue-resource) para conexión a datos
* CodeIgniter 3.x.x

## Front-end con Vue.js 2
Index.html

## Configuración Básica de CodeIgniter
### Config.php
```php
$config['index_page'] = '';
```

### autoload.php
```php
$autoload['libraries'] = array('form_validation','database', 'session');
$autoload['helper'] = array('url', 'html', 'form' ,'language', 'date','security');
$autoload['model'] = array('Todo_model');
```

### .htaccess de en raíz

    <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteBase /
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)$ /Todo/index.php?/$1 [L]
    </IfModule>


### MySQL TABLA
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