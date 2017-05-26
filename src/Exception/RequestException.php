<?php

namespace CS\MailService\Exception;

use RuntimeException;

/**
 * Description of RequestException
 *
 * @author orest
 */
class RequestException extends RuntimeException {

    public function __construct($message = "", $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }

}
