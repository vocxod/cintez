<?php

namespace Base;

use \OcCustomFieldCustomerGroup as ChildOcCustomFieldCustomerGroup;
use \OcCustomFieldCustomerGroupQuery as ChildOcCustomFieldCustomerGroupQuery;
use \Exception;
use \PDO;
use Map\OcCustomFieldCustomerGroupTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_custom_field_customer_group' table.
 *
 *
 *
 * @method     ChildOcCustomFieldCustomerGroupQuery orderByCustomFieldId($order = Criteria::ASC) Order by the custom_field_id column
 * @method     ChildOcCustomFieldCustomerGroupQuery orderByCustomerGroupId($order = Criteria::ASC) Order by the customer_group_id column
 * @method     ChildOcCustomFieldCustomerGroupQuery orderByRequired($order = Criteria::ASC) Order by the required column
 *
 * @method     ChildOcCustomFieldCustomerGroupQuery groupByCustomFieldId() Group by the custom_field_id column
 * @method     ChildOcCustomFieldCustomerGroupQuery groupByCustomerGroupId() Group by the customer_group_id column
 * @method     ChildOcCustomFieldCustomerGroupQuery groupByRequired() Group by the required column
 *
 * @method     ChildOcCustomFieldCustomerGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCustomFieldCustomerGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCustomFieldCustomerGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCustomFieldCustomerGroupQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCustomFieldCustomerGroupQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCustomFieldCustomerGroupQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCustomFieldCustomerGroup findOne(ConnectionInterface $con = null) Return the first ChildOcCustomFieldCustomerGroup matching the query
 * @method     ChildOcCustomFieldCustomerGroup findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCustomFieldCustomerGroup matching the query, or a new ChildOcCustomFieldCustomerGroup object populated from the query conditions when no match is found
 *
 * @method     ChildOcCustomFieldCustomerGroup findOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomFieldCustomerGroup filtered by the custom_field_id column
 * @method     ChildOcCustomFieldCustomerGroup findOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomFieldCustomerGroup filtered by the customer_group_id column
 * @method     ChildOcCustomFieldCustomerGroup findOneByRequired(boolean $required) Return the first ChildOcCustomFieldCustomerGroup filtered by the required column *

 * @method     ChildOcCustomFieldCustomerGroup requirePk($key, ConnectionInterface $con = null) Return the ChildOcCustomFieldCustomerGroup by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldCustomerGroup requireOne(ConnectionInterface $con = null) Return the first ChildOcCustomFieldCustomerGroup matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomFieldCustomerGroup requireOneByCustomFieldId(int $custom_field_id) Return the first ChildOcCustomFieldCustomerGroup filtered by the custom_field_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldCustomerGroup requireOneByCustomerGroupId(int $customer_group_id) Return the first ChildOcCustomFieldCustomerGroup filtered by the customer_group_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCustomFieldCustomerGroup requireOneByRequired(boolean $required) Return the first ChildOcCustomFieldCustomerGroup filtered by the required column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCustomFieldCustomerGroup[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCustomFieldCustomerGroup objects based on current ModelCriteria
 * @method     ChildOcCustomFieldCustomerGroup[]|ObjectCollection findByCustomFieldId(int $custom_field_id) Return ChildOcCustomFieldCustomerGroup objects filtered by the custom_field_id column
 * @method     ChildOcCustomFieldCustomerGroup[]|ObjectCollection findByCustomerGroupId(int $customer_group_id) Return ChildOcCustomFieldCustomerGroup objects filtered by the customer_group_id column
 * @method     ChildOcCustomFieldCustomerGroup[]|ObjectCollection findByRequired(boolean $required) Return ChildOcCustomFieldCustomerGroup objects filtered by the required column
 * @method     ChildOcCustomFieldCustomerGroup[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCustomFieldCustomerGroupQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCustomFieldCustomerGroupQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCustomFieldCustomerGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCustomFieldCustomerGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCustomFieldCustomerGroupQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCustomFieldCustomerGroupQuery) {
            return $criteria;
        }
        $query = new ChildOcCustomFieldCustomerGroupQuery();
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
     * @param array[$custom_field_id, $customer_group_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcCustomFieldCustomerGroup|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCustomFieldCustomerGroupTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCustomFieldCustomerGroupTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcCustomFieldCustomerGroup A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT custom_field_id, customer_group_id, required FROM oc_custom_field_customer_group WHERE custom_field_id = :p0 AND customer_group_id = :p1';
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
            /** @var ChildOcCustomFieldCustomerGroup $obj */
            $obj = new ChildOcCustomFieldCustomerGroup();
            $obj->hydrate($row);
            OcCustomFieldCustomerGroupTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcCustomFieldCustomerGroup|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByCustomFieldId($customFieldId = null, $comparison = null)
    {
        if (is_array($customFieldId)) {
            $useMinMax = false;
            if (isset($customFieldId['min'])) {
                $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customFieldId['max'])) {
                $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID, $customFieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID, $customFieldId, $comparison);
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
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByCustomerGroupId($customerGroupId = null, $comparison = null)
    {
        if (is_array($customerGroupId)) {
            $useMinMax = false;
            if (isset($customerGroupId['min'])) {
                $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerGroupId['max'])) {
                $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID, $customerGroupId, $comparison);
    }

    /**
     * Filter the query on the required column
     *
     * Example usage:
     * <code>
     * $query->filterByRequired(true); // WHERE required = true
     * $query->filterByRequired('yes'); // WHERE required = true
     * </code>
     *
     * @param     boolean|string $required The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function filterByRequired($required = null, $comparison = null)
    {
        if (is_string($required)) {
            $required = in_array(strtolower($required), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCustomFieldCustomerGroupTableMap::COL_REQUIRED, $required, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCustomFieldCustomerGroup $ocCustomFieldCustomerGroup Object to remove from the list of results
     *
     * @return $this|ChildOcCustomFieldCustomerGroupQuery The current query, for fluid interface
     */
    public function prune($ocCustomFieldCustomerGroup = null)
    {
        if ($ocCustomFieldCustomerGroup) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcCustomFieldCustomerGroupTableMap::COL_CUSTOM_FIELD_ID), $ocCustomFieldCustomerGroup->getCustomFieldId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcCustomFieldCustomerGroupTableMap::COL_CUSTOMER_GROUP_ID), $ocCustomFieldCustomerGroup->getCustomerGroupId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_custom_field_customer_group table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldCustomerGroupTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCustomFieldCustomerGroupTableMap::clearInstancePool();
            OcCustomFieldCustomerGroupTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCustomFieldCustomerGroupTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCustomFieldCustomerGroupTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCustomFieldCustomerGroupTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCustomFieldCustomerGroupTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCustomFieldCustomerGroupQuery
