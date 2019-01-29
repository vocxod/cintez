<?php

namespace Base;

use \OcCustomFieldValue as ChildOcCustomFieldValue;
use \OcCustomFieldValueQuery as ChildOcCustomFieldValueQuery;
use \Exception;
use \PDO;
use Map\OcCustomFieldValueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_custom_field_value' table.
 *
 *
 *
 * @method     ChildOcCustomFieldValueQuery orderByCustomFieldValueId($order = Criteria::ASC) Order by the custom_field_value_id column
 * @method     ChildOcCustomFieldValueQuery orderByCustomFieldId($order = Criteria::ASC) Order by the custom_field_id column
 * @method     ChildOcCustomFieldValueQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcCustomFieldValueQuery groupByCustomFieldValueId() Group by the custom_field_value_id column
 * @method     ChildOcCustomFieldValueQuery groupByCustomFieldId() Group by the custom_field_id column
 * @method     ChildOcCustomFieldValueQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcCustomFieldValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomFieldValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomFieldValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomFieldValueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomFieldValueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomFieldValueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomFieldValue findOne(ConnectionInterface $con = null) Return the first ChildOcCustomFieldValue matching the query
 * @method     ChildOcCustomFieldValue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomFieldValue matching the query, or a new ChildOcCustomFieldValue object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomFieldValue findOneByCustomFieldValueId(int $custom_field_value_id) Return the first ChildOcCustomFieldValue filtered by the custom_field_value_id column
 * @method     ChildOcCustomFieldValue findOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomFieldValue filtered by the custom_field_id column
 * @method     ChildOcCustomFieldValue findOneBySortOrder(int $sort_order) Return the first ChildOcCustomFieldValue filtered by the sort_order column *

 * @method     ChildOcCustomFieldValue requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomFieldValue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldValue requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomFieldValue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomFieldValue requireOneByCustomFieldValueId(int $custom_field_value_id) Return the first ChildOcCustomFieldValue filtered by the custom_field_value_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldValue requireOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomFieldValue filtered by the custom_field_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldValue requireOneBySortOrder(int $sort_order) Return the first ChildOcCustomFieldValue filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomFieldValue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomFieldValue objects based on current ModelCriteria
 * @method     ChildOcCustomFieldValue[]|ObjectCollection findByCustomFieldValueId(int $custom_field_value_id) Return ChildOcCustomFieldValue objects filtered by the custom_field_value_id column
 * @method     ChildOcCustomFieldValue[]|ObjectCollection findByCustomFieldId(int $custom_field_id) Return ChildOcCustomFieldValue objects filtered by the custom_field_id column
 * @method     ChildOcCustomFieldValue[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcCustomFieldValue objects filtered by the sort_order column
 * @method     ChildOcCustomFieldValue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomFieldValueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomFieldValueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomFieldValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomFieldValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomFieldValueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomFieldValueQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomFieldValueQuery();
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
     * @return ChildOcCustomFieldValue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomFieldValueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomFieldValueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomFieldValue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT custom_field_value_id, custom_field_id, sort_order FROM oc_custom_field_value WHERE custom_field_value_id = :p0';
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
            /** @var ChildOcCustomFieldValue $obj */
            $obj = new ChildOcCustomFieldValue();
            $obj->hydrate($row);
            OcCustomFieldValueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomFieldValue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the custom_field_value_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomFieldValueId(1234); // WHERE custom_field_value_id = 1234
     * $query->filterByCustomFieldValueId(array(12, 34)); // WHERE custom_field_value_id IN (12, 34)
     * $query->filterByCustomFieldValueId(array('min' => 12)); // WHERE custom_field_value_id > 12
     * </code>
     *
     * @param     mixed $customFieldValueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function filterByCustomFieldValueId($customFieldValueId = null, $comparison = null)
    {
        if (is_array($customFieldValueId)) {
            $useMinMax = false;
            if (isset($customFieldValueId['min'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $customFieldValueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customFieldValueId['max'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $customFieldValueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $customFieldValueId, $comparison);
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
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function filterByCustomFieldId($customFieldId = null, $comparison = null)
    {
        if (is_array($customFieldId)) {
            $useMinMax = false;
            if (isset($customFieldId['min'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customFieldId['max'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_ID, $customFieldId, $comparison);
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
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcCustomFieldValueTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldValueTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomFieldValue $ocCustomFieldValue Object to remove from the list of results
     *
     * @return $this|ChildOcCustomFieldValueQuery The current query, for fluid interface
     */
    public function prune($ocCustomFieldValue = null)
    {
        if ($ocCustomFieldValue) {
            $this->addUsingAlias(OcCustomFieldValueTableMap::COL_CUSTOM_FIELD_VALUE_ID, $ocCustomFieldValue->getCustomFieldValueId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_custom_field_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldValueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomFieldValueTableMap::clearInstancePool();
            OcCustomFieldValueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldValueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomFieldValueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomFieldValueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomFieldValueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomFieldValueQuery
