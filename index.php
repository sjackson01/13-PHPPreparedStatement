<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Post a Message</title>
  </head>
  <body>
    <?php # Script 13.6 - post_message.php
            // Validate the data (omittted)!

            // Connect to the database
            $dbc = mysqli_connect('mysql:3306', 'root', 'tiger','forum');

            // Make the query
            $q = 'INSERT INTO messages (forum_id, parent_id, user_id, subject, body, date_entered) 
                VALUES (?, ?, ?, ?, ?, 
                NOW())';
            
            // Prepare the statement
            $stmt = mysqli_prepare($dbc,$q);

            // Bind the variables
            mysqli_stmt_bind_param($stmt, 'iiiss', $forum_id, $paret_id, $user_id, $subject, $body);

            // Assign the values to variables: 
            $forum_id = (int) $_POST('forum_id');
            $parent_id = (int) $_POST('parent_id');
            $user_id = 3;  // THe user_id value would normally come from the session
            $subject = strip_tags($_POST['subject']);
            $body = strip_tags($_POST['body']);

            // Execute the query:
            mysqli_stmt_execute($stmt);

            // Print a message based upon the result:
            if (mysqli_stmt_affected_rows($stmt) == 1){
                echo '<p>Your message has been posted. </p>';
            } else {
                echo '<p style="font-weight: bold; color: #C00"> Your message could not be posted</p>';
                echo '<p> . mysqli_stmt_error($stmt)' . '</p>';
            }
        
        // Close the statment:
        mysqli_stmt_close($stmt);

        // Close the connection 
        mysqli_close($dbc);

    ?>  
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