# suplosBackEnd
_Prueba suplos desarrollador backend_

### Paquetes Terceros

- phpspreadsheet
- phpdotenv
- phpunit

### Pre-requisitos

- Php 7.3.0 con phpCli habilitado para la ejecución de comando.
- Postgresql > 9.6
- Composer
- Extensión pdo_pgsql habilitada.
- Node & npm

### Instalación

1. Clonar el repositorio en la carperta del servidor web.

```sh
git clone https://github.com/Rohiri/suplos.git
```

2. Instalar paquetes.

```sh
composer install
```
3. Copiar archivo  `.env.example` a  `.env`

```sh
`cp .env.example .env`
```

4. Configure las variables de entorno para base de datos
- `DB_HOST=` Variable de entorno para el host de BD.
- `DB_PORT=` Variable de entorno para el puerto de BD.
- `DB_DATABASE=` Variable de entorno para el nombre de BD.
- `DB_USERNAME=` Variable de entorno para el usuario de BD.
- `DB_PASSWORD=` Variable de entorno para la contraseña de BD.

5. En la raíz del sitio ejecutar.
- `composer install` Instala dependencias de PHP


## Autor

**William Ricardo Torres Curtidor**