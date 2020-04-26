<?php

namespace Base;

use \OcProduct as ChildOcProduct;
use \OcProductQuery as ChildOcProductQuery;
use \Exception;
use \PDO;
use Map\OcProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product' table.
 *
 *
 *
 * @method     ChildOcProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildOcProductQuery orderBySku($order = Criteria::ASC) Order by the sku column
 * @method     ChildOcProductQuery orderByUpc($order = Criteria::ASC) Order by the upc column
 * @method     ChildOcProductQuery orderByEan($order = Criteria::ASC) Order by the ean column
 * @method     ChildOcProductQuery orderByJan($order = Criteria::ASC) Order by the jan column
 * @method     ChildOcProductQuery orderByIsbn($order = Criteria::ASC) Order by the isbn column
 * @method     ChildOcProductQuery orderByMpn($order = Criteria::ASC) Order by the mpn column
 * @method     ChildOcProductQuery orderByLocation($order = Criteria::ASC) Order by the location column
 * @method     ChildOcProductQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOcProductQuery orderByStockStatusId($order = Criteria::ASC) Order by the stock_status_id column
 * @method     ChildOcProductQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcProductQuery orderByManufacturerId($order = Criteria::ASC) Order by the manufacturer_id column
 * @method     ChildOcProductQuery orderByShipping($order = Criteria::ASC) Order by the shipping column
 * @method     ChildOcProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildOcProductQuery orderByPoints($order = Criteria::ASC) Order by the points column
 * @method     ChildOcProductQuery orderByTaxClassId($order = Criteria::ASC) Order by the tax_class_id column
 * @method     ChildOcProductQuery orderByDateAvailable($order = Criteria::ASC) Order by the date_available column
 * @method     ChildOcProductQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method     ChildOcProductQuery orderByWeightClassId($order = Criteria::ASC) Order by the weight_class_id column
 * @method     ChildOcProductQuery orderByLength($order = Criteria::ASC) Order by the length column
 * @method     ChildOcProductQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     ChildOcProductQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     ChildOcProductQuery orderByLengthClassId($order = Criteria::ASC) Order by the length_class_id column
 * @method     ChildOcProductQuery orderBySubtract($order = Criteria::ASC) Order by the subtract column
 * @method     ChildOcProductQuery orderByMinimum($order = Criteria::ASC) Order by the minimum column
 * @method     ChildOcProductQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 * @method     ChildOcProductQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcProductQuery orderByViewed($order = Criteria::ASC) Order by the viewed column
 * @method     ChildOcProductQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcProductQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildOcProductQuery orderByStatus2($order = Criteria::ASC) Order by the status2 column
 *
 * @method     ChildOcProductQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductQuery groupByModel() Group by the model column
 * @method     ChildOcProductQuery groupBySku() Group by the sku column
 * @method     ChildOcProductQuery groupByUpc() Group by the upc column
 * @method     ChildOcProductQuery groupByEan() Group by the ean column
 * @method     ChildOcProductQuery groupByJan() Group by the jan column
 * @method     ChildOcProductQuery groupByIsbn() Group by the isbn column
 * @method     ChildOcProductQuery groupByMpn() Group by the mpn column
 * @method     ChildOcProductQuery groupByLocation() Group by the location column
 * @method     ChildOcProductQuery groupByQuantity() Group by the quantity column
 * @method     ChildOcProductQuery groupByStockStatusId() Group by the stock_status_id column
 * @method     ChildOcProductQuery groupByImage() Group by the image column
 * @method     ChildOcProductQuery groupByManufacturerId() Group by the manufacturer_id column
 * @method     ChildOcProductQuery groupByShipping() Group by the shipping column
 * @method     ChildOcProductQuery groupByPrice() Group by the price column
 * @method     ChildOcProductQuery groupByPoints() Group by the points column
 * @method     ChildOcProductQuery groupByTaxClassId() Group by the tax_class_id column
 * @method     ChildOcProductQuery groupByDateAvailable() Group by the date_available column
 * @method     ChildOcProductQuery groupByWeight() Group by the weight column
 * @method     ChildOcProductQuery groupByWeightClassId() Group by the weight_class_id column
 * @method     ChildOcProductQuery groupByLength() Group by the length column
 * @method     ChildOcProductQuery groupByWidth() Group by the width column
 * @method     ChildOcProductQuery groupByHeight() Group by the height column
 * @method     ChildOcProductQuery groupByLengthClassId() Group by the length_class_id column
 * @method     ChildOcProductQuery groupBySubtract() Group by the subtract column
 * @method     ChildOcProductQuery groupByMinimum() Group by the minimum column
 * @method     ChildOcProductQuery groupBySortOrder() Group by the sort_order column
 * @method     ChildOcProductQuery groupByStatus() Group by the status column
 * @method     ChildOcProductQuery groupByViewed() Group by the viewed column
 * @method     ChildOcProductQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcProductQuery groupByDateModified() Group by the date_modified column
 * @method     ChildOcProductQuery groupByStatus2() Group by the status2 column
 *
 * @method     ChildOcProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProduct findOne(ConnectionInterface $con = null) Return the first ChildOcProduct matching the query
 * @method     ChildOcProduct findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProduct matching the query, or a new ChildOcProduct object populated from the query conditions when no match is found
 *
 * @method     ChildOcProduct findOneByProductId(int $product_id) Return the first ChildOcProduct filtered by the product_id column
 * @method     ChildOcProduct findOneByModel(string $model) Return the first ChildOcProduct filtered by the model column
 * @method     ChildOcProduct findOneBySku(string $sku) Return the first ChildOcProduct filtered by the sku column
 * @method     ChildOcProduct findOneByUpc(string $upc) Return the first ChildOcProduct filtered by the upc column
 * @method     ChildOcProduct findOneByEan(string $ean) Return the first ChildOcProduct filtered by the ean column
 * @method     ChildOcProduct findOneByJan(string $jan) Return the first ChildOcProduct filtered by the jan column
 * @method     ChildOcProduct findOneByIsbn(string $isbn) Return the first ChildOcProduct filtered by the isbn column
 * @method     ChildOcProduct findOneByMpn(string $mpn) Return the first ChildOcProduct filtered by the mpn column
 * @method     ChildOcProduct findOneByLocation(string $location) Return the first ChildOcProduct filtered by the location column
 * @method     ChildOcProduct findOneByQuantity(int $quantity) Return the first ChildOcProduct filtered by the quantity column
 * @method     ChildOcProduct findOneByStockStatusId(int $stock_status_id) Return the first ChildOcProduct filtered by the stock_status_id column
 * @method     ChildOcProduct findOneByImage(string $image) Return the first ChildOcProduct filtered by the image column
 * @method     ChildOcProduct findOneByManufacturerId(int $manufacturer_id) Return the first ChildOcProduct filtered by the manufacturer_id column
 * @method     ChildOcProduct findOneByShipping(boolean $shipping) Return the first ChildOcProduct filtered by the shipping column
 * @method     ChildOcProduct findOneByPrice(string $price) Return the first ChildOcProduct filtered by the price column
 * @method     ChildOcProduct findOneByPoints(int $points) Return the first ChildOcProduct filtered by the points column
 * @method     ChildOcProduct findOneByTaxClassId(int $tax_class_id) Return the first ChildOcProduct filtered by the tax_class_id column
 * @method     ChildOcProduct findOneByDateAvailable(string $date_available) Return the first ChildOcProduct filtered by the date_available column
 * @method     ChildOcProduct findOneByWeight(string $weight) Return the first ChildOcProduct filtered by the weight column
 * @method     ChildOcProduct findOneByWeightClassId(int $weight_class_id) Return the first ChildOcProduct filtered by the weight_class_id column
 * @method     ChildOcProduct findOneByLength(string $length) Return the first ChildOcProduct filtered by the length column
 * @method     ChildOcProduct findOneByWidth(string $width) Return the first ChildOcProduct filtered by the width column
 * @method     ChildOcProduct findOneByHeight(string $height) Return the first ChildOcProduct filtered by the height column
 * @method     ChildOcProduct findOneByLengthClassId(int $length_class_id) Return the first ChildOcProduct filtered by the length_class_id column
 * @method     ChildOcProduct findOneBySubtract(boolean $subtract) Return the first ChildOcProduct filtered by the subtract column
 * @method     ChildOcProduct findOneByMinimum(int $minimum) Return the first ChildOcProduct filtered by the minimum column
 * @method     ChildOcProduct findOneBySortOrder(int $sort_order) Return the first ChildOcProduct filtered by the sort_order column
 * @method     ChildOcProduct findOneByStatus(boolean $status) Return the first ChildOcProduct filtered by the status column
 * @method     ChildOcProduct findOneByViewed(int $viewed) Return the first ChildOcProduct filtered by the viewed column
 * @method     ChildOcProduct findOneByDateAdded(string $date_added) Return the first ChildOcProduct filtered by the date_added column
 * @method     ChildOcProduct findOneByDateModified(string $date_modified) Return the first ChildOcProduct filtered by the date_modified column
 * @method     ChildOcProduct findOneByStatus2(int $status2) Return the first ChildOcProduct filtered by the status2 column *

 * @method     ChildOcProduct requirePk($key, ConnectionInterface $con = null) Return the ChildOcProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOne(ConnectionInterface $con = null) Return the first ChildOcProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProduct requireOneByProductId(int $product_id) Return the first ChildOcProduct filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByModel(string $model) Return the first ChildOcProduct filtered by the model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneBySku(string $sku) Return the first ChildOcProduct filtered by the sku column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByUpc(string $upc) Return the first ChildOcProduct filtered by the upc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByEan(string $ean) Return the first ChildOcProduct filtered by the ean column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByJan(string $jan) Return the first ChildOcProduct filtered by the jan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByIsbn(string $isbn) Return the first ChildOcProduct filtered by the isbn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByMpn(string $mpn) Return the first ChildOcProduct filtered by the mpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByLocation(string $location) Return the first ChildOcProduct filtered by the location column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByQuantity(int $quantity) Return the first ChildOcProduct filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByStockStatusId(int $stock_status_id) Return the first ChildOcProduct filtered by the stock_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByImage(string $image) Return the first ChildOcProduct filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByManufacturerId(int $manufacturer_id) Return the first ChildOcProduct filtered by the manufacturer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByShipping(boolean $shipping) Return the first ChildOcProduct filtered by the shipping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByPrice(string $price) Return the first ChildOcProduct filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByPoints(int $points) Return the first ChildOcProduct filtered by the points column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByTaxClassId(int $tax_class_id) Return the first ChildOcProduct filtered by the tax_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByDateAvailable(string $date_available) Return the first ChildOcProduct filtered by the date_available column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByWeight(string $weight) Return the first ChildOcProduct filtered by the weight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByWeightClassId(int $weight_class_id) Return the first ChildOcProduct filtered by the weight_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByLength(string $length) Return the first ChildOcProduct filtered by the length column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByWidth(string $width) Return the first ChildOcProduct filtered by the width column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByHeight(string $height) Return the first ChildOcProduct filtered by the height column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByLengthClassId(int $length_class_id) Return the first ChildOcProduct filtered by the length_class_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneBySubtract(boolean $subtract) Return the first ChildOcProduct filtered by the subtract column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByMinimum(int $minimum) Return the first ChildOcProduct filtered by the minimum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneBySortOrder(int $sort_order) Return the first ChildOcProduct filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByStatus(boolean $status) Return the first ChildOcProduct filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByViewed(int $viewed) Return the first ChildOcProduct filtered by the viewed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByDateAdded(string $date_added) Return the first ChildOcProduct filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByDateModified(string $date_modified) Return the first ChildOcProduct filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProduct requireOneByStatus2(int $status2) Return the first ChildOcProduct filtered by the status2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProduct[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProduct objects based on current ModelCriteria
 * @method     ChildOcProduct[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProduct objects filtered by the product_id column
 * @method     ChildOcProduct[]|ObjectCollection findByModel(string $model) Return ChildOcProduct objects filtered by the model column
 * @method     ChildOcProduct[]|ObjectCollection findBySku(string $sku) Return ChildOcProduct objects filtered by the sku column
 * @method     ChildOcProduct[]|ObjectCollection findByUpc(string $upc) Return ChildOcProduct objects filtered by the upc column
 * @method     ChildOcProduct[]|ObjectCollection findByEan(string $ean) Return ChildOcProduct objects filtered by the ean column
 * @method     ChildOcProduct[]|ObjectCollection findByJan(string $jan) Return ChildOcProduct objects filtered by the jan column
 * @method     ChildOcProduct[]|ObjectCollection findByIsbn(string $isbn) Return ChildOcProduct objects filtered by the isbn column
 * @method     ChildOcProduct[]|ObjectCollection findByMpn(string $mpn) Return ChildOcProduct objects filtered by the mpn column
 * @method     ChildOcProduct[]|ObjectCollection findByLocation(string $location) Return ChildOcProduct objects filtered by the location column
 * @method     ChildOcProduct[]|ObjectCollection findByQuantity(int $quantity) Return ChildOcProduct objects filtered by the quantity column
 * @method     ChildOcProduct[]|ObjectCollection findByStockStatusId(int $stock_status_id) Return ChildOcProduct objects filtered by the stock_status_id column
 * @method     ChildOcProduct[]|ObjectCollection findByImage(string $image) Return ChildOcProduct objects filtered by the image column
 * @method     ChildOcProduct[]|ObjectCollection findByManufacturerId(int $manufacturer_id) Return ChildOcProduct objects filtered by the manufacturer_id column
 * @method     ChildOcProduct[]|ObjectCollection findByShipping(boolean $shipping) Return ChildOcProduct objects filtered by the shipping column
 * @method     ChildOcProduct[]|ObjectCollection findByPrice(string $price) Return ChildOcProduct objects filtered by the price column
 * @method     ChildOcProduct[]|ObjectCollection findByPoints(int $points) Return ChildOcProduct objects filtered by the points column
 * @method     ChildOcProduct[]|ObjectCollection findByTaxClassId(int $tax_class_id) Return ChildOcProduct objects filtered by the tax_class_id column
 * @method     ChildOcProduct[]|ObjectCollection findByDateAvailable(string $date_available) Return ChildOcProduct objects filtered by the date_available column
 * @method     ChildOcProduct[]|ObjectCollection findByWeight(string $weight) Return ChildOcProduct objects filtered by the weight column
 * @method     ChildOcProduct[]|ObjectCollection findByWeightClassId(int $weight_class_id) Return ChildOcProduct objects filtered by the weight_class_id column
 * @method     ChildOcProduct[]|ObjectCollection findByLength(string $length) Return ChildOcProduct objects filtered by the length column
 * @method     ChildOcProduct[]|ObjectCollection findByWidth(string $width) Return ChildOcProduct objects filtered by the width column
 * @method     ChildOcProduct[]|ObjectCollection findByHeight(string $height) Return ChildOcProduct objects filtered by the height column
 * @method     ChildOcProduct[]|ObjectCollection findByLengthClassId(int $length_class_id) Return ChildOcProduct objects filtered by the length_class_id column
 * @method     ChildOcProduct[]|ObjectCollection findBySubtract(boolean $subtract) Return ChildOcProduct objects filtered by the subtract column
 * @method     ChildOcProduct[]|ObjectCollection findByMinimum(int $minimum) Return ChildOcProduct objects filtered by the minimum column
 * @method     ChildOcProduct[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcProduct objects filtered by the sort_order column
 * @method     ChildOcProduct[]|ObjectCollection findByStatus(boolean $status) Return ChildOcProduct objects filtered by the status column
 * @method     ChildOcProduct[]|ObjectCollection findByViewed(int $viewed) Return ChildOcProduct objects filtered by the viewed column
 * @method     ChildOcProduct[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcProduct objects filtered by the date_added column
 * @method     ChildOcProduct[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcProduct objects filtered by the date_modified column
 * @method     ChildOcProduct[]|ObjectCollection findByStatus2(int $status2) Return ChildOcProduct objects filtered by the status2 column
 * @method     ChildOcProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProduct', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductQuery) {
            return $criteria;
        }
        $query = new ChildOcProductQuery();
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
     * @return ChildOcProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_id, model, sku, upc, ean, jan, isbn, mpn, location, quantity, stock_status_id, image, manufacturer_id, shipping, price, points, tax_class_id, date_available, weight, weight_class_id, length, width, height, length_class_id, subtract, minimum, sort_order, status, viewed, date_added, date_modified, status2 FROM oc_product WHERE product_id = :p0';
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
            /** @var ChildOcProduct $obj */
            $obj = new ChildOcProduct();
            $obj->hydrate($row);
            OcProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcProduct|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%', Criteria::LIKE); // WHERE model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $model The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_MODEL, $model, $comparison);
    }

    /**
     * Filter the query on the sku column
     *
     * Example usage:
     * <code>
     * $query->filterBySku('fooValue');   // WHERE sku = 'fooValue'
     * $query->filterBySku('%fooValue%', Criteria::LIKE); // WHERE sku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sku The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterBySku($sku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sku)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_SKU, $sku, $comparison);
    }

    /**
     * Filter the query on the upc column
     *
     * Example usage:
     * <code>
     * $query->filterByUpc('fooValue');   // WHERE upc = 'fooValue'
     * $query->filterByUpc('%fooValue%', Criteria::LIKE); // WHERE upc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $upc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByUpc($upc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($upc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_UPC, $upc, $comparison);
    }

    /**
     * Filter the query on the ean column
     *
     * Example usage:
     * <code>
     * $query->filterByEan('fooValue');   // WHERE ean = 'fooValue'
     * $query->filterByEan('%fooValue%', Criteria::LIKE); // WHERE ean LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ean The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByEan($ean = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ean)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_EAN, $ean, $comparison);
    }

    /**
     * Filter the query on the jan column
     *
     * Example usage:
     * <code>
     * $query->filterByJan('fooValue');   // WHERE jan = 'fooValue'
     * $query->filterByJan('%fooValue%', Criteria::LIKE); // WHERE jan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByJan($jan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_JAN, $jan, $comparison);
    }

    /**
     * Filter the query on the isbn column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbn('fooValue');   // WHERE isbn = 'fooValue'
     * $query->filterByIsbn('%fooValue%', Criteria::LIKE); // WHERE isbn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isbn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByIsbn($isbn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isbn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_ISBN, $isbn, $comparison);
    }

    /**
     * Filter the query on the mpn column
     *
     * Example usage:
     * <code>
     * $query->filterByMpn('fooValue');   // WHERE mpn = 'fooValue'
     * $query->filterByMpn('%fooValue%', Criteria::LIKE); // WHERE mpn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mpn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByMpn($mpn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mpn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_MPN, $mpn, $comparison);
    }

    /**
     * Filter the query on the location column
     *
     * Example usage:
     * <code>
     * $query->filterByLocation('fooValue');   // WHERE location = 'fooValue'
     * $query->filterByLocation('%fooValue%', Criteria::LIKE); // WHERE location LIKE '%fooValue%'
     * </code>
     *
     * @param     string $location The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByLocation($location = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($location)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_LOCATION, $location, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the stock_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStockStatusId(1234); // WHERE stock_status_id = 1234
     * $query->filterByStockStatusId(array(12, 34)); // WHERE stock_status_id IN (12, 34)
     * $query->filterByStockStatusId(array('min' => 12)); // WHERE stock_status_id > 12
     * </code>
     *
     * @param     mixed $stockStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByStockStatusId($stockStatusId = null, $comparison = null)
    {
        if (is_array($stockStatusId)) {
            $useMinMax = false;
            if (isset($stockStatusId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_STOCK_STATUS_ID, $stockStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stockStatusId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_STOCK_STATUS_ID, $stockStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_STOCK_STATUS_ID, $stockStatusId, $comparison);
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByManufacturerId($manufacturerId = null, $comparison = null)
    {
        if (is_array($manufacturerId)) {
            $useMinMax = false;
            if (isset($manufacturerId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_MANUFACTURER_ID, $manufacturerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($manufacturerId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_MANUFACTURER_ID, $manufacturerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_MANUFACTURER_ID, $manufacturerId, $comparison);
    }

    /**
     * Filter the query on the shipping column
     *
     * Example usage:
     * <code>
     * $query->filterByShipping(true); // WHERE shipping = true
     * $query->filterByShipping('yes'); // WHERE shipping = true
     * </code>
     *
     * @param     boolean|string $shipping The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByShipping($shipping = null, $comparison = null)
    {
        if (is_string($shipping)) {
            $shipping = in_array(strtolower($shipping), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcProductTableMap::COL_SHIPPING, $shipping, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the points column
     *
     * Example usage:
     * <code>
     * $query->filterByPoints(1234); // WHERE points = 1234
     * $query->filterByPoints(array(12, 34)); // WHERE points IN (12, 34)
     * $query->filterByPoints(array('min' => 12)); // WHERE points > 12
     * </code>
     *
     * @param     mixed $points The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByPoints($points = null, $comparison = null)
    {
        if (is_array($points)) {
            $useMinMax = false;
            if (isset($points['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_POINTS, $points['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($points['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_POINTS, $points['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_POINTS, $points, $comparison);
    }

    /**
     * Filter the query on the tax_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxClassId(1234); // WHERE tax_class_id = 1234
     * $query->filterByTaxClassId(array(12, 34)); // WHERE tax_class_id IN (12, 34)
     * $query->filterByTaxClassId(array('min' => 12)); // WHERE tax_class_id > 12
     * </code>
     *
     * @param     mixed $taxClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByTaxClassId($taxClassId = null, $comparison = null)
    {
        if (is_array($taxClassId)) {
            $useMinMax = false;
            if (isset($taxClassId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_TAX_CLASS_ID, $taxClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($taxClassId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_TAX_CLASS_ID, $taxClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_TAX_CLASS_ID, $taxClassId, $comparison);
    }

    /**
     * Filter the query on the date_available column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAvailable('2011-03-14'); // WHERE date_available = '2011-03-14'
     * $query->filterByDateAvailable('now'); // WHERE date_available = '2011-03-14'
     * $query->filterByDateAvailable(array('max' => 'yesterday')); // WHERE date_available > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAvailable The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByDateAvailable($dateAvailable = null, $comparison = null)
    {
        if (is_array($dateAvailable)) {
            $useMinMax = false;
            if (isset($dateAvailable['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_AVAILABLE, $dateAvailable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAvailable['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_AVAILABLE, $dateAvailable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_DATE_AVAILABLE, $dateAvailable, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight(1234); // WHERE weight = 1234
     * $query->filterByWeight(array(12, 34)); // WHERE weight IN (12, 34)
     * $query->filterByWeight(array('min' => 12)); // WHERE weight > 12
     * </code>
     *
     * @param     mixed $weight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (is_array($weight)) {
            $useMinMax = false;
            if (isset($weight['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WEIGHT, $weight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weight['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WEIGHT, $weight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_WEIGHT, $weight, $comparison);
    }

    /**
     * Filter the query on the weight_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWeightClassId(1234); // WHERE weight_class_id = 1234
     * $query->filterByWeightClassId(array(12, 34)); // WHERE weight_class_id IN (12, 34)
     * $query->filterByWeightClassId(array('min' => 12)); // WHERE weight_class_id > 12
     * </code>
     *
     * @param     mixed $weightClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByWeightClassId($weightClassId = null, $comparison = null)
    {
        if (is_array($weightClassId)) {
            $useMinMax = false;
            if (isset($weightClassId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WEIGHT_CLASS_ID, $weightClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weightClassId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WEIGHT_CLASS_ID, $weightClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_WEIGHT_CLASS_ID, $weightClassId, $comparison);
    }

    /**
     * Filter the query on the length column
     *
     * Example usage:
     * <code>
     * $query->filterByLength(1234); // WHERE length = 1234
     * $query->filterByLength(array(12, 34)); // WHERE length IN (12, 34)
     * $query->filterByLength(array('min' => 12)); // WHERE length > 12
     * </code>
     *
     * @param     mixed $length The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByLength($length = null, $comparison = null)
    {
        if (is_array($length)) {
            $useMinMax = false;
            if (isset($length['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_LENGTH, $length['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($length['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_LENGTH, $length['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_LENGTH, $length, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width > 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height > 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the length_class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLengthClassId(1234); // WHERE length_class_id = 1234
     * $query->filterByLengthClassId(array(12, 34)); // WHERE length_class_id IN (12, 34)
     * $query->filterByLengthClassId(array('min' => 12)); // WHERE length_class_id > 12
     * </code>
     *
     * @param     mixed $lengthClassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByLengthClassId($lengthClassId = null, $comparison = null)
    {
        if (is_array($lengthClassId)) {
            $useMinMax = false;
            if (isset($lengthClassId['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lengthClassId['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_LENGTH_CLASS_ID, $lengthClassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_LENGTH_CLASS_ID, $lengthClassId, $comparison);
    }

    /**
     * Filter the query on the subtract column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtract(true); // WHERE subtract = true
     * $query->filterBySubtract('yes'); // WHERE subtract = true
     * </code>
     *
     * @param     boolean|string $subtract The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterBySubtract($subtract = null, $comparison = null)
    {
        if (is_string($subtract)) {
            $subtract = in_array(strtolower($subtract), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcProductTableMap::COL_SUBTRACT, $subtract, $comparison);
    }

    /**
     * Filter the query on the minimum column
     *
     * Example usage:
     * <code>
     * $query->filterByMinimum(1234); // WHERE minimum = 1234
     * $query->filterByMinimum(array(12, 34)); // WHERE minimum IN (12, 34)
     * $query->filterByMinimum(array('min' => 12)); // WHERE minimum > 12
     * </code>
     *
     * @param     mixed $minimum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByMinimum($minimum = null, $comparison = null)
    {
        if (is_array($minimum)) {
            $useMinMax = false;
            if (isset($minimum['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_MINIMUM, $minimum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minimum['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_MINIMUM, $minimum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_MINIMUM, $minimum, $comparison);
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcProductTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the viewed column
     *
     * Example usage:
     * <code>
     * $query->filterByViewed(1234); // WHERE viewed = 1234
     * $query->filterByViewed(array(12, 34)); // WHERE viewed IN (12, 34)
     * $query->filterByViewed(array('min' => 12)); // WHERE viewed > 12
     * </code>
     *
     * @param     mixed $viewed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByViewed($viewed = null, $comparison = null)
    {
        if (is_array($viewed)) {
            $useMinMax = false;
            if (isset($viewed['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_VIEWED, $viewed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($viewed['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_VIEWED, $viewed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_VIEWED, $viewed, $comparison);
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
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByDateModified('2011-03-14'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified('now'); // WHERE date_modified = '2011-03-14'
     * $query->filterByDateModified(array('max' => 'yesterday')); // WHERE date_modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateModified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Filter the query on the status2 column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus2(1234); // WHERE status2 = 1234
     * $query->filterByStatus2(array(12, 34)); // WHERE status2 IN (12, 34)
     * $query->filterByStatus2(array('min' => 12)); // WHERE status2 > 12
     * </code>
     *
     * @param     mixed $status2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function filterByStatus2($status2 = null, $comparison = null)
    {
        if (is_array($status2)) {
            $useMinMax = false;
            if (isset($status2['min'])) {
                $this->addUsingAlias(OcProductTableMap::COL_STATUS2, $status2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status2['max'])) {
                $this->addUsingAlias(OcProductTableMap::COL_STATUS2, $status2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductTableMap::COL_STATUS2, $status2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProduct $ocProduct Object to remove from the list of results
     *
     * @return $this|ChildOcProductQuery The current query, for fluid interface
     */
    public function prune($ocProduct = null)
    {
        if ($ocProduct) {
            $this->addUsingAlias(OcProductTableMap::COL_PRODUCT_ID, $ocProduct->getProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductTableMap::clearInstancePool();
            OcProductTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductQuery
