<?php include '../includes/header.php'; ?>

<main class="contact-page">
    <section class="get-in-touch">
        <h1>Contact Us</h1>
        <p>Send us a message and we will get back to you.</p>

        <form action="submit.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Full Name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email Address" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Message" required></textarea>

            <button type="submit">Send</button>
        </form>
    </section>
</main>

<?php include '../includes/footer.php'; ?>
