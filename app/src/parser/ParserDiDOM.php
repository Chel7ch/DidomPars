<?php

namespace Parser;


use DiDom\Document;

abstract class ParserDiDOM
{

    /**plug-in traits */
    use CleanLinks, StraightOut, TurnOverOut;

    /**
     * @var array scratch  XML expressions for searching on a page. Needs of benefits
     * @var object client HTTP client
     * @var object connect PDO
     * @var array linked reviewed links
     * @var string doc DiDom page
     */
    public $client;
    public $connect;
    public $linked;
    public $doc;

    public function __construct()
    {
        $this->doc = new Document();
    }

    /**
     * @param \Client\IHttpClient $client
     */
    public function setHttpClient(\Client\IHttpClient $client)
    {
        $this->client = $client;
        $this->url = $this->client->url;
    }

    /**
     * @param string $url
     * @return string HTML doc
     */
    public function getPage($url)
    {
        return $this->client->getPage($url);
    }

    /**
     * @param string $url the URN pages
     * @return string $doc  get page by DiDOM
     */
    public function parsPage($url)
    {
        $document = $this->getPage($url);
        if (!empty($document)) {
            $this->page = $this->doc->loadHtml($document);
        }
        return $this;
    }

    /**
     * pulls links from page
     * @return array
     * @uses CleanLinks trait
     */
    public function getLinks()
    {
        $links = array();
        if (!empty($this->page)) {
            $links = $this->page->find('a::attr(href)');
            $links = $this->cleanLinks($links);
        }
        return $links;
    }

    /**
     * pulls  benefits  data from page
     * @param string $page URN
     * @param array $scratches DiDom find expressions
     * @return array
     * @uses StraightOut, TurnOverOut traits
     */
    public function benefit($page, $scratches = [])
    {
        $data[] = $page;
        foreach ($scratches as $scratch) {
            $arr = $this->page->find($scratch);
            (!empty($arr))? $data[] = $arr : $data[] = array('null');
        }
        if (TURN_OVER_BENEFIT == 1) $data = $this->turnOverOutput($data);
        if (TURN_OVER_BENEFIT == 2) $data = $this->straightOutput($data);
        return $data;
    }

    /** ConnectDB  */
    public function connectDB($db)
    {
        $this->conn = $db;
    }

    /** InsertDB  */
    public function insertDB($benefit)
    {
        $this->conn->insertDB($this->conn->prepareInsert($benefit));
    }

    /** SelectDB  */
    public function selectDB()
    {
        $this->conn->selectDB();
    }

}