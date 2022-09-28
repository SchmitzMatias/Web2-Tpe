# Requisitos TPE

### Publico
    Listado items
    Detalle item
    Listado cagegorias
    Listado items de X categoria

    Nota: En los items tiene que ser visible el nombre de la categoria
        Puedo usar el nombre de categoria como pk? o está mal visto?

### Autenticación para menu administrador
    Login con usuario y clave para acceder a menu administrador
    Logout
    
    Nota: solo los usuarios logueados pueden modificar items/categorias

### Privado / menu administrador
    Lado N
        Listar items
        Agregar items
            Nota: Al agregar se debe poder elegir categoria a la que pertenece usando un select que liste los nombres
        Eliminar items
        Editar items
    
    Lado 1
        Listar categorias
        Agregar categorias
        Eliminar categorias
        Editar categorias

    Opcional: Se puede subir una foto cuando se crea un item o categoria

### Requerimientos Técnicos (no funcionales)
- Todos los HTML deben mostrarse utilizando un motor de plantillas (Smarty o similar)*.
- Todas las acciones realizadas en la página deben estar manejadas utilizando el patrón MVC.
- Las URL deben ser semánticas.
- El sitio debe incluir un archivo sql para instalar la base de datos.
