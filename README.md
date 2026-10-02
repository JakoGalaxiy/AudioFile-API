# API y Web Spotify

Sistema completo del proyecto Spotify (API + Frontend) desarrollado con Laravel, PostgreSQL, Redis, MongoDB, Docker y Laravel Sanctum.

Esta aplicación permite:

* Registrar usuarios desde la interfaz web o Postman.
* Iniciar sesión de forma segura con persistencia de token en el navegador (`localStorage`).
* Consumir la API desde la aplicación web en un entorno integrado.

---

## 1. Requisitos

* Git
* Docker Desktop
* PHP y Composer
* Postman (opcional)

Comprobar Git:

```powershell
git --version
```

Comprobar Docker:

```powershell
docker --version
```

Comprobar PHP:

```powershell
php --version
```

---

## 2. Clonar y preparar el proyecto

Clonar el repositorio:

```powershell
git clone URL_DEL_REPOSITORIO
```

Entrar a la carpeta raíz del proyecto:

```powershell
cd nombre-del-proyecto
```

Cambiar a la rama correspondiente:

```powershell
git checkout feature/auth-api
```

---

## 3. Levantar el Backend (API en Docker)

### A. Crear el archivo `.env` del Backend

Copiar el archivo de ejemplo en la raíz:

```powershell
Copy-Item .env.example .env
```

### B. Levantar los contenedores

```powershell
docker compose up -d
```

Comprobar el estado de los contenedores:

```powershell
docker compose ps
```

La API estará disponible en:

`http://localhost:8000`

### C. Configurar Laravel en el contenedor

Generar la llave de la aplicación:

```powershell
docker compose exec app php artisan key:generate
```

Ejecutar las migraciones de la base de datos:

```powershell
docker compose exec app php artisan migrate
```

Limpiar la configuración y caché del backend:

```powershell
docker compose exec app php artisan optimize:clear
```

---

## 4. Levantar el Frontend (Aplicación Web)

Entrar a la carpeta de la interfaz web:

```powershell
cd web
```

Instalar las dependencias de Composer:

```powershell
composer install
```

Configurar la URL de la API en el archivo `.env`:

```env
API_URL=http://localhost:8000/api
```

Limpiar la configuración y levantar el servidor web en el puerto `8001`:

```powershell
php artisan config:clear
php artisan serve --port=8001
```

La interfaz web estará disponible en:

`http://127.0.0.1:8001/login`

o

`http://127.0.0.1:8001/register`

---

## 5. Resumen rápido de comandos

### Backend

```powershell
git checkout feature/auth-api
Copy-Item .env.example .env
docker compose up -d
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
docker compose exec app php artisan optimize:clear
```

### Frontend

```powershell
cd web
composer install
php artisan config:clear
php artisan serve --port=8001
```
