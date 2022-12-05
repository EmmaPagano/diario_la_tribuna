-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 23:24:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_tribuna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL,
  `url_anuncio` varchar(300) NOT NULL,
  `id_posicion_anuncio` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `anunciante` varchar(300) NOT NULL,
  `baja_anuncio` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `url_anuncio`, `id_posicion_anuncio`, `fecha_alta`, `anunciante`, `baja_anuncio`) VALUES
(4, 'publi1.jpg', 1, '2022-10-17 18:43:03', 'JW', 0),
(5, 'publi1.jpg', 2, '2022-10-17 18:43:34', 'JW2', 0),
(6, 'horizontal-web-banner-with-push-button-yellow-liquid-abstract-shapes-on-purple-background-rounded-corner-banner-illustration-free-vector.jpg', 3, '2022-10-17 18:43:54', 'Coto1', 1),
(7, 'publiHorizontal.gif', 4, '2022-10-17 18:44:10', 'Coto2', 0),
(8, 'publiHorizontal.gif', 3, '2022-10-17 19:22:39', 'Prueba', 0),
(9, '6.jpg', 1, '2022-11-01 17:51:57', 'Pagano', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_posiciones`
--

CREATE TABLE `anuncios_posiciones` (
  `id_posicion_anuncio` int(11) NOT NULL,
  `posicion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios_posiciones`
--

INSERT INTO `anuncios_posiciones` (`id_posicion_anuncio`, `posicion`) VALUES
(1, 'Lateral 1° posición'),
(2, 'Lateral 2° posición'),
(3, 'Horizontal 1° posición'),
(4, 'Horizontal 2° posición'),
(5, 'Horizontal 3° posición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `baja_categoria` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `baja_categoria`) VALUES
(1, 'Política', 1),
(3, 'Policiales', 0),
(4, 'Deportes', 0),
(5, 'Salud', 0),
(6, 'Salud', 1),
(7, 'Educación', 1),
(8, 'Economía', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `tituloNoticia` varchar(300) NOT NULL,
  `introduccionNoticia` varchar(1000) NOT NULL,
  `contenidoNoticia` text NOT NULL,
  `imgPrincipal` varchar(250) NOT NULL,
  `noticiaDestacada` tinyint(4) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT current_timestamp(),
  `baja_noticia` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `tituloNoticia`, `introduccionNoticia`, `contenidoNoticia`, `imgPrincipal`, `noticiaDestacada`, `idCategoria`, `fechaPublicacion`, `baja_noticia`) VALUES
(1, 'salio el sol', '             mejoró el clima       ', '<p>salio el sol&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://static8.depositphotos.com/1451970/915/v/600/depositphotos_9150302-stock-illustration-the-sun.jpg\" style=\"height:600px; width:600px\" /></p>\r\n', 'Tabaco-y-alcohol-aceleran-la-aparicion-del-cancer-esofagico-1000x599.jpg', 0, 4, '2022-10-27 15:26:41', 0),
(2, 'fffffffffffffffffffffffff', 'La salida de la Unión Europea resintió la conectividad de las islas. El gobierno lanzó a los kelpers una oferta de \"vuelos humanitarios\" que busca capitalizar su enojo gggggggggggggggggcon el gobierno de Boris Jhonson.', '<p>A principios de diciembre, el gobierno argentino propuso el env&iacute;o de vuelos humanitarios a las Islas Malvinas para que los residentes puedan visitar a sus familias para las fiestas.&nbsp;</p>\r\n\r\n<p>Desde el gobierno brit&aacute;nico de Boris Johnson&nbsp;agradecieron la iniciativa argentina pero rechazaron la propuesta y recordaron que la administraci&oacute;n de las rutas a&eacute;reas con las islas son de exclusiva responsabilidad del gobierno local que responde a Londres.</p>\r\n\r\n<p><a href=\"https://www.lapoliticaonline.com/tools/redirect.php?t=3&amp;i=131809&amp;s=650009c5006a4ea2984b6932b2c38a3f\">Un fallo contra Reino Unido refuerza el reclamo por la soberan&iacute;a de las Malvinas</a></p>\r\n\r\n<p>LPO&nbsp;<strong>DAILY</strong></p>\r\n\r\n<p>SUSCRIBITE</p>\r\n\r\n<p>Al suscribirte aceptar&aacute;s recibir el newsletter de La Pol&iacute;tica Online. Te pod&eacute;s desuscribir cuando quieras</p>\r\n\r\n<p>&quot;Habiendo tomado conocimiento de que la mayor parte de los residentes de las Islas Malvinas que necesitan contar con un servicio a&eacute;reo al continente son de origen chileno, el Gobierno argentino ofreci&oacute; que en su viaje de regreso al continente, los vuelos puedan dirigirse directamente al aeropuerto de Punta Arenas o alg&uacute;n otro aeropuerto alternativo en Chile. Esta propuesta toma en cuenta que en la actualidad existen restricciones en los pasos fronterizos con Chile&quot;, dijo en su momento la Canciller&iacute;a en un comunicado.</p>\r\n\r\n<p>&quot;Este ofrecimiento humanitario, realizado por la Canciller&iacute;a en el marco de una recomendaci&oacute;n del Consejo Nacional Malvinas, se produce en un contexto en que los vuelos regulares que conectan las Islas con el territorio continental no se encuentran operativos desde marzo de 2020&quot;, a&ntilde;ade el texto.</p>\r\n\r\n<p>Lo cierto es que el eje humanitario no es un elemento novedoso en la pol&iacute;tica exterior argentina hacia las Islas Malvinas, pero el kirchnerismo lo hab&iacute;a relegado por una orientaci&oacute;n m&aacute;s enfocada en las sanciones a las empresas que operan en el Mar Argentino que las rodea.</p>\r\n\r\n<p>De ninguna manera es seducci&oacute;n. Esas pol&iacute;ticas han fracasado. Lo que s&iacute; hay un contexto de tensiones internas y debates en las islas que tiene con ver con la decisi&oacute;n del gobierno del Reino Unido de cerrar los vuelos con el pretexto de la pandemia.</p>\r\n\r\n<p>Fuentes consultada por LPO descartaron&nbsp;la idea que se trate de un regreso&nbsp; a la &quot;politica de seducci&oacute;n&quot; del menemismo, pero reconocieron que existe un nuevo contexto que permite innovar. &nbsp;&quot;De ninguna manera es seducci&oacute;n, esas pol&iacute;ticas han fracasado. Lo que s&iacute; hay es un contexto de&nbsp;tensiones internas y debates en las islas que tiene con ver con la decisi&oacute;n del gobierno del Reino Unido de cerrar los vuelos con el pretexto de la pandemia&quot;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.lapoliticaonline.com/files/image/68/68517/5fe7a2568f41f_950_627!.jpg?s=95bd35486d28fb154960c65c3801021a&amp;d=1640461901\" style=\"width:100%\" /></p>\r\n\r\n<p>En efecto, desde marzo del 2020, los habitantes de las Malvinas no tiene comunicaci&oacute;n con el continente, salvo un avi&oacute;n militar que va a Londres. Eso ha generado un descontento general con trabajadores que llegaron a las islas antes de la pandemia y no han podido volver a sus casas.&nbsp;&nbsp;</p>\r\n', '6.jpg', 0, 3, '2022-10-27 15:32:25', 0),
(3, 'ooooooooooooooooo', 'ooooooooooooooooo', '<p>fggffgf</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.lapoliticaonline.com/files/image/79/79967/61c778c418f1f_950_637!.jpg?s=ea784fd1614c670977d684f93a6df87c&amp;d=1640462533\" style=\"width:100%\" /></p>\r\n', 'PRECIOS.jpg', 1, 7, '2022-10-27 15:35:43', 0),
(4, 'Cristina recusará a Capuchetti por \"boicotear\" la pista política del atentado', 'La vicepresidenta dijo que la jueza \"paralizó\" la investigación cuando apareció un testimonio que involucró al diputado del PRO Gerardo Milman.', '<p>Cristina Kirchner anunci&oacute; que recusar&aacute; a la jueza federal Mar&iacute;a Eugenia Capuchetti por &quot;boicotear&quot; la investigaci&oacute;n de la pista pol&iacute;tica detr&aacute;s del intento de magnicidio que sufri&oacute; el 1 de septiembre pasado.</p>\r\n\r\n<p>Mediante un video que difundi&oacute; en las redes sociales, la vicepresidenta sostuvo que la magistrada &quot;paraliz&oacute;&quot; la causa cuando apareci&oacute; un testigo que involucr&oacute; al diputado nacional del PRO Gerardo Milman.</p>\r\n\r\n<p>En el video, con voz en off de la periodista Julia Mengolini, se repasan algunos detalles del caso y se concentra en el testimonio de un asesor del diputado peronista Marcos Cleri que aseguraba&nbsp;<a href=\"https://www.lapoliticaonline.com/judiciales/la-justicia-investiga-si-milman-sabia-que-atentarian-contra-cristina/\" target=\"_blank\">haber escuchado a Milman</a>&nbsp;hacerle un comentario a dos empleadas que dejaba en evidencia que sab&iacute;a del atentado d&iacute;as antes de que sucediera. &quot;Cuando la maten yo estoy camino a la Costa&quot;, habr&iacute;a dicho.</p>\r\n', '63307e6e931f5-horizontal-pieza-noticia_940_612!.jpg', 0, 1, '2022-11-10 14:30:25', 0),
(5, 'Massa viajará a EEUU para firmar el acuerdo de intercambio automático de información entre la AFIP y el Tesoro', 'El ministro Sergio Massa viajará a EEUU para firmar el acuerdo de intercambio automático de información entre la AFIP y el Tesoro. Así lo indicaron inmejorables fuentes del Palacio de Hacienda a Infobae.', '<p>Como paso previo a la firma del convenio, el Gobierno le otorg&oacute; al ministro plenos poderes para rubricarlo y as&iacute; lo notific&oacute; al Departamento de Estado que conduce&nbsp;<strong>Anthony Blinken.</strong></p>\r\n\r\n<p>El poder fue firmado por el presidente&nbsp;<strong>Alberto Fern&aacute;ndez&nbsp;</strong>y forma parte de la ardua negociaci&oacute;n que el ministro comenz&oacute; a fines de agosto en Washington, como inform&oacute; este medio, para destrabar esta etapa superior del intercambio de informaci&oacute;n impositiva, que gener&oacute; un gran revuelo entre los titulares de las cuentas argentinas en Estados Unidos.</p>\r\n', 'JWTN3PO5MAPJRH6JJZEPGHYBU4.webp', 0, 1, '2022-11-10 14:32:05', 0),
(6, 'Caos de tránsito en el centro porteño por una nueva movilización de piqueteros', 'Concentración en 9 de Julio y Moreno. Militantes de Libres Del Sur y el Polo Obrero junto a la Unidad Piquetera, protestan frente al Ministerio de Desarrollo Social para exigir “más planes, mejoras en los alimentos a comedores y merenderos y herramientas para poder trabajar dignamente”.', '<p>Tras el fracaso en las negociaciones, manifestantes de Unidad Piquetera se moviliza nuevamente por el microcentro porte&ntilde;o. La medida se replica en una docena de provincias</p>\r\n', 'ITBMMHOADFBSJKGSB5BOW2QKZE.webp', 0, 1, '2022-11-10 14:33:05', 0),
(7, 'Los Sauces-Hotesur: el fiscal de Casación pidió que se revoque el sobreseimiento de CFK y vaya a juicio oral', 'Lo hizo Mario Villar en una audiencia virtual. “Son hechos muy graves en los que están involucrados funcionarios públicos”, dijo y agregó que se le priva a la Fiscalía exponer las pruebas en un proceso oral', '<p><a href=\"https://www.infobae.com/?noredirect\"><img alt=\"Infobae\" src=\"https://www.infobae.com/pf/resources/images/logo_infobae_naranja.svg?d=1152\" style=\"height:25px; width:105px\" /></a></p>\r\n\r\n<p><a href=\"https://www.infobae.com/ultimas-noticias/\">&Uacute;ltimas Noticias</a><a href=\"https://www.infobae.com/politica/\">Pol&iacute;tica</a><a href=\"https://www.infobae.com/sociedad/\">Sociedad</a><a href=\"https://www.infobae.com/deportes/\">Deportes</a><a href=\"https://www.infobae.com/tecno/\">Tecno</a><a href=\"https://www.infobae.com/economia/\">Econom&iacute;a</a><a href=\"https://www.infobae.com/que-puedo-ver/\">Qu&eacute; puedo ver</a><a href=\"https://www.infobae.com/latinpower/\">Esports</a><a href=\"https://www.infobae.com/educacion/\">Educaci&oacute;n</a><a href=\"https://www.infobae.com/economia/campo/\">Campo</a><a href=\"https://www.infobae.com/tendencias/\">Tendencias</a><a href=\"https://www.infobae.com/america/perrosygatos/\">Perros y gatos</a><a href=\"https://www.infobae.com/salud/\">Salud</a><a href=\"https://www.infobae.com/autos/\">Autos</a><a href=\"https://www.infobae.com/turismo/\">Turismo</a><a href=\"https://www.infobae.com/cultura/\">Cultura</a><a href=\"https://www.infobae.com/webstories/\">Webstories</a></p>\r\n\r\n<p>RegistrarmeIniciar sesi&oacute;n</p>\r\n\r\n<p>Buscar</p>\r\n\r\n<p><a href=\"https://www.infobae.com/?noredirect\">Argentina</a><a href=\"https://www.infobae.com/america/\">Am&eacute;rica</a><a href=\"https://www.infobae.com/mundial-2022/\">Mundial 2022</a><a href=\"https://www.infobae.com/mundial-2022/fixture/\">Fixture mundial</a><a href=\"https://www.infobae.com/mundial-2022/agenda/\">Agenda mundial</a><a href=\"https://www.infobae.com/america/mexico/\">M&eacute;xico</a><a href=\"https://www.infobae.com/america/colombia/\">Colombia</a><a href=\"https://www.infobae.com/america/peru/\">Per&uacute;</a><a href=\"https://www.infobae.com/economia/\">Econom&iacute;a</a><a href=\"https://www.infobae.com/leamos/\">Leamos</a><a href=\"https://www.infobae.com/tendencias/\">Tendencias</a><a href=\"https://www.infobae.com/teleshow/\">Teleshow</a><a href=\"https://www.infobae.com/deportes/\">Deportes</a><a href=\"https://www.infobae.com/ultimas-noticias/\">&Uacute;ltimas Noticias</a><a href=\"https://www.infobae.com/podcasts/\">Podcasts</a><a href=\"https://www.infobae.com/newsletters/\">Newsletters</a></p>\r\n\r\n<hr />\r\n<p><a href=\"https://www.infobae.com/ultimas-noticias/\">&Uacute;ltimas Noticias</a><a href=\"https://www.infobae.com/politica/\">Pol&iacute;tica</a><a href=\"https://www.infobae.com/sociedad/\">Sociedad</a><a href=\"https://www.infobae.com/deportes/\">Deportes</a><a href=\"https://www.infobae.com/tecno/\">Tecno</a><a href=\"https://www.infobae.com/economia/\">Econom&iacute;a</a><a href=\"https://www.infobae.com/que-puedo-ver/\">Qu&eacute; puedo ver</a><a href=\"https://www.infobae.com/latinpower/\">Esports</a><a href=\"https://www.infobae.com/educacion/\">Educaci&oacute;n</a><a href=\"https://www.infobae.com/economia/campo/\">Campo</a><a href=\"https://www.infobae.com/tendencias/\">Tendencias</a><a href=\"https://www.infobae.com/america/perrosygatos/\">Perros y gatos</a><a href=\"https://www.infobae.com/salud/\">Salud</a><a href=\"https://www.infobae.com/autos/\">Autos</a><a href=\"https://www.infobae.com/turismo/\">Turismo</a><a href=\"https://www.infobae.com/cultura/\">Cultura</a><a href=\"https://www.infobae.com/webstories/\">Webstories</a></p>\r\n\r\n<p>Modo noche</p>\r\n\r\n<p><img alt=\"Avatar\" src=\"https://d10m5hx9bslf4r.cloudfront.net/profile-pictures/default-avatar.svg\" style=\"height:9px; width:16px\" /></p>\r\n\r\n<p>BienvenidoPor favor, ingresa a tu cuenta.</p>\r\n\r\n<p>RegistrarmeIniciar sesi&oacute;n</p>\r\n\r\n<p><a href=\"https://www.infobae.com/?noredirect\"><img alt=\"Infobae \" src=\"https://www.infobae.com/pf/resources/images/logo_infobae_naranja.svg?d=1152\" style=\"height:60px; width:252px\" /></a></p>\r\n\r\n<p><a href=\"https://www.infobae.com/america/\">AM&Eacute;RICA</a><a href=\"https://www.infobae.com/america/mexico/\">M&Eacute;XICO</a><a href=\"https://www.infobae.com/america/colombia/\">COLOMBIA</a><a href=\"https://www.infobae.com/que-puedo-ver/\">QU&Eacute; PUEDO VER</a><a href=\"https://www.infobae.com/economia/\">ECON&Oacute;MICO</a><a href=\"https://www.infobae.com/teleshow/\">TELESHOW</a><a href=\"https://www.infobae.com/deportes/\">DEPORTES</a><a href=\"https://www.infobae.com/leamos/\">LEAMOS</a></p>\r\n\r\n<p>Jueves 10 de Noviembre de 2022</p>\r\n\r\n<p><a href=\"https://www.infobae.com/mundial-2022/\">Mundial Qatar 2022</a><a href=\"https://www.infobae.com/mundial-2022/fixture/\">Fixture Mundial</a><a href=\"https://www.infobae.com/ultimas-noticias/\">&Uacute;ltimas noticias</a><a href=\"https://www.infobae.com/economia/divisas/dolar-hoy/\">D&oacute;lar hoy</a><a href=\"https://www.infobae.com/tag/guerra-rusia-ucrania/\">Rusia invade Ucrania</a><a href=\"https://www.infobae.com/tendencias/\">Tendencias</a><a href=\"https://www.infobae.com/newsletters/\">Newsletters</a></p>\r\n\r\n<p><a href=\"https://www.infobae.com/politica\">POL&Iacute;TICA</a></p>\r\n\r\n<p><img alt=\"Alt  Audio Content\" src=\"https://www.infobae.com/pf/resources/icons/audioon.svg?d=1152\" style=\"height:28px; width:28px\" /></p>\r\n\r\n<p>Escuchar art&iacute;culo</p>\r\n\r\n<h1>Los Sauces-Hotesur: el fiscal de Casaci&oacute;n pidi&oacute; que se revoque el sobreseimiento de CFK y vaya a juicio oral</h1>\r\n\r\n<h2>Lo hizo Mario Villar en una audiencia virtual. &ldquo;Son hechos muy graves en los que est&aacute;n involucrados funcionarios p&uacute;blicos&rdquo;, dijo y agreg&oacute; que se le priva a la Fiscal&iacute;a exponer las pruebas en un proceso oral</h2>\r\n\r\n<p><img alt=\"Martín Angulo\" src=\"https://s3.amazonaws.com/arc-authors/infobae/a8e7537f-ede1-4cc2-81e5-a1ef8edf473a.png\" style=\"height:60px; width:60px\" /></p>\r\n\r\n<p>Por</p>\r\n\r\n<p><a href=\"https://www.infobae.com/autor/martin-angulo\">Mart&iacute;n Angulo</a></p>\r\n\r\n<p>10 de Noviembre de 2022</p>\r\n\r\n<p><img alt=\"La audiencia virtual ante la Cámara Federal de Casación Penal\" src=\"https://cloudfront-us-east-1.images.arcpublishing.com/infobae/IT34LL2XFVHVFEQWJPNNNYFOZ4.jpeg\" style=\"height:719px; width:1280px\" /></p>\r\n\r\n<p>La audiencia virtual ante la C&aacute;mara Federal de Casaci&oacute;n Penal</p>\r\n\r\n<p>El fiscal de la C&aacute;mara Federal de Casaci&oacute;n Penal&nbsp;<strong>Mario Villar</strong>&nbsp;pidi&oacute; hoy que se revoque el sobreseimiento de la vicepresidenta de la Naci&oacute;n,&nbsp;<strong>Cristina Kirchner</strong>, y del resto de los acusados en las causas &ldquo;Los Sauces&rdquo; y &ldquo;Hotesur&rdquo; para que sean enviados a juicio oral. Lo hizo en una audiencia virtual ante la Sala I de Casaci&oacute;n en la que sostuvo que la resoluci&oacute;n dictada por el Tribunal Oral Federal 5 en noviembre del a&ntilde;o pasado fue&nbsp;<strong>&ldquo;arbitraria&rdquo;</strong>.</p>\r\n\r\n<p>Villar expuso ante los jueces de la Sala I,&nbsp;<strong>Diego Barroetave&ntilde;a, Ana Mar&iacute;a Figueroa y Daniel Petrone</strong>, y los abogados de los acusados, entre ellos&nbsp;<strong>Alberto Beraldi y Ary Llernovoy,</strong>&nbsp;defensores de Cristina Kirchner.&nbsp;<strong>&ldquo;Son hechos muy graves en los que est&aacute;n involucrados funcionarios p&uacute;blicos. La Fiscal&iacute;a se vio privada de representar a la sociedad en un juicio oral&rdquo;</strong>, sostuvo el fiscal sobre las causas que se debaten.</p>\r\n\r\n<p>Con una exposici&oacute;n t&eacute;cnica sobre la figura del lavado de dinero y las doctrinas sobre los delitos, Villar se&ntilde;al&oacute; que el tribunal priv&oacute; a la Fiscal&iacute;a de exponer las pruebas de los expedientes en un juicio oral. El fiscal se&ntilde;al&oacute; que la ley permite que se haga el juicio cuando haya una prueba nueva que demuestre que no sea necesario un juicio oral. &ldquo;Debe haber una prueba clara para prevalecer sobre la que ya estaba&rdquo;, explic&oacute; y puso como ejemplo el caso de d&oacute;lar futuro, otro expediente en el que est&aacute; imputada Cristina Kirchner.</p>\r\n\r\n<p>En ese caso, los mismos jueces de Casaci&oacute;n sobreseyeron a la vicepresidenta sin juicio oral porque un peritaje contable determin&oacute; que no hubo perjuicio al estado.&nbsp;<strong>&ldquo;Ac&aacute; no tengo prueba nueva ni dirimente&rdquo;,</strong>&nbsp;dijo Villar sobre las causas &ldquo;Los Sauces-Hotesur&rdquo;.</p>\r\n', 'massa-okjpg.webp', 0, 1, '2022-11-10 14:35:17', 0),
(8, 'Villa Epecuén, el pueblo que emergió del agua y el único habitante que vive en sus ruinas legendarias', '“Era previsible”, se escuchó decir esta mañana en un pasillo de Comodoro Py 2002, cuando en los celulares aparecía el tuit de Cristina.', '<p>Seg&uacute;n revel&oacute;&nbsp;<strong>Infobae</strong>, el 30 de agosto, dos d&iacute;as antes del atentado, Abello fue a almorzar al bar Casablanca, en la esquina del Congreso, junto con su cu&ntilde;ado y escuch&oacute; en una mesa vecina a Millman decirles a dos mujeres &ldquo;muy bonitas&rdquo; con las que estaba:&nbsp;<strong>&ldquo;Cuando la maten, yo estoy camino a la Costa&rdquo;</strong>. &ldquo;Eso fue todo lo que escuch&eacute;, despu&eacute;s siguieron las bromas, los chistes, &eacute;l se par&oacute;, salud&oacute; a unas personas por ah&iacute;, pagamos nosotros y nos fuimos&rdquo;, precis&oacute;.</p>\r\n', 'JWTN3PO5MAPJRH6JJZEPGHYBU4.webp', 1, 5, '2022-11-10 14:36:51', 0),
(9, '¿Otro golpe a la falta de dólares? Se derrumban las estimaciones de cosecha y crece la preocupación', 'La falta de lluvias ya afecta el 60% del territorio nacional y preludia la peor de las cosechas en los últimos 7 años, según un informe de la Bolsa de Comercio de Rosario (BCR), que estimó que, entre octubre y noviembre, se perderán casi 2 millones de toneladas más por los efectos climáticos.', '<p><a href=\"https://www.cronista.com/tools/redirect.php?t=3&amp;i=678044&amp;s=c65ae3faf662a80b49f5c533e55f5d35\" target=\"_blank\">&iquest;Sequ&iacute;a de d&oacute;lares?: la falta de lluvias ya afect&oacute; de forma &quot;severa&quot; a 7 millones de hect&aacute;reas y pegar&aacute; a las reservas</a></p>\r\n\r\n<p>A la hora de analizar el efecto, en octubre, se estim&oacute; una&nbsp;<strong>p&eacute;rdida de crecimiento econ&oacute;mico de 0,6 % del PBI.&nbsp;</strong>La ca&iacute;da en t&eacute;rmino de&nbsp;<a href=\"https://www.cronista.com/tools/redirect.php?t=3&amp;i=678368&amp;s=00b342f54e8efe830275d4cffb992f04\" target=\"_blank\">exportaciones</a>&nbsp;en torno a 6,3 millones de toneladas anticipa&nbsp;<strong>u$s 1500 millones menos de liquidaci&oacute;n</strong>. Sin embargo,&nbsp;el combo de &quot;sequ&iacute;a + heladas&quot; genera un&nbsp;<strong>impacto global</strong>&nbsp;de m&aacute;s de&nbsp;<strong>u$s 3100</strong>, al calcular el efecto multiplicador de la agricultura.</p>\r\n\r\n<h2>RESULTADO AJUSTADO</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Aunque la situaci&oacute;n es monitoreada por la&nbsp;<strong>Secretar&iacute;a de Agricultura de la Naci&oacute;n</strong>, que esta semana<a href=\"https://www.cronista.com/tools/redirect.php?t=3&amp;i=675867&amp;s=157e4277e151d1bc4edf0056fc122bdb\" target=\"_blank\">&nbsp;anunci&oacute; beneficios para los productores afectados por las heladas en la zona cordillerana</a>,&nbsp;<strong>Sergio Massa, ya resta de su balance el ingreso de d&oacute;lares del agro</strong>&nbsp;y pone el pie sobre las&nbsp;importaciones para cerrar el a&ntilde;o en armon&iacute;a con el&nbsp;<strong>Fondo Monetario Internacional</strong>.</p>\r\n', '6245a8d0cf011.png', 0, 1, '2022-11-10 14:38:19', 0),
(10, 'Jubilados ANSES: todo lo que se sabe del bono de fin de año y los aumentos de diciembre', 'En diciembre, ANSES activará el cuarto y último aumento correspondiente a la Ley de Movilidad Jubilatoria que impactará en los haberes de los jubilados y pensionados.', '<p>En diciembre los&nbsp;<strong><a href=\"https://www.cronista.com/tema/jubilados/\">jubilados y pensionados</a></strong>&nbsp;que cobran a trav&eacute;s de la&nbsp;<strong>Administraci&oacute;n Nacional de la Seguridad Social</strong>&nbsp;(<a href=\"https://www.cronista.com/tema/anses/\">ANSES</a>) ser&aacute;n alcanzados por el &uacute;ltimo&nbsp;<a href=\"https://www.cronista.com/tema/aumento/\"><strong>aumento</strong></a>&nbsp;del a&ntilde;o que se da por la Ley de Movilidad Jubilatoria y&nbsp;<strong>un posible bono</strong>&nbsp;antes de que termine el a&ntilde;o.</p>\r\n\r\n<p>El<strong>&nbsp;porcentaje de la suba se calcula mediante una f&oacute;rmula</strong>&nbsp;que&nbsp;combina un 50% de la recaudaci&oacute;n de la ANSES y otro 50% de la variaci&oacute;n salarial (RIPTE). Es por eso que todav&iacute;a no se sabe de cu&aacute;nto ser&aacute;.</p>\r\n\r\n<p>De todas formas, la abogada previsionalita<strong>&nbsp;Tamara Bezares</strong>, anunci&oacute; en &quot;Tiempo real&quot; que&nbsp;<strong>el aumento para jubilados&nbsp;rondar&iacute;a el 17%</strong>. De este modo, ser&iacute;a el m&aacute;s alto que se da desde que rige la ley.&nbsp;</p>\r\n', 'jubilados-anses.webp', 0, 1, '2022-11-10 14:39:08', 0),
(11, 'Encargados de edificios: con nueva suba, así quedan las escalas salariales desde noviembre', 'Los encargados de edificio alcanzados por el acuerdo paritario vigente entre la Federación Argentina de Trabajadores de Edificios de Renta y Particulares (FATERYH) y las cámaras de administradores, recibirán en diciembre próximo, la liquidación de sus haberes de noviembre con un incremento del 16% junto a un bono de $ 18.000. \r\n\r\nLos valores se complementarán en enero 2023 (a pagarse en febrero 2023) con la última cuota de actualización, también por el mismo porcentaje, lo que dejará una mejora interanual del 112% (al incluir los bonos).', '<p>Con las perspectivas de las subas de las&nbsp;<a href=\"https://www.cronista.com/economia-politica/ranking-de-paritarias-record-los-10-gremios-que-abrocharon-las-subas-de-sueldos-mas-altas-en-2022/\" target=\"_blank\">paritarias de 2022</a>&nbsp;hacia n&uacute;meros de tres cifras como lo conseguido por el&nbsp;<a href=\"https://www.cronista.com/economia-politica/paritarias-camioneros-logro-un-aumento-record-del-107/\" target=\"_blank\">Sindicato de Camioneros (107%)</a>&nbsp;y el&nbsp;<a href=\"https://www.cronista.com/economia-politica/con-su-acuerdo-un-gremio-marca-nuevo-record-del-116-en-paritarias-y-sueldos-de-260-mil/\" target=\"_blank\">Gremio de Carga y Descarga (116%)</a>, ya no es una novedad la consolidaci&oacute;n de acuerdos cercanos a esos niveles por parte de sectores espec&iacute;ficos.</p>\r\n\r\n<p>Aun as&iacute;,&nbsp;<strong>contin&uacute;an siendo pocos las c&aacute;maras sindicales que logran superar la marca de&nbsp;<a href=\"https://www.cronista.com/economia-politica/la-inflacion-en-la-ciudad-sorprendio-en-octubre-cuanto-aumento-el-indice-de-precios/\" target=\"_blank\">inflaci&oacute;n</a></strong>&nbsp;de los &uacute;ltimos meses, que finalizar&iacute;a el a&ntilde;o con una cifra total de casi 100%, seg&uacute;n las principales consultoras.</p>\r\n', '6169c2312f730.jpg', 0, 1, '2022-11-10 14:40:34', 0),
(12, 'Furor por una pareja de millennials que hizo una casa en un baldío y ahora vende una guía por USD 400 para enseñarle a otros cómo hacerla', 'Una pareja de milennials construyó a mano una casa muy pequeña en un terreno vacío del Alentejo, Portugal.', '<p>Seg&uacute;n Business Insider, &ldquo;Pepe Romero y Eugenia D&iacute;az construyeron toda la casa a mano en seis meses; ambos de 35 a&ntilde;os, saben lo que es hacer cambios dr&aacute;sticos en su estilo de vida&rdquo;.</p>\r\n\r\n<p>&ldquo;La pareja se mud&oacute; de Espa&ntilde;a a Los &Aacute;ngeles en 2012 tras terminar la universidad, seg&uacute;n cuenta Romero a Insider. D&iacute;az se dedicaba a la medicina, pero en 2014 se dedic&oacute; a crear una marca de bolsos. A medida que la marca crec&iacute;a, Romero dej&oacute; su trabajo en un estudio de arquitectura para ayudar a gestionar el negocio&rdquo;.</p>\r\n\r\n<p>Sin embargo, cinco a&ntilde;os despu&eacute;s, en 2019, &ldquo;la pareja decidi&oacute; cerrarlo porque quer&iacute;an cambiar su estilo de vida&rdquo;.</p>\r\n', 'W4ZHKRDTL5HFXFQCXFX3RMLI5M.webp', 1, 1, '2022-11-10 14:42:56', 0),
(13, 'Redrado reflexionó sobre la situación crítica de las reservas del BCRA: “No hay ni para tres semanas de importaciones”', 'El economista considera que actualmente no hay una lucha contra la inflación y que el país camina por un desfiladero donde puede caer en un abismo inflacionario o cambiario', '<p>El drenaje de reservas se desaceler&oacute; en el &uacute;ltimo mes pero la cantidad de d&oacute;lares en poder del BCRA sigue siendo critico y as&iacute; lo advierten algunos economistas. Mart&iacute;n Redrado es uno de ellos y alert&oacute; que la autoridad monetaria tiene divisas para menos de 30 d&iacute;as.</p>\r\n\r\n<p>&ldquo;Tenes un&nbsp;<strong>BCRA</strong>&nbsp;sin reservas, este es el principal problema del desierto que tiene que caminar la econom&iacute;a argentina en los pr&oacute;ximos meses sobre todo hasta marzo. No hay ni para 3 semanas de importaciones y hacia adelante no hay mayor oferta de divisas, al contrario hay mayores pagos&rdquo;, asegur&oacute; el economista en el programa&nbsp;<em>Opini&oacute;n p&uacute;blica</em>&nbsp;conducido por Romina Manguel por Canal 9.</p>\r\n\r\n<p>Esta tambi&eacute;n se convierte en una de las preocupaciones del Gobierno, quien prepara un colch&oacute;n de aproximadamente USD 6.000 millones para frenar el drenaje de reservas y as&iacute; estirar la paz cambiaria. De ese total, USD 3.000 millones corresponden a desembolsos de organismos multilaterales y otros USD 3.000 millones como respuesta a un anuncio que preparan para antes de fin de a&ntilde;o. Sin embargo, Redrado explica por qu&eacute; el pa&iacute;s atraviesa un sendero complicado: &ldquo;Hablo de sequ&iacute;a en t&eacute;rminos de que tenemos una cantidad de pagos donde no hay suficientes reservas. Hoy las reservas netas del BCRA son 4.000 millones de d&oacute;lares, para ponerlo en perspectiva las importaciones de un mes en Argentina son 7.000 millones de d&oacute;lares&rdquo;.</p>\r\n\r\n<p>Como si esta problem&aacute;tica no bastara, la coyuntura econ&oacute;mica tambi&eacute;n tiene que lidiar contra la inflaci&oacute;n, un fen&oacute;meno que mes a mes recorta el poder adquisitivo de la gente y que est&aacute; denominado como la problem&aacute;tica m&aacute;s grande que enfrenta el pa&iacute;s. As&iacute; tambi&eacute;n lo destaca el ex presidente del BCRA: &ldquo;El principal problema que vemos es que no hay una lucha contra la inflaci&oacute;n. Vamos caminando a un 6% mensual de piso que tiene el fen&oacute;meno en los pr&oacute;ximos meses y no hay miras de que se recupere el salario real&rdquo;.</p>\r\n', 'H2OBDDJRXBBCDOL64WJN3QE3VU.webp', 0, 1, '2022-11-10 14:44:05', 0),
(15, 'Britos destacó la tarea de De Lillo', 'El intendente destacó la tarea que lleva adelante el secretario de Hacienda, Eduardo De Lillo, por la \"austeridad, responsabilidad y transparencia\" con que se manejan los fondos municipales.', '<p>Este martes, al presentar un nuevo mam&oacute;grafo adquirido para el Hospital de nuestra ciudad,&nbsp;<strong>Guillermo Britos</strong>&nbsp;puso de manifiesto que esa tarea &quot;<em>permite que Chivilcoy tenga posibilidades de mejorar</em>&quot;.</p>\r\n\r\n<p>En este sentido, aludi&oacute; a otras adquisiciones realizadas para dotar de nuevo equipamiento al nosocomio.</p>\r\n\r\n<p>Record&oacute; la compra -en 2021- de un tomografo y dem&aacute;s aparatolog&iacute;a &quot;<em>que permiten -dijo- mejorar permanentemente la infraestructura, tecnolog&iacute;a y los servicios en nuestro extraordinario Hospital Municipal</em>&quot;.</p>\r\n\r\n<p>Para la compra del nuevo mam&oacute;grafo se invirtieron 23 millones de pesos, equivalentes a 135.252 d&oacute;lares.</p>\r\n', 'X222-562x445.jpg', 1, 1, '2022-11-29 18:45:12', 0),
(16, 'Nuevo mamógrado de alta resolución para el Hospital', 'Es de origen finlandés. Para la compra del equipo se invirtieron 23 millones de pesos, equivalentes a 135.252 dólares.', '<p>&nbsp;</p>\r\n\r\n<p>Ser&aacute; instalado en los pr&oacute;ximos d&iacute;as y reemplazar&aacute; al actual, que ya cumpli&oacute; su ciclo de vida &uacute;til.</p>\r\n\r\n<p>Pose&iacute;a una antiguedad de 27 a&ntilde;os, presentaba fallas y no hay repuestos para su reparaci&oacute;n, motivo por el cual se decidi&oacute; su reemplazo.</p>\r\n\r\n<p>&quot;<em>Quiero agradecerle a todos los chivilcoyanos, porque gracias a ellos se adquiere este mam&oacute;grafo</em>&quot;, expres&oacute; el intendente Guillermo Britos, al anunciar este martes la llegada del equipo.</p>\r\n\r\n<p>Por su parte, el secretario de Salud, doctor Jos&eacute; Mar&iacute;a Caprara, explic&oacute; que &quot;<em>el aparato es de alta resoluci&oacute;n</em>&quot;.</p>\r\n\r\n<p>&quot;<em>Dimos un salto de calidad y, adem&aacute;s, por su tecnolog&iacute;a soluciona molestias inherentes al estudio</em>&quot;, destac&oacute;.</p>\r\n\r\n<p>Caprara record&oacute; que &quot;<em>el estudio mamogr&aacute;fico es fundamental para la detecci&oacute;n del c&aacute;ncer mamario</em>&quot;.</p>\r\n', 'mamo-800x445.jpg', 0, 5, '2022-11-29 18:49:16', 0),
(17, 'COVID: \"Tenemos muy pocos casos a nivel local. No tenemos preocupación\".', 'Así respondió este martes el secretario de Salud, doctor José María Caprara, al ser consultado acerca del crecimiento de casos de COVID en el país.', '<p>&quot;Si bien en otros lugares hay indicios que preocupan, nosotros no hemos tenido ninguna resoluci&oacute;n de parte del Ministerio de Salud de la Provincia ni de la Naci&oacute;n&quot;, afirm&oacute; el profesional.</p>\r\n\r\n<p>En los &uacute;ltimos d&iacute;as se detectaron en el pa&iacute;s 3.323 nuevos casos de Covid-19.</p>\r\n\r\n<p>Adem&aacute;s, fallecieron ocho personas.</p>\r\n\r\n<p>Los vacunatorios cuentan con dosis suficientes para aplicar refuerzo y las personas pueden acudir por demanda espont&aacute;nea.</p>\r\n\r\n<p>Deben vacunarse quienes hayan recibido su &uacute;ltima dosis hace m&aacute;s de 120 d&iacute;as, en particular mayores de 50 a&ntilde;os y personas con condiciones de riesgo.</p>\r\n\r\n<p>En&nbsp;<strong>Chivilcoy</strong>&nbsp;se vacuna en el<strong>&nbsp;Centro Integrador Comunitario (CIC) FONAVI,</strong>&nbsp;ubicado en Favertio 161, de lunes a viernes de 08:00 a 18:00.</p>\r\n\r\n<p>Los ni&ntilde;os y ni&ntilde;as de entre seis meses y dos a&ntilde;os de edad, inclusive, deber&aacute;n hacerlo en el&nbsp;<strong>Centro de Atenci&oacute;n</strong>&nbsp;<strong>Primaria de la Salud (CAPS) Sur</strong>, en calle 98 y Zaccardi.</p>\r\n', 'ca22.png', 0, 5, '2022-11-29 18:53:22', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `password` varchar(300) NOT NULL,
  `rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `correo`, `password`, `rol`) VALUES
(1, 'emmanuel.pagano@gmail.com', '123456', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `fk_posicion` (`id_posicion_anuncio`) USING BTREE;

--
-- Indices de la tabla `anuncios_posiciones`
--
ALTER TABLE `anuncios_posiciones`
  ADD PRIMARY KEY (`id_posicion_anuncio`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD KEY `FK_categoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `anuncios_posiciones`
--
ALTER TABLE `anuncios_posiciones`
  MODIFY `id_posicion_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `relacion_anuncio_posicion` FOREIGN KEY (`id_posicion_anuncio`) REFERENCES `anuncios_posiciones` (`id_posicion_anuncio`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `relacion_noticia_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
