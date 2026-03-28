<?php
session_start();
include "db.php"; 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>SafeHer — Women Safety Control Center</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  
  <style>
    :root {
      --brand: #6a5acd;
      --muted-bg: #f8f9fc;
      --card-radius: 16px;
      --text-main: #2d3748;
    }
    
    body { 
      background: var(--muted-bg); 
      font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
      color: var(--text-main);
      overflow-x: hidden;
    }

    .custom-navbar {
      background: linear-gradient(135deg, #4b3ca7, #6a5acd);
      padding: 12px 0;
    }
    .brand-text {
      font-size: 1.8rem;
      font-weight: 800;
      letter-spacing: 1px;
      color: #ffffff !important;
    }
    .brand-accent { color: #ffd700; }
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

    .hero {
      background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(139, 134, 176, 0.85)), url('img/33.jpeg') center/cover;
      color: #fff;
      padding: 180px 50px 150px 18px;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
      box-shadow: 0 10px 40px rgba(106, 90, 205, 0.2);
    }
    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1.2;
    }
    .hero-subtitle {
      font-size: 1.2rem;
      opacity: 0.9;
      margin-bottom: 30px;
    }

    .search-box-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: var(--card-radius);
      padding: 24px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      transform: translateY(-50px);
      z-index: 10;
      position: relative;
    }

    .card-modern {
      background: #fff;
      border: none;
      border-radius: var(--card-radius);
      box-shadow: 0 8px 20px rgba(0,0,0,0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    .card-modern h5 {
  font-size: 1.7rem;
  font-weight: 700;
}

.card-modern ul {
  font-size: 1.15rem;
  line-height: 1.8;
}

.card-modern li strong {
  font-size: 1.1rem;
}
    .card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(106, 90, 205, 0.1);
    }
    
    .btn-emergency { 
      background: #ff3b30; 
      border: none; 
      color: #fff; 
      font-weight: 700; 
      border-radius: 50px;
      padding: 12px 30px;
      box-shadow: 0 4px 15px rgba(255, 59, 48, 0.3);
      transition: all 0.3s;
    }
    .btn-emergency:hover {
      background: #e6352b;
      transform: scale(1.05);
      color: #fff;
    }
    .btn-outline-light { border-radius: 50px; font-weight: 600; }
    .btn-warning { border-radius: 50px; font-weight: 600; }

    #map { 
      width: 100%; 
      height: 400px; 
      border-radius: var(--card-radius); 
      z-index: 1;
    }

    .review-card {
      background: #fff;
      border-left: 4px solid var(--brand);
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.03);
      height: 100%;
    }

    .prep-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
      border-top-left-radius: var(--card-radius);
      border-top-right-radius: var(--card-radius);
    }

    .footer-modern {
      background: #1a202c;
      color: #a0aec0;
      padding: 40px 0 20px 0;
    }
    .footer-modern h5 { color: #fff; font-weight: 600; margin-bottom: 20px; }
    .footer-modern a { color: #a0aec0; text-decoration: none; transition: color 0.3s; }
    .footer-modern a:hover { color: var(--brand); }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand brand-text" href="index.php">
      Safe<span class="brand-accent">Her</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mobileMenu">
      <div class="navbar-nav ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0 text-center">
        <a class="btn btn-glass" href="basic_info.php">Basic Information</a>
        <a class="btn btn-glass" href="add_place.php">Add Place</a>
        <div class="dropdown">
          <button class="btn btn-glass dropdown-toggle w-100" type="button" id="womenProblemsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Select an Issue
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;" aria-labelledby="womenProblemsDropdown">
            <li><h6 class="dropdown-header">Safety & Legal Crimes</h6></li>
            <li><a class="dropdown-item" href="domestic_violence.php">Domestic Violence & Cruelty</a></li>
            <li><a class="dropdown-item" href="sexual_assault.php">Sexual Assault & Rape</a></li>
            <li><a class="dropdown-item" href="cyber_crime.php">Cyber Crime & Deepfakes</a></li>
            <li><a class="dropdown-item" href="stalking_voyeurism.php">Stalking & Voyeurism</a></li>
            <li><a class="dropdown-item" href="dowry_harassment.php">Dowry Harassment</a></li>
            <li><a class="dropdown-item" href="human_trafficking.php">Human Trafficking</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><h6 class="dropdown-header">Workplace & Economics</h6></li>
            <li><a class="dropdown-item" href="workplace_harassment.php">Workplace Harassment (POSH)</a></li>
            <li><a class="dropdown-item" href="wage_gap.php">Gender Wage Gap & Discrimination</a></li>
            <li><a class="dropdown-item" href="maternity_rights.php">Maternity & Pregnancy Rights</a></li>
            <li><a class="dropdown-item" href="property_rights.php">Inheritance & Property Rights</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><h6 class="dropdown-header">Health & Social Issues</h6></li>
            <li><a class="dropdown-item" href="child_marriage.php">Child Marriage</a></li>
            <li><a class="dropdown-item" href="reproductive_health.php">Reproductive Health & Abortion Rights</a></li>
            <li><a class="dropdown-item" href="mental_health.php">Mental Health & Social Stigma</a></li>
            <li><a class="dropdown-item" href="education_bias.php">Access to Education</a></li>
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
  </div>
</nav>

<section class="hero">
  <div class="container text-center">
    <h1 class="hero-title">Navigate Your World with Confidence</h1>
    <p class="hero-subtitle">Real-time safety ratings, emergency tools, and community-driven insights.</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a class="btn btn-emergency" href="tel:112"><i class="fas fa-phone-alt me-2"></i> SOS 112</a>
      <button id="shareLocationBtn" class="btn btn-outline-light btn-lg"><i class="fas fa-map-marker-alt me-2"></i> Share Location</button>
      <button id="markUnsafeBtn" class="btn btn-warning btn-lg"><i class="fas fa-exclamation-triangle me-2"></i> Report Unsafe</button>
    </div>
  </div>
</section>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="search-box-container">
        <h5 class="fw-bold mb-3 text-center" style="color: var(--brand);">Check Area Safety Review's</h5>
        <div class="input-group input-group-lg">
          <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
          <input id="globalSearch" class="form-control border-start-0" placeholder="Search city or area reviews...">
          <button id="btnSearch" class="btn text-white px-4" style="background: var(--brand);">Search Reviews</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mb-4">
  <div class="row g-4 align-items-stretch">
    
    <div class="col-xl-8">
      <div class="card card-modern p-4 d-flex flex-column h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="fw-bold mb-0"><i class="fas fa-map text-primary me-2"></i> Live Safety Map</h4>
          <div class="map-controls d-flex gap-2">
            <button id="btnHospitals" class="btn btn-outline-danger btn-sm"><i class="fas fa-hospital me-1"></i> Hospitals</button>
            <button id="btnPolice" class="btn btn-outline-primary btn-sm"><i class="fas fa-shield-alt me-1"></i> Police Stations</button>
          </div>
        </div>
        <div id="map" class="flex-grow-1"></div>
        <div id="poiResults" class="mt-2 small text-muted"></div>
      </div>
    </div>

    <div class="col-xl-4 d-flex flex-column gap-4">
      <div class="card card-modern p-4">
        <h5 class="fw-bold mb-3">Quick Helplines</h5>
        <div class="d-flex flex-column gap-3">
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-danger">112</strong><small class="text-muted">All Emergencies</small></div>
            <a class="btn btn-sm btn-danger rounded-circle" href="tel:112"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-primary">1091</strong><small class="text-muted">Women Helpline</small></div>
            <a class="btn btn-sm btn-primary rounded-circle" href="tel:1091"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-primary">181</strong><small class="text-muted">Domestic Abuse</small></div>
            <a class="btn btn-sm btn-primary rounded-circle" href="tel:181"><i class="fas fa-phone"></i></a>
          </div>
        </div>
      </div>

      <div class="card card-modern p-4 flex-grow-1">
        <h5 class="fw-bold mb-3">Safety Trends</h5>
        <div style="height: 180px;">
            <canvas id="chartSafety"></canvas>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="container mb-5 mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0"><i class="fas fa-comments text-primary me-2"></i> Latest Community Reviews</h4>
    <a href="all_reviews.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">View All Reviews</a>
  </div>
  <div class="row g-4">
    <?php
    $latest = $conn->query("
      SELECT reviews.comment, reviews.created_at, places.place_name, places.city
      FROM reviews JOIN places ON reviews.place_id = places.id
      ORDER BY reviews.id DESC LIMIT 3
    ");
    if($latest->num_rows == 0){
        echo "<div class='col-12'><p class='text-muted'>No reviews yet.</p></div>";
    }
    while($row = $latest->fetch_assoc()){
    ?>
      <div class="col-md-4">
        <div class="review-card">
          <div class="d-flex justify-content-between">
            <h6 class="fw-bold mb-1"><?php echo htmlspecialchars($row['place_name']); ?></h6>
            <small class="text-muted"><?php echo date("d M Y", strtotime($row['created_at'])); ?></small>
          </div>
          <div class="text-muted small mb-3"><i class="fas fa-map-pin me-1"></i> <?php echo htmlspecialchars($row['city']); ?></div>
          <p class="mb-0 text-dark small"><?php echo htmlspecialchars(substr($row['comment'],0,120)); ?>...</p>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<div class="container mb-5 mt-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Preparedness & Well-being</h2>
    <p class="text-muted">Essential physical and mental tools for high-stress situations.</p>
  </div>
  
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.pexels.com/photos/6608038/pexels-photo-6608038.jpeg" class="prep-img" alt="EDC Kit">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Everyday Carry (EDC)</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left: 20px;">
            <li class="mb-1"><strong>Defense:</strong> Pepper spray (keep accessible, not buried in bag).</li>
            <li class="mb-1"><strong>Alert:</strong> 130dB personal alarm keychain.</li>
            <li class="mb-1"><strong>Utility:</strong> Heavy-duty tactical pen (can break glass).</li>
            <li><strong>Power:</strong> Fully charged 10,000mAh power bank and cable.</li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="prep-img" alt="Travel Safe">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Transit Security</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left: 20px;">
            <li class="mb-1"><strong>Data:</strong> Always download offline Google Maps of your destination.</li>
            <li class="mb-1"><strong>Tracking:</strong> Share live ride status via WhatsApp/Maps with a trusted contact.</li>
            <li class="mb-1"><strong>Cash:</strong> Keep emergency cash (₹500-₹1000) inside your phone case or a hidden pocket.</li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.pexels.com/photos/7699487/pexels-photo-7699487.jpeg" class="prep-img" alt="Mental Wellness">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Crisis Psychology</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left: 20px;">
            <li class="mb-1"><strong>De-escalation:</strong> Maintain distance, do not engage verbally if avoidable.</li>
            <li class="mb-1"><strong>Adrenaline Control:</strong> Use 4-7-8 breathing (inhale 4s, hold 7s, exhale 8s) to prevent panic freezing.</li>
            <li class="mb-1"><strong>Observation:</strong> Focus on identifying marks (tattoos, shoes, license plates) rather than faces alone.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer-modern">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h3 class="fw-bold text-white mb-2">Safe<span class="brand-accent">Her</span></h3>
        <p class="small">Empowering women through technology, awareness, and community. We build tools that make navigating the world safer and more predictable.</p>
      </div>
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="about.php">About Us</a></li>
          <li><a href="mailto:support@safeher.in">support@safeher.in</a></li>
          <li><a href="terms.php">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Important Gov Portals</h5>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="https://ncw.nic.in/" target="_blank">National Commission for Women</a></li>
          <li><a href="https://cybercrime.gov.in/" target="_blank">National Cyber Crime Reporting</a></li>
          <li><a href="https://wcd.nic.in/" target="_blank">Ministry of Women & Child Development</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center small mt-4">
      © <?php echo date("Y"); ?> SafeHer. All Rights Reserved. Emergency: Dial 112.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
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
    'id'=>$pid, 'name'=>$p['place_name'], 'city'=>$p['city'],
    'area'=>$p['area'], 'lat'=>floatval($p['latitude']), 'lng'=>floatval($p['longitude']),
    'score'=>$overall
  ]);
}
?>
];

let map = L.map('map').setView([22.9734, 78.6569], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

let markersLayer = L.layerGroup().addTo(map);
let currentLat = 22.9734;
let currentLng = 78.6569;

function renderPlaces() {
  PLACES.forEach(place => {
    let color = "#2ecc71";
    if(place.score < 3 && place.score > 0) color = "#e74c3c";
    else if(place.score >=3 && place.score <4) color = "#f39c12";

    L.circleMarker([place.lat, place.lng], {
      radius: 8, color: color, fillColor: color, fillOpacity: 0.8
    }).addTo(markersLayer).bindPopup(
      "<div class='text-center'><b>"+place.name+"</b><br>"+
      place.city+"<br>"+
      "Safety Score: <b>"+(place.score || "N/A")+"</b>/5<br>"+
      "<a href='add_review.php?id="+place.id+"' class='btn btn-sm btn-primary mt-2'>Review Area</a></div>"
    );
  });
}
renderPlaces();

if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(pos){
    currentLat = pos.coords.latitude;
    currentLng = pos.coords.longitude;
    map.setView([currentLat, currentLng], 14);
    L.circleMarker([currentLat, currentLng], {
        radius: 10, color: '#3498db', fillColor: '#3498db', fillOpacity: 1
    }).addTo(map).bindPopup("You are here").openPopup();
  });
}

document.getElementById("btnSearch").addEventListener("click", function(){
  let city = document.getElementById("globalSearch").value.trim();
  if(!city) return alert("Enter city name");

  fetch("https://nominatim.openstreetmap.org/search?format=json&q="+encodeURIComponent(city+", India"))
  .then(res=>res.json())
  .then(data=>{
    if(data.length === 0) return alert("City not found");
    let lat = parseFloat(data[0].lat);
    let lon = parseFloat(data[0].lon);
    map.setView([lat, lon], 12);
    window.location.href="city_reviews.php?city="+encodeURIComponent(city);
  });
});

function fetchPOI(query, iconType, color) {
  let overpassQuery = `
    [out:json];
    (
      node["amenity"="${query}"](around:5000, ${currentLat}, ${currentLng});
      way["amenity"="${query}"](around:5000, ${currentLat}, ${currentLng});
    );
    out center;
  `;
  
  document.getElementById('poiResults').innerText = "Scanning area...";
  
  fetch("https://overpass-api.de/api/interpreter", {
    method: "POST",
    body: overpassQuery
  })
  .then(res => res.json())
  .then(data => {
    markersLayer.clearLayers();
    renderPlaces(); 
    
    let count = 0;
    data.elements.forEach(el => {
      let lat = el.lat || el.center.lat;
      let lon = el.lon || el.center.lon;
      let name = el.tags.name || "Unknown " + query;
      
      let customIcon = L.divIcon({
        html: `<div style="background-color: ${color}; color: white; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; border: 2px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3);"><i class="${iconType}" style="font-size: 12px;"></i></div>`,
        className: '',
        iconSize: [24, 24]
      });

      L.marker([lat, lon], {icon: customIcon}).addTo(markersLayer).bindPopup(`<b>${name}</b>`);
      count++;
    });
    document.getElementById('poiResults').innerText = `Found ${count} ${query}(s) within 5km radius.`;
  })
  .catch(err => {
    document.getElementById('poiResults').innerText = "Could not fetch nearby locations at this time.";
  });
}

document.getElementById("btnHospitals").addEventListener("click", () => fetchPOI("hospital", "fas fa-hospital", "#e74c3c"));
document.getElementById("btnPolice").addEventListener("click", () => fetchPOI("police", "fas fa-shield-alt", "#3498db"));

document.getElementById('shareLocationBtn').addEventListener('click', () => {
  if(!navigator.geolocation) return alert("Geolocation not supported.");
  navigator.geolocation.getCurrentPosition((pos) => {
    let link = "http://maps.google.com/?q="+pos.coords.latitude+","+pos.coords.longitude;
    let message = "⚠ I am sharing my live location for safety.\n\n"+link;
    window.open("https://wa.me/?text="+encodeURIComponent(message),"_blank");
  });
});

document.getElementById('markUnsafeBtn').addEventListener('click', () => {
  if(!navigator.geolocation) return alert("Geolocation not supported.");
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
    }).then(res => res.json()).then(data => alert(data.message));
  });
});

const safetyCtx = document.getElementById('chartSafety').getContext('2d');
new Chart(safetyCtx, {
  type: 'line',
  data: {
    labels: ['W1', 'W2', 'W3', 'W4'],
    datasets: [{
      label: 'Safe',
      data: [12, 19, 15, 25],
      borderColor: '#2ecc71',
      backgroundColor: 'rgba(46, 204, 113, 0.2)',
      tension: 0.4,
      fill: true
    },
    {
      label: 'Unsafe',
      data: [8, 5, 10, 4],
      borderColor: '#e74c3c',
      backgroundColor: 'rgba(231, 76, 60, 0.2)',
      tension: 0.4,
      fill: true
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: { position: 'top' }
    },
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>
</body>
</html>