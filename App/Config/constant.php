<?php
/**
 * Created by PhpStorm.
 * User: kibb
 * Date: 4/6/17
 * Time: 5:57 PM
 */
define('Public_Folder','Public');
define('URL_PROTOCOL','//');
define('URL_DOMAIN',$_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER',str_replace(Public_Folder,'',dirname($_SERVER['SCRIPT_NAME'])));
define('URL',URL_PROTOCOL.URL_DOMAIN.URL_SUB_FOLDER);

