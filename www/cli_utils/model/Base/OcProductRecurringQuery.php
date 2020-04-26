<?php

namespace Base;

use \OcProductRecurring as ChildOcProductRecurring;
use \OcProductRecurringQuery as ChildOcProductRecurringQuery;
use \Exception;
use \PDO;
use Map\OcProductRecurringTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product_recurring' table.
 *
 *
 *
 * @method     ChildOcProductRecurringQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductRecurringQuery orderByRecurringId($order = Criteria::ASC) Order by the recurring_id column
 * @method     ChildOcProductRecurringQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 *
 * @method     ChildOcProductRecurringQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductRecurringQuery groupByRecurringId() Group by the recurring_id column
 * @method     ChildOcProductRecurringQuery groupByCustomerGroupId() Group by the customer_group_id column
 *
 * @method     ChildOcProductRecurringQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductRecurringQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductRecurringQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductRecurringQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductRecurringQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductRecurringQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProductRecurring findOne(ConnectionInterface $con = null) Return the first ChildOcProductRecurring matching the query
 * @method     ChildOcProductRecurring findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProductRecurring matching the query, or a new ChildOcProductRecurring object populated from the query conditions when no match is found
 *
 * @method     ChildOcProductRecurring findOneByProductId(int $product_id) Return the first ChildOcProductRecurring filtered by the product_id column
 * @method     ChildOcProductRecurring findOneByRecurringId(int $recurring_id) Return the first ChildOcProductRecurring filtered by the recurring_id column
 * @method     ChildOcProductRecurring findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcProductRecurring filtered by the customer_group_id column *

 * @method     ChildOcProductRecurring requirePk($key, ConnectionInterface $con = null) Return the ChildOcProductRecurring by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductRecurring requireOne(ConnectionInterface $con = null) Return the first ChildOcProductRecurring matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductRecurring requireOneByProductId(int $product_id) Return the first ChildOcProductRecurring filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductRecurring requireOneByRecurringId(int $recurring_id) Return the first ChildOcProductRecurring filtered by the recurring_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductRecurring requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcProductRecurring filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductRecurring[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProductRecurring objects based on current ModelCriteria
 * @method     ChildOcProductRecurring[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProductRecurring objects filtered by the product_id column
 * @method     ChildOcProductRecurring[]|ObjectCollection findByRecurringId(int $recurring_id) Return ChildOcProductRecurring objects filtered by the recurring_id column
 * @method     ChildOcProductRecurring[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcProductRecurring objects filtered by the customer_group_id column
 * @method     ChildOcProductRecurring[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductRecurringQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductRecurringQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProductRecurring', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductRecurringQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductRecurringQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductRecurringQuery) {
            return $criteria;
        }
        $query = new ChildOcProductRecurringQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$product_id, $recurring_id, $customer_group_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcProductRecurring|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductRecurringTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductRecurringTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildOcProductRecurring A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_id, recurring_id, customer_group_id FROM oc_product_recurring WHERE product_id = :p0 AND recurring_id = :p1 AND customer_group_id = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcProductRecurring $obj */
            $obj = new ChildOcProductRecurring();
            $obj->hydrate($row);
            OcProductRecurringTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildOcProductRecurring|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcProductRecurringTableMap::COL_PRODUCT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcProductRecurringTableMap::COL_RECURRING_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcProductRecurringTableMap::COL_PRODUCT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcProductRecurringTableMap::COL_RECURRING_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductRecurringTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the recurring_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecurringId(1234); // WHERE recurring_id = 1234
     * $query->filterByRecurringId(array(12, 34)); // WHERE recurring_id IN (12, 34)
     * $query->filterByRecurringId(array('min' => 12)); // WHERE recurring_id > 12
     * </code>
     *
     * @param     mixed $recurringId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function filterByRecurringId($recurringId = null, $comparison = null)
    {
        if (is_array($recurringId)) {
            $useMinMax = false;
            if (isset($recurringId['min'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_RECURRING_ID, $recurringId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recurringId['max'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_RECURRING_ID, $recurringId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductRecurringTableMap::COL_RECURRING_ID, $recurringId, $comparison);
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
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProductRecurring $ocProductRecurring Object to remove from the list of results
     *
     * @return $this|ChildOcProductRecurringQuery The current query, for fluid interface
     */
    public function prune($ocProductRecurring = null)
    {
        if ($ocProductRecurring) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcProductRecurringTableMap::COL_PRODUCT_ID), $ocProductRecurring->getProductId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcProductRecurringTableMap::COL_RECURRING_ID), $ocProductRecurring->getRecurringId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(OcProductRecurringTableMap::COL_CUSTOMER_GROUP_ID), $ocProductRecurring->getCustomerGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product_recurring table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductRecurringTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductRecurringTableMap::clearInstancePool();
            OcProductRecurringTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductRecurringTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductRecurringTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductRecurringTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductRecurringTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductRecurringQuery
