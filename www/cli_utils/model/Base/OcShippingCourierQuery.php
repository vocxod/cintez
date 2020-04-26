<?php

namespace Base;

use \OcShippingCourier as ChildOcShippingCourier;
use \OcShippingCourierQuery as ChildOcShippingCourierQuery;
use \Exception;
use \PDO;
use Map\OcShippingCourierTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_shipping_courier' table.
 *
 *
 *
 * @method     ChildOcShippingCourierQuery orderByShippingCourierId($order = Criteria::ASC) Order by the shipping_courier_id column
 * @method     ChildOcShippingCourierQuery orderByShippingCourierCode($order = Criteria::ASC) Order by the shipping_courier_code column
 * @method     ChildOcShippingCourierQuery orderByShippingCourierName($order = Criteria::ASC) Order by the shipping_courier_name column
 *
 * @method     ChildOcShippingCourierQuery groupByShippingCourierId() Group by the shipping_courier_id column
 * @method     ChildOcShippingCourierQuery groupByShippingCourierCode() Group by the shipping_courier_code column
 * @method     ChildOcShippingCourierQuery groupByShippingCourierName() Group by the shipping_courier_name column
 *
 * @method     ChildOcShippingCourierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcShippingCourierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcShippingCourierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcShippingCourierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcShippingCourierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcShippingCourierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcShippingCourier findOne(ConnectionInterface $con = null) Return the first ChildOcShippingCourier matching the query
 * @method     ChildOcShippingCourier findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcShippingCourier matching the query, or a new ChildOcShippingCourier object populated from the query conditions when no match is found
 *
 * @method     ChildOcShippingCourier findOneByShippingCourierId(int $shipping_courier_id) Return the first ChildOcShippingCourier filtered by the shipping_courier_id column
 * @method     ChildOcShippingCourier findOneByShippingCourierCode(string $shipping_courier_code) Return the first ChildOcShippingCourier filtered by the shipping_courier_code column
 * @method     ChildOcShippingCourier findOneByShippingCourierName(string $shipping_courier_name) Return the first ChildOcShippingCourier filtered by the shipping_courier_name column *

 * @method     ChildOcShippingCourier requirePk($key, ConnectionInterface $con = null) Return the ChildOcShippingCourier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcShippingCourier requireOne(ConnectionInterface $con = null) Return the first ChildOcShippingCourier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcShippingCourier requireOneByShippingCourierId(int $shipping_courier_id) Return the first ChildOcShippingCourier filtered by the shipping_courier_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcShippingCourier requireOneByShippingCourierCode(string $shipping_courier_code) Return the first ChildOcShippingCourier filtered by the shipping_courier_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcShippingCourier requireOneByShippingCourierName(string $shipping_courier_name) Return the first ChildOcShippingCourier filtered by the shipping_courier_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcShippingCourier[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcShippingCourier objects based on current ModelCriteria
 * @method     ChildOcShippingCourier[]|ObjectCollection findByShippingCourierId(int $shipping_courier_id) Return ChildOcShippingCourier objects filtered by the shipping_courier_id column
 * @method     ChildOcShippingCourier[]|ObjectCollection findByShippingCourierCode(string $shipping_courier_code) Return ChildOcShippingCourier objects filtered by the shipping_courier_code column
 * @method     ChildOcShippingCourier[]|ObjectCollection findByShippingCourierName(string $shipping_courier_name) Return ChildOcShippingCourier objects filtered by the shipping_courier_name column
 * @method     ChildOcShippingCourier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcShippingCourierQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcShippingCourierQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcShippingCourier', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcShippingCourierQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcShippingCourierQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcShippingCourierQuery) {
            return $criteria;
        }
        $query = new ChildOcShippingCourierQuery();
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
     * @return ChildOcShippingCourier|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcShippingCourierTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcShippingCourierTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcShippingCourier A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT shipping_courier_id, shipping_courier_code, shipping_courier_name FROM oc_shipping_courier WHERE shipping_courier_id = :p0';
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
            /** @var ChildOcShippingCourier $obj */
            $obj = new ChildOcShippingCourier();
            $obj->hydrate($row);
            OcShippingCourierTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcShippingCourier|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the shipping_courier_id column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCourierId(1234); // WHERE shipping_courier_id = 1234
     * $query->filterByShippingCourierId(array(12, 34)); // WHERE shipping_courier_id IN (12, 34)
     * $query->filterByShippingCourierId(array('min' => 12)); // WHERE shipping_courier_id > 12
     * </code>
     *
     * @param     mixed $shippingCourierId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function filterByShippingCourierId($shippingCourierId = null, $comparison = null)
    {
        if (is_array($shippingCourierId)) {
            $useMinMax = false;
            if (isset($shippingCourierId['min'])) {
                $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $shippingCourierId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shippingCourierId['max'])) {
                $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $shippingCourierId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $shippingCourierId, $comparison);
    }

    /**
     * Filter the query on the shipping_courier_code column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCourierCode('fooValue');   // WHERE shipping_courier_code = 'fooValue'
     * $query->filterByShippingCourierCode('%fooValue%', Criteria::LIKE); // WHERE shipping_courier_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCourierCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function filterByShippingCourierCode($shippingCourierCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCourierCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_CODE, $shippingCourierCode, $comparison);
    }

    /**
     * Filter the query on the shipping_courier_name column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCourierName('fooValue');   // WHERE shipping_courier_name = 'fooValue'
     * $query->filterByShippingCourierName('%fooValue%', Criteria::LIKE); // WHERE shipping_courier_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCourierName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function filterByShippingCourierName($shippingCourierName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCourierName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_NAME, $shippingCourierName, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcShippingCourier $ocShippingCourier Object to remove from the list of results
     *
     * @return $this|ChildOcShippingCourierQuery The current query, for fluid interface
     */
    public function prune($ocShippingCourier = null)
    {
        if ($ocShippingCourier) {
            $this->addUsingAlias(OcShippingCourierTableMap::COL_SHIPPING_COURIER_ID, $ocShippingCourier->getShippingCourierId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_shipping_courier table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcShippingCourierTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcShippingCourierTableMap::clearInstancePool();
            OcShippingCourierTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcShippingCourierTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcShippingCourierTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcShippingCourierTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcShippingCourierTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcShippingCourierQuery
