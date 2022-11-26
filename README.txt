el proyecto esta en la carpeta llamada "konecta_cafeteria"
la carpeta llamada "script_sql" contiene el script sql de la base de datos mysql, tambien puede crear la base de datos por migraciones
la base de datos se llama "konecta_cafeteria"; si la hace por migrate, laravel la creara automaticamente.
los iconos son de "https://fontawesome.com/" si no tiene internet no aparecen 

IMPORTANTE: la ruta de la app es "/konecta_cafeteria/public/"

versiones donde se relizo la prueba:
PHP: 8.0.19
MySql: 10.4.24-MariaDB
Laravel: 9.41.0


consulta requeridas

Realizar una consulta que permita conocer cuál es el producto que más stock tiene : 

SELECT productos.nombre_producto,productos.stock 
FROM productos 
order By productos.stock desc LIMIT 1;

 Realizar una consulta que permita conocer cuál es el producto más vendido:

SELECT sub_query.total_ventas, productos.nombre_producto 
FROM productos inner join ((SELECT SUM(ventas.cantidad) as total_ventas, ventas.id_producto 
                            FROM ventas 
                            GROUP BY ventas.id_producto) AS sub_query
                            ) on (productos.id=sub_query.id_producto) 
ORDER by sub_query.total_ventas desc 
LIMIT 1;
