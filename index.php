<?php
session_start();
include "db.php"; // existing DB connection from your working backend
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>SafeHer — Women Safety Control Center</title>


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  
  <style>
    :root{
      --brand: #6a5acd;        /* deep soft purple */
      --muted-bg: #f4f6fb;
      --card-radius: 12px;
    }
    body{ background: var(--muted-bg); font-family: system-ui,Segoe UI,Roboto,Helvetica,Arial; }
    .hero {
      background: linear-gradient(135deg,var(--brand),#836fff);
      color:#fff;
      padding:36px 18px;
      border-bottom-left-radius:24px;
      border-bottom-right-radius:24px;
      box-shadow: 0 8px 30px rgba(44,33,99,0.12);
    }
    .hero-title {
  font-size: 4.0rem;     /* Bigger */
  color: #ffffff;        /* Pure white */
  line-height: 1.3;
}

.hero-subtitle {
  font-size: 1.3rem;
  color: #ffffff;        /* White */
  opacity: 0.95;
}

/* NAVBAR BACKGROUND */
.custom-navbar {
  background: linear-gradient(135deg, #4b3ca7, #6a5acd);
  padding: 12px 0;
}

/* BRAND TEXT */
.brand-text {
  font-size: 1.8rem;
  font-weight: 800;
  letter-spacing: 1px;
  color: #ffffff !important;
}

.brand-accent {
  color: #ffd700;
}

/* GLASS BUTTON STYLE */
.btn-glass {
  background: rgba(255,255,255,0.15);
  color: #ffffff;
  border: 1px solid rgba(255,255,255,0.25);
  backdrop-filter: blur(8px);
  transition: all 0.3s ease;
}

.btn-glass:hover {
  background: rgba(255,255,255,0.25);
  color: #ffffff;
}
    .btn-emergency { background:#ff3b30; border:0; color:#fff; font-weight:600; }
    .safety-badge-safe{ background:#2ecc71; color:#fff; padding:.25rem .5rem; border-radius:.5rem; font-weight:700; }
    .safety-badge-moderate{ background:#ff9f1c; color:#fff; padding:.25rem .5rem; border-radius:.5rem; font-weight:700; }
    .safety-badge-risky{ background:#ff4d4f; color:#fff; padding:.25rem .5rem; border-radius:.5rem; font-weight:700; }
    .card-spot{ border-radius: var(--card-radius); box-shadow: 0 6px 18px rgba(16,24,40,0.06); }
    #map { width:100%; height:420px; border-radius:12px; }
    .helpline-card a{ text-decoration:none; color:inherit; }
    .small-muted{ color:#6b7280; font-size:.95rem; }
    footer{ padding:22px 0; text-align:center; color:#6b7280; margin-top:28px; }
    @media (max-width:767px){ .hero{ padding:28px 12px } }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand brand-text" href="index.php">
      Safe<span class="brand-accent">Her</span>
    </a>

    <!-- Right Buttons -->
    <div class="d-flex gap-2 align-items-center">

  <a class="btn btn-glass" href="basic_info.php">Basic Information</a>

  <a class="btn btn-glass" href="add_place.php">Add Place</a>

<div class="dropdown">
  <button class="btn btn-glass dropdown-toggle" type="button" id="womenProblemsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    Select an Issue
  </button>
  <ul class="dropdown-menu shadow" style="min-width: 250px;" aria-labelledby="womenProblemsDropdown">
    
    <li><h6 class="dropdown-header">Safety & Legal Crimes</h6></li>
    <li><a class="dropdown-item" href="domestic_violence.php">Domestic Violence & Cruelty</a></li>
    <li><a class="dropdown-item" href="sexual_assault.php">Sexual Assault & Rape</a></li>
    <li><a class="dropdown-item" href="problems/cyber_crime.php">Cyber Crime & Deepfakes</a></li>
    <li><a class="dropdown-item" href="problems/stalking_voyeurism.php">Stalking & Voyeurism</a></li>
    <li><a class="dropdown-item" href="problems/dowry_harassment.php">Dowry Harassment</a></li>
    <li><a class="dropdown-item" href="problems/human_trafficking.php">Human Trafficking</a></li>
    
    <li><hr class="dropdown-divider"></li>

    <li><h6 class="dropdown-header">Workplace & Economics</h6></li>
    <li><a class="dropdown-item" href="problems/workplace_harassment.php">Workplace Harassment (POSH)</a></li>
    <li><a class="dropdown-item" href="problems/wage_gap.php">Gender Wage Gap & Discrimination</a></li>
    <li><a class="dropdown-item" href="problems/maternity_rights.php">Maternity & Pregnancy Rights</a></li>
    <li><a class="dropdown-item" href="problems/property_rights.php">Inheritance & Property Rights</a></li>

    <li><hr class="dropdown-divider"></li>

    <li><h6 class="dropdown-header">Health & Social Issues</h6></li>
    <li><a class="dropdown-item" href="problems/child_marriage.php">Child Marriage</a></li>
    <li><a class="dropdown-item" href="problems/reproductive_health.php">Reproductive Health & Abortion Rights</a></li>
    <li><a class="dropdown-item" href="problems/mental_health.php">Mental Health & Social Stigma</a></li>
    <li><a class="dropdown-item" href="problems/education_bias.php">Access to Education</a></li>

    <li><hr class="dropdown-divider"></li>
    
    <li><a class="dropdown-item fw-bold text-danger" href="emergency_contacts.php">Emergency Helpline Numbers</a></li>
    <li><a class="dropdown-item fw-bold text-primary" href="legal_aid.php">Find Free Legal Aid</a></li>
  </ul>
</div>

  <?php if(isset($_SESSION['user_id'])): ?>
    <a class="btn btn-danger px-3" href="logout.php">Logout</a>
  <?php else: ?>
    <a class="btn btn-primary px-3" href="login.php">Login</a>
  <?php endif; ?>

</div>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="container d-md-flex align-items-center justify-content-between">
    <div class="col-md-7">
      <h1 class="fw-bold mb-3 hero-title">
  Real-time safety information for women — know before you go.
</h1>

<p class="hero-subtitle mb-4">
  Community-powered safety ratings, emergency tools, helplines, and nearby services — all in one place.
</p>
      <div class="d-flex gap-2 flex-wrap">
        <!-- emergency call -->
        <a class="btn btn-emergency btn-lg" href="tel:112" role="button" aria-label="Call Emergency 112">Call 112</a>

        <!-- share location (javascript) -->
        <button id="shareLocationBtn" class="btn btn-outline-light btn-lg text-dark" title="Share current location">📍 Share My Location</button>

        <!-- quick unsafe report -->
        <button id="markUnsafeBtn" class="btn btn-warning btn-lg" title="Report a place unsafe">Mark Unsafe</button>
      </div>
    </div>

    <div class="col-md-4 mt-4 mt-md-0">
      <!-- quick search -->
      <div class="card card-spot p-3">
        <div class="mb-2 small-muted">Search places or cities</div>
        <div class="input-group">
          <input id="globalSearch" class="form-control form-control-lg" placeholder="Search city, area or place name">
          <button id="btnSearch" class="btn btn-primary">Search</button>
        </div>
        <div class="small-muted mt-2">Try: "Connaught Place", "Kapurthala", "Sector 22"</div>
      </div>

      <!-- quick helpline list (prominent) -->
      <div class="card card-spot p-3 mt-3 helpline-card">
        <div class="fw-semibold mb-2">Quick Helplines</div>
        <div class="d-grid gap-2">
          <!-- Click-to-call and copy buttons -->
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">112</div>
              <div class="small-muted">All emergencies</div>
            </div>
            <div>
              <a class="btn btn-sm btn-outline-danger" href="tel:112">Call</a>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">181</div>
              <div class="small-muted">National Women Helpline</div>
            </div>
            <div><a class="btn btn-sm btn-outline-primary" href="tel:181">Call</a></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">1091</div>
              <div class="small-muted">Police - Women helpline</div>
            </div>
            <div><a class="btn btn-sm btn-outline-primary" href="tel:1091">Call</a></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">1098</div>
              <div class="small-muted">Childline</div>
            </div>
            <div><a class="btn btn-sm btn-outline-primary" href="tel:1098">Call</a></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">108</div>
              <div class="small-muted">Ambulance</div>
            </div>
            <div><a class="btn btn-sm btn-outline-primary" href="tel:108">Call</a></div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-bold">1930</div>
              <div class="small-muted">Cybercrime Helpline</div>
            </div>
            <div><a class="btn btn-sm btn-outline-primary" href="tel:1930">Call</a></div>
          </div>
        </div>

        <div class="small-muted mt-2"><strong>Sources:</strong> official helpline listings (government portals). See notes. </div>
      </div>

    </div>
  </div>
</section>

<!-- MAIN CONTENT -->
<div class="container my-5">
  <div class="row g-4">

    <!-- MAP + Nearby -->
    <div class="col-xl-8">
      <div class="card card-spot p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Interactive Map</h5>
          <div class="small-muted">Markers show safety rating</div>
        </div>

        <!-- map container -->
        <div id="map"></div>

        <div class="row mt-3 g-2">
          <div class="col-md-6">
            <div class="card p-2">
              <div class="fw-bold">Nearby Hospitals</div>
              <ul id="nearbyHospitals" class="list-unstyled mb-0 small-muted" style="max-height:160px; overflow:auto;"></ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card p-2">
              <div class="fw-bold">Nearby Police Stations</div>
              <ul id="nearbyPolice" class="list-unstyled mb-0 small-muted" style="max-height:160px; overflow:auto;"></ul>
            </div>
          </div>
        </div>
      </div>

      <!-- ========================= -->
<!-- LATEST 3 REVIEWS LEFT SIDE -->
<!-- ========================= -->
<div class="card card-spot p-4 mt-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Latest Community Reviews</h5>
    <a href="all_reviews.php" class="btn btn-outline-primary btn-sm">See All Reviews</a>
  </div>

  <div class="row g-3">

  <?php
  $latest = $conn->query("
    SELECT reviews.comment, reviews.created_at,
           places.place_name, places.city
    FROM reviews
    JOIN places ON reviews.place_id = places.id
    ORDER BY reviews.id DESC
    LIMIT 3
  ");

  if($latest->num_rows == 0){
      echo "<p class='text-muted'>No reviews yet.</p>";
  }

  while($row = $latest->fetch_assoc()){
  ?>

    <div class="col-md-4">
      <div class="p-3 bg-light rounded h-100">
        <h6 class="fw-bold"><?php echo htmlspecialchars($row['place_name']); ?></h6>
        <div class="small-muted mb-2"><?php echo htmlspecialchars($row['city']); ?></div>
        <div class="mb-2">
          <?php echo htmlspecialchars(substr($row['comment'],0,120)); ?>...
        </div>
        <div class="small-muted">
          <?php echo date("d M Y", strtotime($row['created_at'])); ?>
        </div>
      </div>
    </div>

  <?php } ?>

  </div>
</div>

    </div>




    <!-- RIGHT COLUMN: tips, legal, stats -->
    <div class="col-xl-4 d-flex flex-column gap-3">

      <div class="card card-spot p-3">
        <div class="fw-semibold mb-2">Safety Tips — Quick</div>
        <ol class="small-muted mb-0">
          <li>Share your live location with a trusted contact before travel.</li>
          <li>Prefer well-lit, busy routes; avoid empty shortcuts at night.</li>
          <li>Take screenshot evidence (text/calls) if harassed; note time/place.</li>
          <li>Use ride-share safety features (share trip, prefer female drivers if needed).</li>
        </ol>
      </div>

      <div class="card card-spot p-2">
        <div class="fw-semibold mb-2">Know Your Rights</div>
        <!-- Bootstrap accordion for legal rights -->
        <div class="accordion" id="rightsAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">Right to file FIR</button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#rightsAccordion">
              <div class="accordion-body small-muted">
                You have the right to file an FIR at any police station. Police must register cognizable offences and act promptly. Ask for a copy of the FIR and note the station name & officer badge.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">Protection from Workplace Harassment</button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#rightsAccordion">
              <div class="accordion-body small-muted">
                If harassed at work, you can file an internal complaint with the Internal Complaints Committee (ICC) under the POSH Act and pursue criminal/legal remedies.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">Cybercrime & Digital Abuse</button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#rightsAccordion">
              <div class="accordion-body small-muted">
                Report online fraud, non-consensual sharing of images, and cyber harassment at the National Cyber Crime Portal or call 1930. Keep copies of messages and URLs.
              </div>
            </div>
          </div>
        </div>
        <div class="small-muted mt-2">Short, actionable — not legal advice. Encourage users to contact local authorities or lawyers for legal counsel.</div>
      </div>

      <div class="card card-spot p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="fw-semibold">Community Stats</div>
          <div class="small-muted">Last 30 days</div>
        </div>
        <canvas id="chartSafety" height="200"></canvas>
      </div>

      <div class="card card-spot p-3">
        <div class="fw-semibold mb-2">Recent Community Reports</div>
        <div id="recentReports" class="list-group small-muted"></div>
      </div>

    </div>
  </div>
</div>

<footer>
  © <?php echo date("Y"); ?> SafeHer — Verified helplines: 112 / 181 / 1091 / 1098 / 108 / 1930. Data & resources from government portals. Stay safe. 
</footer>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- NOTE: Replace YOUR_GOOGLE_MAPS_API_KEY with your Google Maps JS API key (Maps + Places enabled) -->
<script>

// =======================
// BUILD PLACES FROM PHP
// =======================
const PLACES = [
<?php
$res = $conn->query("SELECT * FROM places WHERE latitude IS NOT NULL AND longitude IS NOT NULL");
$first = true;

while($p = $res->fetch_assoc()){

  $pid = $p['id'];
  $revQ = $conn->query("SELECT * FROM reviews WHERE place_id='$pid'");
  $total = 0; $count = 0;

  while($rr = $revQ->fetch_assoc()){
    $avg = ($rr['night_safety']+$rr['lighting']+$rr['crowd_behavior']+$rr['security_presence']+$rr['transport_safety']+$rr['hygiene'])/6;
    $total += $avg;
    $count++;
  }

  $overall = ($count>0) ? round($total/$count,2) : 0;

  if(!$first) echo ",";
  $first = false;

  echo json_encode([
    'id'=>$pid,
    'name'=>$p['place_name'],
    'city'=>$p['city'],
    'area'=>$p['area'],
    'lat'=>floatval($p['latitude']),
    'lng'=>floatval($p['longitude']),
    'score'=>$overall
  ]);
}
?>
];

// =======================
// INIT LEAFLET MAP
// =======================
let map = L.map('map').setView([22.9734, 78.6569], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// =======================
// ADD PLACE MARKERS
// =======================
PLACES.forEach(place => {

  let color = "green";
  if(place.score < 3 && place.score > 0) color = "red";
  else if(place.score >=3 && place.score <4) color = "orange";

  let marker = L.circleMarker([place.lat, place.lng], {
    radius: 8,
    color: color,
    fillColor: color,
    fillOpacity: 0.8
  }).addTo(map);

  marker.bindPopup(
    "<b>"+place.name+"</b><br>"+
    place.city+" - "+place.area+"<br>"+
    "Score: "+(place.score || "No reviews")+"<br><br>"+
    "<a href='add_review.php?id="+place.id+"' class='btn btn-sm btn-primary'>Add Review</a>"
  );
});

// =======================
// USER LOCATION
// =======================
if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(pos){

    let userLat = pos.coords.latitude;
    let userLng = pos.coords.longitude;

    map.setView([userLat,userLng],13);

    L.marker([userLat,userLng])
      .addTo(map)
      .bindPopup("You are here")
      .openPopup();

  });
}

// =======================
// CITY SEARCH (OSM)
// =======================
document.getElementById("btnSearch").addEventListener("click", function(){

  let city = document.getElementById("globalSearch").value.trim();

  if(!city){
    alert("Enter city name");
    return;
  }

  fetch("https://nominatim.openstreetmap.org/search?format=json&q="+encodeURIComponent(city+", India"))
  .then(res=>res.json())
  .then(data=>{

    if(data.length === 0){
      alert("City not found");
      return;
    }

    let lat = parseFloat(data[0].lat);
    let lon = parseFloat(data[0].lon);

    map.setView([lat, lon], 12);

    window.location.href="city_reviews.php?city="+encodeURIComponent(city);

  });
});

// =======================
// SHARE LOCATION (WHATSAPP)
// =======================
document.getElementById('shareLocationBtn').addEventListener('click', () => {

  if(!navigator.geolocation){
    alert("Geolocation not supported.");
    return;
  }

  navigator.geolocation.getCurrentPosition((pos) => {

    let lat = pos.coords.latitude;
    let lng = pos.coords.longitude;

    let link = "https://www.google.com/maps?q="+lat+","+lng;
    let message = "⚠ I am sharing my live location for safety.\n\n"+link;

    window.open("https://wa.me/?text="+encodeURIComponent(message),"_blank");

  });

});

// =======================
// MARK UNSAFE
// =======================
document.getElementById('markUnsafeBtn').addEventListener('click', () => {

  if(!navigator.geolocation){
    alert("Geolocation not supported.");
    return;
  }

  navigator.geolocation.getCurrentPosition((pos) => {

    let review = prompt("Describe why this location is unsafe:");

    if(!review) return;

    fetch("api_mark_unsafe.php", {
      method: "POST",
      headers: {"Content-Type":"application/json"},
      body: JSON.stringify({
        latitude: pos.coords.latitude,
        longitude: pos.coords.longitude,
        review: review
      })
    })
    .then(res => res.json())
    .then(data => alert(data.message));

  });

});

// =======================
// CHART
// =======================
const safetyCtx = document.getElementById('chartSafety').getContext('2d');
new Chart(safetyCtx, {
  type: 'bar',
  data: {
    labels: ['Green','Orange','Red'],
    datasets: [{
      data: [5,12,3],
      backgroundColor:['#2ecc71','#ff9f1c','#ff4d4f']
    }]
  },
  options: {
    plugins:{legend:{display:false}},
    scales:{y:{beginAtZero:true}}
  }
});

</script>
</body>
</html>