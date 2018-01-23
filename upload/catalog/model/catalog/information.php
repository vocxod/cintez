<?php
class ModelCatalogInformation extends Model {
	public function getInformation($information_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE i.information_id = '" . (int)$information_id . "' AND id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1'");

		return $query->row;
	}

	public function getTopNews( $iOffset = 0, $iLimit = 3 ){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT * FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=1 AND id.language_id='" . $iLanguageId . "' ORDER BY i.information_id DESC LIMIT $iLimit OFFSET $iOffset ";
		//echo $sSqlSelect . "\n"; die();
		$query = $this->db->query( $sSqlSelect );
		//var_dump($query); die();
		return $query->rows;
	}

	public function getHomeNews( $iOffset = 0, $iLimit = 3 ){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT * FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=1 AND i.onhome=1 AND id.language_id='" . $iLanguageId . "' ORDER BY i.date_added DESC LIMIT $iLimit OFFSET $iOffset ";
		//echo $sSqlSelect . "\n"; die();
		$query = $this->db->query( $sSqlSelect );
		//var_dump($query); die();
		return $query->rows;
	}

	public function getNewsCount( ){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT count(*) AS news_count FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=1 AND id.language_id='" . $iLanguageId . "' ORDER BY i.information_id ";
		// echo $sSqlSelect . "\n"; die();
		$query = $this->db->query( $sSqlSelect );
		// var_dump($query->row['NEWS_COUNT']); die();
		$iResult = $query->row['news_count'];
		return $iResult;
	}

	public function getTopArticles( $iOffset, $iLimit = 3 ){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT * FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=0 AND id.language_id='" . $iLanguageId . "' ORDER BY i.information_id DESC LIMIT $iLimit OFFSET $iOffset";
		// echo $sSqlSelect . "\n";
		$query = $this->db->query( $sSqlSelect );
		//var_dump($query); die();
		return $query->rows;
	}	

	public function getArticlesCount(){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT count(*) AS articles_count FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=0 AND id.language_id='" . $iLanguageId . "'";
		// echo $sSqlSelect . "\n";
		$query = $this->db->query( $sSqlSelect );
		$iResult = $query->row['articles_count'];
		//var_dump($query); die();
		return $iResult;
	}

	/* вернуть LIMIT новостей */
	function getNewsList( $iLimit = 20, $iLanguageId = 4 ){
		$iLanguageId = (int)$this->config->get('config_language_id');
		$sSqlSelect = "SELECT * FROM " . DB_PREFIX .  "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) WHERE i.status=1 AND i.isnews=1 AND id.language_id='" . $iLanguageId . "' ORDER BY i.information_id DESC LIMIT " . $iLimit;
		$query = $this->db->query( $sSqlSelect );
		return $query->rows;
	}

	/*
не доделана!
	*/
	public function getInformationByMetaTitle( $sMetaTitle ){
		
		$sSqlSelect = "SELECT DISTINCT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE i.information_id = '" . (int)$information_id . "' AND id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1'";

		$query = $this->db->query( $sSqlSelect );

		return $query->row;
	}

	public function getInformations() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1' ORDER BY i.sort_order, LCASE(id.title) ASC");

		return $query->rows;
	}

	public function getInformationLayoutId($information_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "information_to_layout WHERE information_id = '" . (int)$information_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return (int)$query->row['layout_id'];
		} else {
			return 0;
		}
	}
}