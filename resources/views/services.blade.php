@extends('layouts.main');

@section('content')

    <style>
        #test {
            background-image: url("img/services.jpg");
            background-size: cover;
        }

        #testInner {
            background: rgba(25,25,25,.3) !important;
            min-height: 20em;
        }

        #testInner h1, #testInner h2, #testInner p {
            padding-top: 2em;
            color: #fff;
        }
    </style>

    <div class="row" id="test">
        <div class="container jumbotron" id="testInner">

            <h1 class="display-3">Ask Idea Sourcing</h1>
            {{--<h2 class="display-3 pull-right">...From concept to market</h2>--}}
            <p class="lead">
               We provide affordable services to Amazon sellers that make sourcing from overseas comfortable and easy.
            </p>

        </div>
    </div>



<div class="container default-primary-color">





    <div class="row">
        <div class="col-sm-4 card">
            <div class="card-header default-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/product_consultation.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 1: Product Consultation
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal secondary-text-color">
                    <h2 class="card-title">Product Development <i class="fa fa-caret-down"></i></h2>
                    <p>
                        Once you have developed your product, as an Amazon seller, the next step is to find the right supplier. You can contact us with any questions about sourcing. The first consultation is free, and we can help you analyze whether your type of product should be sourced from China.
                    </p>
                    <h2 class="card-title">Product Specification <i class="fa fa-caret-down"></i></h2>
                    <p>
                        In this step, we will ask you several questions to develop a product specification and make sure we are working towards the same goals. After we have reached mutual agreement, we will send you a quote for the project. We will get your inquiry and payment, then start sourcing right away.
                    </p>
                </div>
            </div>
            {{--<div class="card-footer dark-primary-color">--}}
                {{--Assess availability and options--}}
            {{--</div>--}}
        </div>

        <div class="col-sm-4 card">
            <div class="card-header default-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/supplier_assessment.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 2: Supplier Assessment
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Communication <i class="fa fa-caret-down"></i></h2>
                    <p>
                        Next, we evaluate the suppliers using several different platforms including Alibaba, AliExpress, Global sourcing, and DHgate.com finding the best fit for your demand. Next, we begin contact with suppliers and evaluate their abilities according to your needs.This process usually takes 2-3 days depending on the complexity of your inquiry.
                    </p>
                    <h2 class="card-title">Report <i class="fa fa-caret-down"></i></h2>
                    <p>
                        After we have gathered all the relevant information, we'll email you with the reports and results of our finding. Each supplier will be classified into our standardized Supplier  Reports include with their contact information, pre-negotiated prices, and our recommendation. You can either take it from here or hire us for sample checking or full sourcing services.

                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 card">
            <div class="card-header default-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/Sampling.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 3: Sampling (Optional)
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Sample Consolidation <i class="fa fa-caret-down"></i></h2>
                    <p>
                        Consolidating samples is time and money saving for both parties. We will consolidate all of your samples into one convenient package and forward it to you. Another option is to have the samples sent to our China office for us to perform inspections and provide you with details, pictures, videos, or other inquiries you may have. If the sample(s) do not check out properly, we will not send them to the US, saving you.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4 card">
            <div class="card-header default-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/industry_regulations.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 4: Industry Regulations
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Regulation Report <i class="fa fa-caret-down"></i></h2>
                    <p>
                        For the regulation report, we will analyze import & export regulations for your product. These include: transportation requirement, license requirement and other legal issue regarding your product. We will provided you with a final report about related issues that you should pay attention to.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 card">
            <div class="card-header default-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/supplier_qualification.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 5: Supplier Qualification
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Factory Check <i class="fa fa-caret-down"></i></h2>
                    <p>
                        We will arrange our sourcing experts in China to gather information about suppliers that you intend to deal with. We will arrange a tour of the facilities if we believe that is necessary. After that we can provided a detailed supplier qualification report for you to make a better sourcing decision, eliminating any lingering questions about the supplier.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 card">
            <div class="card-header dark-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/procurement.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 6: Procurement
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Final Confirmation <i class="fa fa-caret-down"></i></h2>
                    <p>
                        You now have a clear idea about your product specification and industry regulations and are ready to finalize the order with a supplier. At this point, you'd like a professional team to handle your order with the factory in China. We will offer a non-binding offer once we know all the details. After we receive your payment, we will coordinate all the details between the supplier and you.
                    </p>
                    <h2 class="card-title">Order Placement <i class="fa fa-caret-down"></i></h2>
                    <p>
                        We will first go through all the requirements that you want implemented in the product, production, inspection, and shipment. We'll place the order to the factory in your name and discuss the requirements with the manufacturer. It could take several rounds of communication to let both sides agree with the conditions. To better track the progress, we will create a production plan and update you with all details of the order process with a clear time line. Last but not least, we will send you the invoice from the factory so that you can make a down payment for your products. (Usually, this is 30% of the total order value)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 card">
            <div class="card-header dark-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/payment.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 7: Payment
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Payment to the Factory <i class="fa fa-caret-down"></i></h2>
                    <p>
                        We will advise you all details of the factory and negotiate price for you so you can make the down payment for goods. We don't involve ourselves in the payment; this is between you and the factory to keep things transparent. Once you have paid the down payment, the supplier will start arrange production schedule and prepare the production together with the production plan that we've laid out together with you.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 card">
            <div class="card-header dark-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/order_monitoring.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 8: Order Monitoring
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Continual Monitoring <i class="fa fa-caret-down"></i></h2>
                    <p>
                        The process, depending on your order quantity, type of product and suppliers, may take 10-60 days depending on your product’s complexity. Usually, suppliers will give a 45 days production lead time. During the weeks leading up to shipment we will perform quality control inspections and arrange shipping logistics with you.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4 card">
            <div class="card-header dark-primary-color">
                <div class="image-wrapper">
                    <img src="img/icons/logistics.png" />
                </div>
                <strong class="divider-color text-primary-color">
                    Step 9: Logistics
                </strong>
            </div>
            <div class="card-content">
                {{--<h1 class="card-title">Title</h1>--}}
                <div class="card-modal">
                    <h2 class="card-title">Supply Chain Management <i class="fa fa-caret-down"></i></h2>
                    <p>
                        If you do not have your logistics provided, we can suggest several third party logistic companies that we know and trust. Marksman sourcing can help you with all export process and transportation arrangement.
                    </p>
                    <p>
                        You can also use Marksman RSC, our sister company, to handle all your supply chain issues including shipping, FBA preparation, and return handling. The price will not be included in the payment, and we will send you another quote from Marksman RSC. You can also contact Marksman directly for more return handling services.

                    </p>
                </div>
            </div>
        </div>
    </div>





</div>

<script>
    $(".card-modal .card-title").click(function (e) {
       console.log("Clicked me");

       var p = $(this).parent().find("p").slideToggle();

    });

    $(".card-header").click(function (e) {
        var p = $(this).parent().find("p").slideToggle();
    });

//    $(".card").mouseenter(function (e) {
//       alert("Hi");
//    });
</script>

<style>
    .card-modal h2.card-title {
        border-bottom: 1px solid #BDBDBD;
    }

    .card-header, .card-modal h2.card-title {
        cursor: pointer;
    }

    .card-header:hover > div {

    }

    .card:hover > .card-header > div {
        border-width: 1px;
        padding: .75em;
    }

    .card:hover {
        -webkit-box-shadow: 0px 5px 5px 5px rgba(127,127,127,.5);
        -moz-box-shadow: 0px 5px 5px 5px rgba(127,127,127,.5);
        box-shadow: 0px 5px 5px 5px rgba(127,127,127,.5);

        position: relative;
        float: left;
    }

    .card {
        margin-bottom: 1em;
        /*height: 100%;*/
    }
</style>

@endsection