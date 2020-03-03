<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Post a Message</title>
  </head>
  <body>
    <form action="index.php" method="post">
        <fieldset>
            <legend>Post a message:</legend>
            <p><strong>Subject</strong>: <input name="subject" type="text" size="30" maxlength="100"> </p>    
            <p><strong>Body</strong>: <textarea name="body" rows="3" cols="40"></textarea></p>    
        </fieldset>
        <div align="center">
            <input type="submit" name="submit" value="Submit">
        </div>
        <input type="hidden" name="forum_id" value="1">
        <input type="hidden" name="parent_id" value="0">
    </form>
  </body>
  </html>