![alt text](https://suplos.com/wp-content/uploads/2020/08/logo-suplos-intelcost.png)

# SUPLOS
_Prueba suplos desarrollador backend_


### Paquetes Terceros

- phpspreadsheet
- phpdotenv
- twig


### Pre-requisitos

- Php 7.3.0 con phpCli habilitado para la ejecución de comando.
- Postgresql o Mysql
- Composer
- Extensión pdo_pgsql habilitada si se usa postgres.
- Extensión pdo_mysql habilitada si se usa Mysql o MariaDB.

### Instalación

1. Clonar el repositorio en la carperta del servidor web.

```sh
git clone https://github.com/Rohiri/suplos.git
```

2. Instalar dependencias de PHP.

```sh
composer install
```

3. Ingresamos a la raiz del proyecto y copiamos el archivo  `.env.example` a  `.env`

```sh
`cp .env.example .env`
```

4. Configure las variables de entorno para base de datos
- `DB_CONNECTION=` Variable de entorno para el tipo de base de datos (mysql o pgsql)
- `DB_HOST=` Variable de entorno para el host de BD.
- `DB_PORT=` Variable de entorno para el puerto de BD.
- `DB_DATABASE=` Variable de entorno para el nombre de BD.
- `DB_USERNAME=` Variable de entorno para el usuario de BD.
- `DB_PASSWORD=` Variable de entorno para la contraseña de BD.


## Autor

**William Ricardo Torres Curtidor**