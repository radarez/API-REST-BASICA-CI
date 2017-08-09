
<h3>MySQL TABLA</h3>
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