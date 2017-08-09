API REST BÁSICA CON Vue.JS 2, CodeIgniter,codeigniter-restserver y MySQL
===========================================================================

PROBADA CON
____________________________________________________________________________
* Apache Server
* PHP 7.1.1
* MySQL 5.x.x
* Vue.js 2.x.x y (vue-resource) para conexión a datos

MySQL TABLA
______________________________________________________________________________
.. code-block:: sql
   :linenos:
    CREATE TABLE `todo` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nombre_usuario` varchar(45) DEFAULT NULL,
      `nombre_tarea` varchar(100) DEFAULT NULL,
      `descripcion_tarea` varchar(200) DEFAULT NULL,
      `creada_en` datetime DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;