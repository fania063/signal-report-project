<?php
include 'controller/laporan/getAll.php';
$data = getAllLaporan();
?>
<!DOCTYPE html><html lang="id"><head>…bootstrap…</head><body>
<table class="table table-bordered align-middle">
  <thead class="table-light">
    <tr>
      <th>No</th><th>Judul</th><th>Lokasi</th><th>Waktu</th><th>Deskripsi</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data as $i=>$lap): ?>
    <tr>
      <td><?= $i+1 ?></td>
      <td><?= htmlspecialchars($lap['judul']) ?></td>
      <td><?= htmlspecialchars($lap['lokasi']) ?></td>
      <td><?= htmlspecialchars($lap['waktu']) ?></td>
      <td><?= nl2br(htmlspecialchars($lap['deskripsi_gangguan'])) ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</body></html>
