<?php

namespace Base;

use \OcManufacturerToStore as ChildOcManufacturerToStore;
use \OcManufacturerToStoreQuery as ChildOcManufacturerToStoreQuery;
use \Exception;
use \PDO;
use Map\OcManufacturerToStoreTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_manufacturer_to_store' table.
 *
 *
 *
 * @method     ChildOcManufacturerToStoreQuery orderByManufacturerId($order = Criteria::ASC) Order by the manufacturer_id column
 * @method     ChildOcManufacturerToStoreQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 *
 * @method     ChildOcManufacturerToStoreQuery groupByManufacturerId() Group by the manufacturer_id column
 * @method     ChildOcManufacturerToStoreQuery groupByStoreId() Group by the store_id column
 *
 * @method     ChildOcManufacturerToStoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcManufacturerToStoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcManufacturerToStoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcManufacturerToStoreQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcManufacturerToStoreQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcManufacturerToStoreQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcManufacturerToStore findOne(ConnectionInterface $con = null) Return the first ChildOcManufacturerToStore matching the query
 * @method     ChildOcManufacturerToStore findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcManufacturerToStore matching the query, or a new ChildOcManufacturerToStore object populated from the query conditions when no match is found
 *
 * @method     ChildOcManufacturerToStore findOneByManufacturerId(int $manufacturer_id) Return the first ChildOcManufacturerToStore filtered by the manufacturer_id column
 * @method     ChildOcManufacturerToStore findOneByStoreId(int $store_id) Return the first ChildOcManufacturerToStore filtered by the store_id column *

 * @method     ChildOcManufacturerToStore requirePk($key, ConnectionInterface $con = null) Return the ChildOcManufacturerToStore by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturerToStore requireOne(ConnectionInterface $con = null) Return the first ChildOcManufacturerToStore matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcManufacturerToStore requireOneByManufacturerId(int $manufacturer_id) Return the first ChildOcManufacturerToStore filtered by the manufacturer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcManufacturerToStore requireOneByStoreId(int $store_id) Return the first ChildOcManufacturerToStore filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcManufacturerToStore[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcManufacturerToStore objects based on current ModelCriteria
 * @method     ChildOcManufacturerToStore[]|ObjectCollection findByManufacturerId(int $manufacturer_id) Return ChildOcManufacturerToStore objects filtered by the manufacturer_id column
 * @method     ChildOcManufacturerToStore[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcManufacturerToStore objects filtered by the store_id column
 * @method     ChildOcManufacturerToStore[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcManufacturerToStoreQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcManufacturerToStoreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcManufacturerToStore', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcManufacturerToStoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcManufacturerToStoreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcManufacturerToStoreQuery) {
            return $criteria;
        }
        $query = new ChildOcManufacturerToStoreQuery();
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
     * @param array[$manufacturer_id, $store_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcManufacturerToStore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcManufacturerToStoreTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcManufacturerToStoreTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcManufacturerToStore A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT manufacturer_id, store_id FROM oc_manufacturer_to_store WHERE manufacturer_id = :p0 AND store_id = :p1';
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
            /** @var ChildOcManufacturerToStore $obj */
            $obj = new ChildOcManufacturerToStore();
            $obj->hydrate($row);
            OcManufacturerToStoreTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcManufacturerToStore|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcManufacturerToStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcManufacturerToStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcManufacturerToStoreTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the manufacturer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturerId(1234); // WHERE manufacturer_id = 1234
     * $query->filterByManufacturerId(array(12, 34)); // WHERE manufacturer_id IN (12, 34)
     * $query->filterByManufacturerId(array('min' => 12)); // WHERE manufacturer_id > 12
     * </code>
     *
     * @param     mixed $manufacturerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcManufacturerToStoreQuery The current query, for fluid interface
     */
    public function filterByManufacturerId($manufacturerId = null, $comparison = null)
    {
        if (is_array($manufacturerId)) {
            $useMinMax = false;
            if (isset($manufacturerId['min'])) {
                $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID, $manufacturerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($manufacturerId['max'])) {
                $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID, $manufacturerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID, $manufacturerId, $comparison);
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
     * @return $this|ChildOcManufacturerToStoreQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcManufacturerToStoreTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcManufacturerToStore $ocManufacturerToStore Object to remove from the list of results
     *
     * @return $this|ChildOcManufacturerToStoreQuery The current query, for fluid interface
     */
    public function prune($ocManufacturerToStore = null)
    {
        if ($ocManufacturerToStore) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcManufacturerToStoreTableMap::COL_MANUFACTURER_ID), $ocManufacturerToStore->getManufacturerId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcManufacturerToStoreTableMap::COL_STORE_ID), $ocManufacturerToStore->getStoreId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_manufacturer_to_store table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcManufacturerToStoreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcManufacturerToStoreTableMap::clearInstancePool();
            OcManufacturerToStoreTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcManufacturerToStoreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcManufacturerToStoreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcManufacturerToStoreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcManufacturerToStoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcManufacturerToStoreQuery
