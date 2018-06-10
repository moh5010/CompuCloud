<?php
namespace OCA\OwnNotes\Storage;

class AuthorStorage {

    private $storage;

    public function __construct($storage){
        $this->storage = $storage;
    }

    public function writeImg($name, $content) {
        // check if file exists and write to it if possible
        try {
            try {
                $file = $this->storage->get($name);
            } catch(\OCP\Files\NotFoundException $e) {
                $file = $this->storage->newFile($name);
            }

            // the id can be accessed by $file->getId();
            $file->putContent($content);

        } catch(\OCP\Files\NotPermittedException $e) {
            // you have to create this exception by yourself ;)
            throw new StorageException('Cant write to file');
        }
    }
}
