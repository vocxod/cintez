<?php

namespace Base;

use \OcModification as ChildOcModification;
use \OcModificationQuery as ChildOcModificationQuery;
use \Exception;
use \PDO;
use Map\OcModificationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_modification' table.
 *
 *
 *
 * @method     ChildOcModificationQuery orderByModificationId($order = Criteria::ASC) Order by the modification_id column
 * @method     ChildOcModificationQuery orderByExtensionInstallId($order = Criteria::ASC) Order by the extension_install_id column
 * @method     ChildOcModificationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcModificationQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildOcModificationQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     ChildOcModificationQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     ChildOcModificationQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     ChildOcModificationQuery orderByXml($order = Criteria::ASC) Order by the xml column
 * @method     ChildOcModificationQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOcModificationQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 *
 * @method     ChildOcModificationQuery groupByModificationId() Group by the modification_id column
 * @method     ChildOcModificationQuery groupByExtensionInstallId() Group by the extension_install_id column
 * @method     ChildOcModificationQuery groupByName() Group by the name column
 * @method     ChildOcModificationQuery groupByCode() Group by the code column
 * @method     ChildOcModificationQuery groupByAuthor() Group by the author column
 * @method     ChildOcModificationQuery groupByVersion() Group by the version column
 * @method     ChildOcModificationQuery groupByLink() Group by the link column
 * @method     ChildOcModificationQuery groupByXml() Group by the xml column
 * @method     ChildOcModificationQuery groupByStatus() Group by the status column
 * @method     ChildOcModificationQuery groupByDateAdded() Group by the date_added column
 *
 * @method     ChildOcModificationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcModificationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcModificationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcModificationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcModificationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcModificationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcModification findOne(ConnectionInterface $con = null) Return the first ChildOcModification matching the query
 * @method     ChildOcModification findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcModification matching the query, or a new ChildOcModification object populated from the query conditions when no match is found
 *
 * @method     ChildOcModification findOneByModificationId(int $modification_id) Return the first ChildOcModification filtered by the modification_id column
 * @method     ChildOcModification findOneByExtensionInstallId(int $extension_install_id) Return the first ChildOcModification filtered by the extension_install_id column
 * @method     ChildOcModification findOneByName(string $name) Return the first ChildOcModification filtered by the name column
 * @method     ChildOcModification findOneByCode(string $code) Return the first ChildOcModification filtered by the code column
 * @method     ChildOcModification findOneByAuthor(string $author) Return the first ChildOcModification filtered by the author column
 * @method     ChildOcModification findOneByVersion(string $version) Return the first ChildOcModification filtered by the version column
 * @method     ChildOcModification findOneByLink(string $link) Return the first ChildOcModification filtered by the link column
 * @method     ChildOcModification findOneByXml(string $xml) Return the first ChildOcModification filtered by the xml column
 * @method     ChildOcModification findOneByStatus(boolean $status) Return the first ChildOcModification filtered by the status column
 * @method     ChildOcModification findOneByDateAdded(string $date_added) Return the first ChildOcModification filtered by the date_added column *

 * @method     ChildOcModification requirePk($key, ConnectionInterface $con = null) Return the ChildOcModification by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOne(ConnectionInterface $con = null) Return the first ChildOcModification matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcModification requireOneByModificationId(int $modification_id) Return the first ChildOcModification filtered by the modification_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByExtensionInstallId(int $extension_install_id) Return the first ChildOcModification filtered by the extension_install_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByName(string $name) Return the first ChildOcModification filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByCode(string $code) Return the first ChildOcModification filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByAuthor(string $author) Return the first ChildOcModification filtered by the author column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByVersion(string $version) Return the first ChildOcModification filtered by the version column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByLink(string $link) Return the first ChildOcModification filtered by the link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByXml(string $xml) Return the first ChildOcModification filtered by the xml column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByStatus(boolean $status) Return the first ChildOcModification filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcModification requireOneByDateAdded(string $date_added) Return the first ChildOcModification filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcModification[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcModification objects based on current ModelCriteria
 * @method     ChildOcModification[]|ObjectCollection findByModificationId(int $modification_id) Return ChildOcModification objects filtered by the modification_id column
 * @method     ChildOcModification[]|ObjectCollection findByExtensionInstallId(int $extension_install_id) Return ChildOcModification objects filtered by the extension_install_id column
 * @method     ChildOcModification[]|ObjectCollection findByName(string $name) Return ChildOcModification objects filtered by the name column
 * @method     ChildOcModification[]|ObjectCollection findByCode(string $code) Return ChildOcModification objects filtered by the code column
 * @method     ChildOcModification[]|ObjectCollection findByAuthor(string $author) Return ChildOcModification objects filtered by the author column
 * @method     ChildOcModification[]|ObjectCollection findByVersion(string $version) Return ChildOcModification objects filtered by the version column
 * @method     ChildOcModification[]|ObjectCollection findByLink(string $link) Return ChildOcModification objects filtered by the link column
 * @method     ChildOcModification[]|ObjectCollection findByXml(string $xml) Return ChildOcModification objects filtered by the xml column
 * @method     ChildOcModification[]|ObjectCollection findByStatus(boolean $status) Return ChildOcModification objects filtered by the status column
 * @method     ChildOcModification[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOcModification objects filtered by the date_added column
 * @method     ChildOcModification[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcModificationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcModificationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcModification', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcModificationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcModificationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcModificationQuery) {
            return $criteria;
        }
        $query = new ChildOcModificationQuery();
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
     * @return ChildOcModification|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcModificationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcModificationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcModification A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT modification_id, extension_install_id, name, code, author, version, link, xml, status, date_added FROM oc_modification WHERE modification_id = :p0';
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
            /** @var ChildOcModification $obj */
            $obj = new ChildOcModification();
            $obj->hydrate($row);
            OcModificationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcModification|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the modification_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModificationId(1234); // WHERE modification_id = 1234
     * $query->filterByModificationId(array(12, 34)); // WHERE modification_id IN (12, 34)
     * $query->filterByModificationId(array('min' => 12)); // WHERE modification_id > 12
     * </code>
     *
     * @param     mixed $modificationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByModificationId($modificationId = null, $comparison = null)
    {
        if (is_array($modificationId)) {
            $useMinMax = false;
            if (isset($modificationId['min'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $modificationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modificationId['max'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $modificationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $modificationId, $comparison);
    }

    /**
     * Filter the query on the extension_install_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExtensionInstallId(1234); // WHERE extension_install_id = 1234
     * $query->filterByExtensionInstallId(array(12, 34)); // WHERE extension_install_id IN (12, 34)
     * $query->filterByExtensionInstallId(array('min' => 12)); // WHERE extension_install_id > 12
     * </code>
     *
     * @param     mixed $extensionInstallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByExtensionInstallId($extensionInstallId = null, $comparison = null)
    {
        if (is_array($extensionInstallId)) {
            $useMinMax = false;
            if (isset($extensionInstallId['min'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($extensionInstallId['max'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_EXTENSION_INSTALL_ID, $extensionInstallId, $comparison);
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
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the author column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthor('fooValue');   // WHERE author = 'fooValue'
     * $query->filterByAuthor('%fooValue%', Criteria::LIKE); // WHERE author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $author The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByAuthor($author = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($author)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_AUTHOR, $author, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion('fooValue');   // WHERE version = 'fooValue'
     * $query->filterByVersion('%fooValue%', Criteria::LIKE); // WHERE version LIKE '%fooValue%'
     * </code>
     *
     * @param     string $version The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($version)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_VERSION, $version, $comparison);
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
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_LINK, $link, $comparison);
    }

    /**
     * Filter the query on the xml column
     *
     * Example usage:
     * <code>
     * $query->filterByXml('fooValue');   // WHERE xml = 'fooValue'
     * $query->filterByXml('%fooValue%', Criteria::LIKE); // WHERE xml LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xml The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByXml($xml = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xml)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_XML, $xml, $comparison);
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
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_STATUS, $status, $comparison);
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
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OcModificationTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcModificationTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcModification $ocModification Object to remove from the list of results
     *
     * @return $this|ChildOcModificationQuery The current query, for fluid interface
     */
    public function prune($ocModification = null)
    {
        if ($ocModification) {
            $this->addUsingAlias(OcModificationTableMap::COL_MODIFICATION_ID, $ocModification->getModificationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_modification table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcModificationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcModificationTableMap::clearInstancePool();
            OcModificationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcModificationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcModificationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcModificationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcModificationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcModificationQuery
