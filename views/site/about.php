<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<div class="content text-center ">
    <table class="table table-bordered table-striped">
        <tr class="text-muted main-tr">
            <td>Название</td>
            <td>Жанр</td>
            <td>Автор</td>
            <td>Год издания</td>
        </tr>
        <?php foreach ($Books as $book): ?>
            <tr>
                <td><?php echo $book['title']?></td>
                <td><?php printf($book['genre']) ?></td>
                <td><?php echo implode(",",$book['author']) ?></td>
                <td><?php echo $book['year'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
