<?php
	/**
	 * Paths are listed in ascending order of priority, if the view is not found in the first path it will be searched in the second and so on.
	 */
	return [
		"paths" => [
			"main" => [
				root_path("src/views")
			]
		]
	];