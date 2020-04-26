<?php

namespace Base;

use \ModxSiteContentQuery as ChildModxSiteContentQuery;
use \Exception;
use \PDO;
use Map\ModxSiteContentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'modx_site_content' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class ModxSiteContent implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ModxSiteContentTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the type field.
     *
     * Note: this column has a database default value of: 'document'
     * @var        string
     */
    protected $type;

    /**
     * The value for the ontent_type field.
     *
     * @var        string
     */
    protected $ontent_type;

    /**
     * The value for the pagetitle field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pagetitle;

    /**
     * The value for the longtitle field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $longtitle;

    /**
     * The value for the description field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $description;

    /**
     * The value for the alias field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $alias;

    /**
     * The value for the link_attributes field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $link_attributes;

    /**
     * The value for the published field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $published;

    /**
     * The value for the pub_date field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pub_date;

    /**
     * The value for the unpub_date field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $unpub_date;

    /**
     * The value for the parent field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $parent;

    /**
     * The value for the isfolder field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $isfolder;

    /**
     * The value for the introtext field.
     *
     * @var        string
     */
    protected $introtext;

    /**
     * The value for the content field.
     *
     * @var        string
     */
    protected $content;

    /**
     * The value for the richtext field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $richtext;

    /**
     * The value for the template field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $template;

    /**
     * The value for the menuindex field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $menuindex;

    /**
     * The value for the searchable field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $searchable;

    /**
     * The value for the cacheable field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $cacheable;

    /**
     * The value for the createdby field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $createdby;

    /**
     * The value for the createdon field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $createdon;

    /**
     * The value for the editedby field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $editedby;

    /**
     * The value for the editedon field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $editedon;

    /**
     * The value for the ddeleted field.
     *
     * @var        int
     */
    protected $ddeleted;

    /**
     * The value for the deletedon field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $deletedon;

    /**
     * The value for the deletedby field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $deletedby;

    /**
     * The value for the publishedon field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $publishedon;

    /**
     * The value for the publishedby field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $publishedby;

    /**
     * The value for the menutitle field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $menutitle;

    /**
     * The value for the donthit field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $donthit;

    /**
     * The value for the privateweb field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $privateweb;

    /**
     * The value for the privatemgr field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $privatemgr;

    /**
     * The value for the content_dispo field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $content_dispo;

    /**
     * The value for the hidemenu field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $hidemenu;

    /**
     * The value for the class_key field.
     *
     * Note: this column has a database default value of: 'modDocument'
     * @var        string
     */
    protected $class_key;

    /**
     * The value for the context_key field.
     *
     * Note: this column has a database default value of: 'web'
     * @var        string
     */
    protected $context_key;

    /**
     * The value for the content_type field.
     *
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $content_type;

    /**
     * The value for the uri field.
     *
     * @var        string
     */
    protected $uri;

    /**
     * The value for the uri_override field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $uri_override;

    /**
     * The value for the hide_children_in_tree field.
     *
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $hide_children_in_tree;

    /**
     * The value for the show_in_tree field.
     *
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $show_in_tree;

    /**
     * The value for the properties field.
     *
     * @var        string
     */
    protected $properties;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->type = 'document';
        $this->pagetitle = '';
        $this->longtitle = '';
        $this->description = '';
        $this->alias = '';
        $this->link_attributes = '';
        $this->published = false;
        $this->pub_date = 0;
        $this->unpub_date = 0;
        $this->parent = 0;
        $this->isfolder = false;
        $this->richtext = true;
        $this->template = 0;
        $this->menuindex = 0;
        $this->searchable = true;
        $this->cacheable = true;
        $this->createdby = 0;
        $this->createdon = 0;
        $this->editedby = 0;
        $this->editedon = 0;
        $this->deletedon = 0;
        $this->deletedby = 0;
        $this->publishedon = 0;
        $this->publishedby = 0;
        $this->menutitle = '';
        $this->donthit = false;
        $this->privateweb = false;
        $this->privatemgr = false;
        $this->content_dispo = false;
        $this->hidemenu = false;
        $this->class_key = 'modDocument';
        $this->context_key = 'web';
        $this->content_type = 1;
        $this->uri_override = false;
        $this->hide_children_in_tree = false;
        $this->show_in_tree = true;
    }

    /**
     * Initializes internal state of Base\ModxSiteContent object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>ModxSiteContent</code> instance.  If
     * <code>obj</code> is an instance of <code>ModxSiteContent</code>, delegates to
     * <code>equals(ModxSiteContent)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|ModxSiteContent The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [ontent_type] column value.
     *
     * @return string
     */
    public function getOntentType()
    {
        return $this->ontent_type;
    }

    /**
     * Get the [pagetitle] column value.
     *
     * @return string
     */
    public function getPagetitle()
    {
        return $this->pagetitle;
    }

    /**
     * Get the [longtitle] column value.
     *
     * @return string
     */
    public function getLongtitle()
    {
        return $this->longtitle;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [alias] column value.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Get the [link_attributes] column value.
     *
     * @return string
     */
    public function getLinkAttributes()
    {
        return $this->link_attributes;
    }

    /**
     * Get the [published] column value.
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Get the [published] column value.
     *
     * @return boolean
     */
    public function isPublished()
    {
        return $this->getPublished();
    }

    /**
     * Get the [pub_date] column value.
     *
     * @return int
     */
    public function getPubDate()
    {
        return $this->pub_date;
    }

    /**
     * Get the [unpub_date] column value.
     *
     * @return int
     */
    public function getUnpubDate()
    {
        return $this->unpub_date;
    }

    /**
     * Get the [parent] column value.
     *
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get the [isfolder] column value.
     *
     * @return boolean
     */
    public function getIsfolder()
    {
        return $this->isfolder;
    }

    /**
     * Get the [isfolder] column value.
     *
     * @return boolean
     */
    public function isIsfolder()
    {
        return $this->getIsfolder();
    }

    /**
     * Get the [introtext] column value.
     *
     * @return string
     */
    public function getIntrotext()
    {
        return $this->introtext;
    }

    /**
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the [richtext] column value.
     *
     * @return boolean
     */
    public function getRichtext()
    {
        return $this->richtext;
    }

    /**
     * Get the [richtext] column value.
     *
     * @return boolean
     */
    public function isRichtext()
    {
        return $this->getRichtext();
    }

    /**
     * Get the [template] column value.
     *
     * @return int
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Get the [menuindex] column value.
     *
     * @return int
     */
    public function getMenuindex()
    {
        return $this->menuindex;
    }

    /**
     * Get the [searchable] column value.
     *
     * @return boolean
     */
    public function getSearchable()
    {
        return $this->searchable;
    }

    /**
     * Get the [searchable] column value.
     *
     * @return boolean
     */
    public function isSearchable()
    {
        return $this->getSearchable();
    }

    /**
     * Get the [cacheable] column value.
     *
     * @return boolean
     */
    public function getCacheable()
    {
        return $this->cacheable;
    }

    /**
     * Get the [cacheable] column value.
     *
     * @return boolean
     */
    public function isCacheable()
    {
        return $this->getCacheable();
    }

    /**
     * Get the [createdby] column value.
     *
     * @return int
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Get the [createdon] column value.
     *
     * @return int
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * Get the [editedby] column value.
     *
     * @return int
     */
    public function getEditedby()
    {
        return $this->editedby;
    }

    /**
     * Get the [editedon] column value.
     *
     * @return int
     */
    public function getEditedon()
    {
        return $this->editedon;
    }

    /**
     * Get the [ddeleted] column value.
     *
     * @return int
     */
    public function getDdeleted()
    {
        return $this->ddeleted;
    }

    /**
     * Get the [deletedon] column value.
     *
     * @return int
     */
    public function getDeletedon()
    {
        return $this->deletedon;
    }

    /**
     * Get the [deletedby] column value.
     *
     * @return int
     */
    public function getDeletedby()
    {
        return $this->deletedby;
    }

    /**
     * Get the [publishedon] column value.
     *
     * @return int
     */
    public function getPublishedon()
    {
        return $this->publishedon;
    }

    /**
     * Get the [publishedby] column value.
     *
     * @return int
     */
    public function getPublishedby()
    {
        return $this->publishedby;
    }

    /**
     * Get the [menutitle] column value.
     *
     * @return string
     */
    public function getMenutitle()
    {
        return $this->menutitle;
    }

    /**
     * Get the [donthit] column value.
     *
     * @return boolean
     */
    public function getDonthit()
    {
        return $this->donthit;
    }

    /**
     * Get the [donthit] column value.
     *
     * @return boolean
     */
    public function isDonthit()
    {
        return $this->getDonthit();
    }

    /**
     * Get the [privateweb] column value.
     *
     * @return boolean
     */
    public function getPrivateweb()
    {
        return $this->privateweb;
    }

    /**
     * Get the [privateweb] column value.
     *
     * @return boolean
     */
    public function isPrivateweb()
    {
        return $this->getPrivateweb();
    }

    /**
     * Get the [privatemgr] column value.
     *
     * @return boolean
     */
    public function getPrivatemgr()
    {
        return $this->privatemgr;
    }

    /**
     * Get the [privatemgr] column value.
     *
     * @return boolean
     */
    public function isPrivatemgr()
    {
        return $this->getPrivatemgr();
    }

    /**
     * Get the [content_dispo] column value.
     *
     * @return boolean
     */
    public function getContentDispo()
    {
        return $this->content_dispo;
    }

    /**
     * Get the [content_dispo] column value.
     *
     * @return boolean
     */
    public function isContentDispo()
    {
        return $this->getContentDispo();
    }

    /**
     * Get the [hidemenu] column value.
     *
     * @return boolean
     */
    public function getHidemenu()
    {
        return $this->hidemenu;
    }

    /**
     * Get the [hidemenu] column value.
     *
     * @return boolean
     */
    public function isHidemenu()
    {
        return $this->getHidemenu();
    }

    /**
     * Get the [class_key] column value.
     *
     * @return string
     */
    public function getClassKey()
    {
        return $this->class_key;
    }

    /**
     * Get the [context_key] column value.
     *
     * @return string
     */
    public function getContextKey()
    {
        return $this->context_key;
    }

    /**
     * Get the [content_type] column value.
     *
     * @return int
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Get the [uri] column value.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Get the [uri_override] column value.
     *
     * @return boolean
     */
    public function getUriOverride()
    {
        return $this->uri_override;
    }

    /**
     * Get the [uri_override] column value.
     *
     * @return boolean
     */
    public function isUriOverride()
    {
        return $this->getUriOverride();
    }

    /**
     * Get the [hide_children_in_tree] column value.
     *
     * @return boolean
     */
    public function getHideChildrenInTree()
    {
        return $this->hide_children_in_tree;
    }

    /**
     * Get the [hide_children_in_tree] column value.
     *
     * @return boolean
     */
    public function isHideChildrenInTree()
    {
        return $this->getHideChildrenInTree();
    }

    /**
     * Get the [show_in_tree] column value.
     *
     * @return boolean
     */
    public function getShowInTree()
    {
        return $this->show_in_tree;
    }

    /**
     * Get the [show_in_tree] column value.
     *
     * @return boolean
     */
    public function isShowInTree()
    {
        return $this->getShowInTree();
    }

    /**
     * Get the [properties] column value.
     *
     * @return string
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [ontent_type] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setOntentType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ontent_type !== $v) {
            $this->ontent_type = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_ONTENT_TYPE] = true;
        }

        return $this;
    } // setOntentType()

    /**
     * Set the value of [pagetitle] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPagetitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pagetitle !== $v) {
            $this->pagetitle = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PAGETITLE] = true;
        }

        return $this;
    } // setPagetitle()

    /**
     * Set the value of [longtitle] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setLongtitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->longtitle !== $v) {
            $this->longtitle = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_LONGTITLE] = true;
        }

        return $this;
    } // setLongtitle()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_DESCRIPTION] = true;
        }

        return $this;
    } // setDescription()

    /**
     * Set the value of [alias] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setAlias($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alias !== $v) {
            $this->alias = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_ALIAS] = true;
        }

        return $this;
    } // setAlias()

    /**
     * Set the value of [link_attributes] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setLinkAttributes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->link_attributes !== $v) {
            $this->link_attributes = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_LINK_ATTRIBUTES] = true;
        }

        return $this;
    } // setLinkAttributes()

    /**
     * Sets the value of the [published] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPublished($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->published !== $v) {
            $this->published = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PUBLISHED] = true;
        }

        return $this;
    } // setPublished()

    /**
     * Set the value of [pub_date] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPubDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pub_date !== $v) {
            $this->pub_date = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PUB_DATE] = true;
        }

        return $this;
    } // setPubDate()

    /**
     * Set the value of [unpub_date] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setUnpubDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->unpub_date !== $v) {
            $this->unpub_date = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_UNPUB_DATE] = true;
        }

        return $this;
    } // setUnpubDate()

    /**
     * Set the value of [parent] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setParent($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->parent !== $v) {
            $this->parent = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PARENT] = true;
        }

        return $this;
    } // setParent()

    /**
     * Sets the value of the [isfolder] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setIsfolder($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->isfolder !== $v) {
            $this->isfolder = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_ISFOLDER] = true;
        }

        return $this;
    } // setIsfolder()

    /**
     * Set the value of [introtext] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setIntrotext($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->introtext !== $v) {
            $this->introtext = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_INTROTEXT] = true;
        }

        return $this;
    } // setIntrotext()

    /**
     * Set the value of [content] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CONTENT] = true;
        }

        return $this;
    } // setContent()

    /**
     * Sets the value of the [richtext] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setRichtext($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->richtext !== $v) {
            $this->richtext = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_RICHTEXT] = true;
        }

        return $this;
    } // setRichtext()

    /**
     * Set the value of [template] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setTemplate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->template !== $v) {
            $this->template = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_TEMPLATE] = true;
        }

        return $this;
    } // setTemplate()

    /**
     * Set the value of [menuindex] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setMenuindex($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->menuindex !== $v) {
            $this->menuindex = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_MENUINDEX] = true;
        }

        return $this;
    } // setMenuindex()

    /**
     * Sets the value of the [searchable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setSearchable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->searchable !== $v) {
            $this->searchable = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_SEARCHABLE] = true;
        }

        return $this;
    } // setSearchable()

    /**
     * Sets the value of the [cacheable] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setCacheable($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->cacheable !== $v) {
            $this->cacheable = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CACHEABLE] = true;
        }

        return $this;
    } // setCacheable()

    /**
     * Set the value of [createdby] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setCreatedby($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->createdby !== $v) {
            $this->createdby = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CREATEDBY] = true;
        }

        return $this;
    } // setCreatedby()

    /**
     * Set the value of [createdon] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setCreatedon($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->createdon !== $v) {
            $this->createdon = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CREATEDON] = true;
        }

        return $this;
    } // setCreatedon()

    /**
     * Set the value of [editedby] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setEditedby($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->editedby !== $v) {
            $this->editedby = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_EDITEDBY] = true;
        }

        return $this;
    } // setEditedby()

    /**
     * Set the value of [editedon] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setEditedon($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->editedon !== $v) {
            $this->editedon = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_EDITEDON] = true;
        }

        return $this;
    } // setEditedon()

    /**
     * Set the value of [ddeleted] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setDdeleted($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ddeleted !== $v) {
            $this->ddeleted = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_DDELETED] = true;
        }

        return $this;
    } // setDdeleted()

    /**
     * Set the value of [deletedon] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setDeletedon($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->deletedon !== $v) {
            $this->deletedon = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_DELETEDON] = true;
        }

        return $this;
    } // setDeletedon()

    /**
     * Set the value of [deletedby] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setDeletedby($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->deletedby !== $v) {
            $this->deletedby = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_DELETEDBY] = true;
        }

        return $this;
    } // setDeletedby()

    /**
     * Set the value of [publishedon] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPublishedon($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->publishedon !== $v) {
            $this->publishedon = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PUBLISHEDON] = true;
        }

        return $this;
    } // setPublishedon()

    /**
     * Set the value of [publishedby] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPublishedby($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->publishedby !== $v) {
            $this->publishedby = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PUBLISHEDBY] = true;
        }

        return $this;
    } // setPublishedby()

    /**
     * Set the value of [menutitle] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setMenutitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->menutitle !== $v) {
            $this->menutitle = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_MENUTITLE] = true;
        }

        return $this;
    } // setMenutitle()

    /**
     * Sets the value of the [donthit] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setDonthit($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->donthit !== $v) {
            $this->donthit = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_DONTHIT] = true;
        }

        return $this;
    } // setDonthit()

    /**
     * Sets the value of the [privateweb] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPrivateweb($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->privateweb !== $v) {
            $this->privateweb = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PRIVATEWEB] = true;
        }

        return $this;
    } // setPrivateweb()

    /**
     * Sets the value of the [privatemgr] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setPrivatemgr($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->privatemgr !== $v) {
            $this->privatemgr = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PRIVATEMGR] = true;
        }

        return $this;
    } // setPrivatemgr()

    /**
     * Sets the value of the [content_dispo] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setContentDispo($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->content_dispo !== $v) {
            $this->content_dispo = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CONTENT_DISPO] = true;
        }

        return $this;
    } // setContentDispo()

    /**
     * Sets the value of the [hidemenu] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setHidemenu($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->hidemenu !== $v) {
            $this->hidemenu = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_HIDEMENU] = true;
        }

        return $this;
    } // setHidemenu()

    /**
     * Set the value of [class_key] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setClassKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->class_key !== $v) {
            $this->class_key = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CLASS_KEY] = true;
        }

        return $this;
    } // setClassKey()

    /**
     * Set the value of [context_key] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setContextKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->context_key !== $v) {
            $this->context_key = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CONTEXT_KEY] = true;
        }

        return $this;
    } // setContextKey()

    /**
     * Set the value of [content_type] column.
     *
     * @param int $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setContentType($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->content_type !== $v) {
            $this->content_type = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_CONTENT_TYPE] = true;
        }

        return $this;
    } // setContentType()

    /**
     * Set the value of [uri] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setUri($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->uri !== $v) {
            $this->uri = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_URI] = true;
        }

        return $this;
    } // setUri()

    /**
     * Sets the value of the [uri_override] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setUriOverride($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->uri_override !== $v) {
            $this->uri_override = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_URI_OVERRIDE] = true;
        }

        return $this;
    } // setUriOverride()

    /**
     * Sets the value of the [hide_children_in_tree] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setHideChildrenInTree($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->hide_children_in_tree !== $v) {
            $this->hide_children_in_tree = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE] = true;
        }

        return $this;
    } // setHideChildrenInTree()

    /**
     * Sets the value of the [show_in_tree] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setShowInTree($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->show_in_tree !== $v) {
            $this->show_in_tree = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_SHOW_IN_TREE] = true;
        }

        return $this;
    } // setShowInTree()

    /**
     * Set the value of [properties] column.
     *
     * @param string $v new value
     * @return $this|\ModxSiteContent The current object (for fluent API support)
     */
    public function setProperties($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->properties !== $v) {
            $this->properties = $v;
            $this->modifiedColumns[ModxSiteContentTableMap::COL_PROPERTIES] = true;
        }

        return $this;
    } // setProperties()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->type !== 'document') {
                return false;
            }

            if ($this->pagetitle !== '') {
                return false;
            }

            if ($this->longtitle !== '') {
                return false;
            }

            if ($this->description !== '') {
                return false;
            }

            if ($this->alias !== '') {
                return false;
            }

            if ($this->link_attributes !== '') {
                return false;
            }

            if ($this->published !== false) {
                return false;
            }

            if ($this->pub_date !== 0) {
                return false;
            }

            if ($this->unpub_date !== 0) {
                return false;
            }

            if ($this->parent !== 0) {
                return false;
            }

            if ($this->isfolder !== false) {
                return false;
            }

            if ($this->richtext !== true) {
                return false;
            }

            if ($this->template !== 0) {
                return false;
            }

            if ($this->menuindex !== 0) {
                return false;
            }

            if ($this->searchable !== true) {
                return false;
            }

            if ($this->cacheable !== true) {
                return false;
            }

            if ($this->createdby !== 0) {
                return false;
            }

            if ($this->createdon !== 0) {
                return false;
            }

            if ($this->editedby !== 0) {
                return false;
            }

            if ($this->editedon !== 0) {
                return false;
            }

            if ($this->deletedon !== 0) {
                return false;
            }

            if ($this->deletedby !== 0) {
                return false;
            }

            if ($this->publishedon !== 0) {
                return false;
            }

            if ($this->publishedby !== 0) {
                return false;
            }

            if ($this->menutitle !== '') {
                return false;
            }

            if ($this->donthit !== false) {
                return false;
            }

            if ($this->privateweb !== false) {
                return false;
            }

            if ($this->privatemgr !== false) {
                return false;
            }

            if ($this->content_dispo !== false) {
                return false;
            }

            if ($this->hidemenu !== false) {
                return false;
            }

            if ($this->class_key !== 'modDocument') {
                return false;
            }

            if ($this->context_key !== 'web') {
                return false;
            }

            if ($this->content_type !== 1) {
                return false;
            }

            if ($this->uri_override !== false) {
                return false;
            }

            if ($this->hide_children_in_tree !== false) {
                return false;
            }

            if ($this->show_in_tree !== true) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ModxSiteContentTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ModxSiteContentTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ModxSiteContentTableMap::translateFieldName('OntentType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ontent_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ModxSiteContentTableMap::translateFieldName('Pagetitle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pagetitle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ModxSiteContentTableMap::translateFieldName('Longtitle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->longtitle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ModxSiteContentTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
            $this->description = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ModxSiteContentTableMap::translateFieldName('Alias', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alias = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ModxSiteContentTableMap::translateFieldName('LinkAttributes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->link_attributes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ModxSiteContentTableMap::translateFieldName('Published', TableMap::TYPE_PHPNAME, $indexType)];
            $this->published = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ModxSiteContentTableMap::translateFieldName('PubDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pub_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ModxSiteContentTableMap::translateFieldName('UnpubDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unpub_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ModxSiteContentTableMap::translateFieldName('Parent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->parent = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ModxSiteContentTableMap::translateFieldName('Isfolder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->isfolder = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ModxSiteContentTableMap::translateFieldName('Introtext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->introtext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ModxSiteContentTableMap::translateFieldName('Content', TableMap::TYPE_PHPNAME, $indexType)];
            $this->content = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ModxSiteContentTableMap::translateFieldName('Richtext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->richtext = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ModxSiteContentTableMap::translateFieldName('Template', TableMap::TYPE_PHPNAME, $indexType)];
            $this->template = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ModxSiteContentTableMap::translateFieldName('Menuindex', TableMap::TYPE_PHPNAME, $indexType)];
            $this->menuindex = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : ModxSiteContentTableMap::translateFieldName('Searchable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->searchable = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : ModxSiteContentTableMap::translateFieldName('Cacheable', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cacheable = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : ModxSiteContentTableMap::translateFieldName('Createdby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->createdby = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : ModxSiteContentTableMap::translateFieldName('Createdon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->createdon = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : ModxSiteContentTableMap::translateFieldName('Editedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->editedby = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : ModxSiteContentTableMap::translateFieldName('Editedon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->editedon = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : ModxSiteContentTableMap::translateFieldName('Ddeleted', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ddeleted = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : ModxSiteContentTableMap::translateFieldName('Deletedon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deletedon = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : ModxSiteContentTableMap::translateFieldName('Deletedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deletedby = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : ModxSiteContentTableMap::translateFieldName('Publishedon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->publishedon = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : ModxSiteContentTableMap::translateFieldName('Publishedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->publishedby = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : ModxSiteContentTableMap::translateFieldName('Menutitle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->menutitle = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : ModxSiteContentTableMap::translateFieldName('Donthit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->donthit = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : ModxSiteContentTableMap::translateFieldName('Privateweb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->privateweb = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : ModxSiteContentTableMap::translateFieldName('Privatemgr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->privatemgr = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : ModxSiteContentTableMap::translateFieldName('ContentDispo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->content_dispo = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : ModxSiteContentTableMap::translateFieldName('Hidemenu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hidemenu = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : ModxSiteContentTableMap::translateFieldName('ClassKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->class_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : ModxSiteContentTableMap::translateFieldName('ContextKey', TableMap::TYPE_PHPNAME, $indexType)];
            $this->context_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : ModxSiteContentTableMap::translateFieldName('ContentType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->content_type = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : ModxSiteContentTableMap::translateFieldName('Uri', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uri = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : ModxSiteContentTableMap::translateFieldName('UriOverride', TableMap::TYPE_PHPNAME, $indexType)];
            $this->uri_override = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : ModxSiteContentTableMap::translateFieldName('HideChildrenInTree', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hide_children_in_tree = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : ModxSiteContentTableMap::translateFieldName('ShowInTree', TableMap::TYPE_PHPNAME, $indexType)];
            $this->show_in_tree = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : ModxSiteContentTableMap::translateFieldName('Properties', TableMap::TYPE_PHPNAME, $indexType)];
            $this->properties = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 43; // 43 = ModxSiteContentTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ModxSiteContent'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildModxSiteContentQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see ModxSiteContent::setDeleted()
     * @see ModxSiteContent::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildModxSiteContentQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ModxSiteContentTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[ModxSiteContentTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ModxSiteContentTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'type';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ONTENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'ontent_type';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PAGETITLE)) {
            $modifiedColumns[':p' . $index++]  = 'pagetitle';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_LONGTITLE)) {
            $modifiedColumns[':p' . $index++]  = 'longtitle';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = 'description';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ALIAS)) {
            $modifiedColumns[':p' . $index++]  = 'alias';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_LINK_ATTRIBUTES)) {
            $modifiedColumns[':p' . $index++]  = 'link_attributes';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHED)) {
            $modifiedColumns[':p' . $index++]  = 'published';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUB_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'pub_date';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_UNPUB_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'unpub_date';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PARENT)) {
            $modifiedColumns[':p' . $index++]  = 'parent';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ISFOLDER)) {
            $modifiedColumns[':p' . $index++]  = 'isfolder';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_INTROTEXT)) {
            $modifiedColumns[':p' . $index++]  = 'introtext';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = 'content';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_RICHTEXT)) {
            $modifiedColumns[':p' . $index++]  = 'richtext';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = 'template';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_MENUINDEX)) {
            $modifiedColumns[':p' . $index++]  = 'menuindex';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_SEARCHABLE)) {
            $modifiedColumns[':p' . $index++]  = 'searchable';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CACHEABLE)) {
            $modifiedColumns[':p' . $index++]  = 'cacheable';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CREATEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'createdby';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CREATEDON)) {
            $modifiedColumns[':p' . $index++]  = 'createdon';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_EDITEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'editedby';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_EDITEDON)) {
            $modifiedColumns[':p' . $index++]  = 'editedon';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DDELETED)) {
            $modifiedColumns[':p' . $index++]  = 'ddeleted';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DELETEDON)) {
            $modifiedColumns[':p' . $index++]  = 'deletedon';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DELETEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'deletedby';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHEDON)) {
            $modifiedColumns[':p' . $index++]  = 'publishedon';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'publishedby';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_MENUTITLE)) {
            $modifiedColumns[':p' . $index++]  = 'menutitle';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DONTHIT)) {
            $modifiedColumns[':p' . $index++]  = 'donthit';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PRIVATEWEB)) {
            $modifiedColumns[':p' . $index++]  = 'privateweb';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PRIVATEMGR)) {
            $modifiedColumns[':p' . $index++]  = 'privatemgr';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT_DISPO)) {
            $modifiedColumns[':p' . $index++]  = 'content_dispo';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_HIDEMENU)) {
            $modifiedColumns[':p' . $index++]  = 'hidemenu';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CLASS_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'class_key';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTEXT_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'context_key';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'content_type';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_URI)) {
            $modifiedColumns[':p' . $index++]  = 'uri';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_URI_OVERRIDE)) {
            $modifiedColumns[':p' . $index++]  = 'uri_override';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE)) {
            $modifiedColumns[':p' . $index++]  = 'hide_children_in_tree';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_SHOW_IN_TREE)) {
            $modifiedColumns[':p' . $index++]  = 'show_in_tree';
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PROPERTIES)) {
            $modifiedColumns[':p' . $index++]  = 'properties';
        }

        $sql = sprintf(
            'INSERT INTO modx_site_content (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'type':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case 'ontent_type':
                        $stmt->bindValue($identifier, $this->ontent_type, PDO::PARAM_STR);
                        break;
                    case 'pagetitle':
                        $stmt->bindValue($identifier, $this->pagetitle, PDO::PARAM_STR);
                        break;
                    case 'longtitle':
                        $stmt->bindValue($identifier, $this->longtitle, PDO::PARAM_STR);
                        break;
                    case 'description':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case 'alias':
                        $stmt->bindValue($identifier, $this->alias, PDO::PARAM_STR);
                        break;
                    case 'link_attributes':
                        $stmt->bindValue($identifier, $this->link_attributes, PDO::PARAM_STR);
                        break;
                    case 'published':
                        $stmt->bindValue($identifier, (int) $this->published, PDO::PARAM_INT);
                        break;
                    case 'pub_date':
                        $stmt->bindValue($identifier, $this->pub_date, PDO::PARAM_INT);
                        break;
                    case 'unpub_date':
                        $stmt->bindValue($identifier, $this->unpub_date, PDO::PARAM_INT);
                        break;
                    case 'parent':
                        $stmt->bindValue($identifier, $this->parent, PDO::PARAM_INT);
                        break;
                    case 'isfolder':
                        $stmt->bindValue($identifier, (int) $this->isfolder, PDO::PARAM_INT);
                        break;
                    case 'introtext':
                        $stmt->bindValue($identifier, $this->introtext, PDO::PARAM_STR);
                        break;
                    case 'content':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
                        break;
                    case 'richtext':
                        $stmt->bindValue($identifier, (int) $this->richtext, PDO::PARAM_INT);
                        break;
                    case 'template':
                        $stmt->bindValue($identifier, $this->template, PDO::PARAM_INT);
                        break;
                    case 'menuindex':
                        $stmt->bindValue($identifier, $this->menuindex, PDO::PARAM_INT);
                        break;
                    case 'searchable':
                        $stmt->bindValue($identifier, (int) $this->searchable, PDO::PARAM_INT);
                        break;
                    case 'cacheable':
                        $stmt->bindValue($identifier, (int) $this->cacheable, PDO::PARAM_INT);
                        break;
                    case 'createdby':
                        $stmt->bindValue($identifier, $this->createdby, PDO::PARAM_INT);
                        break;
                    case 'createdon':
                        $stmt->bindValue($identifier, $this->createdon, PDO::PARAM_INT);
                        break;
                    case 'editedby':
                        $stmt->bindValue($identifier, $this->editedby, PDO::PARAM_INT);
                        break;
                    case 'editedon':
                        $stmt->bindValue($identifier, $this->editedon, PDO::PARAM_INT);
                        break;
                    case 'ddeleted':
                        $stmt->bindValue($identifier, $this->ddeleted, PDO::PARAM_INT);
                        break;
                    case 'deletedon':
                        $stmt->bindValue($identifier, $this->deletedon, PDO::PARAM_INT);
                        break;
                    case 'deletedby':
                        $stmt->bindValue($identifier, $this->deletedby, PDO::PARAM_INT);
                        break;
                    case 'publishedon':
                        $stmt->bindValue($identifier, $this->publishedon, PDO::PARAM_INT);
                        break;
                    case 'publishedby':
                        $stmt->bindValue($identifier, $this->publishedby, PDO::PARAM_INT);
                        break;
                    case 'menutitle':
                        $stmt->bindValue($identifier, $this->menutitle, PDO::PARAM_STR);
                        break;
                    case 'donthit':
                        $stmt->bindValue($identifier, (int) $this->donthit, PDO::PARAM_INT);
                        break;
                    case 'privateweb':
                        $stmt->bindValue($identifier, (int) $this->privateweb, PDO::PARAM_INT);
                        break;
                    case 'privatemgr':
                        $stmt->bindValue($identifier, (int) $this->privatemgr, PDO::PARAM_INT);
                        break;
                    case 'content_dispo':
                        $stmt->bindValue($identifier, (int) $this->content_dispo, PDO::PARAM_INT);
                        break;
                    case 'hidemenu':
                        $stmt->bindValue($identifier, (int) $this->hidemenu, PDO::PARAM_INT);
                        break;
                    case 'class_key':
                        $stmt->bindValue($identifier, $this->class_key, PDO::PARAM_STR);
                        break;
                    case 'context_key':
                        $stmt->bindValue($identifier, $this->context_key, PDO::PARAM_STR);
                        break;
                    case 'content_type':
                        $stmt->bindValue($identifier, $this->content_type, PDO::PARAM_INT);
                        break;
                    case 'uri':
                        $stmt->bindValue($identifier, $this->uri, PDO::PARAM_STR);
                        break;
                    case 'uri_override':
                        $stmt->bindValue($identifier, (int) $this->uri_override, PDO::PARAM_INT);
                        break;
                    case 'hide_children_in_tree':
                        $stmt->bindValue($identifier, (int) $this->hide_children_in_tree, PDO::PARAM_INT);
                        break;
                    case 'show_in_tree':
                        $stmt->bindValue($identifier, (int) $this->show_in_tree, PDO::PARAM_INT);
                        break;
                    case 'properties':
                        $stmt->bindValue($identifier, $this->properties, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ModxSiteContentTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getType();
                break;
            case 2:
                return $this->getOntentType();
                break;
            case 3:
                return $this->getPagetitle();
                break;
            case 4:
                return $this->getLongtitle();
                break;
            case 5:
                return $this->getDescription();
                break;
            case 6:
                return $this->getAlias();
                break;
            case 7:
                return $this->getLinkAttributes();
                break;
            case 8:
                return $this->getPublished();
                break;
            case 9:
                return $this->getPubDate();
                break;
            case 10:
                return $this->getUnpubDate();
                break;
            case 11:
                return $this->getParent();
                break;
            case 12:
                return $this->getIsfolder();
                break;
            case 13:
                return $this->getIntrotext();
                break;
            case 14:
                return $this->getContent();
                break;
            case 15:
                return $this->getRichtext();
                break;
            case 16:
                return $this->getTemplate();
                break;
            case 17:
                return $this->getMenuindex();
                break;
            case 18:
                return $this->getSearchable();
                break;
            case 19:
                return $this->getCacheable();
                break;
            case 20:
                return $this->getCreatedby();
                break;
            case 21:
                return $this->getCreatedon();
                break;
            case 22:
                return $this->getEditedby();
                break;
            case 23:
                return $this->getEditedon();
                break;
            case 24:
                return $this->getDdeleted();
                break;
            case 25:
                return $this->getDeletedon();
                break;
            case 26:
                return $this->getDeletedby();
                break;
            case 27:
                return $this->getPublishedon();
                break;
            case 28:
                return $this->getPublishedby();
                break;
            case 29:
                return $this->getMenutitle();
                break;
            case 30:
                return $this->getDonthit();
                break;
            case 31:
                return $this->getPrivateweb();
                break;
            case 32:
                return $this->getPrivatemgr();
                break;
            case 33:
                return $this->getContentDispo();
                break;
            case 34:
                return $this->getHidemenu();
                break;
            case 35:
                return $this->getClassKey();
                break;
            case 36:
                return $this->getContextKey();
                break;
            case 37:
                return $this->getContentType();
                break;
            case 38:
                return $this->getUri();
                break;
            case 39:
                return $this->getUriOverride();
                break;
            case 40:
                return $this->getHideChildrenInTree();
                break;
            case 41:
                return $this->getShowInTree();
                break;
            case 42:
                return $this->getProperties();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['ModxSiteContent'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ModxSiteContent'][$this->hashCode()] = true;
        $keys = ModxSiteContentTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getType(),
            $keys[2] => $this->getOntentType(),
            $keys[3] => $this->getPagetitle(),
            $keys[4] => $this->getLongtitle(),
            $keys[5] => $this->getDescription(),
            $keys[6] => $this->getAlias(),
            $keys[7] => $this->getLinkAttributes(),
            $keys[8] => $this->getPublished(),
            $keys[9] => $this->getPubDate(),
            $keys[10] => $this->getUnpubDate(),
            $keys[11] => $this->getParent(),
            $keys[12] => $this->getIsfolder(),
            $keys[13] => $this->getIntrotext(),
            $keys[14] => $this->getContent(),
            $keys[15] => $this->getRichtext(),
            $keys[16] => $this->getTemplate(),
            $keys[17] => $this->getMenuindex(),
            $keys[18] => $this->getSearchable(),
            $keys[19] => $this->getCacheable(),
            $keys[20] => $this->getCreatedby(),
            $keys[21] => $this->getCreatedon(),
            $keys[22] => $this->getEditedby(),
            $keys[23] => $this->getEditedon(),
            $keys[24] => $this->getDdeleted(),
            $keys[25] => $this->getDeletedon(),
            $keys[26] => $this->getDeletedby(),
            $keys[27] => $this->getPublishedon(),
            $keys[28] => $this->getPublishedby(),
            $keys[29] => $this->getMenutitle(),
            $keys[30] => $this->getDonthit(),
            $keys[31] => $this->getPrivateweb(),
            $keys[32] => $this->getPrivatemgr(),
            $keys[33] => $this->getContentDispo(),
            $keys[34] => $this->getHidemenu(),
            $keys[35] => $this->getClassKey(),
            $keys[36] => $this->getContextKey(),
            $keys[37] => $this->getContentType(),
            $keys[38] => $this->getUri(),
            $keys[39] => $this->getUriOverride(),
            $keys[40] => $this->getHideChildrenInTree(),
            $keys[41] => $this->getShowInTree(),
            $keys[42] => $this->getProperties(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\ModxSiteContent
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ModxSiteContentTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ModxSiteContent
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setType($value);
                break;
            case 2:
                $this->setOntentType($value);
                break;
            case 3:
                $this->setPagetitle($value);
                break;
            case 4:
                $this->setLongtitle($value);
                break;
            case 5:
                $this->setDescription($value);
                break;
            case 6:
                $this->setAlias($value);
                break;
            case 7:
                $this->setLinkAttributes($value);
                break;
            case 8:
                $this->setPublished($value);
                break;
            case 9:
                $this->setPubDate($value);
                break;
            case 10:
                $this->setUnpubDate($value);
                break;
            case 11:
                $this->setParent($value);
                break;
            case 12:
                $this->setIsfolder($value);
                break;
            case 13:
                $this->setIntrotext($value);
                break;
            case 14:
                $this->setContent($value);
                break;
            case 15:
                $this->setRichtext($value);
                break;
            case 16:
                $this->setTemplate($value);
                break;
            case 17:
                $this->setMenuindex($value);
                break;
            case 18:
                $this->setSearchable($value);
                break;
            case 19:
                $this->setCacheable($value);
                break;
            case 20:
                $this->setCreatedby($value);
                break;
            case 21:
                $this->setCreatedon($value);
                break;
            case 22:
                $this->setEditedby($value);
                break;
            case 23:
                $this->setEditedon($value);
                break;
            case 24:
                $this->setDdeleted($value);
                break;
            case 25:
                $this->setDeletedon($value);
                break;
            case 26:
                $this->setDeletedby($value);
                break;
            case 27:
                $this->setPublishedon($value);
                break;
            case 28:
                $this->setPublishedby($value);
                break;
            case 29:
                $this->setMenutitle($value);
                break;
            case 30:
                $this->setDonthit($value);
                break;
            case 31:
                $this->setPrivateweb($value);
                break;
            case 32:
                $this->setPrivatemgr($value);
                break;
            case 33:
                $this->setContentDispo($value);
                break;
            case 34:
                $this->setHidemenu($value);
                break;
            case 35:
                $this->setClassKey($value);
                break;
            case 36:
                $this->setContextKey($value);
                break;
            case 37:
                $this->setContentType($value);
                break;
            case 38:
                $this->setUri($value);
                break;
            case 39:
                $this->setUriOverride($value);
                break;
            case 40:
                $this->setHideChildrenInTree($value);
                break;
            case 41:
                $this->setShowInTree($value);
                break;
            case 42:
                $this->setProperties($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ModxSiteContentTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setType($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setOntentType($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPagetitle($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLongtitle($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDescription($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setAlias($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLinkAttributes($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPublished($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setPubDate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setUnpubDate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setParent($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIsfolder($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setIntrotext($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setContent($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setRichtext($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTemplate($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setMenuindex($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setSearchable($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCacheable($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setCreatedby($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setCreatedon($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setEditedby($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setEditedon($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setDdeleted($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setDeletedon($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setDeletedby($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPublishedon($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setPublishedby($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setMenutitle($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setDonthit($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setPrivateweb($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setPrivatemgr($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setContentDispo($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setHidemenu($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setClassKey($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setContextKey($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setContentType($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setUri($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setUriOverride($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setHideChildrenInTree($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setShowInTree($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setProperties($arr[$keys[42]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\ModxSiteContent The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ModxSiteContentTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ID)) {
            $criteria->add(ModxSiteContentTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_TYPE)) {
            $criteria->add(ModxSiteContentTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ONTENT_TYPE)) {
            $criteria->add(ModxSiteContentTableMap::COL_ONTENT_TYPE, $this->ontent_type);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PAGETITLE)) {
            $criteria->add(ModxSiteContentTableMap::COL_PAGETITLE, $this->pagetitle);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_LONGTITLE)) {
            $criteria->add(ModxSiteContentTableMap::COL_LONGTITLE, $this->longtitle);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DESCRIPTION)) {
            $criteria->add(ModxSiteContentTableMap::COL_DESCRIPTION, $this->description);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ALIAS)) {
            $criteria->add(ModxSiteContentTableMap::COL_ALIAS, $this->alias);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_LINK_ATTRIBUTES)) {
            $criteria->add(ModxSiteContentTableMap::COL_LINK_ATTRIBUTES, $this->link_attributes);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHED)) {
            $criteria->add(ModxSiteContentTableMap::COL_PUBLISHED, $this->published);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUB_DATE)) {
            $criteria->add(ModxSiteContentTableMap::COL_PUB_DATE, $this->pub_date);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_UNPUB_DATE)) {
            $criteria->add(ModxSiteContentTableMap::COL_UNPUB_DATE, $this->unpub_date);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PARENT)) {
            $criteria->add(ModxSiteContentTableMap::COL_PARENT, $this->parent);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_ISFOLDER)) {
            $criteria->add(ModxSiteContentTableMap::COL_ISFOLDER, $this->isfolder);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_INTROTEXT)) {
            $criteria->add(ModxSiteContentTableMap::COL_INTROTEXT, $this->introtext);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT)) {
            $criteria->add(ModxSiteContentTableMap::COL_CONTENT, $this->content);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_RICHTEXT)) {
            $criteria->add(ModxSiteContentTableMap::COL_RICHTEXT, $this->richtext);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_TEMPLATE)) {
            $criteria->add(ModxSiteContentTableMap::COL_TEMPLATE, $this->template);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_MENUINDEX)) {
            $criteria->add(ModxSiteContentTableMap::COL_MENUINDEX, $this->menuindex);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_SEARCHABLE)) {
            $criteria->add(ModxSiteContentTableMap::COL_SEARCHABLE, $this->searchable);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CACHEABLE)) {
            $criteria->add(ModxSiteContentTableMap::COL_CACHEABLE, $this->cacheable);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CREATEDBY)) {
            $criteria->add(ModxSiteContentTableMap::COL_CREATEDBY, $this->createdby);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CREATEDON)) {
            $criteria->add(ModxSiteContentTableMap::COL_CREATEDON, $this->createdon);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_EDITEDBY)) {
            $criteria->add(ModxSiteContentTableMap::COL_EDITEDBY, $this->editedby);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_EDITEDON)) {
            $criteria->add(ModxSiteContentTableMap::COL_EDITEDON, $this->editedon);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DDELETED)) {
            $criteria->add(ModxSiteContentTableMap::COL_DDELETED, $this->ddeleted);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DELETEDON)) {
            $criteria->add(ModxSiteContentTableMap::COL_DELETEDON, $this->deletedon);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DELETEDBY)) {
            $criteria->add(ModxSiteContentTableMap::COL_DELETEDBY, $this->deletedby);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHEDON)) {
            $criteria->add(ModxSiteContentTableMap::COL_PUBLISHEDON, $this->publishedon);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PUBLISHEDBY)) {
            $criteria->add(ModxSiteContentTableMap::COL_PUBLISHEDBY, $this->publishedby);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_MENUTITLE)) {
            $criteria->add(ModxSiteContentTableMap::COL_MENUTITLE, $this->menutitle);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_DONTHIT)) {
            $criteria->add(ModxSiteContentTableMap::COL_DONTHIT, $this->donthit);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PRIVATEWEB)) {
            $criteria->add(ModxSiteContentTableMap::COL_PRIVATEWEB, $this->privateweb);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PRIVATEMGR)) {
            $criteria->add(ModxSiteContentTableMap::COL_PRIVATEMGR, $this->privatemgr);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT_DISPO)) {
            $criteria->add(ModxSiteContentTableMap::COL_CONTENT_DISPO, $this->content_dispo);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_HIDEMENU)) {
            $criteria->add(ModxSiteContentTableMap::COL_HIDEMENU, $this->hidemenu);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CLASS_KEY)) {
            $criteria->add(ModxSiteContentTableMap::COL_CLASS_KEY, $this->class_key);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTEXT_KEY)) {
            $criteria->add(ModxSiteContentTableMap::COL_CONTEXT_KEY, $this->context_key);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_CONTENT_TYPE)) {
            $criteria->add(ModxSiteContentTableMap::COL_CONTENT_TYPE, $this->content_type);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_URI)) {
            $criteria->add(ModxSiteContentTableMap::COL_URI, $this->uri);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_URI_OVERRIDE)) {
            $criteria->add(ModxSiteContentTableMap::COL_URI_OVERRIDE, $this->uri_override);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE)) {
            $criteria->add(ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE, $this->hide_children_in_tree);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_SHOW_IN_TREE)) {
            $criteria->add(ModxSiteContentTableMap::COL_SHOW_IN_TREE, $this->show_in_tree);
        }
        if ($this->isColumnModified(ModxSiteContentTableMap::COL_PROPERTIES)) {
            $criteria->add(ModxSiteContentTableMap::COL_PROPERTIES, $this->properties);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildModxSiteContentQuery::create();
        $criteria->add(ModxSiteContentTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \ModxSiteContent (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setType($this->getType());
        $copyObj->setOntentType($this->getOntentType());
        $copyObj->setPagetitle($this->getPagetitle());
        $copyObj->setLongtitle($this->getLongtitle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setAlias($this->getAlias());
        $copyObj->setLinkAttributes($this->getLinkAttributes());
        $copyObj->setPublished($this->getPublished());
        $copyObj->setPubDate($this->getPubDate());
        $copyObj->setUnpubDate($this->getUnpubDate());
        $copyObj->setParent($this->getParent());
        $copyObj->setIsfolder($this->getIsfolder());
        $copyObj->setIntrotext($this->getIntrotext());
        $copyObj->setContent($this->getContent());
        $copyObj->setRichtext($this->getRichtext());
        $copyObj->setTemplate($this->getTemplate());
        $copyObj->setMenuindex($this->getMenuindex());
        $copyObj->setSearchable($this->getSearchable());
        $copyObj->setCacheable($this->getCacheable());
        $copyObj->setCreatedby($this->getCreatedby());
        $copyObj->setCreatedon($this->getCreatedon());
        $copyObj->setEditedby($this->getEditedby());
        $copyObj->setEditedon($this->getEditedon());
        $copyObj->setDdeleted($this->getDdeleted());
        $copyObj->setDeletedon($this->getDeletedon());
        $copyObj->setDeletedby($this->getDeletedby());
        $copyObj->setPublishedon($this->getPublishedon());
        $copyObj->setPublishedby($this->getPublishedby());
        $copyObj->setMenutitle($this->getMenutitle());
        $copyObj->setDonthit($this->getDonthit());
        $copyObj->setPrivateweb($this->getPrivateweb());
        $copyObj->setPrivatemgr($this->getPrivatemgr());
        $copyObj->setContentDispo($this->getContentDispo());
        $copyObj->setHidemenu($this->getHidemenu());
        $copyObj->setClassKey($this->getClassKey());
        $copyObj->setContextKey($this->getContextKey());
        $copyObj->setContentType($this->getContentType());
        $copyObj->setUri($this->getUri());
        $copyObj->setUriOverride($this->getUriOverride());
        $copyObj->setHideChildrenInTree($this->getHideChildrenInTree());
        $copyObj->setShowInTree($this->getShowInTree());
        $copyObj->setProperties($this->getProperties());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \ModxSiteContent Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->type = null;
        $this->ontent_type = null;
        $this->pagetitle = null;
        $this->longtitle = null;
        $this->description = null;
        $this->alias = null;
        $this->link_attributes = null;
        $this->published = null;
        $this->pub_date = null;
        $this->unpub_date = null;
        $this->parent = null;
        $this->isfolder = null;
        $this->introtext = null;
        $this->content = null;
        $this->richtext = null;
        $this->template = null;
        $this->menuindex = null;
        $this->searchable = null;
        $this->cacheable = null;
        $this->createdby = null;
        $this->createdon = null;
        $this->editedby = null;
        $this->editedon = null;
        $this->ddeleted = null;
        $this->deletedon = null;
        $this->deletedby = null;
        $this->publishedon = null;
        $this->publishedby = null;
        $this->menutitle = null;
        $this->donthit = null;
        $this->privateweb = null;
        $this->privatemgr = null;
        $this->content_dispo = null;
        $this->hidemenu = null;
        $this->class_key = null;
        $this->context_key = null;
        $this->content_type = null;
        $this->uri = null;
        $this->uri_override = null;
        $this->hide_children_in_tree = null;
        $this->show_in_tree = null;
        $this->properties = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ModxSiteContentTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
