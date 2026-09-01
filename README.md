# GRUPPY

Aplicación web desarrollada en PHP que permite a los usuarios registrarse, iniciar sesión y participar en un sistema de foros mediante la creación de publicaciones y comentarios.

El proyecto utiliza una base de datos SQL para gestionar la información de los usuarios, foros y comentarios, y cuenta con una estructura organizada para separar la autenticación, configuración, páginas y recursos públicos.

## Descripción del proyecto

AlgoGrande es una aplicación web orientada a la interacción entre usuarios mediante un sistema de foros.

La aplicación permite:

- Registrar nuevos usuarios.
- Iniciar sesión.
- Cerrar sesión.
- Crear foros.
- Visualizar foros.
- Crear comentarios.
- Visualizar comentarios.
- Gestionar la información mediante una base de datos.

El proyecto fue desarrollado utilizando PHP para la lógica del servidor, HTML y CSS para la interfaz y JavaScript para las interacciones del lado del cliente.

## Funcionalidades

### Registro de usuarios

Los usuarios pueden crear una cuenta proporcionando:

- Nombre completo.
- Correo electrónico.
- Nombre de usuario.
- Contraseña.

El formulario de registro se encuentra en la página principal y envía la información al archivo `auth/register.php`.

### Inicio de sesión

Los usuarios registrados pueden acceder a la aplicación mediante su:

- Nombre de usuario.
- Contraseña.

La información es procesada por `auth/login.php`.

### Cierre de sesión

La aplicación incluye una funcionalidad para cerrar la sesión del usuario mediante:

```text
auth/logout.php
```

### Sistema de foros

Los usuarios pueden acceder a una sección de foros donde pueden consultar las publicaciones existentes y crear nuevos foros.

Las funcionalidades relacionadas con los foros se encuentran principalmente en:

```text
auth/crear_foro.php
auth/mostrar_foros.php
pages/foro.php
```

### Sistema de comentarios

Los usuarios pueden interactuar con las publicaciones mediante comentarios.

Los archivos relacionados con esta funcionalidad incluyen:

```text
auth/crear_comentario.php
auth/mostrar_comentarios.php
```

## Tecnologías utilizadas

| Tecnología | Uso                                                |
| ---------- | -------------------------------------------------- |
| PHP        | Lógica del servidor y procesamiento de formularios |
| HTML       | Estructura de las páginas                          |
| CSS        | Diseño y estilos de la aplicación                  |
| JavaScript | Interacciones del lado del cliente                 |
| SQL        | Estructura y gestión de la base de datos           |
| MySQL      | Sistema de gestión de base de datos                |
| Git        | Control de versiones                               |
| GitHub     | Repositorio y colaboración                         |

## Estructura del proyecto

```text
AlgoGrande/
│
├── auth/
│   ├── crear_comentario.php
│   ├── crear_foro.php
│   ├── login.php
│   ├── logout.php
│   ├── mostrar_comentarios.php
│   ├── mostrar_foros.php
│   └── register.php
│
├── config/
│   └── database.php
│
├── pages/
│   ├── foro.php
│   └── main.php
│
├── public/
│   ├── css/
│   │   └── styles.css
│   │
│   └── js/
│       └── app.js
│
├── sql/
│   └── schema.sql
│
├── index.php
└── README.md
```

## Organización del proyecto

### `auth/`

Contiene los archivos PHP encargados de las operaciones relacionadas con autenticación y funcionalidades del sistema.

Entre ellos se encuentran:

- `login.php`: procesamiento del inicio de sesión.
- `register.php`: registro de nuevos usuarios.
- `logout.php`: cierre de sesión.
- `crear_foro.php`: creación de publicaciones en el foro.
- `mostrar_foros.php`: consulta de los foros disponibles.
- `crear_comentario.php`: creación de comentarios.
- `mostrar_comentarios.php`: consulta de comentarios.

### `config/`

Contiene la configuración utilizada para establecer la conexión con la base de datos.

```text
config/database.php
```

### `pages/`

Contiene las páginas principales de la aplicación.

```text
pages/
├── foro.php
└── main.php
```

### `public/`

Contiene los recursos utilizados por la interfaz.

```text
public/
├── css/
└── js/
```

El directorio `css` contiene los estilos de la aplicación y `js` contiene el código JavaScript utilizado para las interacciones del cliente.

### `sql/`

Contiene la estructura de la base de datos.

```text
sql/schema.sql
```

Este archivo permite crear la estructura necesaria para ejecutar la aplicación con una base de datos SQL.

## Página principal

El archivo `index.php` funciona como punto de entrada de la aplicación.

Actualmente contiene los formularios de:

- Inicio de sesión.
- Registro de usuarios.

El formulario de inicio de sesión utiliza:

```text
auth/login.php
```

mientras que el formulario de registro utiliza:

```text
auth/register.php
```

También se encuentra conectado con los recursos CSS y JavaScript de la aplicación.

## Requisitos

Para ejecutar el proyecto localmente se necesita:

- PHP 8 o superior.
- MySQL.
- Apache o un servidor web compatible con PHP.
- XAMPP, WAMP u otra alternativa equivalente.
- Navegador web.
- Git.

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/anthonnysorianofranco-dot/AlgoGrande.git
```

Entrar en el directorio:

```bash
cd AlgoGrande
```

### 2. Configurar el servidor local

Si utilizas XAMPP, coloca el proyecto dentro del directorio:

```text
C:\xampp\htdocs\AlgoGrande
```

Después inicia:

- Apache
- MySQL

desde el panel de control de XAMPP.

### 3. Crear la base de datos

Abre phpMyAdmin o el cliente SQL que utilices.

Crea la base de datos correspondiente al proyecto y ejecuta el contenido del archivo:

```text
sql/schema.sql
```

Este archivo contiene la estructura necesaria para la base de datos.

### 4. Configurar la conexión

Revisa el archivo:

```text
config/database.php
```

y configura los datos de conexión de acuerdo con tu entorno local.

Los parámetros normalmente incluyen:

```text
Servidor
Usuario
Contraseña
Base de datos
```

### 5. Ejecutar la aplicación

Con Apache y MySQL funcionando, abre en el navegador:

```text
http://localhost/AlgoGrande/
```

La aplicación cargará la página principal con las opciones de inicio de sesión y registro.

## Flujo general de la aplicación

El funcionamiento general del sistema puede resumirse de la siguiente manera:

```text
Usuario
   |
   v
Página principal
   |
   +------------------+
   |                  |
   v                  v
Registro          Inicio de sesión
   |                  |
   v                  v
Base de datos     Validación
                      |
                      v
                 Usuario autenticado
                      |
                      v
                    Foro
                      |
              +-------+-------+
              |               |
              v               v
        Crear foro       Ver foros
                              |
                              v
                         Comentarios
```

## Base de datos

La aplicación utiliza una base de datos SQL para almacenar la información necesaria para el funcionamiento del sistema.

La estructura de la base de datos se encuentra en:

```text
sql/schema.sql
```

La configuración de la conexión se encuentra separada en:

```text
config/database.php
```

Esta separación permite mantener la configuración de acceso a la base de datos independiente de las páginas y funcionalidades de la aplicación.

## Seguridad

El proyecto implementa un sistema básico de autenticación mediante:

- Registro de usuarios.
- Inicio de sesión.
- Contraseñas.
- Sesiones.
- Cierre de sesión.

Para una versión de producción sería recomendable reforzar la seguridad mediante:

- Hashing seguro de contraseñas utilizando `password_hash()`.
- Verificación mediante `password_verify()`.
- Consultas preparadas para evitar SQL Injection.
- Validación y sanitización de entradas.
- Protección contra Cross-Site Scripting (XSS).
- Protección CSRF para formularios.
- Manejo seguro de sesiones.
- Variables de entorno para las credenciales de la base de datos.

## Posibles mejoras

Entre las mejoras que podrían implementarse en futuras versiones se encuentran:

- Mejorar el diseño responsive.
- Añadir perfiles de usuario.
- Permitir editar y eliminar publicaciones.
- Permitir editar y eliminar comentarios.
- Añadir categorías para los foros.
- Implementar búsqueda de publicaciones.
- Añadir paginación.
- Mejorar el sistema de autenticación.
- Implementar recuperación de contraseña.
- Añadir validaciones más completas en formularios.
- Mejorar la seguridad de las consultas SQL.
- Separar aún más la lógica de negocio de las vistas.
- Implementar un sistema de roles y permisos.
- Añadir pruebas automatizadas.
- Implementar despliegue mediante un servidor web.

## Aprendizajes

El desarrollo de este proyecto permite practicar diferentes conceptos de desarrollo web, entre ellos:

- Desarrollo backend con PHP.
- Desarrollo frontend con HTML y CSS.
- JavaScript del lado del cliente.
- Manejo de formularios.
- Autenticación de usuarios.
- Manejo de sesiones.
- Conexión entre PHP y MySQL.
- Consultas SQL.
- Organización de proyectos web.
- Control de versiones con Git y GitHub.

## Autor

**Anthonny Soriano**

GitHub:

https://github.com/anthonnysorianofranco-dot

## Licencia

Este proyecto fue desarrollado con fines educativos.
