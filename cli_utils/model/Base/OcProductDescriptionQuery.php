<?php

namespace Base;

use \OcProductDescription as ChildOcProductDescription;
use \OcProductDescriptionQuery as ChildOcProductDescriptionQuery;
use \Exception;
use \PDO;
use Map\OcProductDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_product_description' table.
 *
 *
 *
 * @method     ChildOcProductDescriptionQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOcProductDescriptionQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcProductDescriptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcProductDescriptionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcProductDescriptionQuery orderByTag($order = Criteria::ASC) Order by the tag column
 * @method     ChildOcProductDescriptionQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     ChildOcProductDescriptionQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     ChildOcProductDescriptionQuery orderByMetaKeyword($order = Criteria::ASC) Order by the meta_keyword column
 * @method     ChildOcProductDescriptionQuery orderByNewslatest($order = Criteria::ASC) Order by the newslatest column
 * @method     ChildOcProductDescriptionQuery orderByShowNewslatest($order = Criteria::ASC) Order by the show_newslatest column
 * @method     ChildOcProductDescriptionQuery orderBySmallDescription($order = Criteria::ASC) Order by the small_description column
 *
 * @method     ChildOcProductDescriptionQuery groupByProductId() Group by the product_id column
 * @method     ChildOcProductDescriptionQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcProductDescriptionQuery groupByName() Group by the name column
 * @method     ChildOcProductDescriptionQuery groupByDescription() Group by the description column
 * @method     ChildOcProductDescriptionQuery groupByTag() Group by the tag column
 * @method     ChildOcProductDescriptionQuery groupByMetaTitle() Group by the meta_title column
 * @method     ChildOcProductDescriptionQuery groupByMetaDescription() Group by the meta_description column
 * @method     ChildOcProductDescriptionQuery groupByMetaKeyword() Group by the meta_keyword column
 * @method     ChildOcProductDescriptionQuery groupByNewslatest() Group by the newslatest column
 * @method     ChildOcProductDescriptionQuery groupByShowNewslatest() Group by the show_newslatest column
 * @method     ChildOcProductDescriptionQuery groupBySmallDescription() Group by the small_description column
 *
 * @method     ChildOcProductDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcProductDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcProductDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcProductDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcProductDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcProductDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcProductDescription findOne(ConnectionInterface $con = null) Return the first ChildOcProductDescription matching the query
 * @method     ChildOcProductDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcProductDescription matching the query, or a new ChildOcProductDescription object populated from the query conditions when no match is found
 *
 * @method     ChildOcProductDescription findOneByProductId(int $product_id) Return the first ChildOcProductDescription filtered by the product_id column
 * @method     ChildOcProductDescription findOneByLanguageId(int $language_id) Return the first ChildOcProductDescription filtered by the language_id column
 * @method     ChildOcProductDescription findOneByName(string $name) Return the first ChildOcProductDescription filtered by the name column
 * @method     ChildOcProductDescription findOneByDescription(string $description) Return the first ChildOcProductDescription filtered by the description column
 * @method     ChildOcProductDescription findOneByTag(string $tag) Return the first ChildOcProductDescription filtered by the tag column
 * @method     ChildOcProductDescription findOneByMetaTitle(string $meta_title) Return the first ChildOcProductDescription filtered by the meta_title column
 * @method     ChildOcProductDescription findOneByMetaDescription(string $meta_description) Return the first ChildOcProductDescription filtered by the meta_description column
 * @method     ChildOcProductDescription findOneByMetaKeyword(string $meta_keyword) Return the first ChildOcProductDescription filtered by the meta_keyword column
 * @method     ChildOcProductDescription findOneByNewslatest(string $newslatest) Return the first ChildOcProductDescription filtered by the newslatest column
 * @method     ChildOcProductDescription findOneByShowNewslatest(int $show_newslatest) Return the first ChildOcProductDescription filtered by the show_newslatest column
 * @method     ChildOcProductDescription findOneBySmallDescription(string $small_description) Return the first ChildOcProductDescription filtered by the small_description column *

 * @method     ChildOcProductDescription requirePk($key, ConnectionInterface $con = null) Return the ChildOcProductDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOne(ConnectionInterface $con = null) Return the first ChildOcProductDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductDescription requireOneByProductId(int $product_id) Return the first ChildOcProductDescription filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByLanguageId(int $language_id) Return the first ChildOcProductDescription filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByName(string $name) Return the first ChildOcProductDescription filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByDescription(string $description) Return the first ChildOcProductDescription filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByTag(string $tag) Return the first ChildOcProductDescription filtered by the tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByMetaTitle(string $meta_title) Return the first ChildOcProductDescription filtered by the meta_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByMetaDescription(string $meta_description) Return the first ChildOcProductDescription filtered by the meta_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByMetaKeyword(string $meta_keyword) Return the first ChildOcProductDescription filtered by the meta_keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByNewslatest(string $newslatest) Return the first ChildOcProductDescription filtered by the newslatest column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneByShowNewslatest(int $show_newslatest) Return the first ChildOcProductDescription filtered by the show_newslatest column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcProductDescription requireOneBySmallDescription(string $small_description) Return the first ChildOcProductDescription filtered by the small_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcProductDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcProductDescription objects based on current ModelCriteria
 * @method     ChildOcProductDescription[]|ObjectCollection findByProductId(int $product_id) Return ChildOcProductDescription objects filtered by the product_id column
 * @method     ChildOcProductDescription[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcProductDescription objects filtered by the language_id column
 * @method     ChildOcProductDescription[]|ObjectCollection findByName(string $name) Return ChildOcProductDescription objects filtered by the name column
 * @method     ChildOcProductDescription[]|ObjectCollection findByDescription(string $description) Return ChildOcProductDescription objects filtered by the description column
 * @method     ChildOcProductDescription[]|ObjectCollection findByTag(string $tag) Return ChildOcProductDescription objects filtered by the tag column
 * @method     ChildOcProductDescription[]|ObjectCollection findByMetaTitle(string $meta_title) Return ChildOcProductDescription objects filtered by the meta_title column
 * @method     ChildOcProductDescription[]|ObjectCollection findByMetaDescription(string $meta_description) Return ChildOcProductDescription objects filtered by the meta_description column
 * @method     ChildOcProductDescription[]|ObjectCollection findByMetaKeyword(string $meta_keyword) Return ChildOcProductDescription objects filtered by the meta_keyword column
 * @method     ChildOcProductDescription[]|ObjectCollection findByNewslatest(string $newslatest) Return ChildOcProductDescription objects filtered by the newslatest column
 * @method     ChildOcProductDescription[]|ObjectCollection findByShowNewslatest(int $show_newslatest) Return ChildOcProductDescription objects filtered by the show_newslatest column
 * @method     ChildOcProductDescription[]|ObjectCollection findBySmallDescription(string $small_description) Return ChildOcProductDescription objects filtered by the small_description column
 * @method     ChildOcProductDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcProductDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcProductDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcProductDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcProductDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcProductDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcProductDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildOcProductDescriptionQuery();
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
     * @param array[$product_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcProductDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcProductDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcProductDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcProductDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_id, language_id, name, description, tag, meta_title, meta_description, meta_keyword, newslatest, show_newslatest, small_description FROM oc_product_description WHERE product_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcProductDescription $obj */
            $obj = new ChildOcProductDescription();
            $obj->hydrate($row);
            OcProductDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcProductDescription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcProductDescriptionTableMap::COL_PRODUCT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcProductDescriptionTableMap::COL_PRODUCT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the tag column
     *
     * Example usage:
     * <code>
     * $query->filterByTag('fooValue');   // WHERE tag = 'fooValue'
     * $query->filterByTag('%fooValue%', Criteria::LIKE); // WHERE tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByTag($tag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_TAG, $tag, $comparison);
    }

    /**
     * Filter the query on the meta_title column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
     * $query->filterByMetaTitle('%fooValue%', Criteria::LIKE); // WHERE meta_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_META_TITLE, $metaTitle, $comparison);
    }

    /**
     * Filter the query on the meta_description column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
     * $query->filterByMetaDescription('%fooValue%', Criteria::LIKE); // WHERE meta_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_META_DESCRIPTION, $metaDescription, $comparison);
    }

    /**
     * Filter the query on the meta_keyword column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaKeyword('fooValue');   // WHERE meta_keyword = 'fooValue'
     * $query->filterByMetaKeyword('%fooValue%', Criteria::LIKE); // WHERE meta_keyword LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaKeyword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaKeyword($metaKeyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_META_KEYWORD, $metaKeyword, $comparison);
    }

    /**
     * Filter the query on the newslatest column
     *
     * Example usage:
     * <code>
     * $query->filterByNewslatest('fooValue');   // WHERE newslatest = 'fooValue'
     * $query->filterByNewslatest('%fooValue%', Criteria::LIKE); // WHERE newslatest LIKE '%fooValue%'
     * </code>
     *
     * @param     string $newslatest The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByNewslatest($newslatest = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newslatest)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_NEWSLATEST, $newslatest, $comparison);
    }

    /**
     * Filter the query on the show_newslatest column
     *
     * Example usage:
     * <code>
     * $query->filterByShowNewslatest(1234); // WHERE show_newslatest = 1234
     * $query->filterByShowNewslatest(array(12, 34)); // WHERE show_newslatest IN (12, 34)
     * $query->filterByShowNewslatest(array('min' => 12)); // WHERE show_newslatest > 12
     * </code>
     *
     * @param     mixed $showNewslatest The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterByShowNewslatest($showNewslatest = null, $comparison = null)
    {
        if (is_array($showNewslatest)) {
            $useMinMax = false;
            if (isset($showNewslatest['min'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST, $showNewslatest['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($showNewslatest['max'])) {
                $this->addUsingAlias(OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST, $showNewslatest['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_SHOW_NEWSLATEST, $showNewslatest, $comparison);
    }

    /**
     * Filter the query on the small_description column
     *
     * Example usage:
     * <code>
     * $query->filterBySmallDescription('fooValue');   // WHERE small_description = 'fooValue'
     * $query->filterBySmallDescription('%fooValue%', Criteria::LIKE); // WHERE small_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $smallDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function filterBySmallDescription($smallDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($smallDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcProductDescriptionTableMap::COL_SMALL_DESCRIPTION, $smallDescription, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcProductDescription $ocProductDescription Object to remove from the list of results
     *
     * @return $this|ChildOcProductDescriptionQuery The current query, for fluid interface
     */
    public function prune($ocProductDescription = null)
    {
        if ($ocProductDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcProductDescriptionTableMap::COL_PRODUCT_ID), $ocProductDescription->getProductId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcProductDescriptionTableMap::COL_LANGUAGE_ID), $ocProductDescription->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_product_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcProductDescriptionTableMap::clearInstancePool();
            OcProductDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcProductDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcProductDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcProductDescriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcProductDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcProductDescriptionQuery
