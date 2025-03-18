# 🚀 Offers App, tu app de ofertas favorita!  

## 🛠️ Requisitos  

### **Opción 1: Ejecutar con Sail (Recomendado)**
- Docker y Docker Compose instalados ([Guía](https://docs.docker.com/engine/install/))  
- Git  

### **Opción 2: Ejecutar Manualmente**
- PHP 8.1+  
- Composer  
- Node.js y NPM  
- MySQL
- Opcional pero muy util un Servidor Local como Wamp o Laragon, para ahorrarse instalaciones.  

---

## 🚀 Instalación y Ejecución  

### **🔹 Opción 1: Usando Sail (Docker)**
1. Clona el repositorio:  
   git clone https://github.com/usuario/proyecto.git
   cd proyecto
2. Instalar las dependencias de Composer:
    Corriendo el siguiente comando:
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
2.1. Agregar un Alias a Sail (Opcional):
    alias sail='bash vendor/bin/sail'

3. Copiar el archivo de entorno y generar la clave de aplicación:
   cp .env.example .env
    ./vendor/bin/sail artisan key:generate o sail artisan key:generate
4. Levantar los contenedores con Sail: 
   ./vendor/bin/sail up -d o sail up -d o (-d para levantar en segundo plano).
5. Ejecutar las migraciones y seeders:  
   ./vendor/bin/sail artisan migrate --seed o sail artisan migrate --seed
6. (Opcional) Compilar los assets si hay cambios en el frontend:
    ./vendor/bin/sail npm install o sail npm install
    ./vendor/bin/sail npm run build o sail npm run build
7. Acceder a la aplicación en http://localhost.

### **🔹 Opción 2: Ejecucion Manual (Sin Docker)**
1. Clona el repositorio:  
   git clone https://github.com/usuario/proyecto.git
   cd proyecto
2. Instalar las dependencias de Composer:
    Corriendo el siguiente comando:
    composer install

3. Copiar el archivo de entorno y generar la clave de aplicación:
   cp .env.example .env
    php artisan key:generate
4. Configurar la base de datos en el archivo env
5. Ejecutar las migraciones y seeders:
    php artisan migrate --seed
6. Iniciar el servidor local de Laravel:
    php artisan serve
7. (Opcional) Compilar los assets si hay cambios en el frontend:
    npm install
    npm run build
8. Acceder a la aplicación en http://localhost:8000.