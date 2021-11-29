<!-- NOTIFICATION -->
<?php if ($this->session->flashdata('message')) { ?>
	<script>
		$.notify({
			title: 'Halo, <?= $this->session->flashdata('message') ?>',
			message: 'Selamat datang kembali.'
		}, {
			type: 'success',
			allow_dismiss: true,
			newest_on_top: false,
			mouse_over: false,
			showProgressbar: false,
			spacing: 10,
			timer: 2000,
			placement: {
				from: 'top',
				align: 'right'
			},
			offset: {
				x: 30,
				y: 30
			},
			delay: 1000,
			z_index: 10000,
			animate: {
				enter: 'animated bounceIn',
				exit: 'animated flash'
			}
		});
	</script>
<?php } ?>

<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<script>
	$(document).ready(function() {
		getVisitor();
	})

	function getVisitor() {
		$.ajax({
			url: base_url + 'dashboard/grafik_visitor',
			method: "POST",
			dataType: "json",
			success: function(data) {
				var kategori = $.map(data, function(n, i) {
					return [new Date(n.created).toLocaleDateString()];
				});
				var jumlah = $.map(data, function(n, i) {
					return [n.visitor];
				});
				var serie = $.map(data, function(n, i) {
					return [{
						x: new Date(n.created).getTime(),
						y: n.visitor
					}];
				});
				var options = {
					chart: {
						height: 350,
						type: "line",
						stacked: false
					},
					dataLabels: {
						enabled: false
					},
					colors: ["#FF1654", "#247BA0"],
					series: [{
						name: "Pengunjung",
						data: jumlah
					}],
					stroke: {
						width: [2, 2]
					},
					plotOptions: {
						bar: {
							columnWidth: "20%"
						}
					},
					xaxis: {
						categories: kategori
					},
					yaxis: [{
							axisTicks: {
								show: true
							},
							axisBorder: {
								show: true,
								color: "#FF1654"
							},
							labels: {
								style: {
									colors: "#FF1654"
								}
							},
							title: {
								text: "Pengunjung",
								style: {
									color: "#FF1654"
								}
							}
						},
						{
							opposite: true,
							axisTicks: {
								show: true
							},
							axisBorder: {
								show: true,
								color: "#247BA0"
							},
							labels: {
								style: {
									colors: "#247BA0"
								}
							}
						}
					],
					tooltip: {
						shared: false,
						intersect: true,
						x: {
							show: false
						}
					},
					legend: {
						horizontalAlign: "left",
						offsetX: 40
					}
				};
				(chart = new ApexCharts(document.querySelector("#chartVisitor"), options)).render();
			}
		});
	}
</script>