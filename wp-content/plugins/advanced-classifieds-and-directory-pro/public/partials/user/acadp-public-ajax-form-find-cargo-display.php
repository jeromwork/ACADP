<?php

/**
 * This template displays the listing form.
 */
?>
<div id="acadp_find_cargo_transport">
    <div class="modal fade" id="acadp_find_cargo" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-screen">
                <div class="modal-header">
                    <h4 class="modal-title">Поиск груза</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="card">

                            <div class="card-block accordion-block">
                                <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="accordion-panel">
                                        <div class="accordion-heading" role="tab" id="headingOne">



                                            <fieldset>

                                                <!-- Form Name -->
                                                <legend>Поиск груза</legend>

                                                <!-- Prepended text-->
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label" for="prependedtext"></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">радиус</span>
                                                                <input id="prependedtext" name="prependedtext" class="form-control" placeholder="откуда" type="text">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- Appended Input-->
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label" for="appendedtext"></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group">
                                                                <input id="appendedtext" name="appendedtext" class="form-control" placeholder="Куда" type="text">
                                                                <span class="input-group-addon">радиус</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <h3 class="card-title accordion-title">

                                                <button class="btn btn-primary" type="button" data-parent="#accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Больше параметров</button>

                                            </h3>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                            <div class="accordion-content accordion-desc">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!-- Review Product card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>Review Our Product</h5>
                                                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>

                                                            </div>
                                                            <div class="card-block">
                                                                <div class="j-wrapper j-wrapper-640">
                                                                    <form action="j-pro/php/action.php" method="post" class="j-pro" id="j-pro" novalidate="">
                                                                        <div class="j-content">
                                                                            <!-- start name -->
                                                                            <div class="j-unit">
                                                                                <label class="j-label">Name</label>
                                                                                <div class="j-input">
                                                                                    <label class="j-icon-right" for="name">
                                                                                        <i class="icofont icofont-user"></i>
                                                                                    </label>
                                                                                    <input type="text" id="name" name="name" placeholder="e.g. John Doe">
                                                                                </div>
                                                                            </div>
                                                                            <!-- end name -->
                                                                            <!-- start email-->
                                                                            <div class="j-unit">
                                                                                <label class="j-label">Email</label>
                                                                                <div class="j-input">
                                                                                    <label class="j-icon-right" for="email">
                                                                                        <i class="icofont icofont-envelope"></i>
                                                                                    </label>
                                                                                    <input type="email" placeholder="email@domain.com" id="email" name="email">
                                                                                </div>
                                                                            </div>
                                                                            <!-- end email -->
                                                                            <!-- start message -->
                                                                            <div class="j-unit">
                                                                                <label class="j-label">Review message</label>
                                                                                <div class="j-input">
                                                                                    <textarea placeholder="message..." spellcheck="false" name="message"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end message -->
                                                                            <div class="j-divider j-gap-bottom-25"></div>
                                                                            <!-- start ratings -->
                                                                            <div class="j-unit">
                                                                                <div class="j-rating-group">
                                                                                    <label class="j-label">Product quality</label>
                                                                                    <div class="j-ratings">
                                                                                        <input id="5q" type="radio" name="product_rating" value="5">
                                                                                        <label for="5q">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="4q" type="radio" name="product_rating" value="4">
                                                                                        <label for="4q">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="3q" type="radio" name="product_rating" value="3">
                                                                                        <label for="3q">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="2q" type="radio" name="product_rating" value="2">
                                                                                        <label for="2q">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="1q" type="radio" name="product_rating" value="1" checked="">
                                                                                        <label for="1q">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="j-rating-group">
                                                                                    <label class="j-label">Service quality</label>
                                                                                    <div class="j-ratings">
                                                                                        <input id="5s" type="radio" name="service_rating" value="5">
                                                                                        <label for="5s">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="4s" type="radio" name="service_rating" value="4">
                                                                                        <label for="4s">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="3s" type="radio" name="service_rating" value="3">
                                                                                        <label for="3s">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="2s" type="radio" name="service_rating" value="2">
                                                                                        <label for="2s">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="1s" type="radio" name="service_rating" value="1" checked="">
                                                                                        <label for="1s">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="j-rating-group">
                                                                                    <label class="j-label">Support quality</label>
                                                                                    <div class="j-ratings">
                                                                                        <input id="5supp" type="radio" name="support_rating" value="5">
                                                                                        <label for="5supp">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="4supp" type="radio" name="support_rating" value="4">
                                                                                        <label for="4supp">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="3supp" type="radio" name="support_rating" value="3">
                                                                                        <label for="3supp">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="2supp" type="radio" name="support_rating" value="2">
                                                                                        <label for="2supp">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                        <input id="1supp" type="radio" name="support_rating" value="1" checked="">
                                                                                        <label for="1supp">
                                                                                            <i class="icofont icofont-star"></i>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end ratings -->
                                                                            <!-- start response from server -->
                                                                            <div class="j-response"></div>
                                                                            <!-- end response from server -->
                                                                        </div>
                                                                        <!-- end /.content -->
                                                                        <div class="j-footer">
                                                                            <button type="submit" class="btn btn-primary" id="simpletable_previous">Send</button>
                                                                        </div>
                                                                        <!-- end /.footer -->
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Review Product card end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>