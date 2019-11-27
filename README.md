# Practica04-Mi-Correo-Electr-nico Resolución de problemas sobre PHP y MySQL 

Entender y organizar de una mejor manera los sitios de web en Internet
Diseñar adecuadamente elementos gráficos en sitios web en Internet.
Crear sitios web aplicando estándares actuales. | | ACTIVIDADES DESARROLLADAS | | 1. Se creo un repositorio en GitHub con el nombre "Practica01 – Mi Blog". Usuario: dguzmanc4 URL: https://github.com/dguzmanc4/Practica04-Mi-Correo-Electr-nico | | 2. Se creo el diagrama Entidad-Relación para la resolución de la práctica. 
| | 3. Sentencias SQL de la estructura de la base de datos. Nombre de la base de datos: practica4

![image](https://user-images.githubusercontent.com/52541505/69538170-b44d0180-0f4f-11ea-8872-9ed79d8e9914.png)

-- Estructura de tabla para la tabla invitacion
--
CREATE TABLE invitacion (
invi **\_** codigo int(11) NOT NULL,
usu **\_** codigo int(11) NOT NULL,
reu **\_** codigo int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla reunion
--
CREATE TABLE reunion (
reu **\_** codigo int(11) NOT NULL,
reu **\_** remitente varchar(50) NOT NULL,
reu **\_** fecha date NOT NULL,
reu **\_** hora time NOT NULL,
reu **\_** lugar varchar(50) NOT NULL,
reu **\_** motivo varchar(100) NOT NULL,
reu **\_** observaciones varchar(100) NOT NULL,
reu **\_** longitud decimal(7,4) NOT NULL,
reu **\_** latitud decimal(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla usuario
--
CREATE TABLE usuario (
usu **\_** codigo int(11) NOT NULL,
usu **\_** rol varchar(5) NOT NULL,
usu **\_** cedula varchar(10) NOT NULL,
usu **\_** nombres varchar(50) NOT NULL,
usu **\_** apellidos varchar(50) NOT NULL,
usu **\_** direccion varchar(75) NOT NULL,
usu **\_** telefono varchar(10) NOT NULL,
usu **\_** correo varchar(50) NOT NULL,
usu **\_** password varchar(255) NOT NULL,
usu **\_** fecha **\_** nacimiento date NOT NULL,
usu **\_** eliminado varchar(1) NOT NULL,
usu **\_** fecha **\_** creacion timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
usu **\_** fecha **\_** modificacion timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Filtros para la tabla invitacion
--
ALTER TABLE invitacion
ADD CONSTRAINT Invitados **\_** Reunion FOREIGN KEY (reu **\_** codigo) REFERENCES reunion (reu **\_** codigo),
ADD CONSTRAINT Invitados **\_** Usuario FOREIGN KEY (usu **\_** codigo) REFERENCES usuario (usu **\_** codigo);
COMMIT; | | 3. Se crean los archivos y la estructura base que tendrá nuestros ejercicios. 
| | 4. Se crean interfaces .php que permiten crear usuario y ingresar a la cuenta. Inicio de sesión 

Crear Cuenta 

| | 5.Se realizan los requisitos ordenados por el tipo de rol.** Usuario con rol de user: **** 1.Visualizar en su página principal (index.php) el listado de todas las reuniones agendadas, ordenados por las más recientes.** 

![image](https://user-images.githubusercontent.com/52541505/69538356-186fc580-0f50-11ea-8418-f3869d3a3d7d.png)
![image](https://user-images.githubusercontent.com/52541505/69538359-1b6ab600-0f50-11ea-93b3-71b61c91cfee.png)
![image](https://user-images.githubusercontent.com/52541505/69538360-1efe3d00-0f50-11ea-99dc-04304a7f2c6c.png)
![image](https://user-images.githubusercontent.com/52541505/69538366-2291c400-0f50-11ea-90bc-2311a3f106c3.png)


2. Crear reuniones e invitar a otros usuarios de la aplicación web. 

![image](https://user-images.githubusercontent.com/52541505/69538411-40f7bf80-0f50-11ea-9265-15ed9b0012c8.png)
![image](https://user-images.githubusercontent.com/52541505/69538417-435a1980-0f50-11ea-8a06-6322333ca889.png)

3. Buscar en las reuniones agendadas. La búsqueda se realizará por el motivo de la reunión y se deberá aplicar Ajax para la búsqueda. 


![image](https://user-images.githubusercontent.com/52541505/69538462-5f5dbb00-0f50-11ea-8bc9-381e368e95d6.png)
![image](https://user-images.githubusercontent.com/52541505/69538471-6389d880-0f50-11ea-8327-8a1ea8b600c2.png)
![image](https://user-images.githubusercontent.com/52541505/69538475-671d5f80-0f50-11ea-9357-726aec010ca1.png)
![image](https://user-images.githubusercontent.com/52541505/69538480-6a185000-0f50-11ea-9986-b6632931a5ff.png)


4. Modificar los datos del usuario. 


![image](https://user-images.githubusercontent.com/52541505/69538503-76041200-0f50-11ea-98de-5a115d707d80.png)
![image](https://user-images.githubusercontent.com/52541505/69538510-79979900-0f50-11ea-8446-ab3736acb6d8.png)
![image](https://user-images.githubusercontent.com/52541505/69538512-7bf9f300-0f50-11ea-932d-60402137dd97.png)
 

5. Cambiar la contraseña del usuario. 

![image](https://user-images.githubusercontent.com/52541505/69538523-874d1e80-0f50-11ea-8d9b-ea7f444f376b.png)
![image](https://user-images.githubusercontent.com/52541505/69538526-8916e200-0f50-11ea-92e8-b52aa479429c.png)
![image](https://user-images.githubusercontent.com/52541505/69538530-8b793c00-0f50-11ea-952d-b568e693e173.png)



Usuario con rol de admin: 1.No puede recibir ni invitar a reuniones. 

En el rol admin, no se pueden crear reuniones ya que no cuenta con ningún apartado, así también este no podrá formar parte de alguna reunión creada por un usuario.2.Visualizar en su página principal (index.php) el listado de todas las reuniones existentes, ordenados por los más recientes. 

![image](https://user-images.githubusercontent.com/52541505/69538569-9c29b200-0f50-11ea-98db-83637e336d8f.png)
![image](https://user-images.githubusercontent.com/52541505/69538574-9e8c0c00-0f50-11ea-9aa2-d5375d8f44fb.png)
![image](https://user-images.githubusercontent.com/52541505/69538578-a0ee6600-0f50-11ea-8cea-488a0dcd9f3d.png)




3.Eliminar las reuniones de los usuarios con rol "user". 


![image](https://user-images.githubusercontent.com/52541505/69538597-ae0b5500-0f50-11ea-942c-f946a54e3ecb.png)
![image](https://user-images.githubusercontent.com/52541505/69538602-b06daf00-0f50-11ea-8212-b8cc533cc140.png)
![image](https://user-images.githubusercontent.com/52541505/69538606-b2d00900-0f50-11ea-9691-50bc37df9203.png)



4.Eliminar, modificar y cambiar contraseña de los usuarios con rol "user" 

![image](https://user-images.githubusercontent.com/52541505/69538640-c4191580-0f50-11ea-8e43-6f2f48e56ee7.png)

Al realizar una eliminación esta se la realiza de manera lógica, por lo que la cuenta se puede volver a habilitar. 

![image](https://user-images.githubusercontent.com/52541505/69538645-c7140600-0f50-11ea-91b5-4f335ec39d50.png)
![image](https://user-images.githubusercontent.com/52541505/69538690-deeb8a00-0f50-11ea-8931-ed453e22bd8d.png)

Cambiar contraseña 


![image](https://user-images.githubusercontent.com/52541505/69538705-e7dc5b80-0f50-11ea-8019-d4116b3b7222.png)
![image](https://user-images.githubusercontent.com/52541505/69538715-ead74c00-0f50-11ea-893c-a527129eb0bf.png)
![image](https://user-images.githubusercontent.com/52541505/69538722-eca10f80-0f50-11ea-839f-b0a37ac663ed.png)



Modificar Datos 

![image](https://user-images.githubusercontent.com/52541505/69538750-f7f43b00-0f50-11ea-9b8b-19346bb8b864.png)
![image](https://user-images.githubusercontent.com/52541505/69538757-fa569500-0f50-11ea-8dce-623ebcd2bd61.png)
![image](https://user-images.githubusercontent.com/52541505/69538765-fd518580-0f50-11ea-8e48-6832d1d45491.png)




| | N. | | | | RESULTADO(S) OBTENIDO(S):

Tener el conocimiento suficiente para que el estudiante pueda entender y organizar de una mejor manera los sitios de web y de negocios en Internet. | | CONCLUSIONES :Con los conocimientos adquiridos podemos organizar sitios web basados en el lenguaje de programación PHP para persistir información en una base de datos relacional. | | RECOMENDACIONES : N/A |
Nombre de estudiante** :** Daniel Guzmán
