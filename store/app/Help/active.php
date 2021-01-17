<?php 

function is_active(string $routeName)
{
       return null !== request()->segment(3) && request()->segment(3) == $routeName ? 'active' : ' ' ;
}  



?>