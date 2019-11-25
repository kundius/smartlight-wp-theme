<?php
wp_enqueue_script('theme_quiz', get_template_directory_uri() . '/dist/quiz.js', ['theme_common'], false, true);
$questions = get_field('quiz_questions', 'option');
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/quiz.css" type="text/css" />
<div class="quiz-section" <?php if (empty($_GET['test'])): ?>style="display: none"<?php endif; ?>>
  <div class="container">
    <div class="quiz js-quiz">
      <div class="quiz__title"><?php the_field('quiz_title', 'option') ?></div>
      <div class="quiz-decoration-1-1"></div>
      <div class="quiz-decoration-1-2"></div>
      <div class="quiz-decoration-1-3"></div>
      <div class="quiz-decoration-1-4"></div>
      <div class="quiz-decoration-1-5"></div>
      <div class="quiz-decoration-1-6"></div>
      <div class="quiz-decoration-1-7"></div>
      <div class="quiz-decoration-1-8"></div>
      <div class="quiz-decoration-1-9"></div>
      <div class="quiz-decoration-1-10"></div>
      <div class="quiz-decoration-2"></div>
      <div class="quiz-decoration-3"></div>
      <div class="quiz-decoration-4-1"></div>
      <div class="quiz-decoration-4-2"></div>
      <div class="quiz-decoration-4-3"></div>
      <div class="quiz-decoration-4-4"></div>
      <div class="quiz-decoration-5"></div>
      <div class="quiz-decoration-6"></div>
      <div class="quiz-decoration-7"></div>
      <div class="quiz-decoration-8"></div>
      <div class="quiz-decoration-9"></div>
      <div class="quiz-decoration-12"></div>

      <div class="quiz-body">
        <div class="quiz-body__left">
          <div class="quiz-form">
            <div class="quiz-form__steps">
              <?php foreach ($questions as $key => $question): ?>
              <div class="quiz-form__steps-item js-quiz-step"><span><?php echo $key + 1 ?></span></div>
              <div class="quiz-form__steps-item-separator"></div>
              <?php endforeach; ?>
            </div>
            <div class="quiz-form__questions">
              <?php foreach ($questions as $key => $question): ?>
              <div class="quiz-form__questions-item js-quiz-group">
                <div class="quiz-question">
                  <div class="quiz-question__title"><?php echo $question['question'] ?></div>
                  <div class="quiz-form__answers">
                    <?php foreach ($question['answers'] as $answer): ?>
                    <label class="quiz-form__answers-item">
                      <input type="radio" value="<?php echo $answer['answer'] ?>" name="question-<?php echo $key ?>">
                      <span><?php echo $answer['answer'] ?></span>
                    </label>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="quiz-form__next">
              <button class="quiz-form__next-button ui-button-primary js-quiz-next">
                <span>Следующий вопрос<span class="ui-arrow-right"></span></span>
              </button>
            </div>
          </div>
        </div>
        <div class="quiz-body__right">
          <div class="quiz-description">
            <div class="js-quiz-description-base"><?php the_field('quiz_description_base', 'option') ?></div>
            <div class="js-quiz-description-success"><?php the_field('quiz_description_success', 'option') ?></div>
          </div>
          <div class="quiz-discount">
            <div class="quiz-discount__value"><span class="js-quiz-discount">0</span>%</div>
            <div class="quiz-discount__label">Ваша скидка<br />на монтаж</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
