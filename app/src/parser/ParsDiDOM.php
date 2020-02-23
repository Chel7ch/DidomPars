<?php

namespace Parser;


class ParsDiDOM
{

    /**plug-in traits */
    use CleanLinks, StraightOut, TurnOverOut, \Client\RepeatErrResp;

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
        return $this->client->getPage($url);
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

    /**
     * Crawling site pages on links
     * @param array $links required only if you want to pass repeatErrorPage
     * @return void
     */
    public function spider($links = [])
    {
        if (empty($links)) {
            $this->linked = array();
            $links = $this->getLinks($this->getPage($this->url));
        }

        for ($i = 1; $i <= LEVELS; $i++) {
            foreach ($links as $nextLink) {
                $subLinks = $this->getLinks($this->getPage($nextLink));

                if (!empty($subLinks)) {
                    foreach ($subLinks as $subLink) {
                        $ln[] = $subLink;
//                        echo $subLink . '<br>';// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    }
                }
                echo 'уровень  ' . $i . '  _  ' . count($this->linked) . '  в linked  ' . count($links) . '  в $links <br>';

                $ln = array_diff($ln, $links, $this->linked);
                $links = array_merge($links, $ln);

                $this->linked[] = $nextLink;
                array_shift($links);
                usleep(USLEEP);
            }
        }
// todo заставить работать правильно ( сделать if !empty)
        for ($e = 0; $e < REPEAT_ERR_URL; $e++) {
            $this->readErrorURL();
            sleep(REPEAT_ERR_URL_DELAY);
        }


        echo '<pre>';
        echo '<br>links<br>';
        print_r($links);
        echo '<br>linked<br>';
        print_r($this->linked);
        echo '</pre>';
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