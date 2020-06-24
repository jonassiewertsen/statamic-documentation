<?php

namespace Jonassiewertsen\Documentation\Helper;

class Format
{
    public function text($text)
    {
        /**
         * Wrapping our tables in nice css classes, to give them the shiny
         * Statamic look as you are used to.
         */
        $text = str_replace(
            '<table',
            '<div class="tableWrapper"><table',
            $text
        );

        $text = str_replace(
            'table>',
            'table></div>',
            $text
        );

        return $text;
    }
}
