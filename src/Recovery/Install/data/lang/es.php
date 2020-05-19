<?php
declare(strict_types=1);

return [
    'header_title' => 'Instalación',
    'menuitem_language-selection' => 'Iniciar',
    'menuitem_requirements' => 'Requisitos del sistema',
    'menuitem_database-configuration' => 'Configuración de la base de datos',
    'menuitem_database-import' => 'Instalación',
    'menuitem_edition' => 'Licencia Shopware',
    'menuitem_configuration' => 'Configuración',
    'menuitem_finish' => 'Terminado',
    'menuitem_license' => 'CGV',
    'license_incorrect' => 'La clave de licencia introducida no es válida.',
    'license_does_not_match' => 'La clave de licencia introducida no corresponde a ninguna versión comercial de Shopware',
    'license_domain_error' => 'La clave de licencia introducida no es válida para el dominio: ',
    'version_text' => 'Versión:',
    'back' => 'Atrás',
    'forward' => 'Continuar',
    'start' => 'Iniciar',
    'start_installation' => 'Iniciar instalación',

    'select_language_de' => 'Alemán',
    'select_language_en' => 'Inglés',
    'select_language_nl' => 'Holandés',
    'select_language_it' => 'Italiano',
    'select_language_fr' => 'Francés',
    'select_language_es' => 'Español',
    'select_language_pt' => 'Portugués',
    'select_language_pl' => 'Polaco',
    'select_language_cs' => 'Checo',
    'select_language_sv' => 'Sueco',

    'language-selection_welcome_title' => 'Bienvenido/a a Shopware 6',
    'language-selection_select_language' => 'Idioma del asistente de instalación',
    'language-selection_header' => 'Tu instalación de Shopware',
    'language-selection_info_message' => 'Esta selección solo se aplica al idioma del asistente de instalación. El idioma estándar de sistema de tu tienda lo podrás definir posteriormente.',
    'language-selection_welcome_message' => '¡Nos complace que quieras entrar a formar parte de nuestra extraordinaria Shopware Community global! Ahora te acompañaremos paso a paso en el proceso de instalación. Si tienes dudas, echa primero un vistazo en nuestro <a class="is--nowrap" href="https://forum.shopware.com" target="_blank">Foro</a>, contacta con nosotros por teléfono llamando al <a class="is--nowrap" href="tel:+492555928850">(+49) 2555 928850</a>, o mándanos un <a class="is--nowrap" href="mailto:info@shopware.com">correo electrónico</a>.',
    'requirements_header' => 'Requisitos del sistema',
    'requirements_header_files' => 'Archivos y directorios',
    'requirements_header_system' => 'Sistema',
    'requirements_files_info' => 'Los siguientes archivos y directorios tienen que estar disponibles y no pueden estar protegidos contra escritura.',
    'requirements_table_files_col_check' => 'Archivo / directorio',
    'requirements_table_files_col_status' => 'Estado',
    'requirements_error' => 'No se cumplen todos los requisitos para completar con éxito la instalación.',
    'requirements_error_title' => 'Tu sistema aún no está listo para Shopware 6',
    'requirements_success' => 'Se cumplen todos los requisitos para completar con éxito la instalación.',
    'requirements_success_title' => 'Tu sistema está listo para Shopware 6',
    'requirements_php_info' => 'Tu servidor tiene que cumplir los siguientes requisitos de sistema para poder aprovechar al máximo todas las funcionalidades de Shopware.',
    'requirements_php_max_compatible_version' => 'Esta versión de Shopware es compatible con PHP hasta la versión %s. En caso de versiones nuevas de PHP, no se puede garantizar una funcionalidad completa.',
    'requirements_system_col_check' => 'Requisito',
    'requirements_system_col_required' => 'Obligatorio',
    'requirements_system_col_found' => 'Tu sistema',
    'requirements_system_col_status' => 'Estado',
    'requirements_show_all' => '(mostrar todo)',
    'requirements_hide_all' => '(ocultar todo)',
    'requirements_status_error' => 'Error',
    'requirements_status_warning' => 'Advertencia',
    'requirements_status_ready' => 'Listo',
    'license_agreement_header' => 'Condiciones generales de venta ("CGV")',
    'license_agreement_info' => 'A continuación se describen nuestras Condiciones generales de venta. Para continuar con la instalación de Shopware 6, tienes que leer y aceptar las CGV. La edición Community de Shopware 6 está autorizada conforme a las condiciones de la licencia MIT.',
    'license_agreement_error' => '¡Por favor, acepta nuestras CGV!',
    'license_agreement_checkbox' => '¡Acepto las CGV!',
    'database-configuration_header' => 'Configurar base de datos',
    'database-configuration_field_host' => 'Servidor:',
    'database-configuration_advanced_settings' => 'Ajustes avanzados',
    'database-configuration_field_port' => 'Puerto:',
    'database-configuration_field_socket' => 'Conector (opcional):',
    'database-configuration_field_user' => 'Usuario:',
    'database-configuration_field_password' => 'Contraseña:',
    'database-configuration_field_database' => 'Nombre de la base de datos:',
    'database-configuration_field_new_database' => 'Nueva base de datos:',
    'database-configuration_info' => 'Para instalar Shopware en tu sistema, necesitas los datos de acceso a tu base de datos. Si no estás seguro/a de lo que tienes que indicar, ponte en contacto con tu administrador / proveedor de alojamiento.',
    'database-configuration-create_new_database' => 'Crear nueva base de datos',
    'database-configuration_non_empty_database' => 'La base de datos seleccionada ya contiene datos. Por favor, selecciona una base de datos vacía o crea una nueva.',
    'database-configuration_error_required_fields' => 'Rellena todos los campos.',
    'database-import_header' => 'Instalación',
    'database-import_skip_import' => 'Omitir',
    'database-import_progress' => 'Continuar: ',
    'database-import-hint' => '<strong>Nota:</strong> ¡Si en la base datos configurada ya existen tablas de Shopware, se tienen que eliminar mediante la instalación / actualización!',
    'database-import_info_text' => 'Shopware 6 se instalará en la base de datos que has seleccionado previamente. Este proceso puede tardar unos minutos, en función de tu sistema.',
    'database_import_success' => '¡Shopware 6 se ha instalado correctamente!',
    'database_import_install_label' => 'Instalación de la base de datos:',
    'database_import_install_step_text' => 'Paso',
    'database_import_install_from_text' => 'de',
    'migration_counter_text_migrations' => 'Ejecutando actualización de la base de datos',
    'migration_counter_text_snippets' => 'Actualizando bloques de texto',
    'migration_update_success' => '¡La base de datos se ha importado con éxito!',
    'edition_header' => '¿Ya tienes una licencia de Shopware?',
    'edition_info' => 'Shopware dispone de una edición <a href="https://de.shopware.com/versionen/" target="_blank">Community </a> gratuita, así como de las ediciones <a href="https://de.shopware.com/versionen/" target="_blank">Professional y Enterprise</a> de pago.',
    'edition_ce' => 'No, gracias, quiero utilizar la edición <a href="https://de.shopware.com/versionen/" target="_blank">Community</a> gratuita.',
    'edition_cm' => 'Sí, tengo una licencia de pago de Shopware (<a href="https://de.shopware.com/versionen/" target="_blank">Professional o Enterprise</a>).',
    'edition_license' => 'Introduce aquí tu clave de licencia. La encontrarás en tu cuenta Shopware, en "Licencias" → "Licencias de producto" → "Detalles / Descargar":',
    'edition_license_error' => 'Para la instalación de una versión Shopware de pago, es necesaria una licencia válida.',
    'configuration_header' => 'Configuración',
    'configuration_sconfig_text' => 'Ya casi está. Ya solo te quedan algunos ajustes básicos para dar los últimos toques a tu tienda, y la instalación habrá terminado.',
    'configuration_sconfig_name' => 'Nombre de la tienda',
    'configuration_sconfig_name_info' => 'Por favor, indica el nombre de tu tienda',
    'configuration_sconfig_mail' => 'Dirección de correo electrónico de la tienda',
    'configuration_sconfig_mail_info' => 'Por favor, indica la dirección de correo electrónico para los correos salientes',
    'configuration_sconfig_domain' => 'Dominio de la tienda:',
    'configuration_sconfig_language' => 'Idioma estándar del sistema:',
    'configuration_sconfig_currency' => 'Moneda estándar:',
    'configuration_sconfig_currency_info' => 'Esta moneda se utilizará por defecto para los precios de los productos.',
    'configuration_admin_currency_eur' => 'Euro',
    'configuration_admin_currency_usd' => 'Dólar (US)',
    'configuration_admin_currency_gbp' => 'Libra esterlina (GB)',
    'configuration_admin_username' => 'Nombre de inicio de sesión del administrador:',
    'configuration_admin_mail' => 'Dirección de correo electrónico del administrador:',
    'configuration_admin_firstName' => 'Nombre del administrador:',
    'configuration_admin_lastName' => 'Apellido(s) del administrador:',
    'configuration_defaults_warning' => '.El idioma estándar y la moneda estándar del sistema no se podrán modificar posteriormente:',
    'configuration_email_help_text' => 'Esta dirección de correo electrónico se utilizará para los correos electrónicos salientes de la tienda.',
    'configuration_admin_language_de' => 'Deutsch',
    'configuration_admin_currency_headline' => 'Monedas disponibles',
    'configuration_admin_currency_text' => 'Añade más monedas a tu tienda de Shopware. Si quieres añadir monedas después, puedes hacerlo en cualquier momento en la administración.',

    'configuration_admin_language_de' => 'Alemán',
    'configuration_admin_language_en' => 'Inglés',
    'configuration_admin_password' => 'Contraseña del administrador:',
    'finish_header' => 'Instalación terminada',
    'finish_info' => '¡Has completado con éxito la instalación de Shopware!',
    'finish_info_heading' => '¡Genial!',
    'finish_first_steps' => 'Guía "Primeros pasos"',
    'finish_frontend' => 'Ir a escaparate',
    'finish_backend' => 'Ir a administración',
    'finish_message' => '
<p>
    <strong>Bienvenido/a a Shopware,</strong>
</p>
<p>
    te damos la bienvenida a nuestra comunidad. Has completado con éxito la instalación de Shopware.
<p>Tu tienda ya está lista para usar. Si eres nuevo/a en Shopware, te recomendamos la guía <a href="https://docs.shopware.com/de/shopware-5-de/erste-schritte/erste-schritte-in-shopware" target="_blank">"Primeros pasos en Shopware"</a>. Cuando inicies sesión por primera vez en Administración, nuestro asistente de primera ejecución te guiará en el proceso de configuración básica de tu tienda.</p>
<p>¡Que disfrutes de tu nueva tienda online!</p>',
];
