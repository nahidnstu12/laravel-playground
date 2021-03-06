@extends('layouts.app')

@section('section')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        {{-- header --}}
        @include('usersignup.header',['pageName'=> 'User Account Settings Page'])

        <div class="content-body">
            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true">
                                    <i class="ft-globe mr-50"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i class="ft-lock mr-50"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-gallary" data-toggle="pill"
                                    href="#account-vertical-gallary" aria-expanded="false">
                                    <i class="la la-image mr-50"></i>
                                    Image Gallary
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill"
                                    href="#account-vertical-info" aria-expanded="false">
                                    <i class="ft-info mr-50"></i>
                                    Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill"
                                    href="#account-vertical-social" aria-expanded="false">
                                    <i class="ft-camera mr-50"></i>
                                    Social links
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill"
                                    href="#account-vertical-connections" aria-expanded="false">
                                    <i class="ft-feather mr-50"></i>
                                    Connections
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-notifications" data-toggle="pill"
                                    href="#account-vertical-notifications" aria-expanded="false">
                                    <i class="ft-message-square mr-50"></i>
                                    Notifications
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                            <div class="media">
                                                <a href="javascript: void(0);">
                                                    <img src="images/mail-chimp.png" class="rounded mr-75"
                                                        alt="profile image" height="64" width="64">
                                                </a>
                                                <div class="media-body mt-75">
                                                    <div
                                                        class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label
                                                            class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                            for="account-upload">Upload new photo</label>
                                                        <input type="file" id="account-upload" hidden>
                                                        <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG.Max
                                                            size of 800kB</small>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-username">Username</label>
                                                                <input type="text" class="form-control"
                                                                    id="account-username" placeholder="Username"
                                                                    value="hermione007" required
                                                                    data-validation-required-message="This username field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="account-name" placeholder="Name"
                                                                    value="Hermione Granger" required
                                                                    data-validation-required-message="This name field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-e-mail">E-mail</label>
                                                                <input type="email" class="form-control"
                                                                    id="account-e-mail" placeholder="Email"
                                                                    value="granger007@hogward.com" required
                                                                    data-validation-required-message="This email field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="alert alert-warning alert-dismissible mb-2"
                                                            role="alert">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">??</span>
                                                            </button>
                                                            <p class="mb-0">
                                                                Your email is not confirmed. Please check your inbox.
                                                            </p>
                                                            <a href="javascript: void(0);">Resend confirmation</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-company">Company</label>
                                                            <input type="text" class="form-control" id="account-company"
                                                                placeholder="Company name">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Old Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="account-old-password" required
                                                                    placeholder="Old Password"
                                                                    data-validation-required-message="This old password field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">New Password</label>
                                                                <input type="password" name="password"
                                                                    id="account-new-password" class="form-control"
                                                                    placeholder="New Password" required
                                                                    data-validation-required-message="The password field is required"
                                                                    minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Retype New
                                                                    Password</label>
                                                                <input type="password" name="con-password"
                                                                    class="form-control" required
                                                                    id="account-retype-new-password"
                                                                    data-validation-match-match="password"
                                                                    placeholder="New Password"
                                                                    data-validation-required-message="The Confirm password field is required"
                                                                    minlength="6">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-gallary" role="tabpanel"
                                            aria-labelledby="account-pill-gallary" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <!-- Image grid -->
                                                    <section id="image-gallery" class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Image gallery</h4>
                                                            <a class="heading-elements-toggle"><i
                                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                                            <div class="heading-elements">
                                                                <ul class="list-inline mb-0">
                                                                    <li><a data-action="collapse"><i
                                                                                class="ft-minus"></i></a></li>
                                                                    <li><a data-action="reload"><i
                                                                                class="ft-rotate-cw"></i></a></li>
                                                                    <li><a data-action="expand"><i
                                                                                class="ft-maximize"></i></a></li>
                                                                    <li><a data-action="close"><i class="ft-x"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body">
                                                                <div class="card-text">
                                                                    <p>Image gallery grid with photo-swipe integration.
                                                                        Display images gallery in 4-2-1 columns and
                                                                        photo-swipe provides gallery features.</p>
                                                                </div>
                                                            </div>
                                                            <div class="card-body  my-gallery" itemscope
                                                                itemtype="http://schema.org/ImageGallery">
                                                                <div class="row">
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/mail-chimp.png"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/mail-chimp.png"
                                                                                itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/38.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/38.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/38.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/38.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/38.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/38.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                </div>
                                                                <div class="row">
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/41.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/41.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="images/41.png" itemprop="contentUrl"
                                                                            data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="../../../app-assets/images/gallery/8.jpg"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                </div>
                                                                <div class="row">
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="../../../app-assets/images/gallery/9.jpg"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="../../../app-assets/images/gallery/10.jpg"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="images/41.png" itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    {{-- <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="../../../app-assets/images/gallery/11.jpg"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="../../../app-assets/images/gallery/11.jpg"
                                                                                itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                    <figure class="col-lg-3 col-md-6 col-12"
                                                                        itemprop="associatedMedia" itemscope
                                                                        itemtype="http://schema.org/ImageObject">
                                                                        <a href="../../../app-assets/images/gallery/12.jpg"
                                                                            itemprop="contentUrl" data-size="480x360">
                                                                            <img class="img-thumbnail img-fluid"
                                                                                src="../../../app-assets/images/gallery/12.jpg"
                                                                                itemprop="thumbnail"
                                                                                alt="Image description" />
                                                                        </a>
                                                                    </figure>
                                                                </div>
                                                                            --}}
                                                                </div>
                                                                <!--/ Image grid -->
                                                        </div>
                                                    </section>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                            aria-labelledby="account-pill-info" aria-expanded="false">
                                            <form novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountTextarea">Bio</label>
                                                            <textarea class="form-control" id="accountTextarea" rows="3"
                                                                placeholder="Your Bio data here..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-birth-date">Birth date</label>
                                                                <input type="text" class="form-control birthdate-picker"
                                                                    required placeholder="Birth date"
                                                                    id="account-birth-date"
                                                                    data-validation-required-message="This birthdate field is required"
                                                                    style="background: #E0E0E0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="accountSelect">Country</label>
                                                            <select class="form-control" id="accountSelect">
                                                                <option>USA</option>
                                                                <option>India</option>
                                                                <option>Canada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="languageselect2">Languages</label>
                                                            <select class="form-control" id="languageselect2"
                                                                multiple="multiple">
                                                                <option value="English" selected>English</option>
                                                                <option value="Spanish">Spanish</option>
                                                                <option value="French">French</option>
                                                                <option value="Russian">Russian</option>
                                                                <option value="German">German</option>
                                                                <option value="Arabic" selected>Arabic</option>
                                                                <option value="Sanskrit">Sanskrit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-phone">Phone</label>
                                                                <input type="text" class="form-control"
                                                                    id="account-phone" required
                                                                    placeholder="Phone number" value="(+656) 254 2568"
                                                                    data-validation-required-message="This phone number field is required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-website">Website</label>
                                                            <input type="text" class="form-control" id="account-website"
                                                                placeholder="Website address">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="musicselect2">Favourite Music</label>
                                                            <select class="form-control" id="musicselect2"
                                                                multiple="multiple">
                                                                <option value="Rock">Rock</option>
                                                                <option value="Jazz" selected>Jazz</option>
                                                                <option value="Disco">Disco</option>
                                                                <option value="Pop">Pop</option>
                                                                <option value="Techno">Techno</option>
                                                                <option value="Folk" selected>Folk</option>
                                                                <option value="Hip hop">Hip hop</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="moviesselect2">Favourite movies</label>
                                                            <select class="form-control" id="moviesselect2"
                                                                multiple="multiple">
                                                                <option value="The Dark Knight" selected>The Dark Knight
                                                                </option>
                                                                <option value="Harry Potter" selected>Harry Potter
                                                                </option>
                                                                <option value="Airplane!">Airplane!</option>
                                                                <option value="Perl Harbour">Perl Harbour</option>
                                                                <option value="Spider Man">Spider Man</option>
                                                                <option value="Iron Man" selected>Iron Man</option>
                                                                <option value="Avatar">Avatar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                            aria-labelledby="account-pill-social" aria-expanded="false">
                                            <form>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-twitter">Twitter</label>
                                                            <input type="text" id="account-twitter" class="form-control"
                                                                placeholder="Add link" value="https://www.twitter.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-facebook">Facebook</label>
                                                            <input type="text" id="account-facebook"
                                                                class="form-control" placeholder="Add link">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-google">Google+</label>
                                                            <input type="text" id="account-google" class="form-control"
                                                                placeholder="Add link">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-linkedin">LinkedIn</label>
                                                            <input type="text" id="account-linkedin"
                                                                class="form-control" placeholder="Add link"
                                                                value="https://www.linkedin.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-instagram">Instagram</label>
                                                            <input type="text" id="account-instagram"
                                                                class="form-control" placeholder="Add link">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-quora">Quora</label>
                                                            <input type="text" id="account-quora" class="form-control"
                                                                placeholder="Add link">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-light">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                            aria-labelledby="account-pill-connections" aria-expanded="false">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                        <strong>Twitter</strong></a>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                    <h6>You are connected to facebook.</h6>
                                                    <span>Johndoe@gmail.com</span>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                        <strong>Google</strong>
                                                    </a>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                    <h6>You are connected to Instagram.</h6>
                                                    <span>Johndoe@gmail.com</span>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                            aria-labelledby="account-pill-notifications" aria-expanded="false">
                                            <div class="row">
                                                <h6 class="ml-1 mb-2">Activity</h6>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm" checked
                                                            id="accountSwitch1">
                                                        <label class="ml-50" for="accountSwitch1">Email me when someone
                                                            comments
                                                            onmy
                                                            article</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm" checked
                                                            id="accountSwitch2">
                                                        <label for="accountSwitch2" class="ml-50">Email me when someone
                                                            answers on
                                                            my
                                                            form</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm"
                                                            id="accountSwitch3">
                                                        <label for="accountSwitch3" class="ml-50">Email me hen someone
                                                            follows
                                                            me</label>
                                                    </div>
                                                </div>
                                                <h6 class="ml-1 my-2">Application</h6>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm" checked
                                                            id="accountSwitch4">
                                                        <label for="accountSwitch4" class="ml-50">News and
                                                            announcements</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm"
                                                            id="accountSwitch5">
                                                        <label for="accountSwitch5" class="ml-50">Weekly product
                                                            updates</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="switchery" data-size="sm" checked
                                                            id="accountSwitch6">
                                                        <label for="accountSwitch6" class="ml-50">Weekly blog
                                                            digest</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@endsection