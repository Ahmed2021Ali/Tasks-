<?php

// validation insert data
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

Function val_data_smiler($input)
{
    if(strlen($input)<3)
    {
        return false;
    }
    else
    {
        return true;
    }
}

Function val_data_grader($input)
{
    if(strlen($input)>200)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function check_input($input)
    {
        return trim(htmlspecialchars(htmlentities($input)));
    }