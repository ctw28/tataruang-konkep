<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Tata Ruang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Sistem Informasi Tata Ruang" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" href="{{asset('/')}}images/icon/logo-pu-tata-ruang.png">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <!-- jvectormap -->
    <link href="{{asset('/')}}plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <!-- App css -->
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('/')}}assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeLvOgqyxLriRgDBSQmBwY5a-UaWIVQbQ&callback=initMap"></script> -->
    <style>
        #mapid {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .leaflet-tooltip-own {
            border-radius: 10px;
            padding: 2px;
            background-color: yellow;
            font-size: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body data-layout="horizontal" class="dark-topbar">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="{{asset('/')}}images/logo-pu-tata-ruang.png" alt="logo-small" class="logo-sm">
                </span>
                <span style="color:white; font-weight:bold">
                    SI Tata Ruang
                    <!-- <img src="{{asset('/')}}assets/images/logo.png" alt="logo-large" class="logo-lg logo-light"> -->
                </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">



                <li class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link" id="mobileToggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a><!-- End mobile menu toggle-->
                </li>
                <!--end menu item-->
            </ul>
            <!--end topbar-nav-->

            <div class="navbar-custom-menu">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="#">
                                <span><i data-feather="home" class="align-self-center hori-menu-icon"></i>Beranda</span>
                            </a>
                        </li>
                        <!--end has-submenu-->
                        <li class="has-submenu">
                            <a href="#">
                                <span><i data-feather="layers" class="align-self-center hori-menu-icon"></i>Peta</span>
                            </a>
                            <ul class="submenu">
                                @foreach($peta as $peta)
                                <li onclick="showMap('{{$peta->id}}')"><i class="ti ti-minus"></i>{{$peta->peta_nama}}</li>
                                @endforeach
                            </ul>
                            <!--end submenu-->
                        </li>
                        <!--end has-submenu-->

                        <li class="has-submenu">
                            <a href="#">
                                <span><i data-feather="database" class="align-self-center hori-menu-icon"></i>Data</span>
                            </a>
                            <ul class="submenu">
                                <li><a href="pages-blogs.html"><i class="ti ti-minus"></i>Blogs</a></li>
                                <li><a href="pages-faqs.html"><i class="ti ti-minus"></i>FAQs</a></li>
                                <li><a href="pages-pricing.html"><i class="ti ti-minus"></i>Pricing</a></li>
                                <li><a href="pages-profile.html"><i class="ti ti-minus"></i>Profile</a></li>
                                <li><a href="horizontal-starter.html"><i class="ti ti-minus"></i>Starter Page</a></li>
                                <li><a href="pages-timeline.html"><i class="ti ti-minus"></i>Timeline</a></li>
                                <li><a href="pages-treeview.html"><i class="ti ti-minus"></i>Treeview</a></li>
                            </ul>
                        </li>
                        <!--end has-submenu-->

                        <li class="has-submenu">
                            <a href="#">
                                <span><i data-feather="folder" class="align-self-center hori-menu-icon"></i>Dokumen</span>
                            </a>
                        </li>
                        <!--end has-submenu-->
                        <li class="has-submenu">
                            <a href="widgets.html">
                                <span><i data-feather="grid" class="align-self-center hori-menu-icon"></i>Survey</span>
                            </a>
                        </li>
                        <!--end has-submenu-->
                        <li class="has-submenu">
                            <a href="widgets.html">
                                <span><i data-feather="info" class="align-self-center hori-menu-icon"></i>Tentang</span>
                            </a>
                        </li>
                        <!--end has-submenu-->
                    </ul><!-- End navigation menu -->
                </div> <!-- end navigation -->
            </div>
            <!-- Navbar -->
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper" style="width:100%">
        <!-- Page Content-->
        <div class="page-content" style="padding:0">
            <div class="container-fluid" style="padding:0">
                <div id="mapid"></div>
            </div><!-- container -->
        </div>
        <!-- end page content -->
    </div>



    <!-- jQuery  -->
    <script src="{{asset('/')}}assets/js/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/metismenu.min.js"></script>
    <script src="{{asset('/')}}assets/js/waves.js"></script>
    <script src="{{asset('/')}}assets/js/feather.min.js"></script>
    <script src="{{asset('/')}}assets/js/simplebar.min.js"></script>
    <script src="{{asset('/')}}assets/js/moment.js"></script>
    <script src="{{asset('/')}}plugins/daterangepicker/daterangepicker.js"></script>

    <!-- App js -->
    <script src="{{asset('/')}}assets/js/app.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- <script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script> -->

    <script src="{{asset('js/leaflet-ajax.js')}}"></script>
    <script>
        var mymap = L.map('mapid').setView([-4.115246, 123.087998], 12);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoidGF0YXJ1YW5nIiwiYSI6ImNrczZ4NnpsYTBhZXEycXJvd2ZhMHdkMTUifQ.W5E8fgJ0V4Si3JEhWZ8RdA'
        }).addTo(mymap);

        // var roads = L.gridLayer
        // .googleMutant({
        // 	type: "hybrid", // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
        // })
        // .addTo(mymap);

        //     var marker = L.marker([-4.014541999713458,123.04450199976759]).addTo(mymap);
        // var marker2 = L.marker([-4.088932, 122.458847]).addTo(mymap);

        function popUp(f, l) {
            // for(key in f.properties){
            //     console.log(f.properties[key]);
            // }
            // console.log(f.geometry.coordinates)
            // console.log(f.properties)
            // var label = L.marker(l.getBounds().getCenter(), {
            //     icon: L.divIcon({
            //         className: 'label',
            //         html: "asda",
            //         iconSize: [100, 40]
            //     })
            // }).addTo(mymap);
            l.bindTooltip(f.properties.NAMA_DAS, {
                permanent: true,
                direction: "center",
                className: 'leaflet-tooltip-own'
            }).openTooltip()
            l.bindPopup(`${f.properties.NAMA_DAS}<br>${f.properties.KELILING} <br><br> <button id='detail' style='text-align:center'>Detail</button>`);
        }

        function myStyle(f, l) {
            // console.log(f.properties.WARNA)
            return {
                "color": f.properties.WARNA,
                'fillColor': f.properties.WARNA,
                'fillOpacity': 0.5,
                "weight": 2
            }
        }
        listMaps();
        async function listMaps() {
            let url = "{{route('peta.list')}}"
            let response = await fetch(url)
            let responseMessage = await response.json()
            // console.log(responseMessage);
            let overlayMaps = []
            var map = new Map();
            let peta = []
            let group = []
            responseMessage.map(row => {
                let url = "{{route('shptogeojson',':id')}}";
                url = url.replace(':id', row.id)
                peta[row.id] = new L.GeoJSON.AJAX([url], {
                    onEachFeature: popUp,
                    style: myStyle
                });
                // group[row.id] = L.layerGroup([peta[row.id]]);

                // peta[row.id].addTo(mymap);

                let add = {}
                add[row.peta_nama] = peta[row.id]
                overlayMaps.push(add)
            })

            let obj = overlayMaps.reduce(function(result, item) {
                var key = Object.keys(item)[0]; //first property: a, b, c
                result[key] = item[key];
                return result;
            }, {});
            // console.log(overlayMaps);
            L.control.layers(obj).addTo(mymap);

        }

        function showMap(id) {

            let myStyle = {
                "color": "#ff7800",
                "weight": 5
            };
            //     // var myLines = [
            //     // {"type":"LineString","coordinates":[[504644.7427000003,9532610.638],[504626.9439000003,9532605.0869],[504625.0215999996,9532604.7255],[504597.6161000002,9532600.4495],[504581.09509999957,9532596.7566],[504554.4671,9532591.8974],[504549.4137000004,9532589.7594],[504546.10950000025,9532588.5932],[504540.8616000004,9532587.0383],[504538.33490000013,9532586.6496],[504534.05879999977,9532585.6778],[504523.95189999975,9532583.9285],[504489.5493000001,9532579.2637],[504479.0536000002,9532577.9032],[504474.38879999984,9532577.5144],[504462.3382000001,9532582.7623],[504456.5072999997,9532585.4834],[504452.6200000001,9532589.9538],[504450.48199999984,9532592.0918],[504436.0990000004,9532624.162],[504412.3864000002,9532674.5025],[504396.2542000003,9532711.6262],[504383.6205000002,9532749.1386],[504375.6514999997,9532762.9385],[504368.07129999995,9532777.7102],[504342.60950000025,9532792.2876],[504326.6716,9532804.3382],[504312.67729999963,9532815.8057],[504310.7335999999,9532817.1663],[504289.93659999967,9532828.0507],[504274.5817999998,9532840.6844],[504251.84109999985,9532855.4561],[504246.5932,9532859.7322],[504213.3569,9532885.9714],[504183.81340000033,9532907.3516],[504147.46719999984,9532934.5626],[504142.99679999985,9532937.4781],[504118.7012,9532948.3625],[504079.82820000034,9532964.8835],[504053.9776999997,9532974.2131],[504033.375,9532983.7369],[504021.90749999974,9532986.8468],[503983.4232999999,9532996.9537],[503972.1501000002,9533000.4523],[503966.12480000034,9533002.396],[503963.2093000002,9533003.5621],[503948.82629999984,9533006.0889],[503942.2178999996,9533006.8664],[503939.10809999984,9533008.0325],[503917.53359999973,9533014.6409],[503898.4857999999,9533022.6099],[503878.66060000006,9533030.1901],[503847.17349999957,9533043.6013],[503829.0976,9533051.5703],[503787.6979,9533067.8969],[503762.62480000034,9533077.6151],[503755.23890000023,9533081.5024],[503747.46439999994,9533085.7785],[503740.46719999984,9533089.0827],[503736.3855999997,9533091.6094],[503733.8587999996,9533092.97],[503732.10950000025,9533093.9418],[503730.5546000004,9533095.4967],[503729.77720000036,9533096.8573],[503727.05599999987,9533098.4122],[503709.3688000003,9533105.7981],[503704.8985000001,9533107.9361],[503678.4648000002,9533122.5134],[503675.9380999999,9533124.0683],[503672.82830000017,9533126.012],[503663.11000000034,9533129.3162],[503656.3071999997,9533131.8429],[503650.8650000002,9533134.1753],[503647.36649999954,9533136.3133],[503604.8005999997,9533169.161],[503593.33299999963,9533177.713],[503586.3359000003,9533186.2651],[503583.4204000002,9533188.9862],[503582.2542000003,9533191.3186],[503574.28529999964,9533193.2622],[503571.75850000046,9533193.8453],[503554.26570000034,9533206.8678],[503535.02359999996,9533220.4733],[503514.2265999997,9533234.4676],[503507.4238,9533240.1041],[503497.5111999996,9533246.9069],[503491.48589999974,9533250.4055],[503459.4156999998,9533275.4785],[503429.2890999997,9533298.608],[503417.2385,9533307.7431],[503413.3512000004,9533310.2699],[503390.2218000004,9533323.4867],[503387.50069999974,9533325.4303],[503376.4219000004,9533333.0105],[503364.7599999998,9533342.9231],[503347.85030000005,9533352.0583],[503306.2561999997,9533378.8806],[503294.2056,9533386.4609],[503283.12679999974,9533392.6805],[503277.1014999999,9533397.1509],[503272.24230000004,9533402.5931],[503260.1917000003,9533412.117],[503256.4988000002,9533415.4212],[503247.3635999998,9533421.2522],[503235.7017999999,9533428.4437],[503229.2877000002,9533432.331],[503218.9863999998,9533440.2999],[503181.6683,9533465.5674],[503145.5164999999,9533485.5869],[503104.3110999996,9533512.798],[503078.07189999986,9533531.2627],[503065.43819999974,9533539.2316],[503052.4156999998,9533545.84],[503033.17360000033,9533566.054],[503026.9539000001,9533572.0793],[503015.6808000002,9533581.4088],[502981.8613,9533605.51],[502961.84169999976,9533621.6423],[502949.4024,9533633.3042],[502933.6588000003,9533645.7436],[502924.5236999998,9533651.9632],[502920.0532999998,9533655.0731],[502917.33220000006,9533657.0167],[502907.8082999997,9533670.6223],[502902.56039999984,9533674.1208],[502889.5379999997,9533679.3687],[502870.29590000026,9533683.0616],[502857.85649999976,9533683.6447],[502852.2198999999,9533684.4222],[502845.0284000002,9533685.7827],[502832.58910000045,9533687.532],[502825.3975999998,9533688.3095],[502819.17789999954,9533687.532],[502816.26240000036,9533688.5038],[502806.54420000035,9533696.4728],[502803.04559999984,9533699.1939],[502801.49069999997,9533700.1657],[502785.5527999997,9533704.6361]]}
            //     // ];
            //     var myLines = [
            //     {"type":"LineString","coordinates":[
            //         [122.52102374270045, -4.011341563281632],
            //         [122.52522944340926, -4.013332236614223]]}
            //     ];

            //     L.geoJSON(myLines, {
            //     style: myStyle
            // }).addTo(mymap);
            // var jsonTest = new L.GeoJSON.AJAX(["{{asset('geojson/test.geojson')}}"],{onEachFeature:popUp, style:myStyle}).addTo(mymap);
            let url = "{{route('shptogeojson',':id')}}";
            url = url.replace(':id', id)
            // console.log(url)
            var peta = new L.GeoJSON.AJAX([url], {
                onEachFeature: popUp,
                style: myStyle
            });

            peta.addTo(mymap);


        }
    </script>
</body>

</html>