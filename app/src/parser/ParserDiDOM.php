<?php
namespace Parser;


use DiDom\Document;

abstract class ParserDiDOM{

     /**plug-in traits */
     use CleanLinks, StraightOut, TurnOverOut;

     /**
      * @var array scratch  XML expressions for searching on a page. Needs of benefits
      * @var object client HTTP client
      * @var object connect PDO
      * @var array linked reviewed links
      */
     public $scratch;
     public $client;
     public $connect;
     public $linked;

     public function __construct($scratch)
     {
         $this->scratch = $scratch;
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
         $document='';
         $content = $this->client->getPage($url);
         if (isset($content)) {
             $document = new Document($content);
         }
         return $document;
     }

     /**
      * pulls links from page
      * @param string $document HTML doc
      * @return array
      * @uses CleanLinks trait
      */
     public function getLinks($document)
     {
         $links = array();
         if (!empty($document)) {
             $links = $document->find('a::attr(href)');
             $links = $this->cleanLinks($links);
         }
         return $links;
     }

     /**
      * pulls  benefits  data from page
      * @param string $page URN
      * @param string $document HTML doc
      * @param array $scratches DiDom find expressions
      * @return array
      * @uses StraightOut, TurnOverOut traits
      */
     public function benefit($page, $document, $scratches = [])
     {
         $data[] = $page;
         foreach ($scratches as $scratch) {
             $benefit = $document->find($scratch);
             $data[] = $benefit;
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
     public function insertDB()
     {
         $benefit = $this->benefit($this->url, $this->getPage($this->url), $this->scratch);
         $this->conn->insertDB($this->conn->prepareInsert($benefit));
     }

     /** SelectDB  */
     public function selectDB()
     {
         $this->conn->selectDB();
     }

 }