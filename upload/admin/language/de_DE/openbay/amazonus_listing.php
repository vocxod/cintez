<?php
/**
 * @version		$Id: amazonus_listing.php 3583 2014-04-11 11:27:28Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2014 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

//Headings
$_['lang_title']			= 'Neue Amazon US Listung';
$_['lang_openbay']			= 'OpenBay Pro';
$_['lang_amazonus']			= 'Amazon US';

//Buttons
$_['button_search']			= 'Suche';
$_['button_new']			= 'Neues Produkt';
$_['button_return']			= 'Zurück zu Produkte';
$_['button_amazonus_price']	= 'Amazon Preis holen';
$_['button_list']			= 'Auf Amazon anzeigen';

//Text
$_['text_view_on_amazonus']	= 'Zeige auf Amazon US';
$_['text_list']				= 'Zeige';
$_['text_new']				= 'Neu';
$_['text_used_like_new']	= 'Gebraucht - wie neu';
$_['text_used_very_good']	= 'Gebraucht - sehr gut';
$_['text_used_good']		= 'Gebraucht - gut';
$_['text_used_acceptable']	= 'Gebraucht - Aktzeptabel';
$_['text_collectible_like_new']		= 'Sammlerstück - wie neu';
$_['text_collectible_very_good']	= 'Sammlerstück - sehr gut';
$_['text_collectible_good']			= 'Sammlerstück - gut';
$_['text_collectible_acceptable']	= 'Sammlerstück - Akzeptabel';
$_['text_refurbished']				= 'Aufbereitet';
$_['text_product_sent']				= 'Produkt erfolgreich an Amazon US gesendet.';
$_['text_product_not_sent']			= 'Produkt konnt nicht an Amazon US gesendet werden, Grund: %s';
$_['lang_no_results']				= 'Keine Ergebnisse';
$_['lang_not_in_catalog']			= 'Oder, wenn es nicht im Katalog ist&nbsp;&nbsp;&nbsp;';

//Table columns
$_['column_image']					= 'Bild';
$_['column_asin']					= 'ASIN';
$_['column_name']					= 'Name';
$_['column_price']					= 'Preis';
$_['column_action']					= 'Aktion';

//Entry
$_['entry_sku']						= 'SKU';
$_['entry_condition']				= 'Zustand';
$_['entry_condition_note']			= 'Anmerkung Zustand';
$_['entry_price']					= 'Preis';
$_['entry_sale_price']				= 'Verkaufspreis';
$_['entry_quantity']				= 'Anzahl';
$_['entry_start_selling']			= 'Verfügbar ab';
$_['entry_restock_date']			= 'Retour in Lager';
$_['entry_country_of_origin']		= 'Herstellerland';
$_['entry_release_date']			= 'Veröffentlicht';
$_['entry_from']					= 'Von';
$_['entry_to']						= 'Bis';

//Form placeholders
$_['lang_placeholder_search']		= 'Produktname, UPC, EAN, ISBN oder ASIN angeben';
$_['lang_placeholder_condition']	= 'Hier eine Beschreibung zum Produktzustand angeben';

//Help
$_['help_sku']						= 'Einmalige Händlerartikelnummer';
$_['help_restock_date']				= 'Datum bis wann Bestellrückstand ausgeliefert wird. Sollte nicht mehr als 20 tage betragen da anonsten automatisch storniert wird';
$_['help_sale_price']				= 'Verkaufspreis muss Von &amp; Bis Datum haben';

//Errors
$_['error_text_missing']			= 'Suchbegriff(e) fehlen';
$_['error_data_missing']			= 'Erforderliche Angaben fehlen';
$_['error_missing_asin']			= 'ASIN fehlt';
$_['error_marketplace_missing']		= 'Bitte einen Markplatz auswählen';
$_['error_condition_missing']		= 'Zustand fehlt';
$_['error_fetch']					= 'Daten konnten nicht geholt werden';
$_['error_amazonus_price']			= 'Preis von Amazon US konnte nicht geholt werden';
$_['error_stock']					= 'Es kann kein Produkt mit weniger als 1 Stück am Lager gelistet werden';
$_['error_sku']						= 'SKU fehlt';
$_['error_price']					= 'Preis fehlt';

//Tabs
$_['tab_required_info']				= 'Erforderliche Infos';
$_['tab_additional_info']			= 'Weitere Angaben';

//Tab headers
$_['item_links_header_text']		= 'Produktlinks';
$_['quick_listing_header_text']		= 'Schnelllistung';
$_['advanced_listing_header_text']	= 'Erweiterte Listung';
$_['saved_header_text']				= 'Gespeicherte Listungen';
$_['lang_tab_main']					= 'Übersicht';

//Tabs
$_['item_links_tab_text']			= 'Produktlinks';
$_['quick_listing_tab_text']		= 'Schnelllistung';
$_['advanced_listing_tab_text']		= 'Erweiterte Listung';
$_['saved_tab_text']				= 'Gespeicherte Listungen';

//Errors
$_['text_error_connecting']			= 'Achtung: keine Verbindung zu API Server möglich! Besteht Problem weiterhin, bitte Support von Welford Media kontaktieren.';

// Quick/advanced listing tabs
$_['quick_listing_description']		= 'Diese Methode anwenden wenn Produkt bereits bei Amzon gelistet ist. Ergebnisse werden nach ASIN, ISBN, UPS, EAN gesucht';
$_['advanced_listing_description']	= 'Diese Methode anwenden um neue Produkt  bei Amazon zu listen';
$_['listing_row_text']				= 'Listung für Produkt';
$_['already_saved_text']			= 'Produkt bereits in gespeicherter Listung enthalten, klicken um zu überprüfen';
$_['save_button_text']				= 'Sichern';
$_['save_upload_button_text']		= 'Sichern &amp; Hochladen';
$_['saved_listings_button_text']	= 'Zeige gespeicherte Listungen';
$_['cancel_button_text']			= 'Abbrechen';
$_['field_required_text']			= 'Feld ist erforderlich!';
$_['not_saved_text']				= 'Listung nicht gesichert, Angaben überprüfen.';
$_['chars_over_limit_text']			= 'Zeichen zuviel';
$_['minimum_length_text']			= 'Mindestlänge ist';
$_['characters_text']				= 'Zeichen';
$_['delete_confirm_text']			= 'Sicher löschen?';
$_['clear_image_text']				= 'Löschen';
$_['browse_image_text']				= 'Suchen';
$_['category_selector_field_text']	= 'Amazonkategorie';

//Item links tab
$_['item_links_description']		= 'Hier können bereits vorhandene Amazonprodukte erstellt bzw. bearbeitet werden ohne sie im lokalen Shop zu haben.<br />Erlaubt Lagerstandskontrolle zwischen aktivierten Marktplätzen.<br />Ist OpenStock installiert kann eine Verlinkung mit Amazon-SKUs erfolgen.<br />Produkte hochladen zu Amazon verlinkt automatisch';
$_['new_link_table_name']			= 'Neuer Link';
$_['new_link_product_column']		= 'Produkt';
$_['new_link_sku_column']			= 'SKU';
$_['new_link_amazonus_sku_column']	= 'Amazon SKU';
$_['new_link_action_column']		= 'Aktion';
$_['item_links_table_name']			= 'Produktlinks';

//Market places
$_['marketplaces_field_text']		= 'Marktplatz';
$_['marketplaces_help']				= 'Standardmarktplatz kann in den Amazoneinstellungen definiert werden';
$_['text_germany']					= 'Deutschland';
$_['text_france']					= 'Frankreich';
$_['text_italy']					= 'Italien';
$_['text_spain']					= 'Spanien';
$_['text_united_kingdom']			= 'Grossbritannien';

//Saved listings tab
$_['saved_listings_description']	= 'Übersicht aller lokal gespeicherten Listungen - klicken um zu Amazon hochzuladen';
$_['actions_edit_text']				= 'Bearbeiten';
$_['actions_remove_text']			= 'Entfernen';
$_['upload_button_text']			= 'Upload';
$_['name_column_text']				= 'Name';
$_['model_column_text']				= 'Art.Nr.';
$_['sku_column_text']				= 'SKU';
$_['amazonus_sku_column_text']		= 'Amazon SKU';
$_['actions_column_text']			= 'Aktion';
$_['saved_localy_text']				= 'Listung lokal gespeichert';
$_['uploaded_alert_text']			= 'Listung(en) hochgeladen';
$_['upload_failed']					= 'Produkt mit SKU [ %s ] konnte nicht hochgeladen werden, Grund [ %s ]. Hochladen abgebrochen';

//Item links
$_['links_header_text']				= 'Produkte verlinken';
$_['links_desc1_text']				= 'Verlinkte Produkte erlauben den Abgleich des Lagerstands bei Amazon mit dem Lokalen';
$_['links_desc2_text']				= 'Produkte können entweder manuell verlinkt werden (Amazonname und SKU angeben) oder alle nicht verlinkten Produkte laden.<br />Hochladen zu Amazon verlinkt automatisch';
$_['links_load_btn_text']			= 'Laden';
$_['links_new_link_text']			= 'Neuer Link';
$_['links_autocomplete_product_text'] = 'Produkt<span class="help">(Autovervollständigung Name)</span>';
$_['links_amazonus_sku_text']		= 'Amazon SKU';
$_['links_action_text']				= 'Aktion';
$_['links_add_text']				= 'Neu';
$_['links_add_sku_tooltip']			= 'Neue SKU hinzufügen';
$_['links_remove_text']				= 'Entfernen';
$_['links_linked_items_text']		= 'Verlinkte Produkte';
$_['links_unlinked_items_text']		= 'Ni. verlinkte Produkte';
$_['links_name_text']				= 'Name';
$_['links_model_text']				= 'Artnr.';
$_['links_sku_text']				= 'SKU';
$_['links_amazonus_sku_text']		= 'Amazon SKU';
$_['links_sku_empty_warning']		= 'Amazon SKU fehlt!';
$_['links_name_empty_warning']		= 'Produktname fehlt!';
$_['links_product_warning']			= 'Produkt nicht vorhanden - bitte Autovervollständigung verwenden.';
$_['option_default']				= '-- Bitte wählen --';
$_['lang_error_load_nodes']			= 'Kann Nodes nicht laden';
$_['error_not_searched']			= 'Suche nach Produkt vor Listung - Produkt muss im Amazonkatalog vorhanden sein';

//Listing edit page
$_['text_edit_heading']				= 'Übersicht Listungen';
$_['text_has_saved_listings']		= 'Das Produkt hat eine oder mehrere lokal gespeicherte Listungen';
$_['text_product_links']			= 'Produktlinks';
$_['button_create_new_listing']		= 'Neue Listung';
$_['button_remove_links']			= 'Entferne Links';
$_['button_saved_listings']			= 'Zeige gespeicherte Listungen';
$_['column_name']					= 'Produktname';
$_['column_model']					= 'Art.Nr.';
$_['column_combination']			= 'Kombination';
$_['column_sku']					= 'SKU';
$_['column_amazonus_sku']			= 'Amazon SKU';

//Messages
$_['text_links_removed']			= 'Amazon Produktlinks gelöscht';
?>