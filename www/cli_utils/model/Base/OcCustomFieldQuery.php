<?php

namespace Base;

use \OcCustomField as ChildOcCustomField;
use \OcCustomFieldQuery as ChildOcCustomFieldQuery;
use \Exception;
use \PDO;
use Map\OcCustomFieldTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_custom_field' table.
 *
 *
 *
 * @method     ChildOcCustomFieldQuery orderByCustomFieldId($order = Criteria::ASC) Order by the custom_field_id column
 * @method     ChildOcCustomFieldQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOcCustomFieldQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildOcCustomFieldQuery orderByValidation($order = Criteria::ASC) Order by the validation column
 * @method     ChildOcCustomFieldQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ChildOcCustomFieldQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCustomFieldQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcCustomFieldQuery groupByCustomFieldId() Group by the custom_field_id column
 * @method     ChildOcCustomFieldQuery groupByType() Group by the type column
 * @method     ChildOcCustomFieldQuery groupByValue() Group by the value column
 * @method     ChildOcCustomFieldQuery groupByValidation() Group by the validation column
 * @method     ChildOcCustomFieldQuery groupByLocation() Group by the location column
 * @method     ChildOcCustomFieldQuery groupByStatus() Group by the status column
 * @method     ChildOcCustomFieldQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcCustomFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomFieldQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomFieldQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomFieldQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomField findOne(ConnectionInterface $con = null) Return the first ChildOcCustomField matching the query
 * @method     ChildOcCustomField findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomField matching the query, or a new ChildOcCustomField object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomField findOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomField filtered by the custom_field_id column
 * @method     ChildOcCustomField findOneByType(string $type) Return the first ChildOcCustomField filtered by the type column
 * @method     ChildOcCustomField findOneByValue(string $value) Return the first ChildOcCustomField filtered by the value column
 * @method     ChildOcCustomField findOneByValidation(string $validation) Return the first ChildOcCustomField filtered by the validation column
 * @method     ChildOcCustomField findOneByLocation(string $location) Return the first ChildOcCustomField filtered by the location column
 * @method     ChildOcCustomField findOneByStatus(boolean $status) Return the first ChildOcCustomField filtered by the status column
 * @method     ChildOcCustomField findOneBySortOrder(int $sort_order) Return the first ChildOcCustomField filtered by the sort_order column *

 * @method     ChildOcCustomField requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomField by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomField matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomField requireOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomField filtered by the custom_field_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneByType(string $type) Return the first ChildOcCustomField filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneByValue(string $value) Return the first ChildOcCustomField filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneByValidation(string $validation) Return the first ChildOcCustomField filtered by the validation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneByLocation(string $location) Return the first ChildOcCustomField filtered by the location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneByStatus(boolean $status) Return the first ChildOcCustomField filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomField requireOneBySortOrder(int $sort_order) Return the first ChildOcCustomField filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomField[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomField objects based on current ModelCriteria
 * @method     ChildOcCustomField[]|ObjectCollection findByCustomFieldId(int $custom_field_id) Return ChildOcCustomField objects filtered by the custom_field_id column
 * @method     ChildOcCustomField[]|ObjectCollection findByType(string $type) Return ChildOcCustomField objects filtered by the type column
 * @method     ChildOcCustomField[]|ObjectCollection findByValue(string $value) Return ChildOcCustomField objects filtered by the value column
 * @method     ChildOcCustomField[]|ObjectCollection findByValidation(string $validation) Return ChildOcCustomField objects filtered by the validation column
 * @method     ChildOcCustomField[]|ObjectCollection findByLocation(string $location) Return ChildOcCustomField objects filtered by the location column
 * @method     ChildOcCustomField[]|ObjectCollection findByStatus(boolean $status) Return ChildOcCustomField objects filtered by the status column
 * @method     ChildOcCustomField[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcCustomField objects filtered by the sort_order column
 * @method     ChildOcCustomField[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomFieldQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomFieldQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomField', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomFieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomFieldQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomFieldQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomFieldQuery();
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
     * @return ChildOcCustomField|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomFieldTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomFieldTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomField A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT custom_field_id, type, value, validation, location, status, sort_order FROM oc_custom_field WHERE custom_field_id = :p0';
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
            /** @var ChildOcCustomField $obj */
            $obj = new ChildOcCustomField();
            $obj->hydrate($row);
            OcCustomFieldTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomField|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the custom_field_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomFieldId(1234); // WHERE custom_field_id = 1234
     * $query->filterByCustomFieldId(array(12, 34)); // WHERE custom_field_id IN (12, 34)
     * $query->filterByCustomFieldId(array('min' => 12)); // WHERE custom_field_id > 12
     * </code>
     *
     * @param     mixed $customFieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByCustomFieldId($customFieldId = null, $comparison = null)
    {
        if (is_array($customFieldId)) {
            $useMinMax = false;
            if (isset($customFieldId['min'])) {
                $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customFieldId['max'])) {
                $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $customFieldId, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%', Criteria::LIKE); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the validation column
     *
     * Example usage:
     * <code>
     * $query->filterByValidation('fooValue');   // WHERE validation = 'fooValue'
     * $query->filterByValidation('%fooValue%', Criteria::LIKE); // WHERE validation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $validation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByValidation($validation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($validation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_VALIDATION, $validation, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%', Criteria::LIKE); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_LOCATION, $location, $comparison);
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
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the sort_order column
     *
     * Example usage:
     * <code>
     * $query->filterBySortOrder(1234); // WHERE sort_order = 1234
     * $query->filterBySortOrder(array(12, 34)); // WHERE sort_order IN (12, 34)
     * $query->filterBySortOrder(array('min' => 12)); // WHERE sort_order > 12
     * </code>
     *
     * @param     mixed $sortOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcCustomFieldTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcCustomFieldTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomField $ocCustomField Object to remove from the list of results
     *
     * @return $this|ChildOcCustomFieldQuery The current query, for fluid interface
     */
    public function prune($ocCustomField = null)
    {
        if ($ocCustomField) {
            $this->addUsingAlias(OcCustomFieldTableMap::COL_CUSTOM_FIELD_ID, $ocCustomField->getCustomFieldId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_custom_field table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomFieldTableMap::clearInstancePool();
            OcCustomFieldTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomFieldTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomFieldTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomFieldTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomFieldQuery
