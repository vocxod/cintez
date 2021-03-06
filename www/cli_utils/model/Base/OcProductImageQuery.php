<?php

namespace Base;

use \OcProductImage as ChildOcProductImage;
use \OcProductImageQuery as ChildOcProductImageQuery;
use \Exception;
use \PDO;
use Map\OcProductImageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product_image' table.
 *
 *
 *
 * @method     ChildOcProductImageQuery orderByProductImageId($order = Criteria::ASC) Order by the product_image_id column
 * @method     ChildOcProductImageQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductImageQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcProductImageQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcProductImageQuery groupByProductImageId() Group by the product_image_id column
 * @method     ChildOcProductImageQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductImageQuery groupByImage() Group by the image column
 * @method     ChildOcProductImageQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcProductImageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductImageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductImageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductImageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductImageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductImageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProductImage findOne(ConnectionInterface $con = null) Return the first ChildOcProductImage matching the query
 * @method     ChildOcProductImage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProductImage matching the query, or a new ChildOcProductImage object populated from the query conditions when no match is found
 *
 * @method     ChildOcProductImage findOneByProductImageId(int $product_image_id) Return the first ChildOcProductImage filtered by the product_image_id column
 * @method     ChildOcProductImage findOneByProductId(int $product_id) Return the first ChildOcProductImage filtered by the product_id column
 * @method     ChildOcProductImage findOneByImage(string $image) Return the first ChildOcProductImage filtered by the image column
 * @method     ChildOcProductImage findOneBySortOrder(int $sort_order) Return the first ChildOcProductImage filtered by the sort_order column *

 * @method     ChildOcProductImage requirePk($key, ConnectionInterface $con = null) Return the ChildOcProductImage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductImage requireOne(ConnectionInterface $con = null) Return the first ChildOcProductImage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductImage requireOneByProductImageId(int $product_image_id) Return the first ChildOcProductImage filtered by the product_image_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductImage requireOneByProductId(int $product_id) Return the first ChildOcProductImage filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductImage requireOneByImage(string $image) Return the first ChildOcProductImage filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductImage requireOneBySortOrder(int $sort_order) Return the first ChildOcProductImage filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductImage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProductImage objects based on current ModelCriteria
 * @method     ChildOcProductImage[]|ObjectCollection findByProductImageId(int $product_image_id) Return ChildOcProductImage objects filtered by the product_image_id column
 * @method     ChildOcProductImage[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProductImage objects filtered by the product_id column
 * @method     ChildOcProductImage[]|ObjectCollection findByImage(string $image) Return ChildOcProductImage objects filtered by the image column
 * @method     ChildOcProductImage[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcProductImage objects filtered by the sort_order column
 * @method     ChildOcProductImage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductImageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductImageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProductImage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductImageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductImageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductImageQuery) {
            return $criteria;
        }
        $query = new ChildOcProductImageQuery();
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
     * @return ChildOcProductImage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductImageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductImageTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcProductImage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_image_id, product_id, image, sort_order FROM oc_product_image WHERE product_image_id = :p0';
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
            /** @var ChildOcProductImage $obj */
            $obj = new ChildOcProductImage();
            $obj->hydrate($row);
            OcProductImageTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcProductImage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the product_image_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductImageId(1234); // WHERE product_image_id = 1234
     * $query->filterByProductImageId(array(12, 34)); // WHERE product_image_id IN (12, 34)
     * $query->filterByProductImageId(array('min' => 12)); // WHERE product_image_id > 12
     * </code>
     *
     * @param     mixed $productImageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterByProductImageId($productImageId = null, $comparison = null)
    {
        if (is_array($productImageId)) {
            $useMinMax = false;
            if (isset($productImageId['min'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $productImageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productImageId['max'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $productImageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $productImageId, $comparison);
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
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductImageTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcProductImageTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductImageTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProductImage $ocProductImage Object to remove from the list of results
     *
     * @return $this|ChildOcProductImageQuery The current query, for fluid interface
     */
    public function prune($ocProductImage = null)
    {
        if ($ocProductImage) {
            $this->addUsingAlias(OcProductImageTableMap::COL_PRODUCT_IMAGE_ID, $ocProductImage->getProductImageId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product_image table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductImageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductImageTableMap::clearInstancePool();
            OcProductImageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductImageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductImageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductImageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductImageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductImageQuery
