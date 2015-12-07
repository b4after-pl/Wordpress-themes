<?php 
$fields =  array(

  'author' =>
    '<div class="row"><div class="form-group comment-form-author col-xs-6"><label for="author" class="sr-only">' . __( 'Imię lub nick', 'mobiler' ) . ':' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '</label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" placeholder="' . __( 'Imię lub nick', 'mobiler' ) . '" size="30"' . $aria_req . ' class="form-control" /></div>',

  'email' =>
    '<div class="form-group comment-form-email col-xs-6"><label for="email" class="sr-only">' . __( 'E-mail', 'mobiler' ) . ': ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '</label> <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" placeholder="' . __( 'E-mail', 'mobiler' ) . '" size="30"' . $aria_req . ' class="form-control" /></div></div>',

  'url' =>
    '<div class="form-group comment-form-url"><label for="url" class="sr-only">' . __( 'WWW', 'mobiler' ) . ':' .
    '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . 
    '" placeholder="' . __( 'WWW, np. www.google.com', 'mobiler' ) . '" size="30" class="form-control" /></div>',
);

$comments_args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn btn-success',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Skomentuj', 'mobiler' ),
  'title_reply_to'    => __( 'Skomentuj artykuł: %s', 'mobiler' ),
  'cancel_reply_link' => __( 'Anuluj', 'mobiler' ),
  'label_submit'      => __( 'Wyślij komentarz', 'mobiler' ),
  'format'            => 'html5',

  'comment_field' =>  '<div class="form-group comment-form-comment">
	<label for="comment" class="sr-only">'.__('Twój komentarz', 'mobiler').':</label>
	<textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" class="form-control" placeholder="'.__('Twój komentarz', 'mobiler').'"></textarea>
</div>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'Musisz być <a href="%s">zalogowany</a> aby komentować.', 'mobiler' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Zalogowany jako <a href="%1$s">%2$s</a>. <a href="%3$s" title="Wyloguj się z tego konta">Wylogować Cię?</a>', 'mobiler' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Twój adres e-mail nie zostanie opublikowany.<br /> Pola, których wypełnienie jest wymagane, są oznaczone symbolem * (gwiazdką)', 'mobiler' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(
      __( 'Możesz używać następujących tagów <abbr title="HyperText Markup Language">HTML</abbr>: %s', 'mobiler' ),
      ' <code>' . allowed_tags() . '</code>'
    ) . '</p>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

comment_form($comments_args); ?>

<hr />
<?php wp_list_comments( 'type=comment&callback=mobiler_comments&style=div&avatar_size=100' ); ?>