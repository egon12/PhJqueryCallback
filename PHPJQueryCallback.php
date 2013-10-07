<?php

/**
 * PHPJQueryCallback
 *
 * Use this library to create json object that will be use by jQuery ajax
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

    public function alert($msg) {
        $this->alert = $msg;
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
        if (!isset( $this->jseval)) {
            $this->jseval = '';
        }
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
