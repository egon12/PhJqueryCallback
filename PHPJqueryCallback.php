<?php

/**
 *
 *
 * JSFeedback
 *
 * Use this library to create json object that will be use by jQuery ajax
 * the code for
 *
 * <code>
 *
 *  $.get( $(this).attr('action'),
 *	$(this).serialize(),	
 *	function (data) {
 *	    obj = $.parseJSON(data);
 *	    if (obj.log) {
 *		alert(obj.log);
 *	    }
 *	    if (obj.alert) {
 *		alert(obj.alert);
 *	    }
 *	    if (obj.focus) {
 *		selector = (obj.focus);
 *		$(selector).focus();
 *	    }
 *	    if (obj.clear) {
 *		$('form > input').val('');
 *		$('#no_nama > input').focus();
 *	    }
 *	});
 *
 * </code>
 *
 * 
 * @author Egon Firman<egon.firman@gmail.com>
 *
 */

class PHPJQueryCallback {
    public function log($msg) {
        if (isset($this->log)) {
            $this->log .= $msg."\n";
        } else {
            $this->log = $msg."\n";
        }
    }

    public function jsprint($msg) {
        $this->jsprint = $msg;
    }

    public function alert($msg) {
        $this->alert = $msg;
    }

    public function before($selector, $msg) {
        if (!isset($this->before)) {
            $this->before = array();
        } 
        $b = new stdClass();
        $b->selector = $selector;
        $b->msg = $msg;
        array_push($this->before, $b);
    }

    public function after($selector, $msg) {
        if (!isset($this->after)) {
            $this->after = array();
        } 
        $b = new stdClass();
        $b->selector = $selector;
        $b->msg = $msg;
        array_push($this->after, $b);
    }

    public function html($selector, $msg) {
        if (!isset($this->html)) {
            $this->html = array();
        } 
        $b = new stdClass();
        $b->selector = $selector;
        $b->msg = $msg;
        array_push($this->html, $b);
    }

    public function append($selector, $msg) {
        if (!isset($this->append)) {
            $this->append = array();
        } 
        $b = new stdClass();
        $b->selector = $selector;
        $b->msg = $msg;
        array_push($this->append, $b);
    }

    public function val($selector, $msg) {
        if (!isset($this->val)) {
            $this->val = array();
        } 
        $b = new stdClass();
        $b->selector = $selector;
        $b->msg = $msg;
        array_push($this->val, $b);
    }

    public function focus($selector) {
        $this->focus = $selector;
    }

    public function jseval ($script) {
        //$this->jseval = '<script type=text/javascript>';
        $this->jseval .= $script;
        //$this->jseval .= '</script>';
        $this->jseval = urlencode($this->jseval);
    }

    public function redirect ($location) {
        $this->redirect = $location;
    }

    public function destroy() {
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($this);
        unset ($this);
        die();
    }
}
