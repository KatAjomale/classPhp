
<?php
include('assets/includes/top.inc');
?>
    <title>Contact Arrow Photography</title>

<?php
include('assets/includes/header.inc');
?>
    <h2>Contact Us</h2>

    <form action="mail.php" method="get" id="contact-form">
        <!--add form to collect information: name, email, gender and comment. Name and email are required. -->
        <p>
            <label for="name">Your name:</label>
            <input type="text" name="name" id="name" required />

        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required />

        </p>

        <p>
            <label>Gender:</label>
            Male:
            <input type="radio" name="gender" value="male" checked />
            Female:
            <input type="radio" name="gender" value="female" checked />

        </p>

        <p>
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="8" cols="18"></textarea>

        </p>

        <p>
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Send Comment" />

        </p>
        <!-- use styleseet to put element into a table layout (tableless) -->
    </form>

<?php
include('assets/includes/footer.inc');
?>