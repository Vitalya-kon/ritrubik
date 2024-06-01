<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "$path/private/head.php"; ?>

<body>
	<div class="_container">
		<?php include_once "$path/private/header.php"; ?>
		<main class="startPage">
			<div class="main__column">
				<!-- ===========menu-bar============================== -->

				<?php include_once "$path/public/menuBar.php" ?>

				<!-- =========main content==================================== -->
				<div class="content">
					<div class="theiaStickySidebar">
						<div class="action main__content">
							<h2 class="title__content">
								На Xbox One
							</h2>
							
							<div class="content__block">
								<div class="content__items" id="contentAction">		
								</div>
							</div>
							<div class="pagination_bottom"></div>
						</div>
					</div>
				</div>

			</div>
		</main>
	</div>
</body>
<script type="module" src="../../js/DataPlatform/xboxoneData.js"></script>
</html>