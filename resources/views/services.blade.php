@extends('layouts.main');

@section('css')
    <style>
        .jumbotron {
            background-image: url("img/services.jpg");
            background-size: cover;
        }

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

        .lpk-row .lpk-card {
            background-color: white;
            min-height: 24em;
            margin-top: 24px;
        }

        .lpk-row ul {
            padding-left: 24px;
        }

        .lpk-row ul li h5 {
            font-weight: normal;
            font-size: 16px;
        }

        .lpk-row h4 {
            font-weight: bolder;
        }

        .lpk-row h4, .lpk-row h5 {
            color: black;
        }

        .modal .title-row .title-container {
            height: 300px;
            background-color: #666666;
        }

        .modal .title-row .title-container h2 {
            padding-left: 24px;
            height: 300px;
            line-height: 300px;
            vertical-align: middle;
        }

        .modal .desc-row .desc-container {
            height: 350px;
            margin-top: 64px;
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

    </style>
@endsection

@section('js')
    <script>

    </script>
@endsection

@section('content')

    <div class="jumbotron">
        <div class="container">
            <div class="row text-center">
                <h1 style="color: white;">Ask Idea Sourcing</h1>
                <p class="lead">
                    We provide affordable services to Amazon sellers that make sourcing from overseas comfortable and
                    easy.
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>- Services -</h2>
            </div>
        </div>

        <div class="row" id="level1">
            <div class="col-xs-12">
                <h3>Level 1</h3>
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

        <div class="row" id="level2" style="margin-top: 32px;">
            <div class="col-xs-12">
                <h3>Level 2</h3>
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

            <div class="col-md-3 col-xs-6 service-block" data-toggle="modal" data-target="#procurement">
                <div class="row image-row">
                    <div class="col-xs-12">
                        <img src="{{asset('img/icons/services/procurement.svg')}}" alt="procurement">
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <h4>Procurement</h4>
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

        <div class="row" id="level3" style="margin-top: 32px;">
            <div class="col-xs-12">
                <h3>Level 3</h3>
            </div>
            <div class="col-xs-12">
                <h4>Our experienced staff will assist you in all your sourcing needs from start to finish.</h4>
            </div>
        </div>

        <div class="row lpk-row" style="margin-top: 32px;">
            <div class="col-xs-12">
                <h2>Why It Matters</h2>
            </div>
            <div class="col-xs-12">
                <h4 style="font-weight: bold; color: white; margin: 0; padding: 0;">Ask Idea offers full Sourcing Agent
                    services, PLUS:</h4>
            </div>
            <div class="col-xs-12" style="margin-top: 40px;">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="col-xs-12 lpk-card">
                            <h4>Simpler, more reliable sourcing from China.</h4>
                            <ul>
                                <li><h5>
                                        We are an American-based company with native teams in both the US and China
                                    </h5></li>
                                <li><h5>
                                        Our sourcing team is on the ground in China, ensuring that every supplier is
                                        credible
                                    </h5></li>
                                <li><h5>
                                        We alleviate communication, cultural and quality control barriers/concerns
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="col-xs-12 lpk-card">
                            <h4>A consultative approach to sourcing.</h4>
                            <ul>
                                <li><h5>
                                        We find the optimal, complete solution for your end product or portfolio
                                    </h5></li>
                                <li><h5>
                                        We bundle across multiple suppliers for cost savings
                                    </h5></li>
                                <li><h5>
                                        We put the seller first, never based on commission with manufacturers
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="col-xs-12 lpk-card">
                            <h4>An expert understanding of Amazon & overseas logistics.</h4>
                            <ul>
                                <li><h5>
                                        We understand the complexities of Amazon’s requirements and how to help sellers
                                        best succeed
                                    </h5></li>
                                <li><h5>
                                        We are well-versed in global certification and legal regulations
                                    </h5></li>
                                <li><h5>
                                        We have deep expertise with overseas transportation
                                    </h5></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="col-xs-12 lpk-card">
                            <h4>A suite of solutions, with end-to-end support.</h4>
                            <ul>
                                <li><h5>
                                        Our experienced staff will assist you in all of your sourcing needs, from start
                                        to finish
                                    </h5></li>
                                <li><h5>
                                        By streamlining the process and creating efficiencies, we enable sellers to
                                        “scale up” and expand their business
                                    </h5></li>
                            </ul>
                        </div>
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
                            <h2>Product Consultation</h2>
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
                            <h2>Supplier Assessment</h2>
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
                            <h2>Sampling</h2>
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
                            <h2>Industry Regulations</h2>
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
                            <h2>Inspection</h2>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="procurement" id="procurement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row title-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 title-container">
                            <h2>Procurement</h2>
                        </div>
                    </div>
                </div>
                <div class="row desc-row">
                    <div class="col-xs-12">
                        <div class="col-xs-12 desc-container">
                            <p>
                                <strong>Final Confirmation: </strong>
                                You now have a clear idea about your product specification and industry
                                regulations and are ready to finalize the order with a supplier. At this point, you&#39;d
                                like a
                                professional team to handle your order with the factory in China. We will offer a
                                non-binding
                                offer once we know all the details. After we receive your payment, we will coordinate
                                all the
                                details between the supplier and you.
                            </p>
                            <p>
                                <strong>Order Placement: </strong>
                                We will first go through all the requirements that you want implemented in
                                the product, production, inspection, and shipment. We&#39;ll place the order to the
                                factory in your
                                name and discuss the requirements with the manufacturer. It could take several rounds of
                                communication to let both sides agree with the conditions. To better track the progress,
                                we will
                                create a production plan and update you with all details of the order process with a
                                clear time
                                line. Last but not least, we will send you the invoice from the factory so that you can
                                make a
                                down payment for your products. (Usually, this is 30% of the total order value)
                            </p>
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
                            <h2>Payment</h2>
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
                            <h2>Order Monitoring</h2>
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
                        <div class="col-xs-12 title-container">
                            <h2>Logistics</h2>
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