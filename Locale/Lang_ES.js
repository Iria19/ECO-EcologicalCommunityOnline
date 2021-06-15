arrayES = {
    // Generales de la Base de Datos
    '00001' : 'Éxito en la ejecición del SQL',
    '00002' : 'El recordset viene vacío',
    '00003' : 'El recordset viene con datos',
    '00004' : 'Error al conectar con la base de datos. Contacte con su administrador',
    '00005' : 'Error en la ejecución del SQL',

    // USUARIO
    // Errores de registro
    '10000' : 'Registro correcto del usuario.',
    '10001' : 'Error de registro del usuario. El email ya está registrado.',
    '10002' : 'Error de registro del usuario. El usuario ya está registrado',
    '100003' : 'Error al registrar el usuario.',
    // Errores de login
    '10003' : 'Inicio de sesión correcto.',
    '10004' : 'Error de inicio de sesión. El usuario no existe.',
    '10005' : 'Error de inicio de sesión. La contraseña es incorrecta.',
    //Obtención de login
    '10006' : 'Éxito en la obtención por login de usuario. Vuelve vacía.',
    '10008' : 'Error de obtención por login de usuario.',
    // Errores de inserción
    '10009' : 'Éxito en la inserción del usuario.',
    '10010' : 'Error de inserción del usuario.',    
    '10011' : 'Error de inserción del usuario. El usuario ya existe.',
    '10012' : 'Error de inserción del usuario. El email ya existe.',
    // Errores de edición
    '10013' : 'Éxito en la edición del usuario.',
    '10014' : 'Error de edición del usuario.',
    //Errores de eliminación
    '10015' : 'Éxito en la eliminación del usuario.',
    '10016' : 'Error de eliminación del usuario.',
    //Errores de búsqueda
    '10017' : 'Éxito en la búsqueda de usuarios.',
    '10018' : 'Error de búsqueda de usuarios.',
    //Errores de obtención
    '10019' : 'Éxito en la obtención de usuario. Vuelve vacía.',
    '10020' : 'Éxito en la obtención de usuario. Vuelve con datos.',
    '10021' : 'Error de obtención de usuario.',
    //Errores de formato
    // Username
    '10022' : 'Éxito de validación de  nombre de usuario del usuario.',
    '10023' : 'El  nombre de usuario del usuario no puede ser vacía.',
    '10024' : 'El  nombre de usuario del usuario debe ser letras y números.',
    '10025' : 'El  nombre de usuario del usuario debe ser mayor o igual que 3.',
    '10026' : 'El nombre de usuario debe ser menor que 30.',
    // Nombre
    '10027' : 'Éxito de validación de nombre del usuario.',
    '10028' : 'El nombre del usuario no puede ser vacío.',
    '10029' : 'El nombre  debe estar formado solamente por caracteres alfabéticos y espacios.',
    '10030' : 'El tamaño del nombre  debe ser menor o igual que 20.',
    '100031' : 'El  nombre debe ser mayor o igual que 2.',
    // Apellidos
    '10031' : 'Éxito de validación del apellido del usuario.',
    '10032' : 'El apellido del usuario no puede ser vacío.',
    '10033' : 'El apellidos del usuario debe estar formado solamente por caracteres alfabéticos y espacios.',
    '10034' : 'El tamaño del apellido del usuario debe ser menor o igual que 200.',
    '100035' : 'Los apellidos del usuario deben ser mayor o igual que 3.',
    // Contrasenha
    '10035' : 'Éxito de validación de la contraseña del usuario.',
    '10036' : 'La contraseña del usuario no puede ser vacío. ',
    '10037' : 'El tamaño de la contraseña del usuario debe ser menor o igual que 100.',
    '100038' : 'La contraseña del usuario debe ser mayor o igual que 3.',

    // email
    '10038' : 'Éxito de validación de email del usuario.',
    '10039' : 'El email del usuario no puede ser vacío.',
    '10040' : 'El email del usuario debe seguir un formato de email.',
    '100040' : 'El email del usuario debe seguir un formato de busqueda de email.',

    // descripcion
    '10042' : 'Éxito de validación de la descripción del usuario.',
    '10043' : 'La descripción del usuario debe estar formado solamente por caracteres alfabéticos, espacios y caracteres especiales.',
    '10044' : 'El tamaño del descripción del usuario debe ser menor o igual que 255.',
     // telefono
    '10045' : 'Éxito de validación de telefono  del usuario.',
    '10046' : 'El telefono del usuario debe seguir un formato de telefono.',
    '100046' : 'El telefono del usuario debe seguir un formato de busqueda de telefono.',

     // tipo
    '10048' : 'Éxito de validación de tipo  del usuario.',
    '10049' : 'El tipo del usuario no puede ser vacío.',
    '10050' : 'El tipo del usuario debe ser una de las opciones para los usuarios.',
     // DNI
    '10051' : 'Éxito de validación de DNI  del usuario.',
    '10052' : 'El DNI del usuario debe seguir un formato de DNI.',
    '100052' : 'El DNI del usuario debe seguir un formato de busqueda de DNI.',

    //Errores unicidad
    //usuario
    '10007' : 'Usuario vuelve con datos.',
    //email
    '10053' : 'Email ya existe',
    '10056' : 'Email del usuario se puede usar',
    //obtencion
    '10059' : 'Error en la obtención por email de usuario. Vuelve vacía.',
    '10060' : 'Éxito en la obtención por email de usuario. Vuelve con datos.',
    '10061' : 'Error de obtención por email de usuario.',
    //DNI
    '10054' : 'DNI ya existe',
    '10057' : 'DNI del usuario se puede usar',
     //obtencion
    '10062' : 'Error en la obtención por email de usuario. Vuelve vacía.',
    '10063' : 'Éxito en la obtención por email de usuario. Vuelve con datos.',
    '10064' : 'Error de obtención por email de usuario.',
    //Telefono
    '10055' : 'Telefono ya existe',
    '10058' : 'Telefono del usuario se puede usar',
    //obtencion
    '10065' : 'Error en la obtención por telefono de usuario. Vuelve vacía.',
    '10066' : 'Éxito en la obtención por telefono de usuario. Vuelve con datos.',
    '10067' : 'Error de obtención por telefono de usuario.',
    //Delete
    '10068' : 'El usuario no tiene actividad.',
    '10069' : 'El usuario tiene actividad.',
    '10070' : 'El usuario no tiene actividades.',
    '10071' : 'El usuario tiene actividades.',
    '10072' : 'El usuario no tiene proyectos.',
    '10073' : 'El usuario tiene proyectos.',
    '10074' : 'Error de eliminación del usuario.El usuario esta en un grupo.',

    //Usuarios Interfaz
    //Header
    'cerrar-boton' : 'Cerrar',
    'grupo-pal' : 'Grupos',
    'proyecto-pal' : 'Proyectos',
    'actividades-pal' : 'Actividades',
    'usuarios-pal' : 'Usuarios',
    'actividades-realizadas' : 'Actividades Realizadas',
    'actividadesusu' : 'Actividades Realizadas por Usuarios',
    'idioma-pal' : 'Idioma',
    'salir-pal' : 'Salir',
    //Footer
    'f-trabajorealizado' : 'Trabajo realizado por:',
    //Login
    'login-header' : 'Iniciar sesión',
    'username' : 'Nombre de Usuario',
    'contrasenha' : 'Contraseña',
    'register-header' : 'Registro',
    //Dashboard
    'intro-pal' : 'Sistema web de comunidad de desarrollo sostenible',
    'about-eco' : 'SOBRE ECO',
    'que-eco' : '¿QUÉ ES ECO?',
    'que-es-eco-resp' : 'ECO es una página web creada con la intención de promover el desarrollo sostenible a un mayor número de personas.',
    'eco-explicacion' : 'El desarrollo sostenible promueve que las personas satisfagan sus necesidades del ahora sin comprometer la capacidad de las futuras generaciones de satisfacer las suyas. Esto nos proporciona:',
    'eco-uno' : 'Un mayor bienestar social',
    'eco-dos' : 'La protección del medio ambiente',
    'eco-tres' : 'Un futuro mejor tanto para la generación actual como las futuras',
    'eco-frase' : 'Hasta las pequeñas acciones son importantes.',
    'calltoaction' : 'Llamada a la Acción',
    'ecoRazon' : 'Cada vez el desarrollo sostenible toma más relavancia en nuestras vidas, esto se debe a que cada vez la humanidad es más consciente de las consecuencias negativas que esta teniendo la globalización y las consecuencias que conlleva. Puedes mirar las actividades que proponemos para ayudar al medio ambiente: ',
    'ecoutilidad' : '¿Qué puedes hacer en ECO?',
    'ecoutilidadresp' : 'En eco puedes realizar multiples acciones que permiten aportar tu granito de arena para que el mundo sea mejor.',
    'ecoactiresp' : 'Existen actividades que que ECO te propone que realices para ayudar al medio ambiente. Como por ejemplo tener tu propio huerto.¡¿No suena divertido?!',
    'ecoproyresp' : 'Además de las actividades propuestas por ECO también puedes participar en proyectos.',
    'ecogruporesp' : 'Realizar proyectos es más divertido en grupo, en ECO te damos la oportunidad de que al participar en un proyecto puedas llevar este acabo con un grupo de personas.',
    'ecousuarioresp' : 'ECO te permite relacionarte con otros usuarios y compartir ideas para futuros proyectos y actividades.',
    //Message
    'system-error-msg' : 'Mensaje del Sistema',
    //Test
    'testentidad' : 'Entidad',
    'testatributo' : 'Atributo',
    'testerror' : 'Error',
    'testvalor' : 'Valor',
    'testerroresperado' : 'Error Esperado',
    'testerrorobtenido' : 'Error Obtenido',
    'testresultado' : 'Resultado',
    'Detest' : 'De ',
    'testhay' : ' tests hay ',
    'testfallidos' : ' test fallidos',
    //registro
    'nombre' : 'Nombre',
    'apellidos' : 'Apellidos',
    'email' : 'Email',
    'descripcion' : 'Descripcion',
    'telefono' : 'Telefono',
    'DNI' : 'DNI',
    'tipo' : 'Tipo',
    'btnregistrarse' : 'Registrarse',
    //ADD
    'UserAddPal' : 'Añadir Usuario',
    'estandar' : 'Estandar',
    'administrador' : 'Administrador',
    //DELETE
    'borrarbtn' : 'Borrar',
    'volverbtn' : 'Volver',
    //EDIT
    'editarbtn' : 'Editar ',
    //SEARCH
    'buscarbtn' : 'Buscar',
    //LIST
    'usuariosregistrados' : 'Usuarios registrados',
    //CURRENT
    'UserCurrent' : 'Información de ',

    //GRUPO
    //Inserción
    '20001' : 'Éxito en la inserción del grupo.',
    '20002' : 'Error de inserción del grupo.',
    '20003' : 'Error. El grupo ya existe.',
    '20004' : 'Error. El nombre del grupo ya existe.',
    //Edicion
    '20005' : 'Éxito en la edición del grupo.',
    '20006' : 'Error de edición del grupo.',
    //Eliminaciones
    '20007' : 'Éxito en la eliminación del grupo.',
    '20008' : 'Error de eliminación del grupo.',
    //Busqueda
    '20009' : 'Éxito en la búsqueda de grupo .',
    '20010' : 'Error de búsqueda de grupo',
    //Obtencion
    '20011' : 'Éxito en la obtención de grupo. Vuelve vacía.',
    '20012' : 'Éxito en la obtención de grupo. Vuelve con datos.',
    '20013' : 'Error de obtención de grupo.',
    //Obtención nombre
    '20014' : 'Éxito en la obtención por nombre de grupo. Vuelve vacía.',
    '20015' : 'Éxito en la obtención por name de group. Vuelve con datos.',
    '20016' : 'Error de obtención por nombre de grupo.',
    //Formato
    //nombre
    '20017' : 'Éxito de validación de nombre del grupo.',
    '20018' : 'El nombre del grupo no puede ser vacío.',
    '20019' : 'El nombre del grupo debe estar formado solamente por caracteres alfabéticos y espacios.',
    '20020' : 'El tamaño del nombre  debe ser menor o igual que 20.',
    '20021' : 'El  nombre del grupo debe ser mayor o igual que 2.',
    //descripcion
    '20022' : 'Éxito de validación de la descripción del grupo.',
    '20023' : 'La descripción del grupo debe estar formado solamente por caracteres alfabéticos, espacios y caracteres especiales.',
    '20024' : 'El tamaño del descripción del grupo debe ser menor o igual que 255.',
    '20025' : 'El nombre del grupo ya existe',
    '20026' : 'El nombre del grupo puede ser usado',
    //responsable grupo
    '20027' : 'El  responsable del grupo del usuario no puede ser vacía.',
    '20028' : 'Éxito de validación del responsable del grupo.',
    '20029' : 'Responsable grupo no existe.',
    '20030' : 'Éxito de validación del responsable del grupo',
    '200031' : 'Responsable grupo tiene que ser alfanumerico para buscarlo',

    //Delete
    '20031' : 'El grupo no tiene actividad.',
    '20032' : 'El grupo tiene actividad.',
    '20033' : 'El grupo no tiene proyectos.',
    '20034' : 'El grupo tiene proyectos.',
    '20035' : 'El grupo tiene  usuario.',
    '20036' : 'El usuario es responsable de un grupo.',

    //Vistas
    'GroupAddPal' : 'Añadir Grupo',
    'responsable_grupo' : 'Responsable grupo',
    //Delete
    'group-deletion-msg' : 'Estas seguro de que quieres borrar el grupo.',
    'group-deletion-msg' : 'Una vez realizes esta acción, no será posible recuperar el grupo.',

     //PROYECTO   
    'Proyecto' : 'Proyecto',
    'joincurrentgrouppproy':'Si te interesa puedes unirte a nuestro proyecto.',
    'joincurrentpproygroup':'Si te interesa puedes unete al grupo de nuestro proyecto.',
    'Grupo':'Grupo',
    //Inserción
    '40001' : 'Éxito en la inserción del proyecto.',
    '40002' : 'Error de inserción del proyecto.',
    '40003' : 'Error de inserción del proyecto. El proyecto ya existe.',
    '40004' : 'Error de inserción del proyecto. El nombre del proyecto ya existe.',
    //Edición
    '40005' : 'Éxito en la edición del proyecto.',
    '40006' : 'Error de edición del proyecto.',
    //Eliminar
    '40007' : 'Éxito en la eliminación del proyecto.',
    '40008' : 'Error de eliminación del proyecto.',
    '400009' : 'Error de eliminación del proyecto.El proyecto tiene documentacion.',

    //Eliminar
    '40009' : 'Éxito en la búsqueda de proyecto.',
    '400100' : 'Error de búsqueda de proyecto.',
    //Obtención
    '40010' : 'Éxito en la obtención de proyecto. Vuelve vacía.',
    '40011' : 'Éxito en la obtención de proyecto. Vuelve con datos.',
    '40012' : 'Error de obtención de proyecto.',
    //Atributos
    //Obtención por nombre
    '40013' : 'Éxito en la obtención por nombre de proyecto. Vuelve vacía.',
    '40014' : 'Éxito en la obtención por name de proyecto. Vuelve con datos.',
    '40015' : 'Error de obtención por nombre de proeycto.',
    //Validacion nombre
    '40016' : 'Éxito de validación de nombre del proyecto.',
    '40017' : 'El nombre del proyecto no puede ser vacío.',
    '40018' : 'El nombre del proyecto debe estar formado solamente por caracteres alfabéticos y espacios.',
    '40019' : 'El tamaño del nombre  debe ser menor o igual que 20.',
    '40020' : 'El  nombre del proyecto debe ser mayor o igual que 2.',
    //Uniques
    '40021' : 'El nombre del proyecto ya existe',
    '40022' : 'El nombre del proyecto no existe',
    //responsable proyecto
    '40023' : 'El  responsable del proyecto del usuario no puede ser vacía.',
    '40024' : 'Éxito de validación del responsable del  proyecto.',
    '40025' : 'Responsable proyecto no existe',
    '40026' : 'Éxito de validación del responsable del  proyecto',
    //responsable proyecto
    '40027' : 'El  identificador del grupo del usuario no puede ser vacía.',
    '40028' : 'Éxito de validación del identificador del grupo.',
    '40029' : 'Identificador grupo no existe.',
    '40030' : 'Éxito de validación del identificador del grupo.',

    //responsable proyecto
    '40031' : 'Éxito de validación de descripcion del proyecto.',
    '40032' : 'La descripción del proyecto debe estar formado solamente por caracteres alfabéticos, espacios y caracteres especiales.',
    '40033' : 'El tamaño del descripción del usuario debe ser menor o igual que 255.',
    '40034' : 'Éxito de validación de responsable del proyecto.',
    '40035' : 'El responsable del proyecto no puede ser vacío.',

    '40039' : 'Error al añadir al responsable del proyecto al grupo.',

    'ProyectAddPal' : 'Añadir Proyecto',
    'responsable_proyecto' : 'Responsable Proyecto',
    'proyect-deletion-msg' : 'Estas seguro de que quieres borrar el proyecto',
    'proyect-deletion-msg' : 'Una vez realizes esta acción, no será posible recuperar el proyecto',
    
    //USUARIO-GRUPO
    'participantes' : 'Participantes',
    '30001' : 'Éxito en la inserción del usuario en el grupo.',
    '30002' : 'Error de inserción del usuario en el grupo.',
    '30003' : 'Error de inserción del usuario en el grupo. El usuario ya esta en el grupo.',
    '30004' : 'Éxito en la edición del usuario en el grupo.',
    '30005' : 'Error de edición del usuario en el grupo.',
    '30006' : 'Éxito en la eliminación del usuario del grupo.',
    '30007' : 'Error de eliminación del usuario grupo.',
    '30008' : 'Éxito en la búsqueda del usuario del grupo .',
    '30009' : 'Error de búsqueda del usuario en el grupo',
    '30010' : 'Éxito en la obtención del usuario en el grupo. Vuelve vacía.',
    '30011' : 'Éxito en la obtención del usuario en el grupo. Vuelve con datos.',
    '30012' : 'Error de obtención del usuario en el grupo.',
    '30013' : 'Éxito en la obtención del usuario  Vuelve vacía.',
    '30014' : 'Éxito en la obtención del usuario. Vuelve con datos',    
    '30015' : 'Error de obtención del usuario.',
    '30016' : 'Éxito en la obtención del grupo  Vuelve vacía.',
    '30017' : 'Éxito en la obtención del grupo. Vuelve con datos.',
    '30018' : 'Error de obtención del grupo ',
    '30019' : 'Éxito de validación del responsable del grupo',
    '30020' : 'Usuario no existe',
    '30021' : 'Usuario existe',
    '30024' : 'Grupo existe',
    '30023' : 'Grupo no existe', 
    
    '30025' : 'No es una opcion del tipo de usuario grupo.',
    '30026' : 'El tipo de usuario grupo no puede ser vacio.',
    '30027' : 'Ecoins solo pueden ser numeros.',
    '30029' : 'Los ecoins no pueden ser vacios.',

    'tipoparticipacion' : 'Tipo de participacion',
    'id_grupo' : 'Identificador de grupo',
    'tipoparticipacion' : 'Identificador del grupo',
    'participa' : 'Participa',
    'Unirse' : 'Unirse',
    'sigue' : 'Sigue',
    'UserGroupEditPal' : 'Editar usuario en el grupo',
    'UsuarioGroupAddPal' : 'Añadir usuario al grupo',
    'usergroup-deletion-msg' : 'Una vez realizes esta acción, no será posible recuperar la información del usuario en el grupo',

    //ACTIVIDAD
    //Insertar
    '60001' : 'Éxito en la inserción de la actividad.',
    '600001' : 'Error de inserción de la actividad.',
    '60002' : 'Error de inserción de la actividad. La actividad ya existe.',
    '60003' : 'Error de inserción de la actividad. El nombre de la actividad ya existe.',
    '60004' : 'Éxito en la edición de la actividad.',
    '60005' : 'Error de edición de la actividad.',
    '60006' : 'Éxito en la eliminación de la actividad.',
    '60007' : 'Error de eliminación de la actividad.',
    '60008' : 'Éxito en la búsqueda de la actividad.',
    '60009' : 'Error de búsqueda de la actividad.',
    '60010' : 'Éxito en la obtención de la actividad. Vuelve vacía.',
    '60011' : 'Éxito en la obtención de la actividad. Vuelve con datos.',
    '60012' : 'Error de obtención de activity.',
    '60013' : 'Éxito en la obtención por nombre de la actividad. Vuelve vacía.',
    '60014' : 'Éxito en la obtención por name de la actividad. Vuelve con datos.',
    '60015' : 'Error de obtención por nombre de la actividad.',
    '60016' : 'Éxito de validación de nombre de la actividad.',
    '60017' : 'El nombre de la actividad. no puede ser vacío.',
    '60018' : 'El nombre de la actividad. debe estar formado solamente por caracteres alfabéticos y espacios.',
    '60019' : 'El tamaño del nombre  debe ser menor o igual que 20.',
    '60020' : 'El  nombre de la actividad debe ser mayor o igual que 2.',
    '60021' : 'Éxito de validación de nombre del proyecto.',
    '60022' : 'La descripción de la actividad debe estar formado solamente por caracteres alfabéticos, espacios y caracteres especiales.',
    '60023' : 'El tamaño del descripción de la actividad debe ser menor o igual que 255.',
    '60024' : 'El nombre de la actividad ya existe.',
    '60025' : 'El nombre de la actividad no existe.',
    '60026' : 'El  responsable de la actividad no puede ser vacía.',
    '60027' : 'Éxito de validación del responsable de la actividad.',
    '60028' : 'Responsable de la actividad no existe.' , 
    '60029' : 'Responsable de la actividad existe.' , 
    '60030' : 'Éxito de validación de ecoins.',
    '600030' : 'Responsable  de la actividad tiene que ser alfanumerico para buscar',

    '60031' : 'Las ecoins no puede ser vacío.',
    '60032' : 'Ecoins deben estar formado solamente por números.' ,
    '60033' : 'Éxito de validación del responsable de la actividad.',
    '60035' : 'El tipo de actividad solo puede ser interior o experior.' ,
    '60036' : 'Éxito de validación del tipo de actividad.' ,
    '60037' : 'Éxito de validación del identificador de grupo.' ,
    '60038' : 'Identificador de grupo no existe.' ,
    '60039' : 'Identificador de grupo existe.' ,
    //Delete
    '60040' : 'La actividad no tiene actividades.',
    '60041' : 'La actividad tiene actividades.',
    '60042' : 'La actividad tiene un grupo.',
    'ecoins' : 'Ecoins',
    'ActivityAddPal':'Añadir Actividad',
    'responsable_actividad':'Responsable Actividad',
    'interior':'Interior',
    'exterior':'Exterior',
    'actividad-deletion-msg':'Estas seguro de que quieres borrar la actividad',
    'actividad-deletion-msgs':'Una vez realizes esta acción, no será posible recuperar la actividad',
    'Actividad' : 'Actividad' ,
    'validado':'Validado',
    'Si':'Si',
    'No' : 'No' ,

    //ACTIVIDADES
    //insercion
    '70001' : 'Éxito en la inserción de las actividades',
    '70002' : 'Error de inserción de las actividades',
    '70003' : 'Error de inserción de las actividades. Las actividades ya existen.',
    '700004' : 'Error de inserción del actividades. El nombre de la actividad ya existe.',

    //edicion
    '70004' : 'Éxito en la edición de las actividades.',
    '70005' : 'Error de edición de las actividades.' ,
    //eliminacion
    '70006' : 'Éxito en la eliminación de las actividades',
    '70007':'Error de eliminación de las actividades.',
    //busqueda
    '70008':'Éxito en la búsqueda de las actividades.',
    '70009':'Error de búsqueda de las actividades.',
    //obtencion
    '70010':'Éxito en la obtención de las actividades. Vuelve vacía.',
    '70011':'Éxito en la obtención de las actividades. Vuelve con datos.',
    '70012':'Error de obtención de las actividades.',
    //Id_actividad
    '70013' : 'El  identificador de la actividad no puede ser vacía.', 
    '70014': 'Éxito de validación del  identificador de la actividad.',
    '70015': 'El identificador de la actividad no existe.',
    '70016': 'El identificador de la actividad existe.',
    //username
    '70017' : 'El  nombre de usuario no puede ser vacía.', 
    '70018': 'Éxito de validación del nombre de usuario.',
    '70019': 'El nombre de usuario no existe.',
    '70020': 'El nombre de usuario existe.',
    //nombre actividad
    '70021' : 'Éxito de validación de nombre de la actividad.', 
    '70022': 'El nombre de la actividad no puede ser vacío.',
    '70023': 'El nombre de la actividad debe estar formado solamente por caracteres alfabéticos y espacios.',
    '70024': 'El tamaño del nombre de la actividad debe ser menor o igual que 20.',
    '70025': 'El  nombre de la actividad debe ser mayor o igual que 2.',
    //fecha
    '70026' : 'Éxito de validación de la fecha de la actividad.', 
    '70027': 'La fecha no puede ser vacia no puede ser vacío.',
    '70028': 'La fecha de la actividad tiene que seguir un formato de fecha.',
    '70029': 'La fecha tiene que ser anterior a 01/01/2050.',
    '70030': 'La fecha tiene que ser posterior a 01/01/2021.',
    //validado
    '70031': 'Éxito de validación de validado.',
    '70032': 'El validado no puede ser vacío.',
    '70033': 'El validado  debe ser una de las opciones para los usuarios.',
    '700008': 'Error de eliminación del actividades.La actividad tiene documentacion.',

    'id_actividad': 'Identificador de Actividad',
    'aactividades-deletion-msg':'Estas seguro de que quieres borrar la actividad',
    'actividadd-deletion-msg':'Una vez realizes esta acción, no será posible recuperar la actividad',
    'fecha': 'Fecha',

    //DOCUMENTACION
    //insercion
    '80001' : 'Éxito en la inserción de la documentacion.',
    '80002' : 'Error de inserción de la documentacion.',
    '80003' : 'Error de inserción de la documentación. La documentación ya existen.',
    //edicion
    '80004' : 'Éxito en la edición de las documentacion.',
    '80005' : 'Error de edición de las documentacion.' ,
    //eliminacion
    '80006' : 'Éxito en la eliminación de la documentacion.',
    '80007': 'Error de eliminación de la documentacion.',
    //busqueda
    '80008': 'Éxito en la búsqueda de la documentacion.',
    '80009': 'Error de búsqueda de la documentacion.',
    //obtencion
    '80010':'Éxito en la obtención de la documentacion. Vuelve vacía.',
    '80011':'Éxito en la obtención de la documentacion. Vuelve con datos.',
    '80012':'Error de obtención de la documentacion.',
    //Id_actividad
    '80015': 'Éxito de validación del  identificador de la actividad.',
    '80016': 'El identificador de la actividad no existe.',
    '80017' : 'El identificador de la actividad existe.', 
    //Id_proyecto
    '80018': 'Éxito de validación del  identificador del proyecto.',
    '80019': 'El identificador del proyecto no existe.',
    '80020': 'El identificador del proyecto existe.',
    '80021': 'Debes seleccionar o bien un proyecto o una actividad.',    
    '80022':'Ha habido un problema al mover el fichero al directorio upload. Please make sure the upload directory is writable by web server.',
    '80023':'Failed to upload document. Document types not allowed.',
    '80024': 'El nombre del usuario no puede ser vacía.',
    '80025': 'Éxito de validación del nombre de usuario',
    '80026': 'Usuario no existe.',
    '80027': 'Usuario existe.',
    '80029': 'Valido solo puede ser si o no.',
    '80028': 'Usuario debe ser alfanumerico para buscar.',
    '80030': 'Valido no puede ser vacio.',

    'Selecciona':'Selecciona',
    'DocuAddPal': 'Añadir Documentación',
    'documentacion-deletion-msg': 'Estas seguro de que quieres borrar la documentacion ',
    'documentacion-deletion-msgs': 'Una vez realizes esta acción, no será posible recuperar la documentacion ',
    'documentacion': 'Documentación',

    //MENSAJE
    //insercion
    '50001' : 'Éxito enviando el mensaje.',
    '50002' : 'Error al enviar el mensaje',
    //busqueda
    '50003' : 'Éxito en la búsqueda del mensaje.',
    '50004' : 'Error de búsqueda de la mensaje.' ,
    //obtencion
    '50005' : 'Éxito en la obtención del mensaje. Vuelve vacía.' ,
    '50006' : 'Éxito en la obtención del mensaje. Vuelve con datos.',
    '50007': 'Error de obtención del mensaje.',
    //emisor
    '50008': 'Éxito de validación del emisor.',
    '50009': 'El emisor no existe.',
    '50010': 'El emisor existe.',
    //receptor
    '50011': 'Éxito de validación del receptor.',
    '50012': 'El receptor no existe.',
    '50013': 'El receptor existe.',
    //leido
    '50014': 'Éxito de validación de leido.',
    '50015': 'El leido no puede ser vacío.',
    '50016': 'El leido  debe ser una de las opciones para los usuarios.',
    //titulo
    '50017' : 'Éxito de validación de titulo del mensaje.', 
    '50018': 'El titulo del mensaje no puede ser vacío.',
    '50019': 'El titulo  debe estar formado solamente por caracteres alfabéticos y espacios.',
    '50020': 'El tamaño del titulo  debe ser menor o igual que 20.',
    '50021': 'El  titulo del mensaje debe ser mayor o igual que 2.',
    
    //cuerpo
    '50022': 'Éxito de validación del cuerpo del mensaje.',
    '50023': 'El cuerpo del mensaje debe estar formado solamente por caracteres alfabéticos, espacios y caracteres especiales.',
    '50024': 'El tamaño del  cuerpo del mensaje debe ser menor o igual que 255.',
    //leido    
    '50025': 'Éxito cambiando el mensaje a leido.',
    '50026': 'Error cambiando el mensaje a leido.',
    '50027': 'Éxito en la eliminación del mensaje.',
    '50028': 'Error de eliminación del mensaje.',   
    'mensaje': 'Mensaje',
    'mensajes': 'Mensajes',
    'leido': 'Leido',
    'noleido': 'No leido',
    'enviar': 'Enviar',
    'titulo': 'Titulo',
    'cuerpo': 'Cuerpo',
    'emisor': 'Emisor',
    'enviarmensajetodos': 'Enviar mensaje a todos los usuarios',
    'todos': 'Todos',
    'enviarmensaje': 'Enviar mensaje',
    'receptor': 'Receptor',
    'enviarmensajegrupo': 'Enviar mensaje grupo',
    'EcoinsGrupo': 'Ecoins Grupo',
    'EcoinsActividades': 'Ecoins Actividades',
    'mensaje-deletion-msg':'Estas seguro de que quieres borrar el mensaje ',
    'mensaje-deletion-msgs':'Una vez realizes esta acción, no será posible recuperar el mensaje.',
    'tipo_participacion':'Tipo participacion',
    'participa':'Participa',
    'participa':'Sigue',
    'EcoinsTotales' : 'Ecoins Totales'



}