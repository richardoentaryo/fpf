<?php
/**
 *
 */
class Capsule
{
    public static function fill($message)
    {
        if (!isset($_SESSION['capsuleMessages']))
        {
            $_SESSION['capsuleMessages'] = array();
        }

        // add the message into the array of the session
        $_SESSION['capsuleMessages'][] = $message;
    }

    public static function spill()
    {
        if (!isset($_SESSION['capsuleMessages']))
        {
            return null;
        }

        $messages = $_SESSION['capsuleMessages'];
        unset($_SESSION['capsuleMessages']);

        // implode the array value so the return value
        // will be only one string message
        return implode(', ', $messages);
    }
}

?>
