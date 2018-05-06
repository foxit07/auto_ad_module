<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <img src="<?='/uploads/' . $images[0]->path; ?>" width="720" height="540">
            <?php foreach ($images as $image): ?>
                <img src="<?='/uploads/' . $image->path; ?>" width="146" height="106">
            <?php endforeach; ?>
        </div>
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item">Марка: <?=$advert->car->mark->name  ?> </li>
                <li class="list-group-item">Модель: <?=$advert->car->model->name  ?></li>
                <li class="list-group-item">Цена: <?=$advert->price ?></li>
                <li class="list-group-item">Пробег: <?=$advert->car->mileage ?></li>
                <li class="list-group-item">Телефон: <?=$advert->phone ?></li>
            </ul>
        </div>
    </div>
</div>