<?php
require_once("enum.php");
abstract class MsgType extends Enum
{
    const Successfull = 0;
    const Error = 1;
    const Warning = 2;
    const Information = 3;
}
?>