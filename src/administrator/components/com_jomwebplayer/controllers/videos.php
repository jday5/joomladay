<?php

/*
 * @version		$Id: videos.php 3.1.0 2012-10-28 $
 * @package		Joomla
 * @subpackage	jomwebplayer
 * @copyright   Copyright (C) 2012-2014 Jom Webplayer
 * @license     GNU/GPL http://www.gnu.org/licenses/gpl-2.0.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport( 'joomla.application.component.controller' );

class JomWebplayerControllerVideos extends JomWebplayerController {

	function __construct() {
		parent::__construct();
    }
	
	function videos() {
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('videos', $vType);
		
        $model    = $this->getModel('videos');
		
        $view->setModel($model, true);
		$view->setLayout('default');		
		$view->display();
	}
	
	function add() {
		JRequest::checkToken() or die( 'Invalid Token' );
	
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('videos', $vType);
		
        $model    = $this->getModel('videos');
		
        $view->setModel($model, true);
		$view->setLayout('add');
		$view->add();
	}
	
	function edit() {
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		JRequest::setVar( 'hidemainmenu', 1 );
		
	    $document = JFactory::getDocument();
		$vType	  = $document->getType();
	    $view     = $this->getView('videos', $vType);
		
		$model    = $this->getModel('videos');
		
        $view->setModel($model, true);		
		$view->setLayout('edit');		
		$view->edit();
	}	
	
	function delete()	{
		JRequest::checkToken() or die( 'Invalid Token' );
	
		$model = $this->getModel('videos');
	 	$model->delete();
	}
	
	function save() {
		if(JRequest::checkToken( 'get' )) {
			JRequest::checkToken( 'get' ) or die( 'Invalid Token' );
		} else {
			JRequest::checkToken() or die( 'Invalid Token' );
		}
		
		$model = $this->getModel('videos');
	  	$model->save();
	}
	
	function apply() {
		$this->save();
	}
	
	function cancel() {
		JRequest::checkToken() or die( 'Invalid Token' );
	
		$model = $this->getModel('videos');
	    $model->cancel();
	}	
	
	function saveorder() {	
		$model = $this->getModel('videos');
	  	$model->saveorder();		
	}
	
	function orderup() {
		$model = $this->getModel('videos');
	  	$model->move(-1);		
	}
	
	function orderdown() {
		$model = $this->getModel('videos');
	  	$model->move(1);		
	}	
	
	function publish() {
		JRequest::checkToken() or die( 'Invalid Token' );
		
		$model = $this->getModel('videos');
        $model->publish();
    }
	
    function unpublish() {
        $this->publish();
    }
	
}

?>