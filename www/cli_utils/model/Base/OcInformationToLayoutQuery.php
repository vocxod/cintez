<?php

namespace Base;

use \OcInformationToLayout as ChildOcInformationToLayout;
use \OcInformationToLayoutQuery as ChildOcInformationToLayoutQuery;
use \Exception;
use \PDO;
use Map\OcInformationToLayoutTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_information_to_layout' table.
 *
 *
 *
 * @method     ChildOcInformationToLayoutQuery orderByInformationId($order = Criteria::ASC) Order by the information_id column
 * @method     ChildOcInformationToLayoutQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 * @method     ChildOcInformationToLayoutQuery orderByLayoutId($order = Criteria::ASC) Order by the layout_id column
 *
 * @method     ChildOcInformationToLayoutQuery groupByInformationId() Group by the information_id column
 * @method     ChildOcInformationToLayoutQuery groupByStoreId() Group by the store_id column
 * @method     ChildOcInformationToLayoutQuery groupByLayoutId() Group by the layout_id column
 *
 * @method     ChildOcInformationToLayoutQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcInformationToLayoutQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcInformationToLayoutQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcInformationToLayoutQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcInformationToLayoutQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcInformationToLayoutQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcInformationToLayout findOne(ConnectionInterface $con = null) Return the first ChildOcInformationToLayout matching the query
 * @method     ChildOcInformationToLayout findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcInformationToLayout matching the query, or a new ChildOcInformationToLayout object populated from the query conditions when no match is found
 *
 * @method     ChildOcInformationToLayout findOneByInformationId(int $information_id) Return the first ChildOcInformationToLayout filtered by the information_id column
 * @method     ChildOcInformationToLayout findOneByStoreId(int $store_id) Return the first ChildOcInformationToLayout filtered by the store_id column
 * @method     ChildOcInformationToLayout findOneByLayoutId(int $layout_id) Return the first ChildOcInformationToLayout filtered by the layout_id column *

 * @method     ChildOcInformationToLayout requirePk($key, ConnectionInterface $con = null) Return the ChildOcInformationToLayout by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationToLayout requireOne(ConnectionInterface $con = null) Return the first ChildOcInformationToLayout matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationToLayout requireOneByInformationId(int $information_id) Return the first ChildOcInformationToLayout filtered by the information_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationToLayout requireOneByStoreId(int $store_id) Return the first ChildOcInformationToLayout filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationToLayout requireOneByLayoutId(int $layout_id) Return the first ChildOcInformationToLayout filtered by the layout_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationToLayout[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcInformationToLayout objects based on current ModelCriteria
 * @method     ChildOcInformationToLayout[]|ObjectCollection findByInformationId(int $information_id) Return ChildOcInformationToLayout objects filtered by the information_id column
 * @method     ChildOcInformationToLayout[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcInformationToLayout objects filtered by the store_id column
 * @method     ChildOcInformationToLayout[]|ObjectCollection findByLayoutId(int $layout_id) Return ChildOcInformationToLayout objects filtered by the layout_id column
 * @method     ChildOcInformationToLayout[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcInformationToLayoutQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcInformationToLayoutQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcInformationToLayout', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcInformationToLayoutQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcInformationToLayoutQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcInformationToLayoutQuery) {
            return $criteria;
        }
        $query = new ChildOcInformationToLayoutQuery();
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
     * @param array[$information_id, $store_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcInformationToLayout|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcInformationToLayoutTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcInformationToLayoutTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcInformationToLayout A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT information_id, store_id, layout_id FROM oc_information_to_layout WHERE information_id = :p0 AND store_id = :p1';
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
            /** @var ChildOcInformationToLayout $obj */
            $obj = new ChildOcInformationToLayout();
            $obj->hydrate($row);
            OcInformationToLayoutTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcInformationToLayout|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcInformationToLayoutTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcInformationToLayoutTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcInformationToLayoutTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcInformationToLayoutTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the information_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInformationId(1234); // WHERE information_id = 1234
     * $query->filterByInformationId(array(12, 34)); // WHERE information_id IN (12, 34)
     * $query->filterByInformationId(array('min' => 12)); // WHERE information_id > 12
     * </code>
     *
     * @param     mixed $informationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function filterByInformationId($informationId = null, $comparison = null)
    {
        if (is_array($informationId)) {
            $useMinMax = false;
            if (isset($informationId['min'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_INFORMATION_ID, $informationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationId['max'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_INFORMATION_ID, $informationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationToLayoutTableMap::COL_INFORMATION_ID, $informationId, $comparison);
    }

    /**
     * Filter the query on the store_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStoreId(1234); // WHERE store_id = 1234
     * $query->filterByStoreId(array(12, 34)); // WHERE store_id IN (12, 34)
     * $query->filterByStoreId(array('min' => 12)); // WHERE store_id > 12
     * </code>
     *
     * @param     mixed $storeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationToLayoutTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Filter the query on the layout_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutId(1234); // WHERE layout_id = 1234
     * $query->filterByLayoutId(array(12, 34)); // WHERE layout_id IN (12, 34)
     * $query->filterByLayoutId(array('min' => 12)); // WHERE layout_id > 12
     * </code>
     *
     * @param     mixed $layoutId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function filterByLayoutId($layoutId = null, $comparison = null)
    {
        if (is_array($layoutId)) {
            $useMinMax = false;
            if (isset($layoutId['min'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_LAYOUT_ID, $layoutId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutId['max'])) {
                $this->addUsingAlias(OcInformationToLayoutTableMap::COL_LAYOUT_ID, $layoutId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationToLayoutTableMap::COL_LAYOUT_ID, $layoutId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcInformationToLayout $ocInformationToLayout Object to remove from the list of results
     *
     * @return $this|ChildOcInformationToLayoutQuery The current query, for fluid interface
     */
    public function prune($ocInformationToLayout = null)
    {
        if ($ocInformationToLayout) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcInformationToLayoutTableMap::COL_INFORMATION_ID), $ocInformationToLayout->getInformationId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcInformationToLayoutTableMap::COL_STORE_ID), $ocInformationToLayout->getStoreId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_information_to_layout table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationToLayoutTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcInformationToLayoutTableMap::clearInstancePool();
            OcInformationToLayoutTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationToLayoutTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcInformationToLayoutTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcInformationToLayoutTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcInformationToLayoutTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcInformationToLayoutQuery
