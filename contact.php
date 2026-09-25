<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>
<?php include("headerlink.php"); ?>
</head>

<body>

    <!--===== header ==========-->
    <?php include("header.php"); ?>
    <!--===== header ==========-->

    <!-- CONTACT -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="eyebrow mb-2">Get in Touch</div>
                    <h2 class="mb-4">Let's frame<br>your story.</h2>
                    <div class="contact-info">
                        <div class="item">
                            <span class="eyebrow">Studio</span>
                            first floor office no.01, Main Chhatarpur Rd, near aggrwal medical store, opp. M.C.D park, Block A1, Chhatarpur, New Delhi, Delhi 110074
                        </div>
                        <div class="item">
                            <span class="eyebrow">Phone</span>
                            +91 08920939191
                        </div>
                        <div class="item">
                            <span class="eyebrow">Email</span>
                            eventshoootsnyra@gmail.com
                        </div>
                        <div class="item">
                            <span class="eyebrow">Instagram</span>
                            https://www.instagram.com/nyra_photography
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <!-- Form Submit pe JavaScript Trigger hoga -->
                    <form id="whatsappForm" onsubmit="sendToWhatsApp(event)">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your name" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" placeholder="+91" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="service">Shoot Type</label>
                                <select class="form-control form-select" id="service">
                                    <option>Wedding Photography</option>
                                    <option>Birthday Shoot</option>
                                    <option>Pre-Wedding Shoot</option>
                                    <option>Corporate Event</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="date">Preferred Date</label>
                                <input type="date" class="form-control" id="date" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="message">Tell us about the day</label>
                                <textarea class="form-control" id="message" rows="3" placeholder="Location, guest count, timings..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-brass">Send Enquiry via WhatsApp</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--======== footer =========-->
    <?php include("footer.php"); ?>
    <!--======== footer =========-->

    <!-- WhatsApp Redirect Script -->
    <script>
    function sendToWhatsApp(event) {
        event.preventDefault(); // Default form submit rokne ke liye

        // Form Fields ki Values Get karein
        let name = document.getElementById('name').value;
        let phone = document.getElementById('phone').value;
        let service = document.getElementById('service').value;
        let date = document.getElementById('date').value;
        let message = document.getElementById('message').value;

        // WhatsApp Business Number (Country code +91 ke saath)
        let whatsappNumber = "918920939191";

        // Formatted WhatsApp Message
        let textMessage = `*New Enquiry for Nyra Photography*%0A%0A` +
                          `*Name:* ${encodeURIComponent(name)}%0A` +
                          `*Phone:* ${encodeURIComponent(phone)}%0A` +
                          `*Shoot Type:* ${encodeURIComponent(service)}%0A` +
                          `*Preferred Date:* ${encodeURIComponent(date)}%0A` +
                          `*Message:* ${encodeURIComponent(message)}`;

        // WhatsApp API URL Create karein
        let whatsappURL = `https://wa.me/${whatsappNumber}?text=${textMessage}`;

        // Naye Tab/App me WhatsApp Open Karein
        window.open(whatsappURL, '_blank');
    }
    </script>

</body>
</html>