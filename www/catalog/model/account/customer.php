<?php
class ModelAccountCustomer extends Model {

	public function approve( $s_access_token, $s_email, $s_phone, $i_group_id)
	{
		$s_sql_select = "SELECT email, telephone AS phone, customer_group_id AS i_group_id FROM oc_customer WHERE status <> 1 AND email='$s_email' AND telephone='$s_phone' ";
		$s_sql_update = "UPDATE oc_customer SET status=1 WHERE email='$s_email' AND telephone='$s_phone' ";
		if( $s_access_token == md5( "Apple1976" . $s_email . $s_phone ) )
		{
			// активация аккаунта
			$this->db->query( $s_sql_update );
			return 0;
		} else {
			return 2;
		}
/*
		$query = $this->db->query( $s_sql_select );
		foreach ( $query->rows as $item )
		{
		//	var_dump ( $item );
		}
		die( "stop" );
 */
	}

	public function addCustomer($data) {
		if (isset($data['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($data['customer_group_id'], $this->config->get('config_customer_group_display'))) {
			$customer_group_id = $data['customer_group_id'];
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}

		$this->load->model('account/customer_group');

		$customer_group_info = $this->model_account_customer_group->getCustomerGroup($customer_group_id);

		if( (int)$customer_group_id == 2 ){
			$i_customer_status = 0;
		} else {
			$i_customer_status = 1;
		}

		// $this->db->query("INSERT INTO " . DB_PREFIX . "customer SET customer_group_id = '" . (int)$customer_group_id . "', store_id = '" . (int)$this->config->get('config_store_id') . "', language_id = '" . (int)$this->config->get('config_language_id') . "', firstname = '" . $this->db->escape((string)$data['firstname']) . "', lastname = '" . $this->db->escape((string)$data['lastname']) . "', email = '" . $this->db->escape((string)$data['email']) . "', telephone = '" . $this->db->escape((string)$data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "', salt = '', password = '" . $this->db->escape(password_hash($data['password'], PASSWORD_DEFAULT)) . "', newsletter = '" . (isset($data['newsletter']) ? (int)$data['newsletter'] : 0) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', status = '" . (int)!$customer_group_info['approval'] . "', date_added = NOW()");
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer SET customer_group_id = '" . (int)$customer_group_id . "', store_id = '" . (int)$this->config->get('config_store_id') . "', language_id = '" . (int)$this->config->get('config_language_id') . "', firstname = '" . $this->db->escape((string)$data['firstname']) . "', lastname = '" . $this->db->escape((string)$data['lastname']) . "', email = '" . $this->db->escape((string)$data['email']) . "', telephone = '" . $this->db->escape((string)$data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "', salt = '', password = '" . $this->db->escape(password_hash($data['password'], PASSWORD_DEFAULT)) . "', newsletter = '" . (isset($data['newsletter']) ? (int)$data['newsletter'] : 0) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', status = '" . $i_customer_status . "', date_added = NOW()");

		$customer_id = $this->db->getLastId();

		if ($customer_group_info['approval']) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_approval` SET customer_id = '" . (int)$customer_id . "', type = 'customer', date_added = NOW()");
		}
		
		return $customer_id;
	}

	public function editCustomer($customer_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET firstname = '" . $this->db->escape((string)$data['firstname']) . "', lastname = '" . $this->db->escape((string)$data['lastname']) . "', email = '" . $this->db->escape((string)$data['email']) . "', telephone = '" . $this->db->escape((string)$data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']['account']) ? json_encode($data['custom_field']['account']) : '') . "' WHERE customer_id = '" . (int)$customer_id . "'");
	}

	public function editPassword($email, $password) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET salt = '', password = '" . $this->db->escape(password_hash($password, PASSWORD_DEFAULT)) . "', code = '' WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function editAddressId($customer_id, $address_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET address_id = '" . (int)$address_id . "' WHERE customer_id = '" . (int)$customer_id . "'");
	}
	
	public function editCode($email, $code) {
		$this->db->query("UPDATE `" . DB_PREFIX . "customer` SET code = '" . $this->db->escape($code) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function editToken($email, $token) {
		$this->db->query("UPDATE `" . DB_PREFIX . "customer` SET token = '" . $this->db->escape($token) . "' WHERE LCASE(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}

	public function editNewsletter($newsletter) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET newsletter = '" . (int)$newsletter . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
	}

	public function getCustomer($customer_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row;
	}

	public function getCustomerByEmail($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}

	public function getCustomerByCode($code) {
		$query = $this->db->query("SELECT customer_id, firstname, lastname, email FROM `" . DB_PREFIX . "customer` WHERE code = '" . $this->db->escape($code) . "' AND code != ''");

		return $query->row;
	}

	public function getCustomerByToken($token) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE token = '" . $this->db->escape($token) . "' AND token != ''");

		$this->db->query("UPDATE " . DB_PREFIX . "customer SET token = ''");

		return $query->row;
	}
	
	public function getTotalCustomersByEmail($email) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row['total'];
	}

	public function addTransaction($customer_id, $description, $amount = '', $order_id = 0) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_transaction SET customer_id = '" . (int)$customer_id . "', order_id = '" . (float)$order_id . "', description = '" . $this->db->escape($description) . "', amount = '" . (float)$amount . "', date_added = NOW()");
	}

	public function deleteTransactionByOrderId($order_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "customer_transaction WHERE order_id = '" . (int)$order_id . "'");
	}

	public function getTransactionTotal($customer_id) {
		$query = $this->db->query("SELECT SUM(amount) AS total FROM " . DB_PREFIX . "customer_transaction WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row['total'];
	}
	
	public function getTotalTransactionsByOrderId($order_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_transaction WHERE order_id = '" . (int)$order_id . "'");

		return $query->row['total'];
	}
	
	public function getRewardTotal($customer_id) {
		$query = $this->db->query("SELECT SUM(points) AS total FROM " . DB_PREFIX . "customer_reward WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->row['total'];
	}

	public function getIps($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ip` WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->rows;
	}

	public function addLoginAttempt($email) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_login WHERE email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "' AND ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'");

		if (!$query->num_rows) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "customer_login SET email = '" . $this->db->escape(utf8_strtolower((string)$email)) . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', total = 1, date_added = '" . $this->db->escape(date('Y-m-d H:i:s')) . "', date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "customer_login SET total = (total + 1), date_modified = '" . $this->db->escape(date('Y-m-d H:i:s')) . "' WHERE customer_login_id = '" . (int)$query->row['customer_login_id'] . "'");
		}
	}

	public function getLoginAttempts($email) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");

		return $query->row;
	}

	public function deleteLoginAttempts($email) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_login` WHERE email = '" . $this->db->escape(utf8_strtolower($email)) . "'");
	}
	
	public function addAffiliate($customer_id, $data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_affiliate SET `customer_id` = '" . (int)$customer_id . "', `company` = '" . $this->db->escape((string)$data['company']) . "', `website` = '" . $this->db->escape((string)$data['website']) . "', `tracking` = '" . $this->db->escape(token(64)) . "', `commission` = '" . (float)$this->config->get('config_affiliate_commission') . "', `tax` = '" . $this->db->escape((string)$data['tax']) . "', `payment` = '" . $this->db->escape((string)$data['payment']) . "', `cheque` = '" . $this->db->escape((string)$data['cheque']) . "', `paypal` = '" . $this->db->escape((string)$data['paypal']) . "', `bank_name` = '" . $this->db->escape((string)$data['bank_name']) . "', `bank_branch_number` = '" . $this->db->escape((string)$data['bank_branch_number']) . "', `bank_swift_code` = '" . $this->db->escape((string)$data['bank_swift_code']) . "', `bank_account_name` = '" . $this->db->escape((string)$data['bank_account_name']) . "', `bank_account_number` = '" . $this->db->escape((string)$data['bank_account_number']) . "', `status` = '" . (int)!$this->config->get('config_affiliate_approval') . "'");
		
		if ($this->config->get('config_affiliate_approval')) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "customer_approval` SET customer_id = '" . (int)$customer_id . "', type = 'affiliate', date_added = NOW()");
		}		
	}
		
	public function editAffiliate($customer_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer_affiliate SET `company` = '" . $this->db->escape((string)$data['company']) . "', `website` = '" . $this->db->escape((string)$data['website']) . "', `commission` = '" . (float)$this->config->get('config_affiliate_commission') . "', `tax` = '" . $this->db->escape((string)$data['tax']) . "', `payment` = '" . $this->db->escape((string)$data['payment']) . "', `cheque` = '" . $this->db->escape((string)$data['cheque']) . "', `paypal` = '" . $this->db->escape((string)$data['paypal']) . "', `bank_name` = '" . $this->db->escape((string)$data['bank_name']) . "', `bank_branch_number` = '" . $this->db->escape((string)$data['bank_branch_number']) . "', `bank_swift_code` = '" . $this->db->escape((string)$data['bank_swift_code']) . "', `bank_account_name` = '" . $this->db->escape((string)$data['bank_account_name']) . "', `bank_account_number` = '" . $this->db->escape((string)$data['bank_account_number']) . "' WHERE `customer_id` = '" . (int)$customer_id . "'");
	}
	
	public function getAffiliate($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_affiliate` WHERE `customer_id` = '" . (int)$customer_id . "'");

		return $query->row;
	}
	
	public function getAffiliateByTracking($tracking) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_affiliate` WHERE `tracking` = '" . $this->db->escape($tracking) . "'");

		return $query->row;
	}			
}
