<?php

namespace Base;

use \OcBannerImage as ChildOcBannerImage;
use \OcBannerImageQuery as ChildOcBannerImageQuery;
use \Exception;
use \PDO;
use Map\OcBannerImageTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_banner_image' table.
 *
 *
 *
 * @method     ChildOcBannerImageQuery orderByBannerImageId($order = Criteria::ASC) Order by the banner_image_id column
 * @method     ChildOcBannerImageQuery orderByBannerId($order = Criteria::ASC) Order by the banner_id column
 * @method     ChildOcBannerImageQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcBannerImageQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOcBannerImageQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildOcBannerImageQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcBannerImageQuery orderBySortOrder($order = Criteria::ASC) Order by the sort_order column
 *
 * @method     ChildOcBannerImageQuery groupByBannerImageId() Group by the banner_image_id column
 * @method     ChildOcBannerImageQuery groupByBannerId() Group by the banner_id column
 * @method     ChildOcBannerImageQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcBannerImageQuery groupByTitle() Group by the title column
 * @method     ChildOcBannerImageQuery groupByLink() Group by the link column
 * @method     ChildOcBannerImageQuery groupByImage() Group by the image column
 * @method     ChildOcBannerImageQuery groupBySortOrder() Group by the sort_order column
 *
 * @method     ChildOcBannerImageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcBannerImageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcBannerImageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcBannerImageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcBannerImageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcBannerImageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcBannerImage findOne(ConnectionInterface $con = null) Return the first ChildOcBannerImage matching the query
 * @method     ChildOcBannerImage findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcBannerImage matching the query, or a new ChildOcBannerImage object populated from the query conditions when no match is found
 *
 * @method     ChildOcBannerImage findOneByBannerImageId(int $banner_image_id) Return the first ChildOcBannerImage filtered by the banner_image_id column
 * @method     ChildOcBannerImage findOneByBannerId(int $banner_id) Return the first ChildOcBannerImage filtered by the banner_id column
 * @method     ChildOcBannerImage findOneByLanguageId(int $language_id) Return the first ChildOcBannerImage filtered by the language_id column
 * @method     ChildOcBannerImage findOneByTitle(string $title) Return the first ChildOcBannerImage filtered by the title column
 * @method     ChildOcBannerImage findOneByLink(string $link) Return the first ChildOcBannerImage filtered by the link column
 * @method     ChildOcBannerImage findOneByImage(string $image) Return the first ChildOcBannerImage filtered by the image column
 * @method     ChildOcBannerImage findOneBySortOrder(int $sort_order) Return the first ChildOcBannerImage filtered by the sort_order column *

 * @method     ChildOcBannerImage requirePk($key, ConnectionInterface $con = null) Return the ChildOcBannerImage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOne(ConnectionInterface $con = null) Return the first ChildOcBannerImage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcBannerImage requireOneByBannerImageId(int $banner_image_id) Return the first ChildOcBannerImage filtered by the banner_image_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneByBannerId(int $banner_id) Return the first ChildOcBannerImage filtered by the banner_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneByLanguageId(int $language_id) Return the first ChildOcBannerImage filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneByTitle(string $title) Return the first ChildOcBannerImage filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneByLink(string $link) Return the first ChildOcBannerImage filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneByImage(string $image) Return the first ChildOcBannerImage filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcBannerImage requireOneBySortOrder(int $sort_order) Return the first ChildOcBannerImage filtered by the sort_order column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcBannerImage[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcBannerImage objects based on current ModelCriteria
 * @method     ChildOcBannerImage[]|ObjectCollection findByBannerImageId(int $banner_image_id) Return ChildOcBannerImage objects filtered by the banner_image_id column
 * @method     ChildOcBannerImage[]|ObjectCollection findByBannerId(int $banner_id) Return ChildOcBannerImage objects filtered by the banner_id column
 * @method     ChildOcBannerImage[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcBannerImage objects filtered by the language_id column
 * @method     ChildOcBannerImage[]|ObjectCollection findByTitle(string $title) Return ChildOcBannerImage objects filtered by the title column
 * @method     ChildOcBannerImage[]|ObjectCollection findByLink(string $link) Return ChildOcBannerImage objects filtered by the link column
 * @method     ChildOcBannerImage[]|ObjectCollection findByImage(string $image) Return ChildOcBannerImage objects filtered by the image column
 * @method     ChildOcBannerImage[]|ObjectCollection findBySortOrder(int $sort_order) Return ChildOcBannerImage objects filtered by the sort_order column
 * @method     ChildOcBannerImage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcBannerImageQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcBannerImageQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcBannerImage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcBannerImageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcBannerImageQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcBannerImageQuery) {
            return $criteria;
        }
        $query = new ChildOcBannerImageQuery();
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
     * @return ChildOcBannerImage|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcBannerImageTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcBannerImageTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcBannerImage A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT banner_image_id, banner_id, language_id, title, link, image, sort_order FROM oc_banner_image WHERE banner_image_id = :p0';
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
            /** @var ChildOcBannerImage $obj */
            $obj = new ChildOcBannerImage();
            $obj->hydrate($row);
            OcBannerImageTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcBannerImage|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the banner_image_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBannerImageId(1234); // WHERE banner_image_id = 1234
     * $query->filterByBannerImageId(array(12, 34)); // WHERE banner_image_id IN (12, 34)
     * $query->filterByBannerImageId(array('min' => 12)); // WHERE banner_image_id > 12
     * </code>
     *
     * @param     mixed $bannerImageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByBannerImageId($bannerImageId = null, $comparison = null)
    {
        if (is_array($bannerImageId)) {
            $useMinMax = false;
            if (isset($bannerImageId['min'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $bannerImageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bannerImageId['max'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $bannerImageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $bannerImageId, $comparison);
    }

    /**
     * Filter the query on the banner_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBannerId(1234); // WHERE banner_id = 1234
     * $query->filterByBannerId(array(12, 34)); // WHERE banner_id IN (12, 34)
     * $query->filterByBannerId(array('min' => 12)); // WHERE banner_id > 12
     * </code>
     *
     * @param     mixed $bannerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByBannerId($bannerId = null, $comparison = null)
    {
        if (is_array($bannerId)) {
            $useMinMax = false;
            if (isset($bannerId['min'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_ID, $bannerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bannerId['max'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_ID, $bannerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_ID, $bannerId, $comparison);
    }

    /**
     * Filter the query on the language_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguageId(1234); // WHERE language_id = 1234
     * $query->filterByLanguageId(array(12, 34)); // WHERE language_id IN (12, 34)
     * $query->filterByLanguageId(array('min' => 12)); // WHERE language_id > 12
     * </code>
     *
     * @param     mixed $languageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
     * $query->filterByLink('%fooValue%', Criteria::LIKE); // WHERE link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_LINK, $link, $comparison);
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
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_IMAGE, $image, $comparison);
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
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function filterBySortOrder($sortOrder = null, $comparison = null)
    {
        if (is_array($sortOrder)) {
            $useMinMax = false;
            if (isset($sortOrder['min'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_SORT_ORDER, $sortOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sortOrder['max'])) {
                $this->addUsingAlias(OcBannerImageTableMap::COL_SORT_ORDER, $sortOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcBannerImageTableMap::COL_SORT_ORDER, $sortOrder, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcBannerImage $ocBannerImage Object to remove from the list of results
     *
     * @return $this|ChildOcBannerImageQuery The current query, for fluid interface
     */
    public function prune($ocBannerImage = null)
    {
        if ($ocBannerImage) {
            $this->addUsingAlias(OcBannerImageTableMap::COL_BANNER_IMAGE_ID, $ocBannerImage->getBannerImageId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_banner_image table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcBannerImageTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcBannerImageTableMap::clearInstancePool();
            OcBannerImageTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcBannerImageTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcBannerImageTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcBannerImageTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcBannerImageTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcBannerImageQuery
