<?php

namespace Base;

use \OcTaxRateToCustomerGroup as ChildOcTaxRateToCustomerGroup;
use \OcTaxRateToCustomerGroupQuery as ChildOcTaxRateToCustomerGroupQuery;
use \Exception;
use \PDO;
use Map\OcTaxRateToCustomerGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_tax_rate_to_customer_group' table.
 *
 *
 *
 * @method     ChildOcTaxRateToCustomerGroupQuery orderByTaxRateId($order = Criteria::ASC) Order by the tax_rate_id column
 * @method     ChildOcTaxRateToCustomerGroupQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 *
 * @method     ChildOcTaxRateToCustomerGroupQuery groupByTaxRateId() Group by the tax_rate_id column
 * @method     ChildOcTaxRateToCustomerGroupQuery groupByCustomerGroupId() Group by the customer_group_id column
 *
 * @method     ChildOcTaxRateToCustomerGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcTaxRateToCustomerGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcTaxRateToCustomerGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcTaxRateToCustomerGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcTaxRateToCustomerGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcTaxRateToCustomerGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcTaxRateToCustomerGroup findOne(ConnectionInterface $con = null) Return the first ChildOcTaxRateToCustomerGroup matching the query
 * @method     ChildOcTaxRateToCustomerGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcTaxRateToCustomerGroup matching the query, or a new ChildOcTaxRateToCustomerGroup object populated from the query conditions when no match is found
 *
 * @method     ChildOcTaxRateToCustomerGroup findOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRateToCustomerGroup filtered by the tax_rate_id column
 * @method     ChildOcTaxRateToCustomerGroup findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcTaxRateToCustomerGroup filtered by the customer_group_id column *

 * @method     ChildOcTaxRateToCustomerGroup requirePk($key, ConnectionInterface $con = null) Return the ChildOcTaxRateToCustomerGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRateToCustomerGroup requireOne(ConnectionInterface $con = null) Return the first ChildOcTaxRateToCustomerGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRateToCustomerGroup requireOneByTaxRateId(int $tax_rate_id) Return the first ChildOcTaxRateToCustomerGroup filtered by the tax_rate_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcTaxRateToCustomerGroup requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcTaxRateToCustomerGroup filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcTaxRateToCustomerGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcTaxRateToCustomerGroup objects based on current ModelCriteria
 * @method     ChildOcTaxRateToCustomerGroup[]|ObjectCollection findByTaxRateId(int $tax_rate_id) Return ChildOcTaxRateToCustomerGroup objects filtered by the tax_rate_id column
 * @method     ChildOcTaxRateToCustomerGroup[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcTaxRateToCustomerGroup objects filtered by the customer_group_id column
 * @method     ChildOcTaxRateToCustomerGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcTaxRateToCustomerGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcTaxRateToCustomerGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcTaxRateToCustomerGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcTaxRateToCustomerGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcTaxRateToCustomerGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcTaxRateToCustomerGroupQuery) {
            return $criteria;
        }
        $query = new ChildOcTaxRateToCustomerGroupQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$tax_rate_id, $customer_group_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcTaxRateToCustomerGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcTaxRateToCustomerGroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcTaxRateToCustomerGroupTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcTaxRateToCustomerGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT tax_rate_id, customer_group_id FROM oc_tax_rate_to_customer_group WHERE tax_rate_id = :p0 AND customer_group_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOcTaxRateToCustomerGroup $obj */
            $obj = new ChildOcTaxRateToCustomerGroup();
            $obj->hydrate($row);
            OcTaxRateToCustomerGroupTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcTaxRateToCustomerGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcTaxRateToCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcTaxRateToCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the tax_rate_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxRateId(1234); // WHERE tax_rate_id = 1234
     * $query->filterByTaxRateId(array(12, 34)); // WHERE tax_rate_id IN (12, 34)
     * $query->filterByTaxRateId(array('min' => 12)); // WHERE tax_rate_id > 12
     * </code>
     *
     * @param     mixed $taxRateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcTaxRateToCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByTaxRateId($taxRateId = null, $comparison = null)
    {
        if (is_array($taxRateId)) {
            $useMinMax = false;
            if (isset($taxRateId['min'])) {
                $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID, $taxRateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxRateId['max'])) {
                $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID, $taxRateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID, $taxRateId, $comparison);
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
     * @return $this|ChildOcTaxRateToCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcTaxRateToCustomerGroup $ocTaxRateToCustomerGroup Object to remove from the list of results
     *
     * @return $this|ChildOcTaxRateToCustomerGroupQuery The current query, for fluid interface
     */
    public function prune($ocTaxRateToCustomerGroup = null)
    {
        if ($ocTaxRateToCustomerGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcTaxRateToCustomerGroupTableMap::COL_TAX_RATE_ID), $ocTaxRateToCustomerGroup->getTaxRateId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcTaxRateToCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID), $ocTaxRateToCustomerGroup->getCustomerGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_tax_rate_to_customer_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateToCustomerGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcTaxRateToCustomerGroupTableMap::clearInstancePool();
            OcTaxRateToCustomerGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcTaxRateToCustomerGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcTaxRateToCustomerGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcTaxRateToCustomerGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcTaxRateToCustomerGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcTaxRateToCustomerGroupQuery
