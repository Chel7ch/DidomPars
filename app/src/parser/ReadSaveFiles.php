<?php

namespace Parser;

use DiDom\Document;

class ReadSaveFiles
{

    public function getPage()
    {
        if (file_exists(PROJECT_DIR . '/htmlPages')) {
            $entries = scandir(PROJECT_DIR . '/htmlPages');
            foreach ($entries as $entry) {
                $doc = PROJECT_DIR . '/htmlPages/'. $entry;
                $document = new Document();
                $document->loadHtml($doc);
            }
        }
        echo $document;
    }

}

