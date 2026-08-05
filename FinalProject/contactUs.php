        <!-- Contact Us-->
       <!--Title-->
    <h1 class="title-general">Contact Us</h1>
    <main class="contactUs-wrap">
        <article class="contactUs-text">
            <p>
                We would love to hear from you! If you have any questions or need assistance, please feel free to reach out to us using the contact form below.
            </p>
        </article>
        </article>
        <!--Contact form-->
        <form class="contact-form" action="index.php?page=contactUs" method="POST">
            <fieldset class="contact-fieldset">
                <h2>Support Form</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="tel">Phone:</label>
                <input type="tel" name="tel" id="tel" title="Format: 444 333 1111" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" required>

                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            
                <button type="submit" class="fieldset-btn" name="contact_us">Submit</button>
                 <!-- Messages inform that the message has been received -->
                 <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <p> <?php echo htmlspecialchars($successMessage); ?> </p>
                </div>
                <?php 
                    endif; ?>

                <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <p> <?php echo htmlspecialchars($errorMessage); ?> </p>
                </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </main>