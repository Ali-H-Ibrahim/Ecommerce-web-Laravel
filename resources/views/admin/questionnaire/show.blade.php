@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->


    <div class="app-content content">
        <div class="sl-mainpanel">
            <div class="sl-pagebody">
                <div class="card pd-20 pd-sm-40 container">
                    <h6 class="card-body-title">Questionnaire Details Page  </h6>

                    <div class="form-layout">
                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sender Name: <span class="tx-danger">*</span></label><br>
                                    <strong>{{ $questionnaire -> name }}</strong>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Email Address: <span class="tx-danger">*</span></label><br>
                                    <strong>{{ $questionnaire -> email }}</strong>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Contact Number: <span class="tx-danger">*</span></label><br>
                                    <strong>{{ $questionnaire -> contact_number }}</strong>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $questionnaire -> address}}</strong>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Business Type: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $questionnaire -> business }}</strong>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $questionnaire -> brand }}</strong>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <br>
                                    <strong>{{ $questionnaire -> brand }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
