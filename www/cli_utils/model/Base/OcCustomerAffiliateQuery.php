<?php

namespace Base;

use \OcCustomerAffiliate as ChildOcCustomerAffiliate;
use \OcCustomerAffiliateQuery as ChildOcCustomerAffiliateQuery;
use \Exception;
use \PDO;
use Map\OcCustomerAffiliateTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer_affiliate' table.
 *
 *
 *
 * @method     ChildOcCustomerAffiliateQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOcCustomerAffiliateQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildOcCustomerAffiliateQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method     ChildOcCustomerAffiliateQuery orderByTracking($order = Criteria::ASC) Order by the tracking column
 * @method     ChildOcCustomerAffiliateQuery orderByCommission($order = Criteria::ASC) Order by the commission column
 * @method     ChildOcCustomerAffiliateQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildOcCustomerAffiliateQuery orderByPayment($order = Criteria::ASC) Order by the payment column
 * @method     ChildOcCustomerAffiliateQuery orderByCheque($order = Criteria::ASC) Order by the cheque column
 * @method     ChildOcCustomerAffiliateQuery orderByPaypal($order = Criteria::ASC) Order by the paypal column
 * @method     ChildOcCustomerAffiliateQuery orderByBankName($order = Criteria::ASC) Order by the bank_name column
 * @method     ChildOcCustomerAffiliateQuery orderByBankBranchNumber($order = Criteria::ASC) Order by the bank_branch_number column
 * @method     ChildOcCustomerAffiliateQuery orderByBankSwiftCode($order = Criteria::ASC) Order by the bank_swift_code column
 * @method     ChildOcCustomerAffiliateQuery orderByBankAccountName($order = Criteria::ASC) Order by the bank_account_name column
 * @method     ChildOcCustomerAffiliateQuery orderByBankAccountNumber($order = Criteria::ASC) Order by the bank_account_number column
 * @method     ChildOcCustomerAffiliateQuery orderByCustomField($order = Criteria::ASC) Order by the custom_field column
 * @method     ChildOcCustomerAffiliateQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCustomerAffiliateQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcCustomerAffiliateQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOcCustomerAffiliateQuery groupByCompany() Group by the company column
 * @method     ChildOcCustomerAffiliateQuery groupByWebsite() Group by the website column
 * @method     ChildOcCustomerAffiliateQuery groupByTracking() Group by the tracking column
 * @method     ChildOcCustomerAffiliateQuery groupByCommission() Group by the commission column
 * @method     ChildOcCustomerAffiliateQuery groupByTax() Group by the tax column
 * @method     ChildOcCustomerAffiliateQuery groupByPayment() Group by the payment column
 * @method     ChildOcCustomerAffiliateQuery groupByCheque() Group by the cheque column
 * @method     ChildOcCustomerAffiliateQuery groupByPaypal() Group by the paypal column
 * @method     ChildOcCustomerAffiliateQuery groupByBankName() Group by the bank_name column
 * @method     ChildOcCustomerAffiliateQuery groupByBankBranchNumber() Group by the bank_branch_number column
 * @method     ChildOcCustomerAffiliateQuery groupByBankSwiftCode() Group by the bank_swift_code column
 * @method     ChildOcCustomerAffiliateQuery groupByBankAccountName() Group by the bank_account_name column
 * @method     ChildOcCustomerAffiliateQuery groupByBankAccountNumber() Group by the bank_account_number column
 * @method     ChildOcCustomerAffiliateQuery groupByCustomField() Group by the custom_field column
 * @method     ChildOcCustomerAffiliateQuery groupByStatus() Group by the status column
 * @method     ChildOcCustomerAffiliateQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcCustomerAffiliateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerAffiliateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerAffiliateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerAffiliateQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerAffiliateQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerAffiliateQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomerAffiliate findOne(ConnectionInterface $con = null) Return the first ChildOcCustomerAffiliate matching the query
 * @method     ChildOcCustomerAffiliate findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomerAffiliate matching the query, or a new ChildOcCustomerAffiliate object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomerAffiliate findOneByCustomerId(int $customer_id) Return the first ChildOcCustomerAffiliate filtered by the customer_id column
 * @method     ChildOcCustomerAffiliate findOneByCompany(string $company) Return the first ChildOcCustomerAffiliate filtered by the company column
 * @method     ChildOcCustomerAffiliate findOneByWebsite(string $website) Return the first ChildOcCustomerAffiliate filtered by the website column
 * @method     ChildOcCustomerAffiliate findOneByTracking(string $tracking) Return the first ChildOcCustomerAffiliate filtered by the tracking column
 * @method     ChildOcCustomerAffiliate findOneByCommission(string $commission) Return the first ChildOcCustomerAffiliate filtered by the commission column
 * @method     ChildOcCustomerAffiliate findOneByTax(string $tax) Return the first ChildOcCustomerAffiliate filtered by the tax column
 * @method     ChildOcCustomerAffiliate findOneByPayment(string $payment) Return the first ChildOcCustomerAffiliate filtered by the payment column
 * @method     ChildOcCustomerAffiliate findOneByCheque(string $cheque) Return the first ChildOcCustomerAffiliate filtered by the cheque column
 * @method     ChildOcCustomerAffiliate findOneByPaypal(string $paypal) Return the first ChildOcCustomerAffiliate filtered by the paypal column
 * @method     ChildOcCustomerAffiliate findOneByBankName(string $bank_name) Return the first ChildOcCustomerAffiliate filtered by the bank_name column
 * @method     ChildOcCustomerAffiliate findOneByBankBranchNumber(string $bank_branch_number) Return the first ChildOcCustomerAffiliate filtered by the bank_branch_number column
 * @method     ChildOcCustomerAffiliate findOneByBankSwiftCode(string $bank_swift_code) Return the first ChildOcCustomerAffiliate filtered by the bank_swift_code column
 * @method     ChildOcCustomerAffiliate findOneByBankAccountName(string $bank_account_name) Return the first ChildOcCustomerAffiliate filtered by the bank_account_name column
 * @method     ChildOcCustomerAffiliate findOneByBankAccountNumber(string $bank_account_number) Return the first ChildOcCustomerAffiliate filtered by the bank_account_number column
 * @method     ChildOcCustomerAffiliate findOneByCustomField(string $custom_field) Return the first ChildOcCustomerAffiliate filtered by the custom_field column
 * @method     ChildOcCustomerAffiliate findOneByStatus(boolean $status) Return the first ChildOcCustomerAffiliate filtered by the status column
 * @method     ChildOcCustomerAffiliate findOneByDateAdded(string $date_added) Return the first ChildOcCustomerAffiliate filtered by the date_added column *

 * @method     ChildOcCustomerAffiliate requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomerAffiliate by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomerAffiliate matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerAffiliate requireOneByCustomerId(int $customer_id) Return the first ChildOcCustomerAffiliate filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByCompany(string $company) Return the first ChildOcCustomerAffiliate filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByWebsite(string $website) Return the first ChildOcCustomerAffiliate filtered by the website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByTracking(string $tracking) Return the first ChildOcCustomerAffiliate filtered by the tracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByCommission(string $commission) Return the first ChildOcCustomerAffiliate filtered by the commission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByTax(string $tax) Return the first ChildOcCustomerAffiliate filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByPayment(string $payment) Return the first ChildOcCustomerAffiliate filtered by the payment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByCheque(string $cheque) Return the first ChildOcCustomerAffiliate filtered by the cheque column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByPaypal(string $paypal) Return the first ChildOcCustomerAffiliate filtered by the paypal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByBankName(string $bank_name) Return the first ChildOcCustomerAffiliate filtered by the bank_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByBankBranchNumber(string $bank_branch_number) Return the first ChildOcCustomerAffiliate filtered by the bank_branch_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByBankSwiftCode(string $bank_swift_code) Return the first ChildOcCustomerAffiliate filtered by the bank_swift_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByBankAccountName(string $bank_account_name) Return the first ChildOcCustomerAffiliate filtered by the bank_account_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByBankAccountNumber(string $bank_account_number) Return the first ChildOcCustomerAffiliate filtered by the bank_account_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByCustomField(string $custom_field) Return the first ChildOcCustomerAffiliate filtered by the custom_field column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByStatus(boolean $status) Return the first ChildOcCustomerAffiliate filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerAffiliate requireOneByDateAdded(string $date_added) Return the first ChildOcCustomerAffiliate filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomerAffiliate objects based on current ModelCriteria
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByCustomerId(int $customer_id) Return ChildOcCustomerAffiliate objects filtered by the customer_id column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByCompany(string $company) Return ChildOcCustomerAffiliate objects filtered by the company column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByWebsite(string $website) Return ChildOcCustomerAffiliate objects filtered by the website column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByTracking(string $tracking) Return ChildOcCustomerAffiliate objects filtered by the tracking column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByCommission(string $commission) Return ChildOcCustomerAffiliate objects filtered by the commission column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByTax(string $tax) Return ChildOcCustomerAffiliate objects filtered by the tax column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByPayment(string $payment) Return ChildOcCustomerAffiliate objects filtered by the payment column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByCheque(string $cheque) Return ChildOcCustomerAffiliate objects filtered by the cheque column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByPaypal(string $paypal) Return ChildOcCustomerAffiliate objects filtered by the paypal column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByBankName(string $bank_name) Return ChildOcCustomerAffiliate objects filtered by the bank_name column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByBankBranchNumber(string $bank_branch_number) Return ChildOcCustomerAffiliate objects filtered by the bank_branch_number column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByBankSwiftCode(string $bank_swift_code) Return ChildOcCustomerAffiliate objects filtered by the bank_swift_code column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByBankAccountName(string $bank_account_name) Return ChildOcCustomerAffiliate objects filtered by the bank_account_name column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByBankAccountNumber(string $bank_account_number) Return ChildOcCustomerAffiliate objects filtered by the bank_account_number column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByCustomField(string $custom_field) Return ChildOcCustomerAffiliate objects filtered by the custom_field column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCustomerAffiliate objects filtered by the status column
 * @method     ChildOcCustomerAffiliate[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCustomerAffiliate objects filtered by the date_added column
 * @method     ChildOcCustomerAffiliate[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerAffiliateQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerAffiliateQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomerAffiliate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerAffiliateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerAffiliateQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerAffiliateQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerAffiliateQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcCustomerAffiliate|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerAffiliateTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOcCustomerAffiliate A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_id, company, website, tracking, commission, tax, payment, cheque, paypal, bank_name, bank_branch_number, bank_swift_code, bank_account_name, bank_account_number, custom_field, status, date_added FROM oc_customer_affiliate WHERE customer_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcCustomerAffiliate $obj */
            $obj = new ChildOcCustomerAffiliate();
            $obj->hydrate($row);
            OcCustomerAffiliateTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOcCustomerAffiliate|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%', Criteria::LIKE); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%', Criteria::LIKE); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the tracking column
     *
     * Example usage:
     * <code>
     * $query->filterByTracking('fooValue');   // WHERE tracking = 'fooValue'
     * $query->filterByTracking('%fooValue%', Criteria::LIKE); // WHERE tracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tracking The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByTracking($tracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tracking)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_TRACKING, $tracking, $comparison);
    }

    /**
     * Filter the query on the commission column
     *
     * Example usage:
     * <code>
     * $query->filterByCommission(1234); // WHERE commission = 1234
     * $query->filterByCommission(array(12, 34)); // WHERE commission IN (12, 34)
     * $query->filterByCommission(array('min' => 12)); // WHERE commission > 12
     * </code>
     *
     * @param     mixed $commission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByCommission($commission = null, $comparison = null)
    {
        if (is_array($commission)) {
            $useMinMax = false;
            if (isset($commission['min'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_COMMISSION, $commission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commission['max'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_COMMISSION, $commission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_COMMISSION, $commission, $comparison);
    }

    /**
     * Filter the query on the tax column
     *
     * Example usage:
     * <code>
     * $query->filterByTax('fooValue');   // WHERE tax = 'fooValue'
     * $query->filterByTax('%fooValue%', Criteria::LIKE); // WHERE tax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByTax($tax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_TAX, $tax, $comparison);
    }

    /**
     * Filter the query on the payment column
     *
     * Example usage:
     * <code>
     * $query->filterByPayment('fooValue');   // WHERE payment = 'fooValue'
     * $query->filterByPayment('%fooValue%', Criteria::LIKE); // WHERE payment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByPayment($payment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_PAYMENT, $payment, $comparison);
    }

    /**
     * Filter the query on the cheque column
     *
     * Example usage:
     * <code>
     * $query->filterByCheque('fooValue');   // WHERE cheque = 'fooValue'
     * $query->filterByCheque('%fooValue%', Criteria::LIKE); // WHERE cheque LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cheque The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByCheque($cheque = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cheque)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CHEQUE, $cheque, $comparison);
    }

    /**
     * Filter the query on the paypal column
     *
     * Example usage:
     * <code>
     * $query->filterByPaypal('fooValue');   // WHERE paypal = 'fooValue'
     * $query->filterByPaypal('%fooValue%', Criteria::LIKE); // WHERE paypal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paypal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByPaypal($paypal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paypal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_PAYPAL, $paypal, $comparison);
    }

    /**
     * Filter the query on the bank_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBankName('fooValue');   // WHERE bank_name = 'fooValue'
     * $query->filterByBankName('%fooValue%', Criteria::LIKE); // WHERE bank_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByBankName($bankName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_BANK_NAME, $bankName, $comparison);
    }

    /**
     * Filter the query on the bank_branch_number column
     *
     * Example usage:
     * <code>
     * $query->filterByBankBranchNumber('fooValue');   // WHERE bank_branch_number = 'fooValue'
     * $query->filterByBankBranchNumber('%fooValue%', Criteria::LIKE); // WHERE bank_branch_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankBranchNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByBankBranchNumber($bankBranchNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankBranchNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_BANK_BRANCH_NUMBER, $bankBranchNumber, $comparison);
    }

    /**
     * Filter the query on the bank_swift_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBankSwiftCode('fooValue');   // WHERE bank_swift_code = 'fooValue'
     * $query->filterByBankSwiftCode('%fooValue%', Criteria::LIKE); // WHERE bank_swift_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankSwiftCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByBankSwiftCode($bankSwiftCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankSwiftCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_BANK_SWIFT_CODE, $bankSwiftCode, $comparison);
    }

    /**
     * Filter the query on the bank_account_name column
     *
     * Example usage:
     * <code>
     * $query->filterByBankAccountName('fooValue');   // WHERE bank_account_name = 'fooValue'
     * $query->filterByBankAccountName('%fooValue%', Criteria::LIKE); // WHERE bank_account_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankAccountName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByBankAccountName($bankAccountName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankAccountName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NAME, $bankAccountName, $comparison);
    }

    /**
     * Filter the query on the bank_account_number column
     *
     * Example usage:
     * <code>
     * $query->filterByBankAccountNumber('fooValue');   // WHERE bank_account_number = 'fooValue'
     * $query->filterByBankAccountNumber('%fooValue%', Criteria::LIKE); // WHERE bank_account_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankAccountNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByBankAccountNumber($bankAccountNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankAccountNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_BANK_ACCOUNT_NUMBER, $bankAccountNumber, $comparison);
    }

    /**
     * Filter the query on the custom_field column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomField('fooValue');   // WHERE custom_field = 'fooValue'
     * $query->filterByCustomField('%fooValue%', Criteria::LIKE); // WHERE custom_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customField The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByCustomField($customField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customField)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOM_FIELD, $customField, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomerAffiliate $ocCustomerAffiliate Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerAffiliateQuery The current query, for fluid interface
     */
    public function prune($ocCustomerAffiliate = null)
    {
        if ($ocCustomerAffiliate) {
            $this->addUsingAlias(OcCustomerAffiliateTableMap::COL_CUSTOMER_ID, $ocCustomerAffiliate->getCustomerId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer_affiliate table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerAffiliateTableMap::clearInstancePool();
            OcCustomerAffiliateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerAffiliateTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerAffiliateTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerAffiliateTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerAffiliateTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerAffiliateQuery
