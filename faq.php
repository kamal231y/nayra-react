<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Faq</title>
<?php include("headerlink.php"); ?>
</head>

<body>

<body>


    <!--===== header ==========-->
    <?php include("header.php"); ?>

    <!--===== header ==========-->
<section class="py-5 bg-light" id="faq">
  <div class="container">
    
    <!-- Section Title -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <span class="text-primary text-uppercase fw-bold tracking-wider fs-7">Have Questions?</span>
        <h2 class="display-6 fw-bold mt-2">Frequently Asked Questions</h2>
        <p class="text-muted">Everything you need to know about booking and working with Nayra Event Photography.</p>
      </div>
    </div>

    <!-- Accordion Section -->
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion accordion-flush shadow-sm rounded-3 overflow-hidden bg-white" id="faqAccordion">
          
          <!-- Item 1 -->
          <div class="accordion-item border-bottom">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What types of events do you photograph?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted">
                At Nayra Event Photography, we specialize in a wide range of events including corporate conferences, weddings, galas, birthday celebrations, product launches, and private gatherings.
              </div>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="accordion-item border-bottom">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How far in advance should I book my event?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted">
                We recommend booking at least <strong>3 to 6 months in advance</strong> for large events and weddings. For smaller corporate or private events, 2 to 4 weeks notice is usually sufficient, subject to availability.
              </div>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="accordion-item border-bottom">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                When and how will I receive my photos?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted">
                You will receive a preview gallery within <strong>48 hours</strong> of the event. Full edited high-resolution galleries are delivered via a secure online gallery download within <strong>14 business days</strong>.
              </div>
            </div>
          </div>

          <!-- Item 4 -->
          <div class="accordion-item border-bottom">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Do you offer videography services as well?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted">
                Yes! We offer full event videography and highlight reel packages upon request. We can provide a combined photography and video team to cover every angle of your event seamlessly.
              </div>
            </div>
          </div>

          <!-- Item 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed fw-semibold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                What is your cancellation and deposit policy?
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
              <div class="accordion-body text-muted">
                A non-refundable 25% retainer fee is required to hold your date upon signing the contract. The remaining balance is due 7 days prior to the event date. If you need to reschedule, we will make every effort to accommodate your new date.
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

    <!--======== footer =========-->
    <?php include("footer.php"); ?>
    <!--======== footer =========-->



</body>

</html>
