<script>
  var map = L.map('map').setView([12.241851,  -1.55676], 13);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  <?php
  if(strpos($technologie['villes'], 'Ouagadougou') !== false){ ?>
    var marker = L.marker([12.3681873, -1.5270944]).addTo(map); <?php
  } ?>
  <?php
  if(strpos($technologie['villes'], 'Bobo Dioulasso') !== false){ ?>
    var marker = L.marker([11.1757783, -4.2957591]).addTo(map); <?php
  } ?>
  <?php
  if(strpos($technologie['villes'], 'Banfora') !== false){ ?>
    var marker = L.marker([10.642703, -4.752639]).addTo(map); <?php
  } ?>
  <?php
  if(strpos($technologie['villes'], 'Koudougou') !== false){ ?>
    var marker = L.marker([12.2503992, -2.3657338]).addTo(map); <?php
  } ?>
</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
