<?php

namespace Base;

use \OcInformationDescription as ChildOcInformationDescription;
use \OcInformationDescriptionQuery as ChildOcInformationDescriptionQuery;
use \Exception;
use \PDO;
use Map\OcInformationDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_information_description' table.
 *
 *
 *
 * @method     ChildOcInformationDescriptionQuery orderByInformationId($order = Criteria::ASC) Order by the information_id column
 * @method     ChildOcInformationDescriptionQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     ChildOcInformationDescriptionQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOcInformationDescriptionQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildOcInformationDescriptionQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     ChildOcInformationDescriptionQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     ChildOcInformationDescriptionQuery orderByMetaKeyword($order = Criteria::ASC) Order by the meta_keyword column
 * @method     ChildOcInformationDescriptionQuery orderByForegroundText($order = Criteria::ASC) Order by the foreground_text column
 * @method     ChildOcInformationDescriptionQuery orderByForegroundImage($order = Criteria::ASC) Order by the foreground_image column
 *
 * @method     ChildOcInformationDescriptionQuery groupByInformationId() Group by the information_id column
 * @method     ChildOcInformationDescriptionQuery groupByLanguageId() Group by the language_id column
 * @method     ChildOcInformationDescriptionQuery groupByTitle() Group by the title column
 * @method     ChildOcInformationDescriptionQuery groupByDescription() Group by the description column
 * @method     ChildOcInformationDescriptionQuery groupByMetaTitle() Group by the meta_title column
 * @method     ChildOcInformationDescriptionQuery groupByMetaDescription() Group by the meta_description column
 * @method     ChildOcInformationDescriptionQuery groupByMetaKeyword() Group by the meta_keyword column
 * @method     ChildOcInformationDescriptionQuery groupByForegroundText() Group by the foreground_text column
 * @method     ChildOcInformationDescriptionQuery groupByForegroundImage() Group by the foreground_image column
 *
 * @method     ChildOcInformationDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcInformationDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcInformationDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcInformationDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcInformationDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcInformationDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcInformationDescription findOne(ConnectionInterface $con = null) Return the first ChildOcInformationDescription matching the query
 * @method     ChildOcInformationDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcInformationDescription matching the query, or a new ChildOcInformationDescription object populated from the query conditions when no match is found
 *
 * @method     ChildOcInformationDescription findOneByInformationId(int $information_id) Return the first ChildOcInformationDescription filtered by the information_id column
 * @method     ChildOcInformationDescription findOneByLanguageId(int $language_id) Return the first ChildOcInformationDescription filtered by the language_id column
 * @method     ChildOcInformationDescription findOneByTitle(string $title) Return the first ChildOcInformationDescription filtered by the title column
 * @method     ChildOcInformationDescription findOneByDescription(string $description) Return the first ChildOcInformationDescription filtered by the description column
 * @method     ChildOcInformationDescription findOneByMetaTitle(string $meta_title) Return the first ChildOcInformationDescription filtered by the meta_title column
 * @method     ChildOcInformationDescription findOneByMetaDescription(string $meta_description) Return the first ChildOcInformationDescription filtered by the meta_description column
 * @method     ChildOcInformationDescription findOneByMetaKeyword(string $meta_keyword) Return the first ChildOcInformationDescription filtered by the meta_keyword column
 * @method     ChildOcInformationDescription findOneByForegroundText(string $foreground_text) Return the first ChildOcInformationDescription filtered by the foreground_text column
 * @method     ChildOcInformationDescription findOneByForegroundImage(string $foreground_image) Return the first ChildOcInformationDescription filtered by the foreground_image column *

 * @method     ChildOcInformationDescription requirePk($key, ConnectionInterface $con = null) Return the ChildOcInformationDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOne(ConnectionInterface $con = null) Return the first ChildOcInformationDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationDescription requireOneByInformationId(int $information_id) Return the first ChildOcInformationDescription filtered by the information_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByLanguageId(int $language_id) Return the first ChildOcInformationDescription filtered by the language_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByTitle(string $title) Return the first ChildOcInformationDescription filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByDescription(string $description) Return the first ChildOcInformationDescription filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByMetaTitle(string $meta_title) Return the first ChildOcInformationDescription filtered by the meta_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByMetaDescription(string $meta_description) Return the first ChildOcInformationDescription filtered by the meta_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByMetaKeyword(string $meta_keyword) Return the first ChildOcInformationDescription filtered by the meta_keyword column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByForegroundText(string $foreground_text) Return the first ChildOcInformationDescription filtered by the foreground_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcInformationDescription requireOneByForegroundImage(string $foreground_image) Return the first ChildOcInformationDescription filtered by the foreground_image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcInformationDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcInformationDescription objects based on current ModelCriteria
 * @method     ChildOcInformationDescription[]|ObjectCollection findByInformationId(int $information_id) Return ChildOcInformationDescription objects filtered by the information_id column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByLanguageId(int $language_id) Return ChildOcInformationDescription objects filtered by the language_id column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByTitle(string $title) Return ChildOcInformationDescription objects filtered by the title column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByDescription(string $description) Return ChildOcInformationDescription objects filtered by the description column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByMetaTitle(string $meta_title) Return ChildOcInformationDescription objects filtered by the meta_title column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByMetaDescription(string $meta_description) Return ChildOcInformationDescription objects filtered by the meta_description column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByMetaKeyword(string $meta_keyword) Return ChildOcInformationDescription objects filtered by the meta_keyword column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByForegroundText(string $foreground_text) Return ChildOcInformationDescription objects filtered by the foreground_text column
 * @method     ChildOcInformationDescription[]|ObjectCollection findByForegroundImage(string $foreground_image) Return ChildOcInformationDescription objects filtered by the foreground_image column
 * @method     ChildOcInformationDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcInformationDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcInformationDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcInformationDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcInformationDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcInformationDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcInformationDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildOcInformationDescriptionQuery();
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
     * @param array[$information_id, $language_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOcInformationDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcInformationDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcInformationDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOcInformationDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT information_id, language_id, title, description, meta_title, meta_description, meta_keyword, foreground_text, foreground_image FROM oc_information_description WHERE information_id = :p0 AND language_id = :p1';
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
            /** @var ChildOcInformationDescription $obj */
            $obj = new ChildOcInformationDescription();
            $obj->hydrate($row);
            OcInformationDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOcInformationDescription|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByInformationId($informationId = null, $comparison = null)
    {
        if (is_array($informationId)) {
            $useMinMax = false;
            if (isset($informationId['min'])) {
                $this->addUsingAlias(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $informationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($informationId['max'])) {
                $this->addUsingAlias(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $informationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_INFORMATION_ID, $informationId, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByLanguageId($languageId = null, $comparison = null)
    {
        if (is_array($languageId)) {
            $useMinMax = false;
            if (isset($languageId['min'])) {
                $this->addUsingAlias(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $languageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($languageId['max'])) {
                $this->addUsingAlias(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $languageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_LANGUAGE_ID, $languageId, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_META_TITLE, $metaTitle, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_META_DESCRIPTION, $metaDescription, $comparison);
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
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByMetaKeyword($metaKeyword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeyword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_META_KEYWORD, $metaKeyword, $comparison);
    }

    /**
     * Filter the query on the foreground_text column
     *
     * Example usage:
     * <code>
     * $query->filterByForegroundText('fooValue');   // WHERE foreground_text = 'fooValue'
     * $query->filterByForegroundText('%fooValue%', Criteria::LIKE); // WHERE foreground_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $foregroundText The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByForegroundText($foregroundText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($foregroundText)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_FOREGROUND_TEXT, $foregroundText, $comparison);
    }

    /**
     * Filter the query on the foreground_image column
     *
     * Example usage:
     * <code>
     * $query->filterByForegroundImage('fooValue');   // WHERE foreground_image = 'fooValue'
     * $query->filterByForegroundImage('%fooValue%', Criteria::LIKE); // WHERE foreground_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $foregroundImage The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function filterByForegroundImage($foregroundImage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($foregroundImage)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcInformationDescriptionTableMap::COL_FOREGROUND_IMAGE, $foregroundImage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcInformationDescription $ocInformationDescription Object to remove from the list of results
     *
     * @return $this|ChildOcInformationDescriptionQuery The current query, for fluid interface
     */
    public function prune($ocInformationDescription = null)
    {
        if ($ocInformationDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OcInformationDescriptionTableMap::COL_INFORMATION_ID), $ocInformationDescription->getInformationId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OcInformationDescriptionTableMap::COL_LANGUAGE_ID), $ocInformationDescription->getLanguageId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_information_description table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcInformationDescriptionTableMap::clearInstancePool();
            OcInformationDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcInformationDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcInformationDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcInformationDescriptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcInformationDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcInformationDescriptionQuery
