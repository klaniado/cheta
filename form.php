<?php
  $title="Registro";
  require_once("./head.php");
?>
<?php
  require_once("funciones.php");
?>
<?php
      if(estaLogueado()) {
        header("location:index.php");exit;
      }
    $nombre = "";
    $apellido = "";
    $usuario = "";
    $edad ="";
    $mail = "";
    $errores = [];
    $paises = array(
      	'AF' => 'Afghanistan',
      	'AX' => 'Aland Islands',
      	'AL' => 'Albania',
      	'DZ' => 'Algeria',
      	'AS' => 'American Samoa',
      	'AD' => 'Andorra',
      	'AO' => 'Angola',
      	'AI' => 'Anguilla',
      	'AQ' => 'Antarctica',
      	'AG' => 'Antigua And Barbuda',
      	'AR' => 'Argentina',
      	'AM' => 'Armenia',
      	'AW' => 'Aruba',
      	'AU' => 'Australia',
      	'AT' => 'Austria',
      	'AZ' => 'Azerbaijan',
      	'BS' => 'Bahamas',
      	'BH' => 'Bahrain',
      	'BD' => 'Bangladesh',
      	'BB' => 'Barbados',
      	'BY' => 'Belarus',
      	'BE' => 'Belgium',
      	'BZ' => 'Belize',
      	'BJ' => 'Benin',
      	'BM' => 'Bermuda',
      	'BT' => 'Bhutan',
      	'BO' => 'Bolivia',
      	'BA' => 'Bosnia And Herzegovina',
      	'BW' => 'Botswana',
      	'BV' => 'Bouvet Island',
      	'BR' => 'Brazil',
      	'IO' => 'British Indian Ocean Territory',
      	'BN' => 'Brunei Darussalam',
      	'BG' => 'Bulgaria',
      	'BF' => 'Burkina Faso',
      	'BI' => 'Burundi',
      	'KH' => 'Cambodia',
      	'CM' => 'Cameroon',
      	'CA' => 'Canada',
      	'CV' => 'Cape Verde',
      	'KY' => 'Cayman Islands',
      	'CF' => 'Central African Republic',
      	'TD' => 'Chad',
      	'CL' => 'Chile',
      	'CN' => 'China',
      	'CX' => 'Christmas Island',
      	'CC' => 'Cocos (Keeling) Islands',
      	'CO' => 'Colombia',
      	'KM' => 'Comoros',
      	'CG' => 'Congo',
      	'CD' => 'Congo, Democratic Republic',
      	'CK' => 'Cook Islands',
      	'CR' => 'Costa Rica',
      	'CI' => 'Cote D\'Ivoire',
      	'HR' => 'Croatia',
      	'CU' => 'Cuba',
      	'CY' => 'Cyprus',
      	'CZ' => 'Czech Republic',
      	'DK' => 'Denmark',
      	'DJ' => 'Djibouti',
      	'DM' => 'Dominica',
      	'DO' => 'Dominican Republic',
      	'EC' => 'Ecuador',
      	'EG' => 'Egypt',
      	'SV' => 'El Salvador',
      	'GQ' => 'Equatorial Guinea',
      	'ER' => 'Eritrea',
      	'EE' => 'Estonia',
      	'ET' => 'Ethiopia',
      	'FK' => 'Falkland Islands (Malvinas)',
      	'FO' => 'Faroe Islands',
      	'FJ' => 'Fiji',
      	'FI' => 'Finland',
      	'FR' => 'France',
      	'GF' => 'French Guiana',
      	'PF' => 'French Polynesia',
      	'TF' => 'French Southern Territories',
      	'GA' => 'Gabon',
      	'GM' => 'Gambia',
      	'GE' => 'Georgia',
      	'DE' => 'Germany',
      	'GH' => 'Ghana',
      	'GI' => 'Gibraltar',
      	'GR' => 'Greece',
      	'GL' => 'Greenland',
      	'GD' => 'Grenada',
      	'GP' => 'Guadeloupe',
      	'GU' => 'Guam',
      	'GT' => 'Guatemala',
      	'GG' => 'Guernsey',
      	'GN' => 'Guinea',
      	'GW' => 'Guinea-Bissau',
      	'GY' => 'Guyana',
      	'HT' => 'Haiti',
      	'HM' => 'Heard Island & Mcdonald Islands',
      	'VA' => 'Holy See (Vatican City State)',
      	'HN' => 'Honduras',
      	'HK' => 'Hong Kong',
      	'HU' => 'Hungary',
      	'IS' => 'Iceland',
      	'IN' => 'India',
      	'ID' => 'Indonesia',
      	'IR' => 'Iran, Islamic Republic Of',
      	'IQ' => 'Iraq',
      	'IE' => 'Ireland',
      	'IM' => 'Isle Of Man',
      	'IL' => 'Israel',
      	'IT' => 'Italy',
      	'JM' => 'Jamaica',
      	'JP' => 'Japan',
      	'JE' => 'Jersey',
      	'JO' => 'Jordan',
      	'KZ' => 'Kazakhstan',
      	'KE' => 'Kenya',
      	'KI' => 'Kiribati',
      	'KR' => 'Korea',
      	'KW' => 'Kuwait',
      	'KG' => 'Kyrgyzstan',
      	'LA' => 'Lao People\'s Democratic Republic',
      	'LV' => 'Latvia',
      	'LB' => 'Lebanon',
      	'LS' => 'Lesotho',
      	'LR' => 'Liberia',
      	'LY' => 'Libyan Arab Jamahiriya',
      	'LI' => 'Liechtenstein',
      	'LT' => 'Lithuania',
      	'LU' => 'Luxembourg',
      	'MO' => 'Macao',
      	'MK' => 'Macedonia',
      	'MG' => 'Madagascar',
      	'MW' => 'Malawi',
      	'MY' => 'Malaysia',
      	'MV' => 'Maldives',
      	'ML' => 'Mali',
      	'MT' => 'Malta',
      	'MH' => 'Marshall Islands',
      	'MQ' => 'Martinique',
      	'MR' => 'Mauritania',
      	'MU' => 'Mauritius',
      	'YT' => 'Mayotte',
      	'MX' => 'Mexico',
      	'FM' => 'Micronesia, Federated States Of',
      	'MD' => 'Moldova',
      	'MC' => 'Monaco',
      	'MN' => 'Mongolia',
      	'ME' => 'Montenegro',
      	'MS' => 'Montserrat',
      	'MA' => 'Morocco',
      	'MZ' => 'Mozambique',
      	'MM' => 'Myanmar',
      	'NA' => 'Namibia',
      	'NR' => 'Nauru',
      	'NP' => 'Nepal',
      	'NL' => 'Netherlands',
      	'AN' => 'Netherlands Antilles',
      	'NC' => 'New Caledonia',
      	'NZ' => 'New Zealand',
      	'NI' => 'Nicaragua',
      	'NE' => 'Niger',
      	'NG' => 'Nigeria',
      	'NU' => 'Niue',
      	'NF' => 'Norfolk Island',
      	'MP' => 'Northern Mariana Islands',
      	'NO' => 'Norway',
      	'OM' => 'Oman',
      	'PK' => 'Pakistan',
      	'PW' => 'Palau',
      	'PS' => 'Palestinian Territory, Occupied',
      	'PA' => 'Panama',
      	'PG' => 'Papua New Guinea',
      	'PY' => 'Paraguay',
      	'PE' => 'Peru',
      	'PH' => 'Philippines',
      	'PN' => 'Pitcairn',
      	'PL' => 'Poland',
      	'PT' => 'Portugal',
      	'PR' => 'Puerto Rico',
      	'QA' => 'Qatar',
      	'RE' => 'Reunion',
      	'RO' => 'Romania',
      	'RU' => 'Russian Federation',
      	'RW' => 'Rwanda',
      	'BL' => 'Saint Barthelemy',
      	'SH' => 'Saint Helena',
      	'KN' => 'Saint Kitts And Nevis',
      	'LC' => 'Saint Lucia',
      	'MF' => 'Saint Martin',
      	'PM' => 'Saint Pierre And Miquelon',
      	'VC' => 'Saint Vincent And Grenadines',
      	'WS' => 'Samoa',
      	'SM' => 'San Marino',
      	'ST' => 'Sao Tome And Principe',
      	'SA' => 'Saudi Arabia',
      	'SN' => 'Senegal',
      	'RS' => 'Serbia',
      	'SC' => 'Seychelles',
      	'SL' => 'Sierra Leone',
      	'SG' => 'Singapore',
      	'SK' => 'Slovakia',
      	'SI' => 'Slovenia',
      	'SB' => 'Solomon Islands',
      	'SO' => 'Somalia',
      	'ZA' => 'South Africa',
      	'GS' => 'South Georgia And Sandwich Isl.',
      	'ES' => 'Spain',
      	'LK' => 'Sri Lanka',
      	'SD' => 'Sudan',
      	'SR' => 'Suriname',
      	'SJ' => 'Svalbard And Jan Mayen',
      	'SZ' => 'Swaziland',
      	'SE' => 'Sweden',
      	'CH' => 'Switzerland',
      	'SY' => 'Syrian Arab Republic',
      	'TW' => 'Taiwan',
      	'TJ' => 'Tajikistan',
      	'TZ' => 'Tanzania',
      	'TH' => 'Thailand',
      	'TL' => 'Timor-Leste',
      	'TG' => 'Togo',
      	'TK' => 'Tokelau',
      	'TO' => 'Tonga',
      	'TT' => 'Trinidad And Tobago',
      	'TN' => 'Tunisia',
      	'TR' => 'Turkey',
      	'TM' => 'Turkmenistan',
      	'TC' => 'Turks And Caicos Islands',
      	'TV' => 'Tuvalu',
      	'UG' => 'Uganda',
      	'UA' => 'Ukraine',
      	'AE' => 'United Arab Emirates',
      	'GB' => 'United Kingdom',
      	'US' => 'United States',
      	'UM' => 'United States Outlying Islands',
      	'UY' => 'Uruguay',
      	'UZ' => 'Uzbekistan',
      	'VU' => 'Vanuatu',
      	'VE' => 'Venezuela',
      	'VN' => 'Viet Nam',
      	'VG' => 'Virgin Islands, British',
      	'VI' => 'Virgin Islands, U.S.',
      	'WF' => 'Wallis And Futuna',
      	'EH' => 'Western Sahara',
      	'YE' => 'Yemen',
      	'ZM' => 'Zambia',
      	'ZW' => 'Zimbabwe',
);
$pais="";
    if ($_POST) {
      // valido los datos del form y me guardo los errores en $errores
      $errores = validarInformacion($_POST);
  // si no tengo errores, entro a este if
  //     if (count($errores) == 0) {
  // // guardo la imagen y en caso de que haya problemas, guardo el error aqui
  //       $errores = guardarImagen("imgPerfil", $errores);
  // // si tampoco hubo error en la carga de la imagen entro a este if
        if (count($errores) == 0) {
  // creo un array con los datos por $_POST y lo guardo en $usuario
          $usuario = crearUsuario($_POST);
  // guardo ese array en mi JSON
          guardarUsuario($usuario);
  // redirecciono a felicidad
          header("Location:exito.php");exit;
        }


  // si no tuve errores de validacion, persisto los datos.
      if (!isset($errores["nombre"])) {
          $nombre = $_POST["nombre"];
      }
      if (!isset($errores["edad"])) {
          $edad = $_POST["edad"];
      }
      if (!isset($errores["mail"])) {
          $mail = $_POST["mail"];
      }
      if (!isset($errores["usuario"])) {
          $usuario = $_POST["usuario"];
      }
      if (!isset($errores["apellido"])) {
          $usuario = $_POST["apellido"];
      }
    }
 ?>
  <body>
    <div class="container">
      <?php include("header.php") ?>
      <div class="medio">
        <h1>Formulario de registro</h1>
        <?php if(count($errores) > 0) { ?>
          <ul>
              <?php foreach($errores as $error) { ?>
                <li>
                  <?=$error?>
                </li>
              <?php } ?>
          </ul>
        <?php } ?>
          <form  action="form.php" method="post">
            <br>
              <label for="">Nombre</label><br>
              <input type="text" name="nombre" value="<?=$nombre?>" size="15"  placeholder=" Diego" required><br>
              <label for="">Apellido</label><br>
              <input type="text" name="apellido" value="<?=$apellido?>"  placeholder=" Perez" required><br>
              <label for="">E-mail</label><br>
              <input type="email" name="mail" value="<?=$mail?>" placeholder=" algo@otroalgo.com" required><br>
              <label for="">Usuario</label><br>
              <input type="text" name="usuario" value="<?=$usuario?>"placeholder="dperez" required><br>
              <label for="">Contraseña</label><br>
              <input type="password" name="password" value="" placeholder=" Contraseña" formenctype="multipart/form-data" required><br><br>
              <label>Confirmar contraseña:</label><br>
              <input type="password" name="cpassword" value=""placeholder="Repetir contraseña"formenctype="multipart/form-data"required><br><br>
              <label for="">Edad</label><br>
              <input type="number" name="edad" value="<?=$edad?>" placeholder="18"><br><br>
              <label for="">Pais</label><br>
              <select class="" name="pais">
                <option value="">Elegir</option>
                <?php
                foreach($paises as $codigo => $pais) { ?>
                  <?php if($codigo == $_POST["pais"]) { ?>
                    <option value="<?=$codigo?>" selected>
                      <?=$pais?>
                    </option>
                  <?php } else { ?>
                    <option value="<?=$codigo?>">
                      <?=$pais?>
                    </option>
                  <?php } ?>
                <?php } ?>
              </select>
              <br><br><br><br>
            <button class="enviar" type="submit">Enviar</button>
          
          </div>
            <?php include("./footer.php") ?>
              </div>
  </body>
</html>
