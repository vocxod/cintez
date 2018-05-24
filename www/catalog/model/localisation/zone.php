<?php
class ModelLocalisationZone extends Model {
	public function getZone($code) {
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT * FROM " . DB_PREFIX . "zone WHERE code = '" . $code . "' AND status = '1'";
		$query = $this->db->query( $sSqlSelect );
		//var_dump( $sSqlSelect );
		return $query->row;
	}

	public function getZonesByCountryId($country_id) {
		$zone_data = $this->cache->get('zone.' . (int)$country_id);
		$iLanguageId = (int)$this->config->get('config_language_id');
		if (!$zone_data) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone WHERE country_id = '" . (int)$country_id . "' AND status = '1' ORDER BY name");

			$zone_data = $query->rows;

			$this->cache->set('zone.' . (int)$country_id, $zone_data);
		}

		return $zone_data;
	}
}