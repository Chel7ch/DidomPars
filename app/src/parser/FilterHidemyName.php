<?php

namespace Parser;

trait FilterHidemyName
{
    /**
     * prepare  data from hidemy.name for use.
     * @param array $data
     * @return array
     */
    public function specialPrepOutput($data)
    {
        /** deff count arrays
         * @var  integer $maxCount number of elements in the largest array  in $data*/

        $maxCount = 0;
        $dt =array();

        foreach ($data as $a) {
            $c = count((array)$a);
            if ($maxCount < $c) $maxCount = $c;
        }
        /** prepare data   */
        for ($f = 0; $f < $maxCount; $f++) {
            $str = '';
                (empty($data[1][$f])) ? $str .= '\' \',' : $str .= '\'' . $data[1][$f] . ':';
                (empty($data[2][$f])) ? $str .= '\' \',' : $str .= $data[2][$f] . '\', ';
                (empty($data[3][$f])) ? $str .= '\' \',' : $str .= '\'' . $data[3][$f] . '\', ';
                (empty($data[4][$f])) ? $str .= '\' \',' : $str .= '\'' . $data[4][$f] . '\', ';
                (empty($data[5][$f])) ? $str .= '\' \',' : $str .= '\'' . $data[5][$f] . '\'';
            $dt[] = $str;
        }

        return $dt;
    }
}
