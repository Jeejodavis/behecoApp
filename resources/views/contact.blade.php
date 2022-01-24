
@include('includes.header')


<!------------------------------------------------------------------Banner------------------------------------------------------------------>
    <section class="general-banner contact-bg gs_reveal">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="content">
                <div class="breadcrumb-wrapper">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
                <h2>Contact US</h2>
            </div>
        </div>
    </section>
    <!------------------------------------------------------------------Open Positions--------------------------------------------------------->
    <section class="contact wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <div class="container">
            <h2 class="common-h2 gs_reveal">Have a <span>Question?</span></h2>
            <div class="question-wrapper">
                <div class="row">
                    <div class="col-xl-8 col-lg-7 gs_reveal">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="Eg: John">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Eg: Smith">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address (Optional)</label>
                                    <input type="email" class="form-control" placeholder="abc@email.com">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" placeholder="+919876543210">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">Write your comment</label>
                                    <textarea class="form-control" rows="3" placeholder="write Something"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-general">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 gs_reveal">
                        <div class="card-general pos-sticky spl-pad">
                            <p class="gs_reveal">Not sure exactly what we’re looking for or just want clarification?
                                We’d be happy to chat
                                with you and clear things up for you. Anytime! </p>
                            <div class="group">
                                <h6>Customer Care Number:</h6>
                                <a href="">+91 1800 987 654</a>
                            </div>
                            <div class="group">
                                <h6 class="gs_reveal">Customer Care Email:</h6>
                                <a href="" class="gs_reveal">support@beheco.in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.footer')