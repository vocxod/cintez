<?php

namespace Base;

use \OcCustomerGroup as ChildOcCustomerGroup;
use \OcCustomerGroupQuery as ChildOcCustomerGroupQuery;
use \Exception;
use \PDO;
use Map\OcCustomerGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_customer_group' table.
 *
 *
 *
 * @method     ChildOcCustomerGroupQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 * @method     ChildOcCustomerGroupQuery orderByApproval($order = Criteria::ASC) Order by the approval column
 * @method     ChildOcCustomerGroupQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcCustomerGroupQuery groupByCustomerGroupId() Group by the customer_group_id column
 * @method     ChildOcCustomerGroupQuery groupByApproval() Group by the approval column
 * @method     ChildOcCustomerGroupQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcCustomerGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomerGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomerGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomerGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomerGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomerGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomerGroup findOne(ConnectionInterface $con = null) Return the first ChildOcCustomerGroup matching the query
 * @method     ChildOcCustomerGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomerGroup matching the query, or a new ChildOcCustomerGroup object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomerGroup findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomerGroup filtered by the customer_group_id column
 * @method     ChildOcCustomerGroup findOneByApproval(int $approval) Return the first ChildOcCustomerGroup filtered by the approval column
 * @method     ChildOcCustomerGroup findOneBySortOrder(int $sort_order) Return the first ChildOcCustomerGroup filtered by the sort_order column *

 * @method     ChildOcCustomerGroup requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomerGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerGroup requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomerGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerGroup requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomerGroup filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerGroup requireOneByApproval(int $approval) Return the first ChildOcCustomerGroup filtered by the approval column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomerGroup requireOneBySortOrder(int $sort_order) Return the first ChildOcCustomerGroup filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomerGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomerGroup objects based on current ModelCriteria
 * @method     ChildOcCustomerGroup[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcCustomerGroup objects filtered by the customer_group_id column
 * @method     ChildOcCustomerGroup[]|ObjectCollection findByApproval(int $approval) Return ChildOcCustomerGroup objects filtered by the approval column
 * @method     ChildOcCustomerGroup[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcCustomerGroup objects filtered by the sort_order column
 * @method     ChildOcCustomerGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomerGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomerGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomerGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomerGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomerGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomerGroupQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomerGroupQuery();
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
     * @return ChildOcCustomerGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomerGroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomerGroupTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCustomerGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT customer_group_id, approval, sort_order FROM oc_customer_group WHERE customer_group_id = :p0';
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
            /** @var ChildOcCustomerGroup $obj */
            $obj = new ChildOcCustomerGroup();
            $obj->hydrate($row);
            OcCustomerGroupTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCustomerGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the customer_group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerGroupId(1234); // WHERE customer_group_id = 1234
     * $query->filterByCustomerGroupId(array(12, 34)); // WHERE customer_group_id IN (12, 34)
     * $query->filterByCustomerGroupId(array('min' => 12)); // WHERE customer_group_id > 12
     * </code>
     *
     * @param     mixed $customerGroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Filter the query on the approval column
     *
     * Example usage:
     * <code>
     * $query->filterByApproval(1234); // WHERE approval = 1234
     * $query->filterByApproval(array(12, 34)); // WHERE approval IN (12, 34)
     * $query->filterByApproval(array('min' => 12)); // WHERE approval > 12
     * </code>
     *
     * @param     mixed $approval The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByApproval($approval = null, $comparison = null)
    {
        if (is_array($approval)) {
            $useMinMax = false;
            if (isset($approval['min'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_APPROVAL, $approval['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approval['max'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_APPROVAL, $approval['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerGroupTableMap::COL_APPROVAL, $approval, $comparison);
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
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcCustomerGroupTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomerGroupTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomerGroup $ocCustomerGroup Object to remove from the list of results
     *
     * @return $this|ChildOcCustomerGroupQuery The current query, for fluid interface
     */
    public function prune($ocCustomerGroup = null)
    {
        if ($ocCustomerGroup) {
            $this->addUsingAlias(OcCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $ocCustomerGroup->getCustomerGroupId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_customer_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomerGroupTableMap::clearInstancePool();
            OcCustomerGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomerGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomerGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomerGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomerGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomerGroupQuery
