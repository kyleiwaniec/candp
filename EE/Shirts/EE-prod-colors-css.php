<!DOCTYPE HTML>
<html>
    <head>
        <style>
            *{margin:0;
              padding:0;
            }
            .product{

            }

            .image{
                display:block;
                position:absolute;
                left:0 !important;
                width:250px !important;
                height:250px !important;
                background:url(images/blue.png) center center no-repeat !important;

            }
            .swatches{
                float:left;
                position:relative;
            }
            .swatches div{
                position:absolute;
                width:40px;
                height:40px;
                left:250px;
            }
            .swatches .blue{
                background:url(images/blue-swatch.png) center center no-repeat;
                top:0;
            }
            .swatches .blue:hover ~ .image{
                background:url(images/blue.png) center center no-repeat !important;
            }


            .swatches .light-blue{
                background:url(images/light-blue-swatch.png) center center no-repeat;
                top:40px;
            }
            .swatches .light-blue:hover ~ .image{
                background:url(images/light-blue.png) center center no-repeat !important;
            }

            .swatches .green{
                background:url(images/green-swatch.png) center center no-repeat;
                top:80px;
            }
            .swatches .green:hover ~ .image{
                background:url(images/green.png) center center no-repeat !important;
            }

            .swatches .yellow{
                background:url(images/yellow-swatch.png) center center no-repeat;
                top:120px;
            }
            .swatches .yellow:hover ~ .image{
                background:url(images/yellow.png) center center no-repeat !important;
            }

            .swatches .red{
                background:url(images/red-swatch.png) center center no-repeat;
                top:160px;
            }
            .swatches .red:hover ~ .image{
                background:url(images/red.png) center center no-repeat !important;
            }


        </style>

    </head>

    <body>

        <div id="container">

            <div class="product">
                <div class="swatches">

                    <div class="light-blue"></div>
                    <div class="blue"></div>
                    <div class="green"></div>
                    <div class="yellow"></div>
                    <div class="red"></div>

                    <div class="image"></div>

                </div>
            </div>


        </div>

    </body>
</html>