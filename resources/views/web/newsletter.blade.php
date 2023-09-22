<section class="bg-soft-primary">
    @if(session()->has('message'))
        <div class="session_message alert alert-success text-center" style="background-color: #003294 !important; color: #007bff!important">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #007bff!important">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <div class="row flex-center">
            <div class="col-lg-5 col-xl-4"><img class="w-100" src="web/assets/img/illustrations/cta.png" alt="..." /></div>
            <div class="col-lg-5 col-xl-4">
                <h1 class="fw-normal text-secondary mb-4">Get Regular <br />Updates from</h1>
                <img src="web/assets/img/logos/logo-footer.png" height="75" alt="..." />
                <h5 class="text-secondary fw-normal my-3">SUBSCRIBE TO NEWSLETTER </h5>
                <form class="row gx-2 gy-2 align-items-center" action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="col">
                        <div class="input-group-icon">
                            <label class="visually-hidden" for="inputEmailCta">Address</label>
                            <input class="form-control input-box form-eduprix-control text-light" id="inputEmailCta" type="email" name="email" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-secondary" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of .container-->
</section>
