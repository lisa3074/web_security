<?php
require_once(__DIR__ . '/top.php');
require_once(__DIR__ . '/../apis/api_display_comments.php');
ini_set('session.cookie_httponly', 1);

if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="top_nav">
    <p>Welcome back <?= $_SESSION['firstname'] ?></p>
    <form action="/logout"><button>Logout</button></form>
</nav>

<main class="admin_main">

    <?php
if (isset($display_message)) {?>
    <p class="url_decode admin">
        <?php
    // Use out to sanitize the read from the db, to prevent XXS 
  echo out(urldecode($display_message));
}?>
    </p>
    <?php
   
if (isset($note)) {
?>
    <p>Saved note:
        <?php
      echo urldecode($note);
    } ?>
    </p>


    <form action="/admin"
        method="POST">
        <input type="hidden"
            name="csrf_secret"
            value="<?= $_SESSION['csrf']?>">
        <textarea placeholder="Save secret note to self"
            name="note"></textarea>
        <button>Save</button>
    </form>

    <form action="/show_note"
        method="POST"><button>Show secret note</button></form>

    <section>
        <form action="/admin/comment"
            method="POST">
            <!-- Hidden input field to prevent CSRF with value that coresponds to the session['csrf] -->
            <input type="hidden"
                name="csrf"
                value="<?= $_SESSION['csrf']?>">
            <textarea name="comment_text"
                id="comment"
                placeholder="Write a comment"></textarea>
            <button>Send</button>
        </form>
        <article class="comment_wrapper">
            <?php
    foreach ($comments as $key => $comment) {
      $isMe = $comment['user_id'] == $_SESSION['uuid'];
      $comment_id = $comment['comment_id'];
      $user_id = $comment['user_id'];  
    ?>
            <div class="comment <?= $isMe ? 'me' : ''?>">
                <h4><?= $isMe ? 'You' : $comment['firstname'] . ' ' . $comment['lastname']; ?></h4>
                <!-- Use out to sanitize the read from the db, to prevent XXS -->
                <p><?= out($decrypted_comments[$key]); ?></p>
                <p>Sent: <?= $comment['comment_ts'] ?></p>
                <?= $isMe ? "<form action='/admin/delete/$comment_id/$user_id' method='POST'><button>Delete</button></form>" : ''?>
            </div>
            <?php
    }
    ?>
        </article>
    </section>
</main>


<?php
  require_once(__DIR__ . '/bottom.php');