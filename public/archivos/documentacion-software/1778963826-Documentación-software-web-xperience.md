Documentación del software

Xperience web

Desarrollador: José Miguel Calderón

Fecha: 04-01-2024

Información del Software

Nombre [Xperience]

Tecnologías [Laravel 10, php, mysql, xampp, sql, jquery, javascript, html5, css, bootstrap, font icons, datatables, javascript]

Información del Cliente

Nombre de la Empresa:

[Xperience]

Contacto Principal:

[Juan Valenzuela]

[Título del Contacto]

[Correo Electrónico del Contacto]

[+56990320634]

1. Introducción

El presente informe es la documentación completa de la tienda online (Aplicación web), como solución de la problemática se llega a un acuerdo para el desarrollo del programa para una agencia de viajes que tiene el nombre de Xperience, un software de administración del sitio completo.

En el diseño del software se utilizan las herramientas para el diseño de diagramas caso de uso, diagramas de clases, diagramas de flujo (DFD), modelo de datos (Conceptual y entidad relación), donde describen de forma entendible el funcionamiento del software.

El diagrama de casos de uso describe el **Que hace el software**, teniendo tres actores que interactúan con este mismo, donde su escenario tendrá los casos relacionados con los actores que son los que interactúan con el sistema completo.

Los requerimientos están descritos en base a entrevistas y videoconferencias con la persona definiendo los requerimientos funcionales y no funcionales, describiendo de forma ordenada las tablas.

La descripción de requisitos básicos de las interfaces de usuario, hardware, software y comunicación.

Describir los requisitos funcionales y no funcionales.

Desarrollo del prototipo funcional con capturas de pantallas con evidencia del desarrollo de la codificación, separación de uso de a nivel usuario por parte de un usuario administrador y usuario cliente donde navega la parte principal de la aplicación web.

El diagrama de clases describe las clases del proyecto, con sus variables, funciones correspondientes, donde está la consulta a la base de datos.

La funcionalidad del sistema está descrita con los DFD también conocido como diagrama de flujo, describe el algoritmo del software, con inicio de sesión, Administración de tour, administración de pasajero, administración de ventas para los usuarios administradores, y el carro de compra para usuario clientes.

Los modelos de datos describen la base de datos, con el modelo conceptual y entidad relacionada.

Para el desarrollo del sitio web se utiliza lenguajes de marcación del sitio HTML5 y CSS para brindar diseños al sitio web, lenguajes de programación desde lado del servidor PHP (backend), lenguajes de programación Javascript (Front-end), y librerías para mayor facilidad del diseño Booststrap 5 y jquery.

2. Estructura de archivos del proyecto

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.001.png)

3. Objetivos

El objetivo principal de este proyecto es desarrollar una aplicación web robusta y funcional para una agencia de viajes. La aplicación deberá facilitar la gestión de reservas, información de destinos, interacción con clientes y demás procesos relacionados con la operación de la agencia.

Utilizando metodología de entrevistas, reuniones, soporte,etc para facilidad del desarrollo de software y respectiva documentación del mismo, e integración de diseño de interfaz de usuario acorde a los requerimientos y material aportado.

Brindar el código fuente del sistema, dar un nombre de dominio (dominio.com), administración interna con administrador como usuario, registro de usuarios clientes.

4. Requerimientos.

Los requerimientos, en el contexto del desarrollo de software o la planificación de proyectos, son declaraciones formales que describen las funciones, características o restricciones que un sistema o producto debe cumplir. Estos son esenciales para guiar el diseño, desarrollo, implementación y evaluación de un proyecto. Los requerimientos se dividen generalmente en dos categorías principales: requerimientos funcionales y requerimientos no funcionales.

Los requerimientos son documentos esenciales durante todo el ciclo de vida del proyecto. Sirven como una guía para los equipos de desarrollo, ayudan a establecer expectativas claras entre los interesados y proporcionan una base para la evaluación del éxito del proyecto. Además, los requerimientos evolucionan a medida que el proyecto avanza, adaptándose a cambios en los objetivos, tecnologías o necesidades del usuario. Un proceso de gestión de requerimientos efectivo contribuye significativamente al éxito y la calidad de un proyecto.

En este caso los requerimientos fueron analizados desde la perspectivas de analista de software versus el cliente dueño de la agencia para la implementación y recomendación de tecnologías para el desarrollo de este mismo.

1. Funcionales.

Definición: Son especificaciones detalladas de las funciones y operaciones que el sistema o producto debe realizar.

Ejemplos: Proceso de inicio de sesión, búsqueda avanzada, generación de informes, etc.

Propósito: Describir qué debe hacer el sistema desde la perspectiva del usuario o del negocio.

Importancia: Son cruciales para comprender las capacidades y el comportamiento esperado del sistema.



|Identificación|RF01|
| - | - |
|Nombre|Inicio de sesión y Registro de usuarios.|
|Descripción|<p>El formulario del correo electrónico y la contraseña validará si existen en la base de datos, ingresará el correo como tipo de dato String y la contraseña de igual manera, solo con la diferencia de que el Input es de tipo contraseña.</p><p>Para el registro de usuario tendrá un formulario de registro donde redirecciona a su cuenta.</p>|
|Prioridad|alta|



|Identificación|RF02|
| - | - |
|Nombre|Contador de tours, usuarios, clientes. ventas|
|Descripción|El sistema automáticamente desplegará un contador de datos para tener una análitica simple, con el objetivo de tener mayor información.|
|Prioridad|media|
|Identificación|RF03|
|Nombre|Mostrar gráfico de ventas registradas, con opción de descargar de archivos de distintas extensiones.|
|Descripción|El sistema despliega un gráfico estadístico que muestra la analítica con descarga de reportes de distintas extensiones como pdf, excel ,etc.|
|Prioridad|media|



|Identificación|RF04|
| - | - |
|Nombre|Administración de usuarios registrados.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos del usuario según este lo requiera.|
|Prioridad|alta|



|Identificación|RF05|
| - | - |
|Nombre|Administración de categoría|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de la categoría según este lo requiera.|
|Prioridad|alta|



|Identificación|RF06|
| - | - |
|Nombre|Administración de tours..|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos del tour según este lo requiera.|
|Prioridad|alta|



|Identificación|RF07|
| - | - |
|Nombre|Administración de rutas turísticas.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de las rutas turísticas según este lo requiera.|
|Prioridad|alta|



|Identificación|RF08|
| - | - |
|Nombre|Administración de noticias.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de las noticias según este lo requiera.|
|Prioridad|alta|



|Identificación|RF09|
| - | - |
|Nombre|Administración de cliente|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de los clientes según este lo requiera.|
|Prioridad|alta|



|Identificación|RF10|
| - | - |
|Nombre|Administración de comentario|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de los comentarios según este lo requiera.|
|Prioridad|alta|



|Identificación|RF11|
| - | - |
|Nombre|Administración de tareas.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de tareas de usuarios según este lo requiera.|
|Prioridad|alta|



|Identificación|RF12|
| - | - |
|Nombre|Administración Proveedor.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de proveedores según este lo requiera.|
|Prioridad|alta|



|Identificación|RF13|
| - | - |
|Nombre|Administración de Guías|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de los guías turísticos según este lo requiera.|
|Prioridad|alta|



|Identificación|RF14|
| - | - |
|Nombre|Administración de mensajes.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de mensajería según este lo requiera.|
|Prioridad|alta|



|Identificación|RF15|
| - | - |
|Nombre|Administración de galerías.|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de las galerías según este lo requiera.|
|Prioridad|alta|



|Identificación|RF16|
| - | - |
|Nombre|Administración de Oferta|
|Descripción|El usuario administrador gestiona el agregar, leer, actualizar y eliminar datos de las ofertas según este lo requiera.|
|Prioridad|alta|



|Identificación|RF17|
| - | - |
|Nombre|Configuración del perfil de usuario.|
|Descripción|El usuario podrá configurar su perfil, actualizando datos, subiendo foto de perfil.|
|Prioridad|alta|



|Identificación|RF18|
| - | - |
|Nombre|Cerrar sesión.|
|Descripción|Los usuarios tienen la opción de cerrar la sesión de la cuenta.|
|Prioridad|alta|



|Identificación|RF19|
| - | - |
|Nombre|Enviar notificación de mensaje|
|Descripción|El usuario administrador tiene la opción de enviar notificaciones a los usuarios clientes.|
|Prioridad|alta|



|Identificación|RF20|
| - | - |
|Nombre|Gestión de ventas.|
|Descripción|El usuario vendedor puede realizar la acciones de registrar, leer, actualizar y eliminar la ventas del sistema.|
|Prioridad|alta|



|Identificación|RF21|
| - | - |
|Nombre|Genera boleta de venta|
|Descripción|El usuario vendedor puede generar la boleta de venta del cliente.|
|Prioridad|alta|



|Identificación|RF22|
| - | - |
|Nombre|Realizar reservas|
|Descripción|El usuario cliente al pagar por el tour y validar la cantidad de pasajeros.|
|Prioridad|alta|



|Identificación|RF23|
| - | - |
|Nombre|Descargar Catálogo.|
|Descripción|El usuario cliente puede desde la página oficial descargar el catálogo del los tours.|
|Prioridad|alta|



|Identificación|RF24|
| - | - |
|Nombre|Carro de compras.|
|Descripción|El usuario puede agregar el tour en un carro de compras, calculando el total dependiendo de la cantidad de pasajeros.|
|Prioridad|alta|



|Identificación|RF25|
| - | - |
|Nombre|Proceso de pago en línea.|
|Descripción|El usuario cliente puede comprar el carro de compra pagando en línea, utilizando la plataforma de paypal.|
|Prioridad|alta|



|Identificación|RF26|
| - | - |
|Nombre|Panel de mensaje de administrador.|
|Descripción|El usuario cliente puede visualizar y ser notificados de mensajes por el administrador.|
|Prioridad|baja|

2. No funcionales.

Definición: Son criterios que establecen la calidad y restricciones del sistema, pero no están relacionados directamente con funciones específicas.

Ejemplos: Rendimiento, seguridad, usabilidad, escalabilidad, etc.

Propósito: Describir cómo debe realizarse algo, centrándose en aspectos no directamente ligados a las operaciones funcionales.

Importancia: Son vitales para garantizar que el sistema cumpla con estándares de calidad y restricciones que no están relacionadas con las características visibles para el usuario.

**Seguridad:**

La plataforma debe cumplir con estándares de seguridad, incluyendo el cifrado de datos sensibles y medidas para prevenir accesos no autorizados.

**Diseño Responsivo:**

La aplicación debe ser accesible y tener un diseño responsivo para su uso en dispositivos móviles.

Requerimientos No Funcionales

**Rendimiento:**

La aplicación debe ser eficiente y rápida, incluso con un gran volumen de usuarios y datos.

**Mantenibilidad:**

El código debe ser limpio y documentado para facilitar futuras actualizaciones y mantenimiento.

Compatibilidad del Navegador:

La aplicación debe ser compatible con los navegadores web más comunes, incluyendo Chrome, Firefox y Safari.



|Identificación|RNF01|
| - | - |
|Nombre|Diseño del sitio web completo para el usuario|
|Descripción|Este requerimiento es acorde al diseño de una página web cualquiera, en este caso es solo una página principal por lo que recargar constantemente.|
|Prioridad|alta|



|Identificación|RNF02|
| - | - |
|Nombre|Seguridad|
|Descripción|La seguridad es primordial para cualquier sistema informático, las cuentas de usuario están protegidas por contraseñas hash quiere decir que no muestra la contraseña verdadera en la base de datos.|
|Prioridad|alta|



|Identificación|RNF03|
| - | - |
|Nombre|Diseño Responsivo|
|Descripción|El diseño responsivo quiere decir que el diseño de usuario debe ser adaptable a cualquier dispositivos ya sean tablet, teléfono,etc|
|Prioridad|alta|

5. Caso de uso

El primer diagrama que se presenta ya que representa lo que hace el sistema, donde los actores corresponde a administrador, usuario cliente y sistema que también se le considera un actor no confundir la parte dentro con el sistema son escenarios ósea en resumidas palabras son historias, con sus respectivos casos de uso al software.



|Identificador|CU01|
| - | - |
|Actor|Administrador|
|Nombre del caso|Iniciar sesión|
|Descripción general|El administrador ingresa los datos de nombre de usuario y contraseñas correspondientes.|



|Identificador|CU02|
| - | - |
|Actor|Administrador, vendedor y cliente.|
|Nombre del caso|Registrarse|
|Descripción general|Los usuarios pueden registrarse llenando los formularios de registro el sistema le pide los datos a ingresar.|



|Identificador|CU03|
| - | - |
|Actor|Administrador|
|Nombre del caso|Cerrar sesión|
|Descripción general|El administrador cierra la sesión con un botón de salir.|



|Identificador|CU04|
| - | - |
|Actor|Administrador y Vendedor|
|Nombre del caso|Agregar|
|Descripción general|El administrador y vendedor agrega cualquier datos necesarios, según lo requieran.|
|||


|Identificador|CU05|
| - | - |
|Actor|Administrador y Vendedor|
|Nombre del caso|Leer|
|Descripción general|El administrador lee los datos necesarios.|
|Identificador|CU06|
|Actor|Administrador y Vendedor|
|Nombre del caso|Actualizar|
|Descripción general|El administrador puede actualizar cualquier datos necesarios.|



|Identificador|CU07|
| - | - |
|Actor|Administrador y Vendedor|
|Nombre del caso|Eliminar|
|Descripción general|El administrador agrega cualquier datos necesarios.|



|Identificador|CU08|
| - | - |
|Actor|Administrador y vendedor.|
|Nombre del caso|Reportes de datos.|
|Descripción general|El administrador puede generar reportes de datos para tener respaldos en caso de perderlos.|



|Identificador|CU09|
| - | - |
|Actor|Administrador, Cliente y Vendedor|
|Nombre del caso|Configurar Perfil de usuario|
|Descripción general|Los Usuarios pueden configurar su datos de perfil, estos pueden ser usuarios administradores, clientes y vendedores.|



|Identificador|CU10|
| - | - |
|Actor|Cliente|
|Nombre del caso|Descargar catálogo|
|Descripción general|El cliente puede descargar el catálogo de tour.|



|Identificador|CU11|
| - | - |
|Actor|Cliente|
|Nombre del caso|Ver tour disponibles|
|Descripción general|El cliente puede observar los tours disponibles de.|



|Identificador|CU12|
| - | - |
|Actor|Cliente|
|Nombre del caso|Ver categorías de tours|
|Descripción general|El usuario cliente tiene disponible los tour que asigna el administrador del sistema.|



|Identificador|CU13|
| - | - |
|Actor|Cliente|
|Nombre del caso|Ver galería|
|Descripción general|El usuario cliente tiene disponible la galería de imágenes que el administrador gestiona del sitio web.|



|Identificador|CU14|
| - | - |
|Actor|Cliente|
|Nombre del caso|Agregar el carro de compras|
|Descripción general|El usuario cliente agrega tour al carro de compras y este mismo calcula el precio total en base a la cantidad de pasajero que quiere ingresar.|



|Identificador|CU15|
| - | - |
|Actor|Cliente|
|Nombre del caso|Realizar reserva de tour|
|Descripción general|El usuario cliente puede comprar el carro de compras, confirmando la compra hace la reserva.|



|Identificador|CU16|
| - | - |
|Actor|Cliente|
|Nombre del caso|Realizar reserva de tour|
|Descripción general|El usuario cliente puede comprar el carro de compras, confirmando la compra hace la reserva.|



|Identificador|CU17|
| - | - |
|Actor|Cliente|
|Nombre del caso|Ver imágenes.|
|Descripción general|El usuario cliente puede observar imágenes, el administrador tiene el control completo donde puede gestionar.|



|Identificador|CU18|
| - | - |
|Actor|Cliente.|
|Nombre del caso|Comprar en línea.|
|Descripción general|El usuario cliente puede hacer compras en línea con la plataforma de paypal, estos pagos son en dólares.|



|Identificador|CU18|
| - | - |
|Actor|Vendedor y Administrador.|
|Nombre del caso|Administrar Venta.|
|Descripción general|El usuario vendedor tiene la gestión de la ventas, puede agregar, leer, actualizar y eliminar datos.|



|Identificador|CU19|
| - | - |
|Actor|Vendedor y Administrador|
|Nombre del caso|Generar boleta de venta.|
|Descripción general|El usuario vendedor puede generar la boleta de venta para tener respaldo de la venta y este mismo le envia la boleta al usuario.|
|Identificador|CU20|
|Actor|Administrador|
|Nombre del caso|Enviar notificaciones.|
|Descripción general|El usuario administrador puede enviar notificaciones a usuario vendedor y cliente.|



|Identificador|CU21|
| - | - |
|Actor|Cliente|
|Nombre del caso|Agregar al carro.|
|Descripción general|El usuario cliente puede agregar un tour a un carro de compras, este mismo le calcula el total en base a la cantidad de pasajeros que van al tour.|



|Identificador|CU22|
| - | - |
|Actor|Cliente|
|Nombre del caso|Leer descripción del tour.|
|Descripción general|El usuario cliente puede leer la descripción de los tour..|

` `![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.002.jpeg)

6. Desarrollo del prototipo.

   Es el proceso de desarrollo de creación y evolución de un prototipo específico. Un prototipo es una versión inicial o modelo preliminar de un producto, sistema o software que se desarrolla con el propósito de probar y validar conceptos, funciones y características antes de la implementación completa. Esta sección puede incluir detalles sobre el diseño, las iteraciones, las decisiones de desarrollo y los desafíos encontrados durante el proceso de construcción del prototipo funcional, por lo que el usuario tendrá interacción en tiempo real con solo acceso a internet, podrá interactuar y descargar código fuente desde github saber y entender las tecnologías utilizadas para generar el producto final de este mismo.

1. Prototipo funcional disponible en la web.

   Este enlace lleva a un prototipo funcional que está accesible en línea. Un prototipo funcional es una versión del producto o software que presenta todas o algunas de las funciones y características planificadas. Proporcionar acceso en línea permite a los usuarios experimentar con el prototipo, probar su usabilidad y proporcionar retroalimentación valiosa antes de la implementación final. Esta sección podría contener información sobre cómo acceder al prototipo, instrucciones para su uso y los beneficios de tener una versión funcional en línea para la participación de los usuarios.

Este prototipo está ya disponible en producción, por lo que mantenibilidad va en evolución y adaptando sus requerimientos.

link: [Xperience (xperiencechile.cl)](https://xperiencechile.cl/)

Este enlace conduce al sitio web oficial de Xperience en el dominio xperiencechile.cl. La presencia de un sitio web sugiere que Xperience es un proyecto o producto que tiene una presencia en línea. La sección vinculada podría contener información detallada sobre el proyecto, sus objetivos, funciones, características, así como información de contacto y posiblemente casos de uso o testimonios de usuarios.

2. Código fuente del software.

   El enlace a "Código fuente del software" apunta al repositorio de código fuente del proyecto en la plataforma GitHub, bajo el usuario JOSE616MIGUEL y el repositorio llamado Xperience. Este enlace proporciona acceso al código fuente del software subyacente, permitiendo a desarrolladores, colaboradores y cualquier interesado examinar, contribuir y entender cómo se ha implementado el proyecto, sin embargo está este repositorio en privado por lo que no es público para todos los usuarios. Esta sección podría contener información sobre la estructura del código, las tecnologías utilizadas y cualquier otra información relevante para aquellos que deseen colaborar o comprender mejor el proyecto desde el punto de vista técnico.

link: [JOSE616MIGUEL/Xperience (github.com)](https://github.com/JOSE616MIGUEL/Xperience)

7. Diagrama de clases

El diagrama de clases es un tipo de diagrama de la UML (Unified Modeling Language o Lenguaje Unificado de Modelado) que se utiliza para visualizar la estructura estática y las relaciones entre las clases de un sistema. Este diagrama proporciona una representación gráfica de las clases, interfaces, asociaciones y colaboraciones dentro de un sistema orientado a objetos.

Aquí hay algunos elementos clave que se pueden encontrar en un diagrama de clases:

Clase:

- Se representa mediante un rectángulo dividido en tres compartimentos.
- El primer compartimento contiene el nombre de la clase.
- El segundo compartimento incluye los atributos de la clase (variables o campos).
- El tercer compartimento contiene los métodos de la clase (funciones o procedimientos).

Relaciones:

- Asociación: Representa la conexión entre dos clases y se muestra mediante una línea que conecta ambas clases. Puede indicar la cardinalidad y la

  dirección de la relación.

- Herencia (generalización): Indica que una clase (subclase) hereda atributos y comportamientos de otra clase (superclase). Se representa por una línea

con una flecha que apunta hacia la superclase. ● Implementación (realización): Muestra que una clase implementa la interfaz de otra. Se denota con una línea punteada con una flecha que

apunta hacia la interfaz.

Multiplicidad:

- Indica cuántas instancias de una clase participan en una relación. Se representa mediante números o asteriscos en ambos extremos de la línea

  de asociación.

Atributos y Métodos:

- Los atributos se representan en la sección de atributos de la clase, y los métodos se representan en la sección de métodos. Cada uno tiene un

  nombre y un tipo de datos asociado.

El objetivo principal del diagrama de clases es proporcionar una visión estructurada y visual de la organización y relaciones entre las clases en un sistema orientado a objetos. Esto facilita la comprensión y comunicación entre los desarrolladores y otros stakeholders durante el diseño y desarrollo del software.

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.003.jpeg)

8. Diagrama de flujo DFD

El Diagrama de Flujo de Datos (DFD, por sus siglas en inglés: Data Flow Diagram) es una herramienta de modelado utilizada en el análisis y diseño de sistemas de información. Este tipo de diagrama se centra en la representación gráfica de cómo los datos se mueven a través de un sistema, mostrando los procesos, las fuentes de datos, los destinos y las conexiones entre ellos.

A continuación, se explican algunos elementos clave del Diagrama de Flujo de Datos:

Proceso:

- Se representa por un círculo o una elipse y representa una función o transformación que se realiza en los datos. Puede ser un cálculo, una

  decisión, una operación, etc.

Flujo de Datos:

- Representa el movimiento de datos entre los procesos, las entidades externas y los almacenes de datos. Se dibuja con flechas y se etiqueta para

  indicar qué tipo de datos está fluyendo.

Almacén de Datos:

- Representa una ubicación donde se almacenan datos. Puede ser una base de datos, un archivo, una carpeta, etc. Se representa por un rectángulo.

Entidad Externa:

- Representa fuentes o destinos de datos fuera del sistema que estás modelando. Puede ser una persona, un sistema externo, otra entidad, etc.

  Se representa por un rectángulo con líneas que conectan los flujos de datos.

Flujos de Control:

- Estos flujos, a menudo representados con flechas, indican la secuencia en la que se mueven los datos. Pueden mostrar la dirección del flujo o la

  sincronización entre procesos.

Los Diagramas de Flujo de Datos son útiles para entender y visualizar cómo los datos se procesan y se mueven dentro de un sistema, lo que facilita la identificación de las funciones principales, la detección de posibles problemas y la comunicación entre los analistas y los stakeholders del sistema. Este enfoque ayuda en las etapas iniciales del desarrollo de sistemas y es una herramienta valiosa en el análisis y diseño de sistemas de información.

1. Inicio de sesión (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.004.jpeg)

2. Administración de la categoría del tour (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.005.jpeg)

3. Administración de tour (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.006.jpeg)

4. Administración de Rutas Turísticas (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.007.jpeg)

5. Administración de Noticias (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.008.jpeg)

6. Administración de Clientes (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.009.jpeg)

7. Administración de Comentarios (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.010.jpeg)

8. Administración del Usuario (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.011.jpeg)

9. Administración de la Tarea (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.012.jpeg)

10. Administración del Proveedor (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.013.jpeg)

11. Administración del Guía (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.014.jpeg)

12. Administración del mensaje (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.015.jpeg)

13. Administración de galería (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.016.jpeg)

14. Administración de ofertas (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.017.jpeg)

15. Administración de ventas (Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.018.jpeg)

16. Configuración perfil (Cliente, Vendedor y Administrador)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.019.jpeg)

17. Carro de compra (Cliente)

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.020.jpeg)

9. Modelo Relacional

   El modelo relacional es uno de los modelos de bases de datos más utilizados y se basa en la idea de organizar los datos en tablas bidimensionales. Para una agencia de viajes, podríamos diseñar un modelo relacional que incluya tablas para representar información sobre clientes, destinos, reservas, vuelos, hoteles y otros elementos relevantes.

1. Conceptual

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.021.jpeg)

2. Entidad relación

![](Aspose.Words.78aa639d-aca4-4c02-b4bd-5234dca2e702.022.png)

10\.Conclusión

En el proceso de levantamiento de requerimientos para el desarrollo del software web de la agencia de viajes, se ha llevado a cabo una exhaustiva recolección de información y análisis de necesidades. La comprensión profunda de los usuarios, procesos y características clave ha sido fundamental para el diseño de un sistema que satisfaga eficazmente las demandas del negocio.

El prototipo de la aplicación web proporciona una representación visual temprana de la interfaz y las funcionalidades principales, permitiendo a los stakeholders tener una visión clara y tangible de la solución propuesta. Esto ha facilitado la retroalimentación temprana y la validación de requisitos, asegurando que el diseño evolucione de manera acorde a las expectativas del cliente y los usuarios finales.

En cuanto a los diagramas de arquitectura, los modelos de casos de uso, de clases, de flujo y relacional han sido herramientas esenciales para visualizar la estructura y la interacción del sistema. El diagrama de casos de uso ha identificado las funcionalidades clave desde la perspectiva del usuario, el diagrama de clases ha representado la estructura lógica del sistema, el diagrama de flujo ha delineado los procesos y la secuencia de interacciones, y el modelo relacional ha proporcionado una representación clara de la base de datos.

La arquitectura propuesta refleja un enfoque modular y escalable, garantizando flexibilidad para futuras expansiones y mejoras. El uso de tecnologías web modernas ha sido considerado para asegurar una experiencia de usuario ágil y receptiva.

En resumen, el informe de levantamiento de requerimientos proporciona una base sólida para el desarrollo de un software web para la agencia de viajes, asegurando que el sistema resultante sea tanto funcional como eficiente, cumpliendo con las expectativas y necesidades de todos los stakeholders involucrados.
47
