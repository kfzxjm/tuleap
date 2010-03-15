<?php
/*
 * Copyright (c) STMicroelectronics, 2006. All Rights Reserved.
 *
 * Originally written by Manuel Vacelet, 2006
 * 
 * This file is a part of Codendi.
 *
 * Codendi is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Codendi is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Codendi. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Version is a transport object (aka container) used to share data between
 * Model/Controler and View layer of the application
 */
class Docman_Version {
    
    function Docman_Version($data = null) {
        $this->id        = null;
        $this->authorId  = null;
        $this->itemId    = null;
        $this->number    = null;
        $this->label     = null;
        $this->changeLog = null;
        $this->date      = null;
        $this->filename  = null;
        $this->filesize  = null;
        $this->filetype  = null;
        $this->path      = null;
        $this->_content  = null;
        if ($data) {
            $this->initFromRow($data);
        }
    }

    var $id;
    function getId() { 
        return $this->id; 
    }
    function setId($id) { 
        $this->id = $id;
    }
    
    var $authorId;
    function getAuthorId() { 
        return $this->authorId; 
    }
    function setAuthorId($authorId) { 
        $this->authorId = $authorId;
    }
    
    var $itemId;
    function getItemId() { 
        return $this->itemId; 
    }
    function setItemId($itemId) { 
        $this->itemId = $itemId;
    }
    
    var $number;
    function getNumber() { 
        return $this->number; 
    }
    function setNumber($number) { 
        $this->number = $number;
    }
    
    var $label;
    function getLabel() { 
        return $this->label; 
    }
    function setLabel($label) { 
        $this->label = $label;
    }
    
    var $changelog;
    function getChangelog() { 
        return $this->changelog; 
    }
    function setChangelog($changelog) { 
        $this->changelog = $changelog;
    }
    
    var $date;
    function getDate() { 
        return $this->date; 
    }
    function setDate($date) { 
        $this->date = $date;
    }
    
    var $filename;
    function getFilename() { 
        return $this->filename; 
    }
    function setFilename($filename) { 
        $this->filename = $filename;
    }
    
    var $filesize;
    function getFilesize() { 
        return $this->filesize; 
    }
    function setFilesize($filesize) { 
        $this->filesize = $filesize;
    }
    
    var $filetype;
    function getFiletype() { 
        return $this->filetype; 
    }
    function setFiletype($filetype) { 
        $this->filetype = $filetype;
    }
    
    var $path;
    function getPath() { 
        return $this->path; 
    }
    function setPath($path) { 
        $this->path = $path;
    }

    protected $_content;
    public function getContent() {
        if ($this->_content === null && is_file($this->getPath())) {
            $this->_content = file_get_contents($this->getPath());
        }
        return $this->_content;
    }
    public function setContent($content) {
        $this->_content = $content;
    }

    function initFromRow($row) {
        $this->setId($row['id']);
        $this->setAuthorId($row['user_id']);
        $this->setItemId($row['item_id']);
        $this->setNumber($row['number']);
        $this->setLabel($row['label']);
        $this->setChangelog($row['changelog']);
        $this->setDate($row['date']);
        $this->setFilename($row['filename']);
        $this->setFilesize($row['filesize']);
        $this->setFiletype($row['filetype']);
        $this->setPath($row['path']);
    }
}

?>