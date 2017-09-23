<?php
/**
 * @version		$Id: ebay_links.php 3583 2014-04-11 11:27:28Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2014 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Headings
$_['lang_openbay']                  = 'OpenBay Pro';
$_['lang_page_title']               = 'OpenBay Pro für eBay';
$_['lang_ebay']                     = 'eBay';
$_['lang_heading']                  = 'Produktlinks';
$_['lang_linked_items']             = 'Verlinkte Produkte';
$_['lang_unlinked_items']           = 'Ni. verlinkte Produkte';

// Buttons
$_['lang_btn_resync']               = 'Auffrischen';
$_['lang_btn_return']               = 'Zurück';
$_['lang_btn_save']                 = 'Sichern';
$_['lang_btn_edit']                 = 'Bearbeiten';
$_['lang_btn_check_unlinked']       = 'Prüfe ni. verlinkte Artikel';
$_['lang_btn_remove_link']          = 'Entferne Link';

// Errors & alerts
$_['lang_error_validation']         = 'Für Zugriff auf die API muss eine Registrierung gemacht sowie das Modul aktiviert werden.';
$_['lang_alert_stock_local']        = 'Aktuelle eBay-Listung wird mit aktuellem lokalen Lagerstand abgeglichen!';
$_['lang_ajax_error_listings']      = 'Keine verlinkten Produkte gefunden';
$_['lang_ajax_load_error']          = 'Fehler: keine Atwort von Server - bitte später nochmals probieren.';
$_['lang_ajax_error_link']          = 'Produktlink nicht fültig';
$_['lang_ajax_error_link_no_sk']    = 'Für ein nicht lagerndes Produkt kann kein Link erstellt werden - Produkt muss manuell auf eBay hinzugefügt werden';
$_['lang_ajax_loaded_ok']           = 'Produkte erfolgreich geladen';

// Text
$_['lang_link_desc1']               = 'Verlinkte Produkte erlauben Lagerstandskontrolle mit eBay-Listungen.';
$_['lang_link_desc2']               = 'Jeder aktualisierte lokale Lagerstandsartikel wird automatisch ebenfalls auf eBay erneuert';
$_['lang_link_desc3']               = 'Lokaler Lagerstand - sollte mit Ebay übereinstimmen.';
$_['lang_link_desc4']               = 'Aktueller lokaler Lagerstand welcher bestellt aber noch nicht bezahlt wurde - sollte nicht im verfügbaren Lagerstand sein.';
$_['lang_text_linked_desc']         = 'Verlinkte Produkte sind lokale Produkte welche auch auf eBay aufscheinen.';
$_['lang_text_unlinked_desc']       = 'Nicht verlinkte Produkte sind eBay-Produkte die zu keinem lokalen Produkt einen Bezug haben.';
$_['lang_text_unlinked_info']       = 'Klick auf den Button "Prüfe ni. verlinkte Artikel" prüft auf eBay nicht verlinkte Artikel. Der Vorgang kann länger dauern wenn es viele produkte auf eBay gibt';
$_['lang_text_loading_items']       = 'Lade Produkte';

// Tables
$_['lang_column_action']            = 'Aktion';
$_['lang_column_status']            = 'Status';
$_['lang_column_variants']          = 'Varianten';
$_['lang_column_itemId']            = 'eBay Art.Nr.';
$_['lang_column_product']           = 'Produkt';
$_['lang_column_product_auto']      = 'Produkt<span class="help">(Autovervollständigung nach Name)</span>';
$_['lang_column_stock_available']   = 'Lagerstand lokal<span class="help">Verfügbar für Verkauf</span>';
$_['lang_column_listing_title']     = 'Überschrift<span class="help">Überschrift bei eBay</span>';
$_['lang_column_allocated']         = 'Lagerstand Rückstellung<span class="help">Verkauft, aber noch nicht bezahlt</span>';
$_['lang_column_ebay_stock']        = 'eBay Lagerstand';
$_['lang_column_stock_reserve']   	= 'Lagerstand Reserve';

// Filter
$_['lang_filter']             		= 'Filterergebnisse';
$_['lang_filter_title']             = 'Titel';
$_['lang_filter_range']             = 'Lagerverteilung';
$_['lang_filter_var']             	= 'Inkl. Varianten';
?>