<?php

namespace Base;

use \OcOptionValue as ChildOcOptionValue;
use \OcOptionValueQuery as ChildOcOptionValueQuery;
use \Exception;
use \PDO;
use Map\OcOptionValueTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_option_value' table.
 *
 *
 *
 * @method     ChildOcOptionValueQuery orderByOptionValueId($order = Criteria::ASC) Order by the option_value_id column
 * @method     ChildOcOptionValueQuery orderByOptionId($order = Criteria::ASC) Order by the option_id column
 * @method     ChildOcOptionValueQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcOptionValueQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcOptionValueQuery groupByOptionValueId() Group by the option_value_id column
 * @method     ChildOcOptionValueQuery groupByOptionId() Group by the option_id column
 * @method     ChildOcOptionValueQuery groupByImage() Group by the image column
 * @method     ChildOcOptionValueQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcOptionValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOptionValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOptionValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOptionValueQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOptionValueQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOptionValueQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOptionValue findOne(ConnectionInterface $con = null) Return the first ChildOcOptionValue matching the query
 * @method     ChildOcOptionValue findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOptionValue matching the query, or a new ChildOcOptionValue object populated from the query conditions when no match is found
 *
 * @method     ChildOcOptionValue findOneByOptionValueId(int $option_value_id) Return the first ChildOcOptionValue filtered by the option_value_id column
 * @method     ChildOcOptionValue findOneByOptionId(int $option_id) Return the first ChildOcOptionValue filtered by the option_id column
 * @method     ChildOcOptionValue findOneByImage(string $image) Return the first ChildOcOptionValue filtered by the image column
 * @method     ChildOcOptionValue findOneBySortOrder(int $sort_order) Return the first ChildOcOptionValue filtered by the sort_order column *

 * @method     ChildOcOptionValue requirePk($key, ConnectionInterface $con = null) Return the ChildOcOptionValue by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOptionValue requireOne(ConnectionInterface $con = null) Return the first ChildOcOptionValue matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOptionValue requireOneByOptionValueId(int $option_value_id) Return the first ChildOcOptionValue filtered by the option_value_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOptionValue requireOneByOptionId(int $option_id) Return the first ChildOcOptionValue filtered by the option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOptionValue requireOneByImage(string $image) Return the first ChildOcOptionValue filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOptionValue requireOneBySortOrder(int $sort_order) Return the first ChildOcOptionValue filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOptionValue[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOptionValue objects based on current ModelCriteria
 * @method     ChildOcOptionValue[]|ObjectCollection findByOptionValueId(int $option_value_id) Return ChildOcOptionValue objects filtered by the option_value_id column
 * @method     ChildOcOptionValue[]|ObjectCollection findByOptionId(int $option_id) Return ChildOcOptionValue objects filtered by the option_id column
 * @method     ChildOcOptionValue[]|ObjectCollection findByImage(string $image) Return ChildOcOptionValue objects filtered by the image column
 * @method     ChildOcOptionValue[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcOptionValue objects filtered by the sort_order column
 * @method     ChildOcOptionValue[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOptionValueQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOptionValueQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOptionValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOptionValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOptionValueQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOptionValueQuery) {
            return $criteria;
        }
        $query = new ChildOcOptionValueQuery();
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
     * @return ChildOcOptionValue|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOptionValueTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOptionValueTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOptionValue A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT option_value_id, option_id, image, sort_order FROM oc_option_value WHERE option_value_id = :p0';
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
            /** @var ChildOcOptionValue $obj */
            $obj = new ChildOcOptionValue();
            $obj->hydrate($row);
            OcOptionValueTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOptionValue|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the option_value_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionValueId(1234); // WHERE option_value_id = 1234
     * $query->filterByOptionValueId(array(12, 34)); // WHERE option_value_id IN (12, 34)
     * $query->filterByOptionValueId(array('min' => 12)); // WHERE option_value_id > 12
     * </code>
     *
     * @param     mixed $optionValueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterByOptionValueId($optionValueId = null, $comparison = null)
    {
        if (is_array($optionValueId)) {
            $useMinMax = false;
            if (isset($optionValueId['min'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionValueId['max'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $optionValueId, $comparison);
    }

    /**
     * Filter the query on the option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionId(1234); // WHERE option_id = 1234
     * $query->filterByOptionId(array(12, 34)); // WHERE option_id IN (12, 34)
     * $query->filterByOptionId(array('min' => 12)); // WHERE option_id > 12
     * </code>
     *
     * @param     mixed $optionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterByOptionId($optionId = null, $comparison = null)
    {
        if (is_array($optionId)) {
            $useMinMax = false;
            if (isset($optionId['min'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_ID, $optionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionId['max'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_ID, $optionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_ID, $optionId, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOptionValueTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcOptionValueTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOptionValueTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOptionValue $ocOptionValue Object to remove from the list of results
     *
     * @return $this|ChildOcOptionValueQuery The current query, for fluid interface
     */
    public function prune($ocOptionValue = null)
    {
        if ($ocOptionValue) {
            $this->addUsingAlias(OcOptionValueTableMap::COL_OPTION_VALUE_ID, $ocOptionValue->getOptionValueId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_option_value table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOptionValueTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOptionValueTableMap::clearInstancePool();
            OcOptionValueTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOptionValueTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOptionValueTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOptionValueTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOptionValueTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOptionValueQuery
