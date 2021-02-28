# sistema-contable

El sistema permite:

Creación de usuarios con diversos perfiles, donde cada usuario podrá ejecutar los procesos a los que está autorizado su propio perfil. Existe el perfil de Administrador, quién es el unico que puede habilitar un nuevo usuario y asignarle su perfil de ejecución
Audotoria sobre los ABM que se lleven a cado con las tablas creadas, donde solor el Administrador puede tener acceso a dicha información
Como salida el sistema permite impresión de la auditoria
Creación de empresas con base de datos propias (multiempresa)
Generar copias de seguridad o backup de una empresa completa asi como la restauración de la misma
Generar los asientos desde el modulo de facturación hacia el módulo de contabilidad
Registrar los asientos
Obtener balance de un mes determinado (ej. Marzo)
Cargar de manera exacta el Plan de Cuentas
ABM Stock, ABM Clientes
Facturación: Emitir comprobantes (tipo A/ tipo B)
Listados: Listar Asientos, Balance, Libro Diario, Mayores, Plan de Cuentas
Datos importantes:

Asegurarse de importar todas las bases de datos:
sistemas_3.sql
contable.sql
claves.sql
clientes.sql
stock.sql
tipos_comprobantes.sql
tipos_responsable.sql
tipos_tasas.sql
argentina.sql

Al importar la base de datos argentina.sql, existirá a modo de ejemplo la empresa llamada 'Argentina' (luego podrá crear la cantidad de empresa que desee) Para acceder a la misma como Administrador loguearse como:

Usuario= soporte
Contraseña= 333


