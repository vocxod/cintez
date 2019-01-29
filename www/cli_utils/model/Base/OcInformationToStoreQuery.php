<?php

namespace Base;

use \OcInformationToStore as ChildOcInformationToStore;
use \OcInformationToStoreQuery as ChildOcInformationToStoreQuery;
use \Exception;
use \PDO;
use Map\OcInformationToStoreTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_information_to_store' table.
 *
 *
 *
 * @method     ChildOcInformationToStoreQuery orderByInformationId($order = Criteria::ASC) Order by the information_id column
 * @method     ChildOcInformationToStoreQuery orderByStoreId($order = Criteria::ASC) Order by the store_id column
 *
 * @method     ChildOcInformationToStoreQuery groupByInformationId() Group by the information_id column
 * @method     ChildOcInformationToStoreQuery groupByStoreId() Group by the store_id column
 *
 * @method     ChildOcInformationToStoreQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcInformationToStoreQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcInformationToStoreQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcInformationToStoreQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcInformationToStoreQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcInformationToStoreQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcInformationToStore findOne(ConnectionInterface $con = null) Return the first ChildOcInformationToStore matching the query
 * @method     ChildOcInformationToStore findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcInformationToStore matching the query, or a new ChildOcInformationToStore object populated from the query conditions when no match is found
 *
 * @method     ChildOcInformationToStore findOneByInformationId(int $information_id) Return the first ChildOcInformationToStore filtered by the information_id column
 * @method     ChildOcInformationToStore findOneByStoreId(int $store_id) Return the first ChildOcInformationToStore filtered by the store_id column *

 * @method     ChildOcInformationToStore requirePk($key, ConnectionInterface $con = null) Return the ChildOcInformationToStore by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationToStore requireOne(ConnectionInterface $con = null) Return the first ChildOcInformationToStore matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationToStore requireOneByInformationId(int $information_id) Return the first ChildOcInformationToStore filtered by the information_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationToStore requireOneByStoreId(int $store_id) Return the first ChildOcInformationToStore filtered by the store_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationToStore[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcInformationToStore objects based on current ModelCriteria
 * @method     ChildOcInformationToStore[]|ObjectCollection findByInformationId(int $information_id) Return ChildOcInformationToStore objects filtered by the information_id column
 * @method     ChildOcInformationToStore[]|ObjectCollection findByStoreId(int $store_id) Return ChildOcInformationToStore objects filtered by the store_id column
 * @method     ChildOcInformationToStore[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcInformationToStoreQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcInformationToStoreQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcInformationToStore', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcInformationToStoreQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcInformationToStoreQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcInformationToStoreQuery) {
            return $criteria;
        }
        $query = new ChildOcInformationToStoreQuery();
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
     * @return ChildOcInformationToStore|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcInformationToStoreTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcInformationToStoreTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcInformationToStore A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT information_id, store_id FROM oc_information_to_store WHERE information_id = :p0 AND store_id = :p1';
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
            /** @var ChildOcInformationToStore $obj */
            $obj = new ChildOcInformationToStore();
            $obj->hydrate($row);
            OcInformationToStoreTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcInformationToStore|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcInformationToStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcInformationToStoreTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcInformationToStoreTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcInformationToStoreQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcInformationToStoreTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcInformationToStoreTableMap::COL_STORE_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildOcInformationToStoreQuery The current query, for fluid interface
     */
    public function filterByInformationId($informationId = null, $comparison = null)
    {
        if (is_array($informationId)) {
            $useMinMax = false;
            if (isset($informationId['min'])) {
                $this->addUsingAlias(OcInformationToStoreTableMap::COL_INFORMATION_ID, $informationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationId['max'])) {
                $this->addUsingAlias(OcInformationToStoreTableMap::COL_INFORMATION_ID, $informationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationToStoreTableMap::COL_INFORMATION_ID, $informationId, $comparison);
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
     * @return $this|ChildOcInformationToStoreQuery The current query, for fluid interface
     */
    public function filterByStoreId($storeId = null, $comparison = null)
    {
        if (is_array($storeId)) {
            $useMinMax = false;
            if (isset($storeId['min'])) {
                $this->addUsingAlias(OcInformationToStoreTableMap::COL_STORE_ID, $storeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($storeId['max'])) {
                $this->addUsingAlias(OcInformationToStoreTableMap::COL_STORE_ID, $storeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationToStoreTableMap::COL_STORE_ID, $storeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcInformationToStore $ocInformationToStore Object to remove from the list of results
     *
     * @return $this|ChildOcInformationToStoreQuery The current query, for fluid interface
     */
    public function prune($ocInformationToStore = null)
    {
        if ($ocInformationToStore) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcInformationToStoreTableMap::COL_INFORMATION_ID), $ocInformationToStore->getInformationId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcInformationToStoreTableMap::COL_STORE_ID), $ocInformationToStore->getStoreId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_information_to_store table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationToStoreTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcInformationToStoreTableMap::clearInstancePool();
            OcInformationToStoreTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationToStoreTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcInformationToStoreTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcInformationToStoreTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcInformationToStoreTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcInformationToStoreQuery
