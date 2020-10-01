<?php

namespace Models\Articles;

use Models\ActiveRecordEntity;
use Models\Users\User;
use Exceptions\InvalidArgumentException;

class Article extends ActiveRecordEntity {

    protected $name;
    protected $text;
    protected $authorId;
    protected $img;
    protected $createdAt;
    protected $lastEdit;

    public function getName(): string {
        return $this->name;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getImg(): string {
        return $this->img;
    }

    public function getAuthor(): User {
        return User::getById($this->authorId);
    }

    public function getCreatedDate(): string {
        return date('d.m.Y', strtotime($this->createdAt));
    }

    public function getLastEdit() {
        return date('d.m.Y H:i', strtotime($this->lastEdit));
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setAuthor(User $author) {
        $this->authorId = $author->getId();
    }
    
    public function setImg($img) {
        $this->img = $img;
    }

    public function setLastEdit($lastEdit) {
        $this->lastEdit = $lastEdit;
    }

    public static function createFromArray(array $fields, User $author): Article {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $image = self::saveImage($fields);

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->setImg('/'.$image);

        $article->save();

        return $article;
    }

    public function updateFromArray(array $fields): Article {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $image = self::saveImage($fields);

        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->setImg('/'.$image);
        
        $this->setLastEdit(date("Y-m-d H:i:s"));

        $this->save();

        return $this;
    }

    private static function saveImage($fields) {
        $image = 'images/no-image.jpg';
        if($fields['img']['error'] == 0) {
            $uploadsDir = 'images';
            $imgTmpName = $fields['img']['tmp_name'];
            $imgName = $fields['img']['name'];
            $image = "$uploadsDir/$imgName";
            move_uploaded_file($imgTmpName, $image);
        }

        return $image;
    }

    protected static function getTableName(): string {
        return 'articles';
    }

}