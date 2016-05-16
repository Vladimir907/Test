<?php

namespace app\controllers;

use app\models\Author_book;
use app\models\Book;
use app\models\Genre_book;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Author;
use app\models\Genre;
use yii\web\Response;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $authors = Author::getAll();
        $genres = Genre::getAll();
        return $this->render('index',['Name_author'=>$authors, 'Title_genre'=>$genres]);
    }

    public function actionSearch()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_HTML;

            $parametr = array();
            $author_book = array();
            $kol = 0;

            $arr_authors = Author::getAll();

            foreach ($arr_authors as $items) {
                if (isset($_POST[$items->name])) {
                    $author_book[$kol] = $items->surname." ".$items->name;
                    $kol++;
                }
            }

            $parametr['author'] = $author_book;

            if ($_POST['genre'] != 'Не выбрано') {
                $parametr['genre'] = $_POST['genre'];
            }

            if ($_POST['from_data'] != null) {
                $parametr['from_year'] = $_POST['from_data'];
            }

            if ($_POST['before_data'] != null) {
                $parametr['before_year'] = $_POST['before_data'];
            }

            $Books = $this->getBook();

            if (isset($parametr['genre'])) {
                foreach ($Books as $i => $value) {
                    $str = strpos($value['genre'], $parametr['genre']);
                    if ($str === false) {
                        unset($Books[$i]);
                    }
                }
            }
            if (!empty($parametr['author'])) {
                foreach ($Books as $i => $value) {
                    $result = false;
                    foreach ($value['author'] as $author){
                        foreach ($parametr['author'] as $item) {
                            if($author == $item){
                                $result = true;
                            }
                        }
                    }
                    if(!$result){
                        unset($Books[$i]);
                    }
                }
            }
            if(isset($parametr['from_year'])){
                foreach ($Books as $i => $value){
                    if($value['year']<$parametr['from_year']){
                        unset($Books[$i]);
                    }
                }
            }

            if(isset($parametr['before_year'])){
                foreach ($Books as $i => $value){
                    if($value['year']>$parametr['before_year']){
                        unset($Books[$i]);
                    }
                }
            }

            return $this->renderAjax('search',['Books'=>$Books]);
        }
    }

    private function getBook(){

        $table = array();
        $Books = Book::getAll();

        foreach ($Books as $book){
            $author = array();
            $genre = array();
            $genre_kod = Genre_book::getAllofGenre($book->id_book);
            foreach ($genre_kod as $value){
                array_push($genre,Genre::getGenre($value->genre_id));
            }
            $author_kod = Author_book::getAllofBook($book->id_book);
            foreach ($author_kod as $value){
                array_push($author,Author::getAuthors($value->author_id));
            }
            array_push($table, array(
                'title'=>$book->title,
                'genre'=>implode(", ",$genre),
                'author'=>$author,
                'year'=>$book->year));
        }

        return $table;
    }
}
