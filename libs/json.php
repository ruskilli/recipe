<?php

function check_json() {
        switch (json_last_error()) {
                case JSON_ERROR_NONE:
                        //debug("JSON:  - No errors");
                        break;
                case JSON_ERROR_DEPTH:
                        debug("JSON:  - Maximum stack depth exceeded");
                        break;
                case JSON_ERROR_STATE_MISMATCH:
                        debug("JSON:  - Underflow or the modes mismatch");
                        break;
                case JSON_ERROR_CTRL_CHAR:
                        debug("JSON:  - Unexpected control character found");
                        break;
                case JSON_ERROR_SYNTAX:
                        debug("JSON:  - Syntax error, malformed JSON");
                        break;
                case JSON_ERROR_UTF8:
                        debug("JSON:  - Malformed UTF-8 characters, possibly incorrectly encoded");
                        break;
                default:
                        break;
        }
}
