<?php
require_once(__DIR__ . '/top.php');
require_once(__DIR__ . '/../apis/api_display_comments.php');

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
if (isset($display_message)) {
    // Use out to sanitize the read from the db, to prevent XXS 
  echo '<p class="url_decode admin">'.out(urldecode($display_message)).'</p>';
}
   
if (isset($note)) {
?>
    <p>Saved note:
        <?php
      echo urldecode($note);
    } ?>
    </p>


    <form action="/admin"
        method="POST">
        <textarea placeholder="Save secret note to self"
            name="note"></textarea>
        <button>Save</button>
    </form>

    <form action="/show_note"
        method="POST"><button>Show secret note</button></form>

    <section>
        <form action="/admin/comment"
            method="POST">
            <textarea name="comment_text"
                id="comment"
                placeholder="Write a comment"></textarea>
            <button>Send</button>
        </form>

        <?php
    foreach ($comments as $key => $comment) {
      $isMe = $comment['user_id'] == $_SESSION['uuid'];
      $comment_id = $comment['comment_id'];
      $user_id = $comment['user_id'];  
    ?>
        <article class="comment <?= $isMe ? 'me' : ''?>">
            <h4><?= $isMe ? 'You' : $comment['firstname'] . ' ' . $comment['lastname']; ?></h4>
            <!-- Use out to sanitize the read from the db, to prevent XXS -->
            <p><?= out($decrypted_comments[$key]); ?></p>
            <p>Sent: <?= $comment['comment_ts'] ?></p>
            <?= $isMe ? "<form action='/admin/delete/$comment_id/$user_id' method='POST'><button>Delete</button></form>" : ''?>
        </article>
        <?php
    }
    ?>
    </section>
</main>


<?php
  require_once(__DIR__ . '/bottom.php');