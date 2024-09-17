<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<header class="masthead" id="moc">
    <div class="container">
        <div class="masthead-subheading text-white">MOC</div>
    </div>
</header>

<!-- Dark Themed Section -->
<section class="container-fluid p-0">
    <div class="row g-0">
        <!-- Full-Width Section Above -->
        <div class="col-12 bg-black py-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="fw-bold text-white">Millenial Of Christ</h2>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div style="background-color: #fff; height: 4px; width: 100px;"></div>
                            <div style="background-color: #9caea9; height: 4px; width: 400px;"></div>
                        </div>
                        <p class="mt-3 text-light">CONNECTING OUR PRESENT TO OUR FUTURE</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-8 offset-md-2 text-center">
                        <p class="text-muted">
                            THE CHURCH EXISTS AS A BEAUTIFUL EXPRESSION OF GOD’S DESIRE; A NEW HUMANITY UNITED UNDER CHRIST COMMISSIONED TO ADVANCE THE KINGDOM OF GOD ACROSS THE WORLD. AT CELEBRATION CHURCH, WE STRIVE TO PARTICIPATE IN THIS MISSION WITH EXCELLENCE, JOY, AND BOLDNESS. IT IS WITH THIS HEART THAT WE STEP INTO A NEW, SPIRIT-BREATHED STRATEGIC INITIATIVE TO FULFILL THIS MISSION: <strong>"THE BRIDGE."</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Section with Text -->
        <div class="col-md-6 bg-dark text-light p-5">
            <p>God has supplied Celebration Church with a beautiful set of 8 grace statements, serving as specific expressions of the mission of the church unique to our family...</p>
            <p>With our 8 grace statements, we are more than a congregation; we are the 8th bridge of unity and transformation in the name of Jesus...</p>
            <p>Guided by Christ’s words, we embrace the kingdom’s core values...</p>
            <p>In the midst of our endeavor, we remember “for where your treasure is, there your heart will be also”...</p>
        </div>

        <!-- Right Section with Image and Signature -->
        <div class="col-md-6 p-5 bg-white">
            <div class="text-dark">
                <h3 class="fw-bold">the bridge connects...</h3>
                <p class="display-4 fw-bold text-dark">OUR PRESENT TO OUR FUTURE.</p>
                <p class="h4">where we are to where we’re going.</p>
                <p class="display-5 fw-bold text-dark">HEAVEN & EARTH.</p>
                <p class="h4">kingdom & culture.</p>
                <p class="display-5 fw-bold text-warning">THE NOW & THE NOT YET.</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>