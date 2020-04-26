<?php

namespace Map;

use \ModxSiteContent;
use \ModxSiteContentQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'modx_site_content' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ModxSiteContentTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ModxSiteContentTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'modx_site_content';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ModxSiteContent';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ModxSiteContent';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 43;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 43;

    /**
     * the column name for the id field
     */
    const COL_ID = 'modx_site_content.id';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'modx_site_content.type';

    /**
     * the column name for the ontent_type field
     */
    const COL_ONTENT_TYPE = 'modx_site_content.ontent_type';

    /**
     * the column name for the pagetitle field
     */
    const COL_PAGETITLE = 'modx_site_content.pagetitle';

    /**
     * the column name for the longtitle field
     */
    const COL_LONGTITLE = 'modx_site_content.longtitle';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'modx_site_content.description';

    /**
     * the column name for the alias field
     */
    const COL_ALIAS = 'modx_site_content.alias';

    /**
     * the column name for the link_attributes field
     */
    const COL_LINK_ATTRIBUTES = 'modx_site_content.link_attributes';

    /**
     * the column name for the published field
     */
    const COL_PUBLISHED = 'modx_site_content.published';

    /**
     * the column name for the pub_date field
     */
    const COL_PUB_DATE = 'modx_site_content.pub_date';

    /**
     * the column name for the unpub_date field
     */
    const COL_UNPUB_DATE = 'modx_site_content.unpub_date';

    /**
     * the column name for the parent field
     */
    const COL_PARENT = 'modx_site_content.parent';

    /**
     * the column name for the isfolder field
     */
    const COL_ISFOLDER = 'modx_site_content.isfolder';

    /**
     * the column name for the introtext field
     */
    const COL_INTROTEXT = 'modx_site_content.introtext';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'modx_site_content.content';

    /**
     * the column name for the richtext field
     */
    const COL_RICHTEXT = 'modx_site_content.richtext';

    /**
     * the column name for the template field
     */
    const COL_TEMPLATE = 'modx_site_content.template';

    /**
     * the column name for the menuindex field
     */
    const COL_MENUINDEX = 'modx_site_content.menuindex';

    /**
     * the column name for the searchable field
     */
    const COL_SEARCHABLE = 'modx_site_content.searchable';

    /**
     * the column name for the cacheable field
     */
    const COL_CACHEABLE = 'modx_site_content.cacheable';

    /**
     * the column name for the createdby field
     */
    const COL_CREATEDBY = 'modx_site_content.createdby';

    /**
     * the column name for the createdon field
     */
    const COL_CREATEDON = 'modx_site_content.createdon';

    /**
     * the column name for the editedby field
     */
    const COL_EDITEDBY = 'modx_site_content.editedby';

    /**
     * the column name for the editedon field
     */
    const COL_EDITEDON = 'modx_site_content.editedon';

    /**
     * the column name for the ddeleted field
     */
    const COL_DDELETED = 'modx_site_content.ddeleted';

    /**
     * the column name for the deletedon field
     */
    const COL_DELETEDON = 'modx_site_content.deletedon';

    /**
     * the column name for the deletedby field
     */
    const COL_DELETEDBY = 'modx_site_content.deletedby';

    /**
     * the column name for the publishedon field
     */
    const COL_PUBLISHEDON = 'modx_site_content.publishedon';

    /**
     * the column name for the publishedby field
     */
    const COL_PUBLISHEDBY = 'modx_site_content.publishedby';

    /**
     * the column name for the menutitle field
     */
    const COL_MENUTITLE = 'modx_site_content.menutitle';

    /**
     * the column name for the donthit field
     */
    const COL_DONTHIT = 'modx_site_content.donthit';

    /**
     * the column name for the privateweb field
     */
    const COL_PRIVATEWEB = 'modx_site_content.privateweb';

    /**
     * the column name for the privatemgr field
     */
    const COL_PRIVATEMGR = 'modx_site_content.privatemgr';

    /**
     * the column name for the content_dispo field
     */
    const COL_CONTENT_DISPO = 'modx_site_content.content_dispo';

    /**
     * the column name for the hidemenu field
     */
    const COL_HIDEMENU = 'modx_site_content.hidemenu';

    /**
     * the column name for the class_key field
     */
    const COL_CLASS_KEY = 'modx_site_content.class_key';

    /**
     * the column name for the context_key field
     */
    const COL_CONTEXT_KEY = 'modx_site_content.context_key';

    /**
     * the column name for the content_type field
     */
    const COL_CONTENT_TYPE = 'modx_site_content.content_type';

    /**
     * the column name for the uri field
     */
    const COL_URI = 'modx_site_content.uri';

    /**
     * the column name for the uri_override field
     */
    const COL_URI_OVERRIDE = 'modx_site_content.uri_override';

    /**
     * the column name for the hide_children_in_tree field
     */
    const COL_HIDE_CHILDREN_IN_TREE = 'modx_site_content.hide_children_in_tree';

    /**
     * the column name for the show_in_tree field
     */
    const COL_SHOW_IN_TREE = 'modx_site_content.show_in_tree';

    /**
     * the column name for the properties field
     */
    const COL_PROPERTIES = 'modx_site_content.properties';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Type', 'OntentType', 'Pagetitle', 'Longtitle', 'Description', 'Alias', 'LinkAttributes', 'Published', 'PubDate', 'UnpubDate', 'Parent', 'Isfolder', 'Introtext', 'Content', 'Richtext', 'Template', 'Menuindex', 'Searchable', 'Cacheable', 'Createdby', 'Createdon', 'Editedby', 'Editedon', 'Ddeleted', 'Deletedon', 'Deletedby', 'Publishedon', 'Publishedby', 'Menutitle', 'Donthit', 'Privateweb', 'Privatemgr', 'ContentDispo', 'Hidemenu', 'ClassKey', 'ContextKey', 'ContentType', 'Uri', 'UriOverride', 'HideChildrenInTree', 'ShowInTree', 'Properties', ),
        self::TYPE_CAMELNAME     => array('id', 'type', 'ontentType', 'pagetitle', 'longtitle', 'description', 'alias', 'linkAttributes', 'published', 'pubDate', 'unpubDate', 'parent', 'isfolder', 'introtext', 'content', 'richtext', 'template', 'menuindex', 'searchable', 'cacheable', 'createdby', 'createdon', 'editedby', 'editedon', 'ddeleted', 'deletedon', 'deletedby', 'publishedon', 'publishedby', 'menutitle', 'donthit', 'privateweb', 'privatemgr', 'contentDispo', 'hidemenu', 'classKey', 'contextKey', 'contentType', 'uri', 'uriOverride', 'hideChildrenInTree', 'showInTree', 'properties', ),
        self::TYPE_COLNAME       => array(ModxSiteContentTableMap::COL_ID, ModxSiteContentTableMap::COL_TYPE, ModxSiteContentTableMap::COL_ONTENT_TYPE, ModxSiteContentTableMap::COL_PAGETITLE, ModxSiteContentTableMap::COL_LONGTITLE, ModxSiteContentTableMap::COL_DESCRIPTION, ModxSiteContentTableMap::COL_ALIAS, ModxSiteContentTableMap::COL_LINK_ATTRIBUTES, ModxSiteContentTableMap::COL_PUBLISHED, ModxSiteContentTableMap::COL_PUB_DATE, ModxSiteContentTableMap::COL_UNPUB_DATE, ModxSiteContentTableMap::COL_PARENT, ModxSiteContentTableMap::COL_ISFOLDER, ModxSiteContentTableMap::COL_INTROTEXT, ModxSiteContentTableMap::COL_CONTENT, ModxSiteContentTableMap::COL_RICHTEXT, ModxSiteContentTableMap::COL_TEMPLATE, ModxSiteContentTableMap::COL_MENUINDEX, ModxSiteContentTableMap::COL_SEARCHABLE, ModxSiteContentTableMap::COL_CACHEABLE, ModxSiteContentTableMap::COL_CREATEDBY, ModxSiteContentTableMap::COL_CREATEDON, ModxSiteContentTableMap::COL_EDITEDBY, ModxSiteContentTableMap::COL_EDITEDON, ModxSiteContentTableMap::COL_DDELETED, ModxSiteContentTableMap::COL_DELETEDON, ModxSiteContentTableMap::COL_DELETEDBY, ModxSiteContentTableMap::COL_PUBLISHEDON, ModxSiteContentTableMap::COL_PUBLISHEDBY, ModxSiteContentTableMap::COL_MENUTITLE, ModxSiteContentTableMap::COL_DONTHIT, ModxSiteContentTableMap::COL_PRIVATEWEB, ModxSiteContentTableMap::COL_PRIVATEMGR, ModxSiteContentTableMap::COL_CONTENT_DISPO, ModxSiteContentTableMap::COL_HIDEMENU, ModxSiteContentTableMap::COL_CLASS_KEY, ModxSiteContentTableMap::COL_CONTEXT_KEY, ModxSiteContentTableMap::COL_CONTENT_TYPE, ModxSiteContentTableMap::COL_URI, ModxSiteContentTableMap::COL_URI_OVERRIDE, ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE, ModxSiteContentTableMap::COL_SHOW_IN_TREE, ModxSiteContentTableMap::COL_PROPERTIES, ),
        self::TYPE_FIELDNAME     => array('id', 'type', 'ontent_type', 'pagetitle', 'longtitle', 'description', 'alias', 'link_attributes', 'published', 'pub_date', 'unpub_date', 'parent', 'isfolder', 'introtext', 'content', 'richtext', 'template', 'menuindex', 'searchable', 'cacheable', 'createdby', 'createdon', 'editedby', 'editedon', 'ddeleted', 'deletedon', 'deletedby', 'publishedon', 'publishedby', 'menutitle', 'donthit', 'privateweb', 'privatemgr', 'content_dispo', 'hidemenu', 'class_key', 'context_key', 'content_type', 'uri', 'uri_override', 'hide_children_in_tree', 'show_in_tree', 'properties', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Type' => 1, 'OntentType' => 2, 'Pagetitle' => 3, 'Longtitle' => 4, 'Description' => 5, 'Alias' => 6, 'LinkAttributes' => 7, 'Published' => 8, 'PubDate' => 9, 'UnpubDate' => 10, 'Parent' => 11, 'Isfolder' => 12, 'Introtext' => 13, 'Content' => 14, 'Richtext' => 15, 'Template' => 16, 'Menuindex' => 17, 'Searchable' => 18, 'Cacheable' => 19, 'Createdby' => 20, 'Createdon' => 21, 'Editedby' => 22, 'Editedon' => 23, 'Ddeleted' => 24, 'Deletedon' => 25, 'Deletedby' => 26, 'Publishedon' => 27, 'Publishedby' => 28, 'Menutitle' => 29, 'Donthit' => 30, 'Privateweb' => 31, 'Privatemgr' => 32, 'ContentDispo' => 33, 'Hidemenu' => 34, 'ClassKey' => 35, 'ContextKey' => 36, 'ContentType' => 37, 'Uri' => 38, 'UriOverride' => 39, 'HideChildrenInTree' => 40, 'ShowInTree' => 41, 'Properties' => 42, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'type' => 1, 'ontentType' => 2, 'pagetitle' => 3, 'longtitle' => 4, 'description' => 5, 'alias' => 6, 'linkAttributes' => 7, 'published' => 8, 'pubDate' => 9, 'unpubDate' => 10, 'parent' => 11, 'isfolder' => 12, 'introtext' => 13, 'content' => 14, 'richtext' => 15, 'template' => 16, 'menuindex' => 17, 'searchable' => 18, 'cacheable' => 19, 'createdby' => 20, 'createdon' => 21, 'editedby' => 22, 'editedon' => 23, 'ddeleted' => 24, 'deletedon' => 25, 'deletedby' => 26, 'publishedon' => 27, 'publishedby' => 28, 'menutitle' => 29, 'donthit' => 30, 'privateweb' => 31, 'privatemgr' => 32, 'contentDispo' => 33, 'hidemenu' => 34, 'classKey' => 35, 'contextKey' => 36, 'contentType' => 37, 'uri' => 38, 'uriOverride' => 39, 'hideChildrenInTree' => 40, 'showInTree' => 41, 'properties' => 42, ),
        self::TYPE_COLNAME       => array(ModxSiteContentTableMap::COL_ID => 0, ModxSiteContentTableMap::COL_TYPE => 1, ModxSiteContentTableMap::COL_ONTENT_TYPE => 2, ModxSiteContentTableMap::COL_PAGETITLE => 3, ModxSiteContentTableMap::COL_LONGTITLE => 4, ModxSiteContentTableMap::COL_DESCRIPTION => 5, ModxSiteContentTableMap::COL_ALIAS => 6, ModxSiteContentTableMap::COL_LINK_ATTRIBUTES => 7, ModxSiteContentTableMap::COL_PUBLISHED => 8, ModxSiteContentTableMap::COL_PUB_DATE => 9, ModxSiteContentTableMap::COL_UNPUB_DATE => 10, ModxSiteContentTableMap::COL_PARENT => 11, ModxSiteContentTableMap::COL_ISFOLDER => 12, ModxSiteContentTableMap::COL_INTROTEXT => 13, ModxSiteContentTableMap::COL_CONTENT => 14, ModxSiteContentTableMap::COL_RICHTEXT => 15, ModxSiteContentTableMap::COL_TEMPLATE => 16, ModxSiteContentTableMap::COL_MENUINDEX => 17, ModxSiteContentTableMap::COL_SEARCHABLE => 18, ModxSiteContentTableMap::COL_CACHEABLE => 19, ModxSiteContentTableMap::COL_CREATEDBY => 20, ModxSiteContentTableMap::COL_CREATEDON => 21, ModxSiteContentTableMap::COL_EDITEDBY => 22, ModxSiteContentTableMap::COL_EDITEDON => 23, ModxSiteContentTableMap::COL_DDELETED => 24, ModxSiteContentTableMap::COL_DELETEDON => 25, ModxSiteContentTableMap::COL_DELETEDBY => 26, ModxSiteContentTableMap::COL_PUBLISHEDON => 27, ModxSiteContentTableMap::COL_PUBLISHEDBY => 28, ModxSiteContentTableMap::COL_MENUTITLE => 29, ModxSiteContentTableMap::COL_DONTHIT => 30, ModxSiteContentTableMap::COL_PRIVATEWEB => 31, ModxSiteContentTableMap::COL_PRIVATEMGR => 32, ModxSiteContentTableMap::COL_CONTENT_DISPO => 33, ModxSiteContentTableMap::COL_HIDEMENU => 34, ModxSiteContentTableMap::COL_CLASS_KEY => 35, ModxSiteContentTableMap::COL_CONTEXT_KEY => 36, ModxSiteContentTableMap::COL_CONTENT_TYPE => 37, ModxSiteContentTableMap::COL_URI => 38, ModxSiteContentTableMap::COL_URI_OVERRIDE => 39, ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE => 40, ModxSiteContentTableMap::COL_SHOW_IN_TREE => 41, ModxSiteContentTableMap::COL_PROPERTIES => 42, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'type' => 1, 'ontent_type' => 2, 'pagetitle' => 3, 'longtitle' => 4, 'description' => 5, 'alias' => 6, 'link_attributes' => 7, 'published' => 8, 'pub_date' => 9, 'unpub_date' => 10, 'parent' => 11, 'isfolder' => 12, 'introtext' => 13, 'content' => 14, 'richtext' => 15, 'template' => 16, 'menuindex' => 17, 'searchable' => 18, 'cacheable' => 19, 'createdby' => 20, 'createdon' => 21, 'editedby' => 22, 'editedon' => 23, 'ddeleted' => 24, 'deletedon' => 25, 'deletedby' => 26, 'publishedon' => 27, 'publishedby' => 28, 'menutitle' => 29, 'donthit' => 30, 'privateweb' => 31, 'privatemgr' => 32, 'content_dispo' => 33, 'hidemenu' => 34, 'class_key' => 35, 'context_key' => 36, 'content_type' => 37, 'uri' => 38, 'uri_override' => 39, 'hide_children_in_tree' => 40, 'show_in_tree' => 41, 'properties' => 42, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('modx_site_content');
        $this->setPhpName('ModxSiteContent');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ModxSiteContent');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 20, 'document');
        $this->addColumn('ontent_type', 'OntentType', 'VARCHAR', false, 50, null);
        $this->addColumn('pagetitle', 'Pagetitle', 'VARCHAR', true, 255, '');
        $this->addColumn('longtitle', 'Longtitle', 'VARCHAR', true, 255, '');
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, '');
        $this->addColumn('alias', 'Alias', 'VARCHAR', false, 255, '');
        $this->addColumn('link_attributes', 'LinkAttributes', 'VARCHAR', true, 255, '');
        $this->addColumn('published', 'Published', 'BOOLEAN', true, 1, false);
        $this->addColumn('pub_date', 'PubDate', 'INTEGER', true, 20, 0);
        $this->addColumn('unpub_date', 'UnpubDate', 'INTEGER', true, 20, 0);
        $this->addColumn('parent', 'Parent', 'INTEGER', true, 10, 0);
        $this->addColumn('isfolder', 'Isfolder', 'BOOLEAN', true, 1, false);
        $this->addColumn('introtext', 'Introtext', 'LONGVARCHAR', false, null, null);
        $this->addColumn('content', 'Content', 'LONGVARCHAR', false, null, null);
        $this->addColumn('richtext', 'Richtext', 'BOOLEAN', true, 1, true);
        $this->addColumn('template', 'Template', 'INTEGER', true, 10, 0);
        $this->addColumn('menuindex', 'Menuindex', 'INTEGER', true, 10, 0);
        $this->addColumn('searchable', 'Searchable', 'BOOLEAN', true, 1, true);
        $this->addColumn('cacheable', 'Cacheable', 'BOOLEAN', true, 1, true);
        $this->addColumn('createdby', 'Createdby', 'INTEGER', true, 10, 0);
        $this->addColumn('createdon', 'Createdon', 'INTEGER', true, 20, 0);
        $this->addColumn('editedby', 'Editedby', 'INTEGER', true, 10, 0);
        $this->addColumn('editedon', 'Editedon', 'INTEGER', true, 20, 0);
        $this->addColumn('ddeleted', 'Ddeleted', 'INTEGER', false, null, null);
        $this->addColumn('deletedon', 'Deletedon', 'INTEGER', true, 20, 0);
        $this->addColumn('deletedby', 'Deletedby', 'INTEGER', true, 10, 0);
        $this->addColumn('publishedon', 'Publishedon', 'INTEGER', true, 20, 0);
        $this->addColumn('publishedby', 'Publishedby', 'INTEGER', true, 10, 0);
        $this->addColumn('menutitle', 'Menutitle', 'VARCHAR', true, 255, '');
        $this->addColumn('donthit', 'Donthit', 'BOOLEAN', true, 1, false);
        $this->addColumn('privateweb', 'Privateweb', 'BOOLEAN', true, 1, false);
        $this->addColumn('privatemgr', 'Privatemgr', 'BOOLEAN', true, 1, false);
        $this->addColumn('content_dispo', 'ContentDispo', 'BOOLEAN', true, 1, false);
        $this->addColumn('hidemenu', 'Hidemenu', 'BOOLEAN', true, 1, false);
        $this->addColumn('class_key', 'ClassKey', 'VARCHAR', true, 100, 'modDocument');
        $this->addColumn('context_key', 'ContextKey', 'VARCHAR', true, 100, 'web');
        $this->addColumn('content_type', 'ContentType', 'INTEGER', true, null, 1);
        $this->addColumn('uri', 'Uri', 'LONGVARCHAR', false, null, null);
        $this->addColumn('uri_override', 'UriOverride', 'BOOLEAN', true, 1, false);
        $this->addColumn('hide_children_in_tree', 'HideChildrenInTree', 'BOOLEAN', true, 1, false);
        $this->addColumn('show_in_tree', 'ShowInTree', 'BOOLEAN', true, 1, true);
        $this->addColumn('properties', 'Properties', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ModxSiteContentTableMap::CLASS_DEFAULT : ModxSiteContentTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (ModxSiteContent object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ModxSiteContentTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ModxSiteContentTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ModxSiteContentTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ModxSiteContentTableMap::OM_CLASS;
            /** @var ModxSiteContent $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ModxSiteContentTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ModxSiteContentTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ModxSiteContentTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ModxSiteContent $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ModxSiteContentTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_ID);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_TYPE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_ONTENT_TYPE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PAGETITLE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_LONGTITLE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_ALIAS);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_LINK_ATTRIBUTES);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PUBLISHED);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PUB_DATE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_UNPUB_DATE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PARENT);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_ISFOLDER);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_INTROTEXT);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CONTENT);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_RICHTEXT);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_TEMPLATE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_MENUINDEX);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_SEARCHABLE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CACHEABLE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CREATEDBY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CREATEDON);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_EDITEDBY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_EDITEDON);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_DDELETED);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_DELETEDON);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_DELETEDBY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PUBLISHEDON);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PUBLISHEDBY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_MENUTITLE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_DONTHIT);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PRIVATEWEB);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PRIVATEMGR);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CONTENT_DISPO);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_HIDEMENU);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CLASS_KEY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CONTEXT_KEY);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_CONTENT_TYPE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_URI);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_URI_OVERRIDE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_HIDE_CHILDREN_IN_TREE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_SHOW_IN_TREE);
            $criteria->addSelectColumn(ModxSiteContentTableMap::COL_PROPERTIES);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.ontent_type');
            $criteria->addSelectColumn($alias . '.pagetitle');
            $criteria->addSelectColumn($alias . '.longtitle');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.alias');
            $criteria->addSelectColumn($alias . '.link_attributes');
            $criteria->addSelectColumn($alias . '.published');
            $criteria->addSelectColumn($alias . '.pub_date');
            $criteria->addSelectColumn($alias . '.unpub_date');
            $criteria->addSelectColumn($alias . '.parent');
            $criteria->addSelectColumn($alias . '.isfolder');
            $criteria->addSelectColumn($alias . '.introtext');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.richtext');
            $criteria->addSelectColumn($alias . '.template');
            $criteria->addSelectColumn($alias . '.menuindex');
            $criteria->addSelectColumn($alias . '.searchable');
            $criteria->addSelectColumn($alias . '.cacheable');
            $criteria->addSelectColumn($alias . '.createdby');
            $criteria->addSelectColumn($alias . '.createdon');
            $criteria->addSelectColumn($alias . '.editedby');
            $criteria->addSelectColumn($alias . '.editedon');
            $criteria->addSelectColumn($alias . '.ddeleted');
            $criteria->addSelectColumn($alias . '.deletedon');
            $criteria->addSelectColumn($alias . '.deletedby');
            $criteria->addSelectColumn($alias . '.publishedon');
            $criteria->addSelectColumn($alias . '.publishedby');
            $criteria->addSelectColumn($alias . '.menutitle');
            $criteria->addSelectColumn($alias . '.donthit');
            $criteria->addSelectColumn($alias . '.privateweb');
            $criteria->addSelectColumn($alias . '.privatemgr');
            $criteria->addSelectColumn($alias . '.content_dispo');
            $criteria->addSelectColumn($alias . '.hidemenu');
            $criteria->addSelectColumn($alias . '.class_key');
            $criteria->addSelectColumn($alias . '.context_key');
            $criteria->addSelectColumn($alias . '.content_type');
            $criteria->addSelectColumn($alias . '.uri');
            $criteria->addSelectColumn($alias . '.uri_override');
            $criteria->addSelectColumn($alias . '.hide_children_in_tree');
            $criteria->addSelectColumn($alias . '.show_in_tree');
            $criteria->addSelectColumn($alias . '.properties');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ModxSiteContentTableMap::DATABASE_NAME)->getTable(ModxSiteContentTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ModxSiteContentTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ModxSiteContentTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ModxSiteContentTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ModxSiteContent or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ModxSiteContent object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ModxSiteContent) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ModxSiteContentTableMap::DATABASE_NAME);
            $criteria->add(ModxSiteContentTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ModxSiteContentQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ModxSiteContentTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ModxSiteContentTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the modx_site_content table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ModxSiteContentQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ModxSiteContent or Criteria object.
     *
     * @param mixed               $criteria Criteria or ModxSiteContent object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ModxSiteContentTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ModxSiteContent object
        }

        if ($criteria->containsKey(ModxSiteContentTableMap::COL_ID) && $criteria->keyContainsValue(ModxSiteContentTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ModxSiteContentTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ModxSiteContentQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ModxSiteContentTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ModxSiteContentTableMap::buildTableMap();
