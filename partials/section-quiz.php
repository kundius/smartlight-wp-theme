<?php
wp_enqueue_script('theme_quiz', get_template_directory_uri() . '/dist/quiz.js', ['theme_common'], false, true);
$questions = get_field('quiz_questions');
if (count($questions) > 0):
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/dist/quiz.css" type="text/css" />
<div class="quiz-section">
  <div class="container">
    <div class="quiz js-quiz">
      <div class="quiz__title"><?php the_field('quiz_title') ?></div>
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
          <div class="quiz-report js-quiz-report">
            <div class="quiz-report__steps">
              <?php foreach ($questions as $key => $question): ?>
              <div class="quiz-report__steps-item js-quiz-step"><span><?php echo $key + 1 ?></span></div>
              <div class="quiz-report__steps-item-separator"></div>
              <?php endforeach; ?>
            </div>
            <div class="quiz-report__questions">
              <?php foreach ($questions as $key => $question): ?>
              <div class="quiz-report__questions-item js-quiz-group">
                <div class="quiz-question">
                  <div class="quiz-question__title"><?php echo $question['question'] ?></div>
                  <div class="quiz-report__answers">
                    <?php foreach ($question['answers'] as $answer): ?>
                    <?php $type = !empty($answer['type']) ? $answer['type'] : 'radio' ?>
                    <label class="quiz-report__answers-item">
                      <input type="<?php echo $type ?>" value="<?php echo $answer['answer'] ?>" name="question-<?php echo $key + 1 ?>">
                      <span></span>
                      <?php echo $answer['answer'] ?>
                    </label>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="quiz-report__next">
              <button class="quiz-report__next-button js-quiz-next">
                Следующий вопрос <span class="ui-arrow-right"></span>
              </button>
            </div>
          </div>

          <?php echo do_shortcode('[contact-form-7 id="675" title="Квиз"]') ?>
        </div>
        <div class="quiz-body__right">
          <div class="quiz-description">
            <div class="js-quiz-description-base"><?php the_field('quiz_description_base') ?></div>
            <div class="js-quiz-description-success"><?php the_field('quiz_description_success') ?></div>
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
<?php endif; ?>
