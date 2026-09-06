<?php
	\Document::get()->title = __("Homepage");
	$this->parent(view("html"));
	$speed = $speed ?? 1;
	$items_count = $items_count ?? 10;
	$colors = [
		[
			"name" => "orange",
			"hex" => "#f75c02",
			"rgba" => "rgb(247, 92, 2)",
		],
		[
			"name" => "pink",
			"hex" => "#da0368",
			"rgba" => "rgb(218, 3, 104)",
		],
		[
			"name" => "yellow",
			"hex" => "#f1c40f",
			"rgba" => "rgb(241, 196, 15)",
		],
		[
			"name" => "green",
			"hex" => "#5fad40",
			"rgba" => "rgb(95, 173, 64)",
		]
	];

	$sizes_map = ["80", "50", "20", "60", "20", "110", "150", "25", "15", "150"];
	$delay_map = [ "0",  "2",  "4",  "0",  "0",  "3",    "7", "15",  "2",   "0"];
	$x_map =     ["25",  "1", "70", "40", "65", "58",   "14", "50", "20",  "85"];
	$speed_map = [  22,   18,    8,   20,   12,   24,     40,   14,   10,   30];

	$items = [];
	for($i = 0; $i < $items_count; $i++) {
		$colors_index = $i  % count($colors);
		$items[] = [
		    "width" => $sizes_map[$i] . "px",
		    "height" => $sizes_map[$i] . "px",
			//"animation-delay" => $delay_map[$i] . "s!important",
			"animation-duration" => ($speed_map[$i] / $speed) . "s!important",
		    "background-color" => $colors[$colors_index]["rgba"],
		];
	}
?>

<?php $this->start_style(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
	<style>
		html,
		body {
			margin: 0px;
			padding: 0px;
			font-family: 'Roboto', sans-serif;
		}

		#welcome {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			width: 100%;
			text-align: center;
		}

		#welcome h1 {
			font-weight: bolder;
			font-size: 5em;
			line-height: 1;
			margin: 0px;
		}

		.floating-items {
		    /* background: #fff; */
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    overflow: hidden;
		}

		.floating-items > div > div {
		    animation: animate 25s linear infinite;
			margin: 0px auto;
		}

		<?php foreach($items as $i => $item): ?>
			.floating-items > div:nth-child(<?=$i + 1?>) {
			    position: absolute;
			    display: block;
			    /*left: <?=((100 / $items_count) * ($i))?>;%*/
			    left: <?=$x_map[$i]?>%;
			    width: <?=(100 / $items_count)?>%;
			    height: 10px;
			    bottom: -150px;
			}

			.floating-items > div:nth-child(<?=$i + 1?>) > div {
			    <?php foreach($item as $name => $value): ?>
			    	<?=$name?>: <?=$value?>; 
				<?php endforeach; ?>
			}
		<?php endforeach; ?>

		@keyframes animate  {
		    0% {
		        transform: translateY(0) rotate(0deg);
		        /*opacity: 1;*/
		        border-radius: 10%;
		    }

		    100% {
		        transform: translateY(calc(-100vh - 350px)) rotate(720deg);
		        /*opacity: 0;*/
		        border-radius: 50%;
		    }
		}
	</style>
<?php $this->stop_style(); ?>

<?php $this->start_section("body") ?>
	<main>
		<div class="floating-items">
			<?php foreach($items as $item): ?>
				<div>
					<div></div>
				</div>
			<?php endforeach; ?>
		</div>
		<div id="welcome">
			<h1><?=__("Welcome developer!")?></h1>
			<small>&copy; <?=date("Y")?> Monti framework</small>
		</div>
	</main>
<?php $this->stop_section(); ?>