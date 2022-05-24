

@extends('front.layouts.front_layouts')

@section('front_content')

    <div class="faq">
        <div class="wrapper">
            <!-- Accordion Heading One -->
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="header">
                        <h2 class="title">FAQ</h2>
                        <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit explicabo
                            rem praesentium quisquam distinctio optio veniam dicta, beatae fugit repellendus numquam vel
                            earum sunt voluptatibus sapiente sit unde debitis delectus.</p>

                    </div>
                </div>

            </div>
            <br>
            <!-- Order -->
            <div class="parent-tab tab-3">
                <input type="radio" name="tab" id="tab-1">
                <label for="tab-1" class="tab-3">
                    <span>Orders</span>
                    <div class="icon"><i class="fas fa-plus"></i></div>
                </label>
                <div class="content">
                    <!-- One -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-1-1">
                        <label for="tab-1-1">
                            <span>My Package Has Damaged Products ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>If you have received damaged items, please ensure it is reported within 7 days of your package delivery date.</p>
                        </div>
                    </div>
                    <!-- Two -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-1-2">
                        <label for="tab-1-2">
                            <span>I Haven't Received My Order, And The Status Is Delivered ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>If your package is still lost or missing, you must wait to contact us within 5 days of the delivery date.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payements Method -->
            <div class="parent-tab tab-3">
                <input type="radio" name="tab" id="tab-2">
                <label for="tab-2" class="tab-3">
                    <span>Payements Method</span>
                    <div class="icon"><i class="fas fa-plus"></i></div>
                </label>
                <div class="content">
                    <!-- One -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-2-1">
                        <label for="tab-2-1">
                            <span>How Can I Pay ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>We accept the following forms of payments: CON(cash on delivery), Visa, Mastercard.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping -->
            <div class="parent-tab tab-3">
                <input type="radio" name="tab" id="tab-3">
                <label for="tab-3" class="tab-3">
                    <span>Shipping</span>
                    <div class="icon"><i class="fas fa-plus"></i></div>
                </label>
                <div class="content">
                    <!-- One -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-3-1">
                        <label for="tab-3-1">
                            <span>What Is Yor Shipping Policy ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>We offer Standard Shipping, Express Shipping, to Middle East, Europe, and most other countries.</p>
                        </div>
                    </div>
                    <!-- Two -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-3-2">
                        <label for="tab-3-2">
                            <span>Can I Have My Shipping Fees Back ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>Shipping fees are non-refundable. If you refuse any shipments from sasha.com, you will be held responsible for the original shipping charges, added to the cost of returning the package to us.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Return -->
            <div class="parent-tab tab-3">
                <input type="radio" name="tab" id="tab-4">
                <label for="tab-4" class="tab-3">
                    <span>Return</span>
                    <div class="icon"><i class="fas fa-plus"></i></div>
                </label>
                <div class="content">
                    <!-- One -->
                    <div class="child-tab">
                        <input type="checkbox" name="sub-tab" id="tab-4-1">
                        <label for="tab-4-1">
                            <span>Can I Exchange Items ?</span>
                            <div class="icon"><i class="fas fa-plus"></i></div>
                        </label>
                        <div class="sub-content">
                            <p>We do not offer exchanges but we welcome you to return your items with our Return Policy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
