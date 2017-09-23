<?php
/**
 * @version		$Id: ebay_import.php 3583 2014-04-11 11:27:28Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2014 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

$_['lang_heading']                      = 'Produktimport';
$_['lang_openbay']                      = 'OpenBay Pro';
$_['lang_page_title']                   = 'OpenBay Pro für eBay';
$_['lang_ebay']                         = 'eBay';
$_['lang_btn_return']                   = 'Zurück';
$_['lang_sync_import_line1']            = '<strong>Achtung!</strong> Diese Aktion importiert alle eBay-Produkt ungeachtet der lokalen Struktur (Produkte &amp; Kategorien).<br />Lokale Produkte &amp; Kategorien sollten vorher gelöscht werden.<br />Die importierten Daten können anschließend bearbeitet werden ohne die eBaydaten zu ändern';
$_['lang_sync_import_line2']            = 'Diese Option verwendet pro Produkt einen Aufruf der API plus 1x pro weitere 20 Produkte';
$_['lang_sync_import_line3']            = 'Vorher überprüfen ob der Server diese große Menge an Daten (üblicherweise pro 1.000 eBay-Produkte = 40 MB) verarbeiten kann!<br />Serverlimit für Import sollte mind. 128 MB betragen';
$_['lang_sync_server_size']             = 'Aktuell akzeptiert der Server: ';
$_['lang_sync_memory_size']             = 'Aktuelles PHP Speicherlimit: ';
$_['lang_sync_item_description']        = 'Importiere Beschreibungen<span class="help">Importiert alles, auch HTML, usw.</span>';
$_['lang_sync_notes_location']          = 'Importiere eBay Anmerkungen in lokale Daten';
$_['lang_import_ebay_items']            = 'Importiere eBay Artikel';
$_['lang_import']                       = 'Import';
$_['lang_error_validation']             = 'Es muss eine Registrierung für das API token vorhanden sowie das Modul aktiviert sein';
$_['lang_ajax_import_confirm']          = 'Importiert alle eBay-Artikel als neue Produkte!<br />Vorgang kann nicht rückgängig gemacht werden!<br />Vorher Datensicherung durchführen!';
$_['lang_ajax_import_notify']           = 'Import wurde begonnen - Dauer normalerweise pro 1.000 Artikel 1 Stunde.';
$_['lang_ajax_load_error']              = 'Fehler: keine Verbindung zu Server möglich';
$_['lang_maintenance_fail']             = 'Shop ist im Wartungsmodus - Import daher aktuell nicht möglich!';
$_['lang_import_images_msg1']           = 'Bilder abhängig von eBay-Import. Seite nochmals aufrufen. Sollte sich die Anzahl nicht ändern, dann';
$_['lang_import_images_msg2']           = 'hier klicken';
$_['lang_import_images_msg3']           = 'und warten. Mehr dazu <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=8_45" target="_blank">hier</a>';
?>