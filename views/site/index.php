<?php

/* @var $this yii\web\View */

$this->title = 'Books';
?>
<div class="site-index">
    <form action="/index.php?r=site%2Fsearch" method="post">
        <div class="input-group-addon author">
            <h4>Список авторов</h4>
            <div class="input-group list">
                <ul class="media-list list-group-item">
                    <?php foreach ($Name_author as $item):?>
                        <li>
                            <input type="checkbox" name="<?php echo $item->name?>" value="<?php echo $item->surname ?>">
                            <label><?php echo $item->surname.' '.$item->name?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="input-group-addon param">
            <h4>Параметры поиска</h4>
            <div>
                <div class="input-group">
                    <h5>Год издания</h5>
                    <div>
                        <label for="from_data">От:</label>
                        <input type="number" name="from_data">
                    </div>
                    <div>
                        <label for="before_data">До:</label>
                        <input type="number" name="before_data">
                    </div>
                </div>
                <div class="input-group">
                    <label for="genre">Жанр:  </label>
                    <select name="genre">
                        <option>Не выбрано</option>
                        <?php foreach ($Title_genre as $item): ?>
                            <option><?php echo $item->title_genre?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="Найти книги">
                </div>
            </div>
        </div>
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    </form>
    <div id="search_result"></div>
</div>
