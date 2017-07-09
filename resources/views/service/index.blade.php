@extends('layouts.main');

@section('css')
    <style>
        .servicesDesc {
            font-size: 20px;
            color: white;
            margin: 0;
        }

        .service-block img {
            width: 50px;
        }

        .service-block .image-row > div {
            text-align: center;
        }

        .service-block .desc-row > div {
            text-align: center;
        }

        .service-block {
            margin-top: 32px;
            cursor: pointer;
        }

        .modal .title-row .title-container {
            height: 200px;
            background-color: #666666;
        }

        .modal .title-row .title-container h2 {
            padding-left: 24px;
            height: 200px;
            line-height: 200px;
            font-size: 45px;
            vertical-align: middle;
            margin: 0;
        }

        .modal .desc-row .desc-container {
            min-height: 350px;
            margin-top: 64px;
        }

        @media screen and (max-width: 767px) {
            .modal .desc-row {
               padding-bottom: 50px;
            }
        }

        .modal .desc-row .desc-container p {
            color: black;
            line-height: 1.5em;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 300;
        }

        .modal .desc-row .desc-container p strong {
            color: #4d88b4;
        }

        .modal .modal-logo {
            position: absolute;
            height: 150px;
            top: 25px;
            right: 50px;
        }

        .modal .modal-logo img {
            height: 100%;
            opacity: 0.2;
        }

        @media screen and (max-width: 991px) {
            .modal .modal-logo {
                height: 100px;
                top: 50px;
                right: 25px;
            }

            .modal .title-row .title-container h2 {
                padding-left: 12px;
                font-size: 30px;
            }
        }

        @media screen and (max-width: 500px) {
            .modal .modal-logo {
                height: 80px;
                top: 60px;
                right: 10px;
                opacity: 0.5;
            }

            .modal .title-row .title-container h2 {
                font-size: 25px;
            }
        }

    </style>
@endsection

@section('js')
    <script>

        $(document).ready(function() {
            if(window.location.href.indexOf('stage1') > -1) {
                $('#productConsultation').modal();
            } else if(window.location.href.indexOf('stage2') > -1) {
                $('#priceNegotiation').modal();
            } else if(window.location.href.indexOf('stage3') > -1) {
                $('#inspection').modal();
            }

            $('.nextBtn').click(function(e) {
                e.preventDefault();
                $($(this).closest('.modal')[0]).modal('toggle');
                var nextId = $(this).attr("data-id");
                setTimeout(function(){
                    $(nextId).modal();
                }, 400);
            });
        });
    </script>
@endsection

@section('content')
    <div class="container-fluid page-title-container">
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <h1 style="color: white;">Ask Idea Sourcing</h1>
                <p class="lead text-center">
                    <u>We provide affordable services to Amazon sellers that make sourcing from overseas comfortable and
                    easy.</u>
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 32px;">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>- Services -</h2>
            </div>
        </div>

        <div class="row" id="stage1">
            <div class="col-xs-12">
                <h3>Stage 1</h3>
                <hr>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#productConsultation">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/product_consultation.svg')}}" alt="product_consultation">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Product Consultation</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#supplierAssessment">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/supplier_assessment.svg')}}" alt="supplier_assessment">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Supplier Assessment</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#sampling">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/sampling.svg')}}" alt="sampling">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Sampling</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#industryRegulations">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/industry_regulations.svg')}}" alt="industry_regulations">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Industry Regulations</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="stage2" style="margin-top: 5em;">
            <div class="col-xs-12">
                <h3>Stage 2</h3>
                <hr>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#priceNegotiation">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/price_negotiation.svg')}}" alt="price_negotiation">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Price Negotiation</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#contractArrangement">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/contract_arrangement.svg')}}" alt="contract_arrangement">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Contract Arrangement</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#payment">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/payment.svg')}}" alt="payment">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Payment</h4>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" id="stage3" style="margin-top: 5em;">
            <div class="col-xs-12">
                <h3>Stage 3</h3>
                <hr>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#inspection">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/inspection.svg')}}"
                             alt="inspection">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Inspection</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#orderMonitoring">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/order_monitoring.svg')}}" alt="order_monitoring">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Order Monitoring</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#logistics">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/logistics.svg')}}" alt="logistics">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Logistics</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--Service Description Modal--}}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productConsultation" id="productConsultation">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Product Consultation</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Product Development: </strong>
                                Once you have developed your product, as an Amazon seller, the next
                                step is to find the right supplier. You can contact us with any questions about
                                sourcing. The first
                                consultation is free, and we can help you analyze whether your type of product should be
                                sourced from China.
                            </p>

                            <p>
                                <strong>Product Specification: </strong>
                                In this step, we will ask you several questions to develop a product
                                specification and make sure we are working towards the same goals. After we have reached
                                mutual agreement, we will send you a quote for the project. We will get your inquiry and
                                payment, then start sourcing right away.
                            </p>
                        </div>
                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" class="btn btn-default nextBtn" data-id="#supplierAssessment">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="supplierAssessment" id="supplierAssessment">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Supplier Assessment</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Communication: </strong>
                                Next, we evaluate the suppliers using several different platforms including
                                Alibaba, AliExpress, Global sourcing, and DHgate.com finding the best fit for your
                                demand.
                                Next, we begin contact with suppliers and evaluate their abilities according to your
                                needs.This
                                process usually takes 2-3 days depending on the complexity of your inquiry.
                            </p>
                            <p>
                                <strong>Report: </strong>
                                After we have gathered all the relevant information, we&#39;ll email you with the
                                reports
                                and results of our finding. Each supplier will be classified into our standardized
                                Supplier
                                Reports include with their contact information, pre-negotiated prices, and our
                                recommendation.
                                You can either take it from here or hire us for sample checking or full sourcing
                                services.
                            </p>
                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#sampling">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sampling" id="sampling">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Sampling</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Sample Consolidation: </strong>
                                Consolidating samples is time and money saving for both parties. We
                                will consolidate all of your samples into one convenient package and forward it to you.
                                Another
                                option is to have the samples sent to our China office for us to perform inspections and
                                provide
                                you with details, pictures, videos, or other inquiries you may have. If the sample(s) do
                                not check
                                out properly, we will not send them to the US, saving you.
                            </p>

                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#industryRegulations">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="industryRegulations" id="industryRegulations">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Industry Regulations</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Regulation Report: </strong>
                                For the regulation report, we will analyze import &amp; export regulations for
                                your product. These include: transportation requirement, license requirement and other
                                legal
                                issue regarding your product. We will provided you with a final report about related
                                issues that
                                you should pay attention to.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="inspection"
         id="inspection">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Inspection</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Order Inspection: </strong>
                                Suppliers typically give a reasonable lead time, but the process can be 10-60.
                                It all depends on the product’s complexity.
                                In these weeks, we will perform quality control and testing
                                before arranging shipping logistics with you.
                            </p>

                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#orderMonitoring">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="priceNegotiation" id="priceNegotiation">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Price Negotiation</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Price Negotiation: </strong>
                                We have sourcing agents living in China and know the industry well.
                                Our agent will try to negotiate the price with manufacturer on behalf of you.
                                The goal is to get the lowest price for you without hurting the quality.
                                Also, the price will be fair to the manufacturers so that you can maintain
                                a good relationship with them. We will provide you with all information
                                we have and try to keep the progress transparent and clear.
                            </p>
                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#contractArrangement">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contractArrangement" id="contractArrangement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Contract Arrangement</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Contract Arrangement: </strong>
                                It is critical to draft a contract that can protect your rights.
                                We will make sure you contract with the right party.
                                You should contract with a company that has sufficient financial resources
                                when things go south. Also, we mainly focus on quality requirements and product warranty.
                                These terms can set a clear standard for the inspection,
                                and protect your right when things go wrong.
                            </p>
                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#payment">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="payment" id="payment">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Payment</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Payment to the factory: </strong>
                                We will advise you all details of the factory and negotiate price for you
                                so you can make the down payment for goods. We don&#39;t involve ourselves in the
                                payment; this
                                is between you and the factory to keep things transparent. Once you have paid the down
                                payment, the supplier will start arrange production schedule and prepare the production
                                together with the production plan that we&#39;ve laid out together with you.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="orderMonitoring" id="orderMonitoring">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Order Monitoring</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Continual Monitoring: </strong>
                                The process, depending on your order quantity, type of product and
                                suppliers, may take 10-60 days depending on your product’s complexity. Usually,
                                suppliers will
                                give a 45 days production lead time. During the weeks leading up to shipment we will
                                perform
                                quality control inspections and arrange shipping logistics with you.
                            </p>

                        </div>

                        <div class="col-xs-12 text-right" style="height: 60px; position: relative">
                            <a href="#" data-dismiss="modal" class="btn btn-default nextBtn" data-id="#logistics">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logistics" id="logistics">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container" style="position:relative;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.6; text-shadow: none; margin-top: 8px;">
                                <span aria-hidden="true" style="color: white;">&times;</span>
                            </button>
                            <h2>Logistics</h2>
                            <span class="modal-logo">
                                <img src="{{ asset('img/logo/SmallLogoWH.png') }}" alt="smallLogoWhite">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Supply Chain Management: </strong>
                                If you do not have your logistics provided, we can suggest several
                                third party logistic companies that we know and trust. Marksman sourcing can help you
                                with all
                                export process and transportation arrangement.
                            </p>
                            <p>
                                You can also use Marksman RSC, our sister company, to handle all your supply chain
                                issues
                                including shipping, FBA preparation, and return handling. The price will not be included
                                in the
                                payment, and we will send you another quote from Marksman RSC. You can also contact
                                Marksman directly for more return handling services.
                            </p>
                            <p>
                                More information on Marksman RSC: <a href="http://marksmanrsc.com">http://marksmanrsc.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection