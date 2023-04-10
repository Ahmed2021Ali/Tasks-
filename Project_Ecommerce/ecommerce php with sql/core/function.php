<?php

    function CheckRequestMethod($method)
    {
        if ($_SERVER['REQUEST_METHOD']== $method)
        {
            return true;
        }
            return false;
    }

    Function satisfied($input)
    {
        return trim(htmlspecialchars(htmlentities($input)));
    }
    Function val_data_empty($input)
    {
        if(empty($input))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function min_name_va12($input,$length)
    {
        if (strlen($input) < $length)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    function max_name_va13($input,$length)
    {
        if (strlen($input) > $length)
        {
            return false;
        }
        else
        {
            return true;
        }
    }