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

      <form action="/wp-json/contact-form-7/v1/contact-forms/675/feedback" method="post" class="quiz-body js-form">
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
                    <label class="quiz-report__answers-item">
                      <input type="radio" value="<?php echo $answer['answer'] ?>" name="question-<?php echo $key + 1 ?>">
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

          <div class="quiz-result js-quiz-result">
            <div class="quiz-result__title">Благодарим за ответы!</div>
            <div class="quiz-result__description">Введите свой телефон, что бы мы могли связаться с Вами для точной оценки стоимости и сроков.</div>
            <div class="quiz-form">
              <div class="quiz-form__success">
                Ваше сообщение успешно отправлено!
              </div>
              <div class="quiz-form__rowField">
                <input type='text' name='your-name' placeholder='Имя' class="quiz-form__input" />
              </div>
              <div class="quiz-form__rowField">
                <span class="wpcf7-form-control-wrap your-phone">
                  <input type='tel' name='your-phone' placeholder='Телефон*' class="quiz-form__input" />
                </span>
              </div>
              <div class="quiz-form__rowSubmit">
                <input type="hidden" name="referrer" value="<?php the_title() ?>">
                <span class="wpcf7-form-control-wrap submit">
                  <button class="ui-button-primary quiz-form__submit" type='submit'>
                    <span>
                      Отправить
                      <span class="ui-arrow-right quiz-form__submitArrow"></span>
                    </span>
                  </button>
                </span>
              </div>
              <div class="quiz-form__rowRules">
                <label class="rules-field">
                  <input type='checkbox' name='rules' value='1' class="rules-field__input" />
                  <span class="rules-field__checkbox"></span>
                  <span class="rules-field__text">
                    Прочитал(-а) <a href='<?php the_permalink(360) ?>' target='_blank'>Пользовательское соглашение</a> и соглашаюсь с <a href='<?php the_permalink(3) ?>' target='_blank'>Политикой обработки персональных данных</a>
                  </span>
                </label>
              </div>
            </div>
          </div>
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
      </form>
    </div>
  </div>
</div>
<?php endif; ?>
