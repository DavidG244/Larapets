# 🐾 Larapets - API SPA (Single Page Application)

## Instrucciones de Uso

El proyecto 14-apijs ahora es **100% funcional** y se conecta directamente con la base de datos de Larapets a través de una API REST.

### 🚀 Requisitos Previos

1. **Servidor PHP corriendo** en `http://localhost`
2. **Base de datos MySQL** activa con las migraciones ejecutadas
3. **API endpoints** disponibles en `/api`

### 📝 Credenciales de Prueba

- **Email**: `david72ty@gmail.com`
- **Contraseña**: `secret123`

### 🛠️ La Aplicación Incluye:

#### 1. **Autenticación**
- Login con email y contraseña
- Tokens API seguros
- Logout seguro
- Persistencia de sesión en localStorage

#### 2. **Gestión de Mascotas**
- ✅ Ver lista de mascotas
- ✅ Ver detalles de mascota
- ✅ Agregar nueva mascota
- ✅ Editar mascota existente
- ✅ Eliminar mascota

#### 3. **Interfaz Amigable**
- Navegación intuitiva
- Mensajes de confirmación (SweetAlert2)
- Responsive design
- Sin recargar página (SPA)

### 📂 Estructura de Archivos

```
14-apijs/
├── index.html          # Interfaz principal
├── css/
│   └── master.css      # Estilos
├── js/
│   └── app.js          # Lógica principal (COMPLETAMENTE FUNCIONAL)
└── imgs/               # Imágenes (iconos, logos)
```

### 🔌 Endpoints API Disponibles

Todos están protegidos con autenticación de tokens:

```
POST   /api/auth/login          → Login
POST   /api/auth/logout         → Logout
GET    /api/auth/me             → Datos del usuario actual

GET    /api/pets                → Listar mascotas
GET    /api/pets/{id}           → Ver detalles de mascota
POST   /api/pets                → Crear mascota
PUT    /api/pets/{id}           → Actualizar mascota
DELETE /api/pets/{id}           → Eliminar mascota
```

### ⚙️ Cómo Funciona

1. **Al abrir la app**: Verifica si existe token en localStorage
2. **Si no hay token**: Muestra formulario de login
3. **Después del login**: Guarda el token y carga la lista de mascotas
4. **Cada petición**: Incluye el token en header de autorización
5. **Al logout**: Limpia el token y vuelve al login

### 🔒 Seguridad

- Los tokens se almacenan en localStorage
- Se incluyen en cada petición API
- El servidor valida cada token
- Las contraseñas se hashean en la BD

### 🐛 Solución de Problemas

#### "Network error"
- Verifica que el servidor PHP esté corriendo
- Chequea la URL de la API en app.js: `const API_URL = 'http://localhost/Larapets/api'`

#### "Invalid token"
- Intenta hacer logout y login nuevamente
- Limpia localStorage en DevTools (F12) → Applications → localStorage

#### CORS errors
- La API debe estar en el mismo dominio o tener CORS habilitado

### 📚 Stack Tecnológico

**Frontend:**
- HTML5
- CSS3
- Vanilla JavaScript
- Fetch API
- SweetAlert2

**Backend:**
- Laravel 11
- MySQL
- PHP 8.2+
- RESTful API

### 🎉 Ya Está Listo Para Usar

Solo necesitas:

1. Asegurarte que el servidor PHP esté corriendo
2. Abre `14-apijs/index.html` en tu navegador
3. ¡Usa las credenciales de prueba!

---

**Nota**: Si cambias el puerto o dominio del servidor, actualiza la URL en `/14-apijs/js/app.js` línea 2.
