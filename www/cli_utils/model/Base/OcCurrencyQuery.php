<?php

namespace Base;

use \OcCurrency as ChildOcCurrency;
use \OcCurrencyQuery as ChildOcCurrencyQuery;
use \Exception;
use \PDO;
use Map\OcCurrencyTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_currency' table.
 *
 *
 *
 * @method     ChildOcCurrencyQuery orderByCurrencyId($order = Criteria::ASC) Order by the currency_id column
 * @method     ChildOcCurrencyQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOcCurrencyQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcCurrencyQuery orderBySymbolLeft($order = Criteria::ASC) Order by the symbol_left column
 * @method     ChildOcCurrencyQuery orderBySymbolRight($order = Criteria::ASC) Order by the symbol_right column
 * @method     ChildOcCurrencyQuery orderByDecimalPlace($order = Criteria::ASC) Order by the decimal_place column
 * @method     ChildOcCurrencyQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildOcCurrencyQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCurrencyQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 *
 * @method     ChildOcCurrencyQuery groupByCurrencyId() Group by the currency_id column
 * @method     ChildOcCurrencyQuery groupByTitle() Group by the title column
 * @method     ChildOcCurrencyQuery groupByCode() Group by the code column
 * @method     ChildOcCurrencyQuery groupBySymbolLeft() Group by the symbol_left column
 * @method     ChildOcCurrencyQuery groupBySymbolRight() Group by the symbol_right column
 * @method     ChildOcCurrencyQuery groupByDecimalPlace() Group by the decimal_place column
 * @method     ChildOcCurrencyQuery groupByValue() Group by the value column
 * @method     ChildOcCurrencyQuery groupByStatus() Group by the status column
 * @method     ChildOcCurrencyQuery groupByDateModified() Group by the date_modified column
 *
 * @method     ChildOcCurrencyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCurrencyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCurrencyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCurrencyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCurrencyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCurrencyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCurrency findOne(ConnectionInterface $con = null) Return the first ChildOcCurrency matching the query
 * @method     ChildOcCurrency findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCurrency matching the query, or a new ChildOcCurrency object populated from the query conditions when no match is found
 *
 * @method     ChildOcCurrency findOneByCurrencyId(int $currency_id) Return the first ChildOcCurrency filtered by the currency_id column
 * @method     ChildOcCurrency findOneByTitle(string $title) Return the first ChildOcCurrency filtered by the title column
 * @method     ChildOcCurrency findOneByCode(string $code) Return the first ChildOcCurrency filtered by the code column
 * @method     ChildOcCurrency findOneBySymbolLeft(string $symbol_left) Return the first ChildOcCurrency filtered by the symbol_left column
 * @method     ChildOcCurrency findOneBySymbolRight(string $symbol_right) Return the first ChildOcCurrency filtered by the symbol_right column
 * @method     ChildOcCurrency findOneByDecimalPlace(string $decimal_place) Return the first ChildOcCurrency filtered by the decimal_place column
 * @method     ChildOcCurrency findOneByValue(double $value) Return the first ChildOcCurrency filtered by the value column
 * @method     ChildOcCurrency findOneByStatus(boolean $status) Return the first ChildOcCurrency filtered by the status column
 * @method     ChildOcCurrency findOneByDateModified(string $date_modified) Return the first ChildOcCurrency filtered by the date_modified column *

 * @method     ChildOcCurrency requirePk($key, ConnectionInterface $con = null) Return the ChildOcCurrency by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOne(ConnectionInterface $con = null) Return the first ChildOcCurrency matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCurrency requireOneByCurrencyId(int $currency_id) Return the first ChildOcCurrency filtered by the currency_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByTitle(string $title) Return the first ChildOcCurrency filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByCode(string $code) Return the first ChildOcCurrency filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneBySymbolLeft(string $symbol_left) Return the first ChildOcCurrency filtered by the symbol_left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneBySymbolRight(string $symbol_right) Return the first ChildOcCurrency filtered by the symbol_right column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByDecimalPlace(string $decimal_place) Return the first ChildOcCurrency filtered by the decimal_place column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByValue(double $value) Return the first ChildOcCurrency filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByStatus(boolean $status) Return the first ChildOcCurrency filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCurrency requireOneByDateModified(string $date_modified) Return the first ChildOcCurrency filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCurrency[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCurrency objects based on current ModelCriteria
 * @method     ChildOcCurrency[]|ObjectCollection findByCurrencyId(int $currency_id) Return ChildOcCurrency objects filtered by the currency_id column
 * @method     ChildOcCurrency[]|ObjectCollection findByTitle(string $title) Return ChildOcCurrency objects filtered by the title column
 * @method     ChildOcCurrency[]|ObjectCollection findByCode(string $code) Return ChildOcCurrency objects filtered by the code column
 * @method     ChildOcCurrency[]|ObjectCollection findBySymbolLeft(string $symbol_left) Return ChildOcCurrency objects filtered by the symbol_left column
 * @method     ChildOcCurrency[]|ObjectCollection findBySymbolRight(string $symbol_right) Return ChildOcCurrency objects filtered by the symbol_right column
 * @method     ChildOcCurrency[]|ObjectCollection findByDecimalPlace(string $decimal_place) Return ChildOcCurrency objects filtered by the decimal_place column
 * @method     ChildOcCurrency[]|ObjectCollection findByValue(double $value) Return ChildOcCurrency objects filtered by the value column
 * @method     ChildOcCurrency[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCurrency objects filtered by the status column
 * @method     ChildOcCurrency[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcCurrency objects filtered by the date_modified column
 * @method     ChildOcCurrency[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCurrencyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCurrencyQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCurrency', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCurrencyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCurrencyQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCurrencyQuery) {
            return $criteria;
        }
        $query = new ChildOcCurrencyQuery();
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
     * @return ChildOcCurrency|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCurrencyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCurrencyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCurrency A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT currency_id, title, code, symbol_left, symbol_right, decimal_place, value, status, date_modified FROM oc_currency WHERE currency_id = :p0';
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
            /** @var ChildOcCurrency $obj */
            $obj = new ChildOcCurrency();
            $obj->hydrate($row);
            OcCurrencyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCurrency|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the currency_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyId(1234); // WHERE currency_id = 1234
     * $query->filterByCurrencyId(array(12, 34)); // WHERE currency_id IN (12, 34)
     * $query->filterByCurrencyId(array('min' => 12)); // WHERE currency_id > 12
     * </code>
     *
     * @param     mixed $currencyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByCurrencyId($currencyId = null, $comparison = null)
    {
        if (is_array($currencyId)) {
            $useMinMax = false;
            if (isset($currencyId['min'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $currencyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currencyId['max'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $currencyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $currencyId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the symbol_left column
     *
     * Example usage:
     * <code>
     * $query->filterBySymbolLeft('fooValue');   // WHERE symbol_left = 'fooValue'
     * $query->filterBySymbolLeft('%fooValue%', Criteria::LIKE); // WHERE symbol_left LIKE '%fooValue%'
     * </code>
     *
     * @param     string $symbolLeft The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterBySymbolLeft($symbolLeft = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($symbolLeft)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_SYMBOL_LEFT, $symbolLeft, $comparison);
    }

    /**
     * Filter the query on the symbol_right column
     *
     * Example usage:
     * <code>
     * $query->filterBySymbolRight('fooValue');   // WHERE symbol_right = 'fooValue'
     * $query->filterBySymbolRight('%fooValue%', Criteria::LIKE); // WHERE symbol_right LIKE '%fooValue%'
     * </code>
     *
     * @param     string $symbolRight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterBySymbolRight($symbolRight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($symbolRight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_SYMBOL_RIGHT, $symbolRight, $comparison);
    }

    /**
     * Filter the query on the decimal_place column
     *
     * Example usage:
     * <code>
     * $query->filterByDecimalPlace('fooValue');   // WHERE decimal_place = 'fooValue'
     * $query->filterByDecimalPlace('%fooValue%', Criteria::LIKE); // WHERE decimal_place LIKE '%fooValue%'
     * </code>
     *
     * @param     string $decimalPlace The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByDecimalPlace($decimalPlace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($decimalPlace)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_DECIMAL_PLACE, $decimalPlace, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_VALUE, $value, $comparison);
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
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcCurrencyTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCurrencyTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCurrency $ocCurrency Object to remove from the list of results
     *
     * @return $this|ChildOcCurrencyQuery The current query, for fluid interface
     */
    public function prune($ocCurrency = null)
    {
        if ($ocCurrency) {
            $this->addUsingAlias(OcCurrencyTableMap::COL_CURRENCY_ID, $ocCurrency->getCurrencyId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_currency table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCurrencyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCurrencyTableMap::clearInstancePool();
            OcCurrencyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCurrencyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCurrencyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCurrencyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCurrencyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCurrencyQuery
