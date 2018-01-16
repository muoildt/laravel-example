<?php 

	function checkPermission($permissions){
	    $userAccess = getMyPermission(auth()->user()->role);
	    foreach ($permissions as $key => $value) {
	      if($value == $userAccess){
	        return true;
	      }
	    }
	    return false;
	}


	function getMyPermission($id)
	{
	    switch ($id) {
	      case 0:
	        return 'admin';
	        break;
	      default:
	        return 'user';
	        break;
	    }
	}


?>