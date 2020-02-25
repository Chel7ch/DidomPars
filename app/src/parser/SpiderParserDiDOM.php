<?php

namespace Parser;


class SpiderParserDiDOM extends ParserDiDOM
{
    /**plug-in traits */
    use RepeatErrResp;

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

}