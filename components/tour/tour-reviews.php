<?php
$get_tour_id = get_the_ID();
$get_tour_comments = get_comments(array(
    'post_id' => $get_tour_id,
    'status' => 'approve'
));
?>

<div class="tour-reviews" id="tour-reviews">
    <h2 class="tour-reviews__title">Отзывы путешественников</h2>

    <?php get_template_part( 'components/tour/tour-reviews-rating-block', null, array( 'post_id' => (int) $get_tour_id ) ); ?>

    <div class="tour-reviews__accordion js-tour-reviews-accordion" hidden>
        <div class="tour-reviews__accordion-header">
            <h3 class="tour-reviews__accordion-title">Как мы работаем с отзывами</h3>
            <button type="button" class="tour-reviews__accordion-close js-tour-reviews-accordion-close" aria-label="Закрыть">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4L4 12M4 4l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
        <div class="tour-reviews__accordion-body">
            <div class="tour-reviews__accordion-item">
                <h4 class="tour-reviews__accordion-item-title">Публикуем только настоящие отзывы</h4>
                <p class="tour-reviews__accordion-item-text">Наша миссия — знакомить путешественников с классными гидами. При работе с гидами мы, так же как и вы, ориентируемся на отзывы, поэтому нам важно, чтобы отзывы были настоящими.</p>
            </div>
            <div class="tour-reviews__accordion-item">
                <h4 class="tour-reviews__accordion-item-title">Следим за подлинностью отзывов</h4>
                <p class="tour-reviews__accordion-item-text">Написать отзыв можно только после посещения. Мы проверяем подлинность отзывов и прекращаем работать с гидами, которые пытаются накрутить свой рейтинг.</p>
            </div>
            <div class="tour-reviews__accordion-item">
                <h4 class="tour-reviews__accordion-item-title">Не удаляем негативные отзывы</h4>
                <p class="tour-reviews__accordion-item-text">У каждого путешественника на Трипстере есть право рассказать о своем опыте. А гид может ответить на отзыв и представить свою точку зрения.</p>
            </div>
            <div class="tour-reviews__accordion-item">
                <h4 class="tour-reviews__accordion-item-title">Размещаем только качественные предложения</h4>
                <p class="tour-reviews__accordion-item-text">После каждого отрицательного отзыва мы связываемся с гидом и проводим работу над ошибками. Если предложение и дальше расстраивает путешественников — снимаем его с размещения. Поэтому на Трипстере остаются предложения только с хорошим рейтингом.</p>
            </div>
        </div>
    </div>

    <div class="tour-reviews__list">
        
    <?php foreach ($get_tour_comments as $comment) : ?>
        <?php get_template_part('components/tour/tour-review-card', null, array('comment' => $comment)); ?>
    <?php endforeach; ?>
          
    
    </div>
    <!-- <div class="tour-reviews__load-more">
        <button type="button" class="tour-reviews__load-more-btn">Загрузить ещё</button>
    </div> -->
</div>