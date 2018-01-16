<?php

namespace Base;

use \OcCategory as ChildOcCategory;
use \OcCategoryQuery as ChildOcCategoryQuery;
use \Exception;
use \PDO;
use Map\OcCategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_category' table.
 *
 *
 *
 * @method     ChildOcCategoryQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildOcCategoryQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcCategoryQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method     ChildOcCategoryQuery orderByTop($order = Criteria::ASC) Order by the top column
 * @method     ChildOcCategoryQuery orderByColumn($order = Criteria::ASC) Order by the column column
 * @method     ChildOcCategoryQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 * @method     ChildOcCategoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcCategoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOcCategoryQuery orderByDateModified($order = Criteria::ASC) Order by the date_modified column
 * @method     ChildOcCategoryQuery orderByCategorySiteId($order = Criteria::ASC) Order by the category_site_id column
 * @method     ChildOcCategoryQuery orderByCss($order = Criteria::ASC) Order by the css column
 * @method     ChildOcCategoryQuery orderByClass($order = Criteria::ASC) Order by the class column
 *
 * @method     ChildOcCategoryQuery groupByCategoryId() Group by the category_id column
 * @method     ChildOcCategoryQuery groupByImage() Group by the image column
 * @method     ChildOcCategoryQuery groupByParentId() Group by the parent_id column
 * @method     ChildOcCategoryQuery groupByTop() Group by the top column
 * @method     ChildOcCategoryQuery groupByColumn() Group by the column column
 * @method     ChildOcCategoryQuery groupBySortOrder() Group by the sort_order column
 * @method     ChildOcCategoryQuery groupByStatus() Group by the status column
 * @method     ChildOcCategoryQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOcCategoryQuery groupByDateModified() Group by the date_modified column
 * @method     ChildOcCategoryQuery groupByCategorySiteId() Group by the category_site_id column
 * @method     ChildOcCategoryQuery groupByCss() Group by the css column
 * @method     ChildOcCategoryQuery groupByClass() Group by the class column
 *
 * @method     ChildOcCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcCategoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcCategoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcCategoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcCategory findOne(ConnectionInterface $con = null) Return the first ChildOcCategory matching the query
 * @method     ChildOcCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcCategory matching the query, or a new ChildOcCategory object populated from the query conditions when no match is found
 *
 * @method     ChildOcCategory findOneByCategoryId(int $category_id) Return the first ChildOcCategory filtered by the category_id column
 * @method     ChildOcCategory findOneByImage(string $image) Return the first ChildOcCategory filtered by the image column
 * @method     ChildOcCategory findOneByParentId(int $parent_id) Return the first ChildOcCategory filtered by the parent_id column
 * @method     ChildOcCategory findOneByTop(boolean $top) Return the first ChildOcCategory filtered by the top column
 * @method     ChildOcCategory findOneByColumn(int $column) Return the first ChildOcCategory filtered by the column column
 * @method     ChildOcCategory findOneBySortOrder(int $sort_order) Return the first ChildOcCategory filtered by the sort_order column
 * @method     ChildOcCategory findOneByStatus(int $status) Return the first ChildOcCategory filtered by the status column
 * @method     ChildOcCategory findOneByDateAdded(string $date_added) Return the first ChildOcCategory filtered by the date_added column
 * @method     ChildOcCategory findOneByDateModified(string $date_modified) Return the first ChildOcCategory filtered by the date_modified column
 * @method     ChildOcCategory findOneByCategorySiteId(int $category_site_id) Return the first ChildOcCategory filtered by the category_site_id column
 * @method     ChildOcCategory findOneByCss(string $css) Return the first ChildOcCategory filtered by the css column
 * @method     ChildOcCategory findOneByClass(string $class) Return the first ChildOcCategory filtered by the class column *

 * @method     ChildOcCategory requirePk($key, ConnectionInterface $con = null) Return the ChildOcCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOne(ConnectionInterface $con = null) Return the first ChildOcCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategory requireOneByCategoryId(int $category_id) Return the first ChildOcCategory filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByImage(string $image) Return the first ChildOcCategory filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByParentId(int $parent_id) Return the first ChildOcCategory filtered by the parent_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByTop(boolean $top) Return the first ChildOcCategory filtered by the top column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByColumn(int $column) Return the first ChildOcCategory filtered by the column column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneBySortOrder(int $sort_order) Return the first ChildOcCategory filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByStatus(int $status) Return the first ChildOcCategory filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByDateAdded(string $date_added) Return the first ChildOcCategory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByDateModified(string $date_modified) Return the first ChildOcCategory filtered by the date_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByCategorySiteId(int $category_site_id) Return the first ChildOcCategory filtered by the category_site_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByCss(string $css) Return the first ChildOcCategory filtered by the css column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcCategory requireOneByClass(string $class) Return the first ChildOcCategory filtered by the class column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcCategory objects based on current ModelCriteria
 * @method     ChildOcCategory[]|ObjectCollection findByCategoryId(int $category_id) Return ChildOcCategory objects filtered by the category_id column
 * @method     ChildOcCategory[]|ObjectCollection findByImage(string $image) Return ChildOcCategory objects filtered by the image column
 * @method     ChildOcCategory[]|ObjectCollection findByParentId(int $parent_id) Return ChildOcCategory objects filtered by the parent_id column
 * @method     ChildOcCategory[]|ObjectCollection findByTop(boolean $top) Return ChildOcCategory objects filtered by the top column
 * @method     ChildOcCategory[]|ObjectCollection findByColumn(int $column) Return ChildOcCategory objects filtered by the column column
 * @method     ChildOcCategory[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcCategory objects filtered by the sort_order column
 * @method     ChildOcCategory[]|ObjectCollection findByStatus(int $status) Return ChildOcCategory objects filtered by the status column
 * @method     ChildOcCategory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcCategory objects filtered by the date_added column
 * @method     ChildOcCategory[]|ObjectCollection findByDateModified(string $date_modified) Return ChildOcCategory objects filtered by the date_modified column
 * @method     ChildOcCategory[]|ObjectCollection findByCategorySiteId(int $category_site_id) Return ChildOcCategory objects filtered by the category_site_id column
 * @method     ChildOcCategory[]|ObjectCollection findByCss(string $css) Return ChildOcCategory objects filtered by the css column
 * @method     ChildOcCategory[]|ObjectCollection findByClass(string $class) Return ChildOcCategory objects filtered by the class column
 * @method     ChildOcCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcCategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcCategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcCategoryQuery) {
            return $criteria;
        }
        $query = new ChildOcCategoryQuery();
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
     * @return ChildOcCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcCategoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcCategoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT category_id, image, parent_id, top, column, sort_order, status, date_added, date_modified, category_site_id, css, class FROM oc_category WHERE category_id = :p0';
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
            /** @var ChildOcCategory $obj */
            $obj = new ChildOcCategory();
            $obj->hydrate($row);
            OcCategoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
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
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id > 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the top column
     *
     * Example usage:
     * <code>
     * $query->filterByTop(true); // WHERE top = true
     * $query->filterByTop('yes'); // WHERE top = true
     * </code>
     *
     * @param     boolean|string $top The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByTop($top = null, $comparison = null)
    {
        if (is_string($top)) {
            $top = in_array(strtolower($top), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_TOP, $top, $comparison);
    }

    /**
     * Filter the query on the column column
     *
     * Example usage:
     * <code>
     * $query->filterByColumn(1234); // WHERE column = 1234
     * $query->filterByColumn(array(12, 34)); // WHERE column IN (12, 34)
     * $query->filterByColumn(array('min' => 12)); // WHERE column > 12
     * </code>
     *
     * @param     mixed $column The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByColumn($column = null, $comparison = null)
    {
        if (is_array($column)) {
            $useMinMax = false;
            if (isset($column['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_COLUMN, $column['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($column['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_COLUMN, $column['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_COLUMN, $column, $comparison);
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
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByDateModified($dateModified = null, $comparison = null)
    {
        if (is_array($dateModified)) {
            $useMinMax = false;
            if (isset($dateModified['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_DATE_MODIFIED, $dateModified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateModified['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_DATE_MODIFIED, $dateModified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_DATE_MODIFIED, $dateModified, $comparison);
    }

    /**
     * Filter the query on the category_site_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategorySiteId(1234); // WHERE category_site_id = 1234
     * $query->filterByCategorySiteId(array(12, 34)); // WHERE category_site_id IN (12, 34)
     * $query->filterByCategorySiteId(array('min' => 12)); // WHERE category_site_id > 12
     * </code>
     *
     * @param     mixed $categorySiteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByCategorySiteId($categorySiteId = null, $comparison = null)
    {
        if (is_array($categorySiteId)) {
            $useMinMax = false;
            if (isset($categorySiteId['min'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_SITE_ID, $categorySiteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categorySiteId['max'])) {
                $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_SITE_ID, $categorySiteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_SITE_ID, $categorySiteId, $comparison);
    }

    /**
     * Filter the query on the css column
     *
     * Example usage:
     * <code>
     * $query->filterByCss('fooValue');   // WHERE css = 'fooValue'
     * $query->filterByCss('%fooValue%', Criteria::LIKE); // WHERE css LIKE '%fooValue%'
     * </code>
     *
     * @param     string $css The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByCss($css = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($css)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_CSS, $css, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass('fooValue');   // WHERE class = 'fooValue'
     * $query->filterByClass('%fooValue%', Criteria::LIKE); // WHERE class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $class The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($class)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcCategoryTableMap::COL_CLASS, $class, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcCategory $ocCategory Object to remove from the list of results
     *
     * @return $this|ChildOcCategoryQuery The current query, for fluid interface
     */
    public function prune($ocCategory = null)
    {
        if ($ocCategory) {
            $this->addUsingAlias(OcCategoryTableMap::COL_CATEGORY_ID, $ocCategory->getCategoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcCategoryTableMap::clearInstancePool();
            OcCategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcCategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcCategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcCategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcCategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcCategoryQuery
