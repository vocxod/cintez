<?php

namespace Base;

use \OcLocation as ChildOcLocation;
use \OcLocationQuery as ChildOcLocationQuery;
use \Exception;
use \PDO;
use Map\OcLocationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'oc_location' table.
 *
 *
 *
 * @method     ChildOcLocationQuery orderByLocationId($order = Criteria::ASC) Order by the location_id column
 * @method     ChildOcLocationQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildOcLocationQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildOcLocationQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     ChildOcLocationQuery orderByFax($order = Criteria::ASC) Order by the fax column
 * @method     ChildOcLocationQuery orderByGeocode($order = Criteria::ASC) Order by the geocode column
 * @method     ChildOcLocationQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOcLocationQuery orderByOpen($order = Criteria::ASC) Order by the open column
 * @method     ChildOcLocationQuery orderByComment($order = Criteria::ASC) Order by the comment column
 *
 * @method     ChildOcLocationQuery groupByLocationId() Group by the location_id column
 * @method     ChildOcLocationQuery groupByName() Group by the name column
 * @method     ChildOcLocationQuery groupByAddress() Group by the address column
 * @method     ChildOcLocationQuery groupByTelephone() Group by the telephone column
 * @method     ChildOcLocationQuery groupByFax() Group by the fax column
 * @method     ChildOcLocationQuery groupByGeocode() Group by the geocode column
 * @method     ChildOcLocationQuery groupByImage() Group by the image column
 * @method     ChildOcLocationQuery groupByOpen() Group by the open column
 * @method     ChildOcLocationQuery groupByComment() Group by the comment column
 *
 * @method     ChildOcLocationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOcLocationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOcLocationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOcLocationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOcLocationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOcLocationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOcLocation findOne(ConnectionInterface $con = null) Return the first ChildOcLocation matching the query
 * @method     ChildOcLocation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOcLocation matching the query, or a new ChildOcLocation object populated from the query conditions when no match is found
 *
 * @method     ChildOcLocation findOneByLocationId(int $location_id) Return the first ChildOcLocation filtered by the location_id column
 * @method     ChildOcLocation findOneByName(string $name) Return the first ChildOcLocation filtered by the name column
 * @method     ChildOcLocation findOneByAddress(string $address) Return the first ChildOcLocation filtered by the address column
 * @method     ChildOcLocation findOneByTelephone(string $telephone) Return the first ChildOcLocation filtered by the telephone column
 * @method     ChildOcLocation findOneByFax(string $fax) Return the first ChildOcLocation filtered by the fax column
 * @method     ChildOcLocation findOneByGeocode(string $geocode) Return the first ChildOcLocation filtered by the geocode column
 * @method     ChildOcLocation findOneByImage(string $image) Return the first ChildOcLocation filtered by the image column
 * @method     ChildOcLocation findOneByOpen(string $open) Return the first ChildOcLocation filtered by the open column
 * @method     ChildOcLocation findOneByComment(string $comment) Return the first ChildOcLocation filtered by the comment column *

 * @method     ChildOcLocation requirePk($key, ConnectionInterface $con = null) Return the ChildOcLocation by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOne(ConnectionInterface $con = null) Return the first ChildOcLocation matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLocation requireOneByLocationId(int $location_id) Return the first ChildOcLocation filtered by the location_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByName(string $name) Return the first ChildOcLocation filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByAddress(string $address) Return the first ChildOcLocation filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByTelephone(string $telephone) Return the first ChildOcLocation filtered by the telephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByFax(string $fax) Return the first ChildOcLocation filtered by the fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByGeocode(string $geocode) Return the first ChildOcLocation filtered by the geocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByImage(string $image) Return the first ChildOcLocation filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByOpen(string $open) Return the first ChildOcLocation filtered by the open column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOcLocation requireOneByComment(string $comment) Return the first ChildOcLocation filtered by the comment column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOcLocation[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOcLocation objects based on current ModelCriteria
 * @method     ChildOcLocation[]|ObjectCollection findByLocationId(int $location_id) Return ChildOcLocation objects filtered by the location_id column
 * @method     ChildOcLocation[]|ObjectCollection findByName(string $name) Return ChildOcLocation objects filtered by the name column
 * @method     ChildOcLocation[]|ObjectCollection findByAddress(string $address) Return ChildOcLocation objects filtered by the address column
 * @method     ChildOcLocation[]|ObjectCollection findByTelephone(string $telephone) Return ChildOcLocation objects filtered by the telephone column
 * @method     ChildOcLocation[]|ObjectCollection findByFax(string $fax) Return ChildOcLocation objects filtered by the fax column
 * @method     ChildOcLocation[]|ObjectCollection findByGeocode(string $geocode) Return ChildOcLocation objects filtered by the geocode column
 * @method     ChildOcLocation[]|ObjectCollection findByImage(string $image) Return ChildOcLocation objects filtered by the image column
 * @method     ChildOcLocation[]|ObjectCollection findByOpen(string $open) Return ChildOcLocation objects filtered by the open column
 * @method     ChildOcLocation[]|ObjectCollection findByComment(string $comment) Return ChildOcLocation objects filtered by the comment column
 * @method     ChildOcLocation[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OcLocationQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OcLocationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\OcLocation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOcLocationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOcLocationQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOcLocationQuery) {
            return $criteria;
        }
        $query = new ChildOcLocationQuery();
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
     * @return ChildOcLocation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OcLocationTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OcLocationTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOcLocation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT location_id, name, address, telephone, fax, geocode, image, open, comment FROM oc_location WHERE location_id = :p0';
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
            /** @var ChildOcLocation $obj */
            $obj = new ChildOcLocation();
            $obj->hydrate($row);
            OcLocationTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOcLocation|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the location_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLocationId(1234); // WHERE location_id = 1234
     * $query->filterByLocationId(array(12, 34)); // WHERE location_id IN (12, 34)
     * $query->filterByLocationId(array('min' => 12)); // WHERE location_id > 12
     * </code>
     *
     * @param     mixed $locationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByLocationId($locationId = null, $comparison = null)
    {
        if (is_array($locationId)) {
            $useMinMax = false;
            if (isset($locationId['min'])) {
                $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $locationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locationId['max'])) {
                $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $locationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $locationId, $comparison);
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
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the telephone column
     *
     * Example usage:
     * <code>
     * $query->filterByTelephone('fooValue');   // WHERE telephone = 'fooValue'
     * $query->filterByTelephone('%fooValue%', Criteria::LIKE); // WHERE telephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByTelephone($telephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_TELEPHONE, $telephone, $comparison);
    }

    /**
     * Filter the query on the fax column
     *
     * Example usage:
     * <code>
     * $query->filterByFax('fooValue');   // WHERE fax = 'fooValue'
     * $query->filterByFax('%fooValue%', Criteria::LIKE); // WHERE fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByFax($fax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_FAX, $fax, $comparison);
    }

    /**
     * Filter the query on the geocode column
     *
     * Example usage:
     * <code>
     * $query->filterByGeocode('fooValue');   // WHERE geocode = 'fooValue'
     * $query->filterByGeocode('%fooValue%', Criteria::LIKE); // WHERE geocode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $geocode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByGeocode($geocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geocode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_GEOCODE, $geocode, $comparison);
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
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the open column
     *
     * Example usage:
     * <code>
     * $query->filterByOpen('fooValue');   // WHERE open = 'fooValue'
     * $query->filterByOpen('%fooValue%', Criteria::LIKE); // WHERE open LIKE '%fooValue%'
     * </code>
     *
     * @param     string $open The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByOpen($open = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($open)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_OPEN, $open, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%', Criteria::LIKE); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OcLocationTableMap::COL_COMMENT, $comment, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOcLocation $ocLocation Object to remove from the list of results
     *
     * @return $this|ChildOcLocationQuery The current query, for fluid interface
     */
    public function prune($ocLocation = null)
    {
        if ($ocLocation) {
            $this->addUsingAlias(OcLocationTableMap::COL_LOCATION_ID, $ocLocation->getLocationId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the oc_location table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OcLocationTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OcLocationTableMap::clearInstancePool();
            OcLocationTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OcLocationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OcLocationTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OcLocationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OcLocationTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OcLocationQuery
