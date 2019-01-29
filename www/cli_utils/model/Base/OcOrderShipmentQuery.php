<?php

namespace Base;

use \OcOrderShipment as ChildOcOrderShipment;
use \OcOrderShipmentQuery as ChildOcOrderShipmentQuery;
use \Exception;
use \PDO;
use Map\OcOrderShipmentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_order_shipment' table.
 *
 *
 *
 * @method     ChildOcOrderShipmentQuery orderByOrderShipmentId($order = Criteria::ASC) Order by the order_shipment_id column
 * @method     ChildOcOrderShipmentQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOcOrderShipmentQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcOrderShipmentQuery orderByShippingCourierId($order = Criteria::ASC) Order by the shipping_courier_id column
 * @method     ChildOcOrderShipmentQuery orderByTrackingNumber($order = Criteria::ASC) Order by the tracking_number column
 *
 * @method     ChildOcOrderShipmentQuery groupByOrderShipmentId() Group by the order_shipment_id column
 * @method     ChildOcOrderShipmentQuery groupByOrderId() Group by the order_id column
 * @method     ChildOcOrderShipmentQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcOrderShipmentQuery groupByShippingCourierId() Group by the shipping_courier_id column
 * @method     ChildOcOrderShipmentQuery groupByTrackingNumber() Group by the tracking_number column
 *
 * @method     ChildOcOrderShipmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcOrderShipmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcOrderShipmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcOrderShipmentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcOrderShipmentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcOrderShipmentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcOrderShipment findOne(ConnectionInterface $con = null) Return the first ChildOcOrderShipment matching the query
 * @method     ChildOcOrderShipment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcOrderShipment matching the query, or a new ChildOcOrderShipment object populated from the query conditions when no match is found
 *
 * @method     ChildOcOrderShipment findOneByOrderShipmentId(int $order_shipment_id) Return the first ChildOcOrderShipment filtered by the order_shipment_id column
 * @method     ChildOcOrderShipment findOneByOrderId(int $order_id) Return the first ChildOcOrderShipment filtered by the order_id column
 * @method     ChildOcOrderShipment findOneByDateAdded(string $date_added) Return the first ChildOcOrderShipment filtered by the date_added column
 * @method     ChildOcOrderShipment findOneByShippingCourierId(string $shipping_courier_id) Return the first ChildOcOrderShipment filtered by the shipping_courier_id column
 * @method     ChildOcOrderShipment findOneByTrackingNumber(string $tracking_number) Return the first ChildOcOrderShipment filtered by the tracking_number column *

 * @method     ChildOcOrderShipment requirePk($key, ConnectionInterface $con = null) Return the ChildOcOrderShipment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderShipment requireOne(ConnectionInterface $con = null) Return the first ChildOcOrderShipment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderShipment requireOneByOrderShipmentId(int $order_shipment_id) Return the first ChildOcOrderShipment filtered by the order_shipment_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderShipment requireOneByOrderId(int $order_id) Return the first ChildOcOrderShipment filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderShipment requireOneByDateAdded(string $date_added) Return the first ChildOcOrderShipment filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderShipment requireOneByShippingCourierId(string $shipping_courier_id) Return the first ChildOcOrderShipment filtered by the shipping_courier_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcOrderShipment requireOneByTrackingNumber(string $tracking_number) Return the first ChildOcOrderShipment filtered by the tracking_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcOrderShipment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcOrderShipment objects based on current ModelCriteria
 * @method     ChildOcOrderShipment[]|ObjectCollection findByOrderShipmentId(int $order_shipment_id) Return ChildOcOrderShipment objects filtered by the order_shipment_id column
 * @method     ChildOcOrderShipment[]|ObjectCollection findByOrderId(int $order_id) Return ChildOcOrderShipment objects filtered by the order_id column
 * @method     ChildOcOrderShipment[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcOrderShipment objects filtered by the date_added column
 * @method     ChildOcOrderShipment[]|ObjectCollection findByShippingCourierId(string $shipping_courier_id) Return ChildOcOrderShipment objects filtered by the shipping_courier_id column
 * @method     ChildOcOrderShipment[]|ObjectCollection findByTrackingNumber(string $tracking_number) Return ChildOcOrderShipment objects filtered by the tracking_number column
 * @method     ChildOcOrderShipment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcOrderShipmentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcOrderShipmentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcOrderShipment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcOrderShipmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcOrderShipmentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcOrderShipmentQuery) {
            return $criteria;
        }
        $query = new ChildOcOrderShipmentQuery();
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
     * @return ChildOcOrderShipment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcOrderShipmentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcOrderShipmentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcOrderShipment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT order_shipment_id, order_id, date_added, shipping_courier_id, tracking_number FROM oc_order_shipment WHERE order_shipment_id = :p0';
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
            /** @var ChildOcOrderShipment $obj */
            $obj = new ChildOcOrderShipment();
            $obj->hydrate($row);
            OcOrderShipmentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcOrderShipment|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the order_shipment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderShipmentId(1234); // WHERE order_shipment_id = 1234
     * $query->filterByOrderShipmentId(array(12, 34)); // WHERE order_shipment_id IN (12, 34)
     * $query->filterByOrderShipmentId(array('min' => 12)); // WHERE order_shipment_id > 12
     * </code>
     *
     * @param     mixed $orderShipmentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByOrderShipmentId($orderShipmentId = null, $comparison = null)
    {
        if (is_array($orderShipmentId)) {
            $useMinMax = false;
            if (isset($orderShipmentId['min'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $orderShipmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderShipmentId['max'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $orderShipmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $orderShipmentId, $comparison);
    }

    /**
     * Filter the query on the order_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE order_id = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
     * </code>
     *
     * @param     mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcOrderShipmentTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the shipping_courier_id column
     *
     * Example usage:
     * <code>
     * $query->filterByShippingCourierId('fooValue');   // WHERE shipping_courier_id = 'fooValue'
     * $query->filterByShippingCourierId('%fooValue%', Criteria::LIKE); // WHERE shipping_courier_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shippingCourierId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByShippingCourierId($shippingCourierId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shippingCourierId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_SHIPPING_COURIER_ID, $shippingCourierId, $comparison);
    }

    /**
     * Filter the query on the tracking_number column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackingNumber('fooValue');   // WHERE tracking_number = 'fooValue'
     * $query->filterByTrackingNumber('%fooValue%', Criteria::LIKE); // WHERE tracking_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackingNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function filterByTrackingNumber($trackingNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackingNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcOrderShipmentTableMap::COL_TRACKING_NUMBER, $trackingNumber, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcOrderShipment $ocOrderShipment Object to remove from the list of results
     *
     * @return $this|ChildOcOrderShipmentQuery The current query, for fluid interface
     */
    public function prune($ocOrderShipment = null)
    {
        if ($ocOrderShipment) {
            $this->addUsingAlias(OcOrderShipmentTableMap::COL_ORDER_SHIPMENT_ID, $ocOrderShipment->getOrderShipmentId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_order_shipment table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderShipmentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcOrderShipmentTableMap::clearInstancePool();
            OcOrderShipmentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcOrderShipmentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcOrderShipmentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcOrderShipmentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcOrderShipmentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcOrderShipmentQuery
