<?php
/**
 * @version		$Id: voucher.php 3535 2014-01-09 10:26:02Z mic $
 * @package		Translation German
 * @author		mic - http://osworx.net
 * @copyright	2013 OSWorX - http://osworx.net
 * @license		GPL - www.gnu.org/copyleft/gpl.html
 */

// Heading
$_['heading_title']     = 'Geschenkgutschein';

// Text
$_['text_send']         = 'Senden';
$_['text_success']      = 'Datensatz erfolgreich geändert!';
$_['text_sent']         = 'Geschenkgutschein Email wurde gesendet!';
$_['text_wait']         = 'Bitte warten!';

// Column
$_['column_name']       = 'Name';
$_['column_code']       = 'Code';
$_['column_from']       = 'Von';
$_['column_to']         = 'An';
$_['column_theme']      = 'Thema';
$_['column_amount']     = 'Betrag';
$_['column_status']     = 'Status';
$_['column_order_id']   = 'Auftragsnummer';
$_['column_customer']   = 'Kunde';
$_['column_date_added'] = 'Erstellt';
$_['column_action']     = 'Aktion';

// Entry
$_['entry_code']        = 'Code<span class="help">Code welcher Kunde eingeben muss um den Gutschein einzulösen</span>';
$_['entry_from_name']   = 'Von Name';
$_['entry_from_email']  = 'Von Email';
$_['entry_to_name']     = 'An Name';
$_['entry_to_email']    = 'An Email';
$_['entry_theme']       = 'Thema';
$_['entry_message']     = 'Nachricht';
$_['entry_amount']      = 'Betrag';
$_['entry_status']      = 'Status';

// Error
$_['error_permission']  = 'Keine Rechte für diese Aktion!';
$_['error_exists']      = 'Achtung: Gutscheincode ist bereits in Verwendung!';
$_['error_code']        = 'Code muss zwischen 3 und 10 Zeichen lang sein!';
$_['error_to_name']     = 'Name des Empfängers muss zwischen 1 und 64 Zeichen lang sein!';
$_['error_from_name']   = 'Eigener Name muss zwischen 1 und 64 Zeichen lang sein!';
$_['error_email']       = 'Emailadresse ist nicht gültig!';
$_['error_amount']      = 'Betrag muss größer oder gleich 1 sein!';
$_['error_order']       = 'Achtung: dieser Gutschein kann nicht gelöscht werden da er Bestandteil eines <a href="%s">Auftrages</a> ist!';
?>