<?php 
session_start(); 
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="css/map_style.css">

<div id="map-container">
    <div class="burger-icon">
        <span class="fas fa-filter" id="burger-icon"></span>
        Filter Map
    </div>

    <div class="filter-form-container">
        <div class="filter-form">
            <label for="lot_no"><strong>Search by Lot No.:</strong></label>
            <input type="text" id="lot_no" class="form-control">

            <label for="barangay"><strong>Barangay:</strong></label>
            <select id="barangay" class="form-control">
                <option value="">-- Select Barangay --</option>
                <option value="Abangay">Abangay</option>
                <option value="Amamaros">Amamaros</option>
                <option value="Bagacay">Bagacay</option>
                <option value="Barasan">Barasan</option>
                <option value="Batuan">Batuan</option>
                <option value="Bongco">Bongco</option>
                <option value="Cahaguichican">Cahaguichican</option>
                <option value="Callan">Callan</option>
                <option value="Cansilayan">Cansilayan</option>
                <option value="Casalsagan">Casalsagan</option>
                <option value="Cato-ogan">Cato-ogan</option>
                <option value="Cau-ayan">Cau-ayan</option>
                <option value="Culob">Culob</option>
                <option value="Danao">Danao</option>
                <option value="Dapitan">Dapitan</option>
                <option value="Dawis">Dawis</option>
                <option value="Dongsol">Dongsol</option>
                <option value="Fernando Parcon Ward">Fernando Parcon Ward</option>
                <option value="Fundacion">Fundacion</option>
                <option value="Guibuangan">Guibuangan</option>
                <option value="Guinacas">Guinacas</option>
                <option value="Igang">Igang</option>
                <option value="Intaluan">Intaluan</option>
                <option value="Iwa Ilaud">Iwa Ilaud</option>
                <option value="Iwa Ilaya">Iwa Ilaya</option>
                <option value="Jamabalud">Jamabalud</option>
                <option value="Jebioc">Jebioc</option>
                <option value="Lay-ahan">Lay-ahan</option>
                <option value="Lopez Jaena Ward">Lopez Jaena Ward</option>
                <option value="Lumbo">Lumbo</option>
                <option value="Macatol">Macatol</option>
                <option value="Malusgod">Malusgod</option>
                <option value="Nabitasan">Nabitasan</option>
                <option value="Naga">Naga</option>
                <option value="Nanga">Nanga</option>
                <option value="Naslo">Naslo</option>
                <option value="Pajo">Pajo</option>
                <option value="Palanguia">Palanguia</option>
                <option value="Pitogo">Pitogo</option>
                <option value="Polot-an">Polot-an</option>
                <option value="Primitivo Ledesma Ward">Primitivo Ledesma Ward</option>
                <option value="Purog">Purog</option>
                <option value="Rumbang">Rumbang</option>
                <option value="San Jose Ward">San Jose Ward</option>
                <option value="Sinuagan">Sinuagan</option>
                <option value="Tuburan">Tuburan</option>
                <option value="Tumcon Ilaud">Tumcon Ilaud</option>
                <option value="Tumcon Ilaya">Tumcon Ilaya</option>
                <option value="Ubang">Ubang</option>
                <option value="Zarrague">Zarrague</option>
            </select>
            <br>

            <label for="classification"><strong>Classification:</strong></label>
            <select id="classification" class="form-control">
                <option value="">-- Select Classification --</option>
                <option value="agriculture">Agriculture</option>
                <option value="residential">Residential</option>
                <option value="commercial">Commercial</option>
                <option value="industrial">Industrial</option>
            </select>
            <br>

            <label for="kinds"><strong>Kinds:</strong></label>
            <select id="kinds" class="form-control">
                <option value="">-- Select Kinds --</option>
            </select>

           
            <br>
        </div>
    </div>

    <div id="map"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    $(document).ready(function () {
        var map = L.map('map').setView([10.9498, 122.6267], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = [];

        $.ajax({
            url: 'pins.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                data.forEach(function (item) {
                    var latitude = parseFloat(item.latitude);
                    var longitude = parseFloat(item.longitude);
                    var altitude = parseFloat(item.altitude);
                    var accuracy = parseFloat(item.accuracy);
                    var barangayName = String(item.barangay);
                    var lot_no = String(item.lot_no);
                    var classification = String(item.classification);
                    var kinds = String(item.kinds);
                    var fullName = String(item.first_name + " " + item.last_name); // Corrected this line
                    var area = String(item.area);
                    var assess_level = String(item.assess_level);
                    var market_val = String(item.market_val);
                    var payables = String(item.payables);

                    if (!isNaN(latitude) && !isNaN(longitude)) {
                        var mapCenter = [latitude, longitude];

                        var redDotIcon = L.divIcon({
                            className: 'custom-icon',
                            iconSize: [12, 12],
                            html: '<div style="width: 12px; height: 12px; background-color: red; border-radius: 50%;"></div>'
                        });

                        var marker = L.marker(mapCenter, { icon: redDotIcon }).addTo(map);
                        marker.bindPopup(
                            `<div class="popup-content">
                                <h4>${lot_no}</h4>
                                <ul>
                                    <li><b>Classification:</b> ${classification}</li>
                                    <li><b>Lot No:</b> ${lot_no}</li>
                                    <li><b>Barangay:</b> ${barangayName}</li>
                                    <li><b>Kinds:</b> ${kinds}</li>
                                    <li><b>Area:</b> ${area}</li>
                                    <li><b>Assessment Level:</b> ${assess_level}</li>
                                    <li><b>Market Value:</b> ${market_val}</li>
                                    <li><b>Tax:</b> ${payables}</li>
                                </ul>
                            </div>`
                        );

                        marker.classification = classification;
                        marker.kinds = kinds;
                        markers.push(marker);
                    } else {
                        console.error('Invalid latitude or longitude:', item);
                    }
                });
            },

            error: function (xhr, status, error) {
                console.error("Error fetching land info:", error);
            }
        });

        $('#classification').on('change', function () {
            var selectedClassification = $(this).val();
            var kindsOptions = '';

            if (selectedClassification === 'agriculture') {
                kindsOptions = '<option value="irrigated">Rice Irrigated</option>' +
                               '<option value="nonirrigated">Rice Unirrigated</option>' +
                               '<option value="upland">Rice Upland</option>' +
                               '<option value="corn">Corn Land</option>' +
                               '<option value="coconut">Coconut Land</option>' +
                               '<option value="cotton">Cotton Land</option>' +
                               '<option value="tabacco">Tabacco Land</option>' +
                               '<option value="bamboo">Bamboo Land</option>' +
                               '<option value="bangus">Fishpond:Bangus</option>' +
                               '<option value="tilapia">Fishpond:Tilapia</option>' +
                               '<option value="lapulapu">Fishpond:Lapu-Lapu</option>' +
                               '<option value="fisheries">In-Land Fisheries:Tilapia</option>' +
                               '<option value="hito">In-Land Fisheries:Hito </option>' +
                               '<option value="nipa">Nipa Land</option>' +
                               '<option value="salt">Salt Bed</option>' +
                               '<option value="pasture">Pasture</option>' +
                               '<option value="forest">Forest</option>' +
                               '<option value="mangroove">Mangroove</option>' +
                               '<option value="orchard">Orchard</option>' +
                               '<option value="abaca">Abaca</option>' +
                               '<option value="cogon">Cogon Land</option>' +
                               '<option value="sorghum">Sorghum</option>' +
                               '<option value="ipilipil">Ipil-Ipil Land</option>' +
                               '<option value="zacate">Zacate</option>' +
                               '<option value="kangkong">Kangkong</option>' +
                               '<option value="mango">Mango Land</option>' +
                               '<option value="pineapple">Pineapple Land</option>' +
                               '<option value="intensive">Prawn Pond, Intensive</option>' +
                               '<option value="semiintensive">Prawn Pond, Semi-intensive</option>' +
                               '<option value="traditional">Prawn Pond, Traditional</option>' +
                               '<option value="sugar">Sugar Land</option>' +
                               '<option value="cardava">Banana Land:Cardava/Saba(pp of not more than 625)</option>' +
                               '<option value="sweet">Banana Land:Sweet Banana(pp of not more than 955)</option>' +
                               '<option value="bananacommercial">Banana Land:Commercial Plantation(pp of not more than 956 for Sweet & more than 625 for Cardava/Saba)</option>' +
                               '<option value="cassava">Cassava Land & other Root Crops</option>' +
                               '<option value="coffee">Coffee</option>' +
                               '<option value="horticulture">Horticulture</option>' +
                               '<option value="poultry">Poultry Farm Land(Broiler)</option>' +
                               '<option value="cacao">Cacao Land</option>' +
                               '<option value="swine">Swine Farm Land</option>' +
                               '<option value="papayacommercial">Papaya Land:Commercial Plantation (pp of 1,100 hills/ha. or more)</option>' +
                               '<option value="papayatraditional">Papaya Land:Traditional (pp of 1,099 hills/ha. or more)</option>' +
                               '<option value="dragon">Dragon Fruit Land</option>' +
                               '<option value="breeding">Game Fowl Breeding Farm</option>' +
                               '<option value="citrus">Citrus Land</option>';
            } else if (selectedClassification === 'residential') {
                kindsOptions = '<option value="pototan1">Pototan</option>';
            } else if (selectedClassification === 'industrial') {
                kindsOptions = '<option value="pototan3">Pototan</option>';
                              
            } else if (selectedClassification === 'commercial') {
                kindsOptions = '<option value="pototan2">Pototan</option>';

            }

            $('#kinds').html('<option value="">-- Select Kinds --</option>' + kindsOptions);
        });

        $('#barangay, #classification, #lot_no, #kinds').on('input', function () {
            var barangayName = $('#barangay').val().toLowerCase();
            var classification = $('#classification').val().toLowerCase();
            var lot_no = $('#lot_no').val().toLowerCase();
            var kinds = $('#kinds').val().toLowerCase();

            markers.forEach(function (marker) {
                var showMarker = true;

                if (barangayName !== '') {
                    showMarker = showMarker && marker.getPopup().getContent().toLowerCase().includes(barangayName);
                }

                if (classification !== '') {
                    showMarker = showMarker && marker.classification.toLowerCase().includes(classification);
                }

                if (lot_no !== '') {
                    showMarker = showMarker && marker.getPopup().getContent().toLowerCase().includes(lot_no);
                }

                if (kinds !== '') {
                    showMarker = showMarker && marker.kinds.toLowerCase().includes(kinds);
                }

                if (showMarker) {
                    marker.addTo(map);
                } else {
                    map.removeLayer(marker);
                }
            });
        });
    });
</script>



<?php 
include 'includes/scripts.php'; 
include 'includes/footer.php'; 
?>
